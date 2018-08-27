<?php

 class Directo
 {

    public function getEntregasDirectas()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT entidad.razon_social, directa.fecha, directa.id
                                FROM entrega_directa directa
                                INNER JOIN entidad_receptora entidad ON entidad.id=directa.entidad_receptora_id
                                ORDER BY directa.fecha");
        $query->execute(array());

        while ($entrega=$query->fetchObject()) {
           $entregas[]=$entrega;    
        }

        $cn = null;
        return $entregas;
    }

    public function getUltimaEntregaDirecta()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT MAX(id) AS id FROM entrega_directa");
        $query->execute();

        $entrega = ($query->fetchObject());

        $cn = null;
        return $entrega;
    }

    public function getEntregaDirectaById($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare(" SELECT entrega.id, entrega.entidad_receptora_id, entidad.razon_social
                                FROM entrega_directa entrega
                                INNER JOIN entidad_receptora entidad ON entidad.id=entrega.entidad_receptora_id 
                                WHERE entrega.id=?");

        $query->execute(array($id));

        $entrega=($query->fetchObject());
        $cn = null;

        return $entrega;
     }


     public function getItemsDeEntregaDirecta($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT item.cantidad, detalle.contenido, alimento.descripcion, ddt.vencimiento,
                                item.donacion_detalle_alimento_id, ddt.id AS id_donacion, ddt.detalle_alimento_id  
                                FROM entregas_detalle_alimento item
                                INNER JOIN donaciones_detalle_alimento ddt ON ddt.id=item.donacion_detalle_alimento_id
                                INNER JOIN detalle_alimento detalle ON ddt.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                
                                WHERE entrega_id=?");

        $query->execute(array($id));

        while ($detalle = $query->fetchObject()) {
               $detalles[]=$detalle;
        }
         
        $cn = null;
        return $detalles;
     }


    public function insertEntregaDirecta($ent,$fecha)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO entrega_directa (entidad_receptora_id, fecha)
        VALUES (:entidad_receptora_id, :fecha)");
        $query->bindParam(':entidad_receptora_id', $ent);
        $query->bindParam(':fecha', $fecha);
     
        $query->execute();
  
        $cn = null;
    }

    public function insertAlimentoEntregaDirecta($entrega,$det,$cant)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO entregas_detalle_alimento (entrega_id, donacion_detalle_alimento_id, cantidad)
        VALUES (:entrega_id, :donacion_detalle_alimento_id, :cantidad)");
        $query->bindParam(':entrega_id', $entrega);
        $query->bindParam(':donacion_detalle_alimento_id', $det);
        $query->bindParam(':cantidad', $cant);
     
        $query->execute();
  
        $cn = null;
    }


    public function editEntregaDirecta($ent,$fecha)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE pedido_modelo SET entidad_receptora_id=?, fecha_ingreso=?, estado_pedido_id=?,
        turno_entrega_id=?, envio=? WHERE numero=?");
        $query->execute(array($ent,$fecha,$estado,$turno,$envio,$numero));

        $cn = null;
    }


    public function deleteEntregaDirecta($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM entrega_directa WHERE id=?");
        $query->execute(array($id));

        $cn = null;
    }

     public function deleteItemsDeEntregaDirecta($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM entregas_detalle_alimento WHERE entrega_id=? ");
        $query->execute(array($id));

        $cn = null;
     }
   
 }