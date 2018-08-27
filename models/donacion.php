<?php

 class Donacion
 {

  public function getDonaciones()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT  donacion.id, donante.razon_social AS donante_Razon_Social, donacion.fecha 
                                FROM donaciones donacion 
                                INNER JOIN donante donante ON donante.id=donacion.donante_id");
        $query->execute();

        while ($donacion = $query->fetchObject()) {
           $donaciones[]=$donacion;
        }

        $cn = null;
        return $donaciones;
     }

     public function getDonantes()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM donante ORDER BY razon_social");
        $query->execute();

        while ($donante = $query->fetchObject()) {
           $donantes[]=$donante;
        }
     
        $cn = null;
        return $donantes;
     }


      public function getResumen()
         {        
            require (__DIR__ . '/../config/connection.php'); 

            $query = $cn->prepare("SELECT er.id,er.razon_social,er.telefono,er.domicilio
                        FROM entidad_receptora er");
            $query->execute();

            while ($entidad = $query->fetchObject()) {
               $entidades[]=$entidad;
            }

         
            $cn = null;
            return $entidades;
         }


    public function getUltimaDonacion()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT MAX(id) AS id FROM donaciones");
        $query->execute();

        $donacion = ($query->fetchObject());

        $cn = null;
        return $donacion;
    }


     public function getDonacionById($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM donaciones WHERE id=?");

        $query->execute(array($id));

        $donacion=($query->fetchObject());
         
        $cn = null;
        return $donacion;
     }



     public function insertDonacion($don)
     {       
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO donaciones (donante_id, fecha)
        VALUES (:donante_id, :fecha)");
        $query->bindParam(':donante_id', $don);
        $query->bindParam(':fecha', date("Y-m-d"));
       
        $query->execute();
  
        $cn = null;
     }

     public function editDonacion($don,$id)
     {       
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE donaciones SET donante_id=? WHERE id=?");
        $query->execute(array($don,$id));

        $cn = null;
     }


    public function deleteDonacion($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM donaciones WHERE id=? ");
        $query->execute(array($id));

        $cn = null;
     }

    
     public function getAlimentosVencidos($fecha)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT alimento.descripcion AS alimento, contenido, SUM(cantidad) AS cantidad, vencimiento
                                FROM donaciones_detalle_alimento donacionAlimento
                                INNER JOIN detalle_alimento detalle ON donacionAlimento.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE (vencimiento <= ?)and(cantidad > 0)
                                GROUP BY contenido
                                ORDER BY alimento.descripcion");

        $query->execute(array($fecha));

        while ($vencido = $query->fetchObject()) {
               $vencidos[]=$vencido;
        }
         
        $cn = null;
        return $vencidos;
     }

     //--------------------------------------------PDFS--------------------------------------------------

     public function getAlimentosVencidosPdf($fecha)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT alimento.descripcion AS alimento, SUM(cantidad) AS cantidad, contenido, SUM(cantidad) AS cantidad, vencimiento
                                FROM donaciones_detalle_alimento donacionAlimento
                                INNER JOIN detalle_alimento detalle ON donacionAlimento.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE (vencimiento <= ?)and(cantidad > 0)
                                GROUP BY contenido
                                ORDER BY alimento.descripcion");

        $query->execute(array($fecha));

        $vencidos = $query->fetchAll(PDO::FETCH_ASSOC);

        $cn = null;
        return $vencidos;
     }


     //----------------------------Alimentos donaciones ----------//

     public function getAlimentosPorVencer($fecha)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT alimento.descripcion AS alimento, contenido, cantidad, vencimiento, donacionAlimento.id 
                                FROM donaciones_detalle_alimento donacionAlimento
                                INNER JOIN detalle_alimento detalle ON donacionAlimento.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE (vencimiento <= ?)and(cantidad > 0)
                                ORDER BY vencimiento");

        $query->execute(array($fecha));

        while ($vencimiento = $query->fetchObject()) {
               $vencimientos[]=$vencimiento;
        }
         
        $cn = null;
        return $vencimientos;
     }


     public function getItemsDeDonacion($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT item.cantidad, item.vencimiento, item.detalle_alimento_id, contenido, descripcion 
                                FROM donaciones_detalle_alimento item
                                INNER JOIN detalle_alimento detalle ON item.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE donacion_id = ?");

        $query->execute(array($id));

        while ($detalle = $query->fetchObject()) {
               $detalles[]=$detalle;
        }
         
        $cn = null;
        return $detalles;
     }


     


    public function getDetalleAlimentosDonacionesByCodigo($codigo)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT  donacion.id, alimento.descripcion , detalle.contenido, 
                                        donacion.cantidad AS maximo, donacion.vencimiento
                                FROM donaciones_detalle_alimento donacion 
                                INNER JOIN detalle_alimento detalle ON detalle.id=donacion.detalle_alimento_id
                                INNER JOIN alimento alimento ON detalle.alimento_codigo=alimento.codigo 
                                WHERE ((detalle.alimento_codigo=?)and(donacion.cantidad>0)) 
                                ORDER BY donacion.vencimiento");
        $query->execute(array($codigo));

        while ($alimento=$query->fetchObject()) {
           $alimentos[]=$alimento;    
        }

        $cn = null;
        return $alimentos;
    }


     public function deleteItemsDeDonacion($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM donaciones_detalle_alimento WHERE donacion_id=? ");
        $query->execute(array($id));

        $cn = null;
     }

///--------------------------ALIMENTOS  DONADOS ------------------------///

     public function getItemDonado($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT item.cantidad, item.vencimiento, item.detalle_alimento_id, contenido, descripcion,
                                item.id 
                                FROM donaciones_detalle_alimento item
                                INNER JOIN detalle_alimento detalle ON item.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE item.id = ?");

        $query->execute(array($id));

        $detalle = $query->fetchObject();
 
        $cn = null;

        return $detalle;
     }


    public function updateStockItemDonacion($stock,$id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE donaciones_detalle_alimento SET cantidad=? WHERE id=?");
        $query->execute(array($stock,$id));

        $cn = null;
    } 




 }
