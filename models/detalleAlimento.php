<?php

 class DetalleAlimento
 {

    public function getDetalleAlimentos()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT d.id, a.descripcion,d.peso_paquete,d.stock,d.reservado, 
                                        d.contenido,d.alimento_codigo, a.codigo
         FROM detalle_alimento d INNER JOIN alimento a ON d.alimento_codigo=a.codigo ORDER BY alimento_codigo");
        $query->execute(array());


        while ($alimento=$query->fetchObject()) {
           $alimentos[]=$alimento;    
        }

        $cn = null;
        return $alimentos;
    }

    

    public function getDetalleAlimentosByCodigo($codigo)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT d.id, a.descripcion,d.peso_paquete,d.stock,d.reservado, 
                                        d.contenido,d.alimento_codigo, a.codigo
         FROM detalle_alimento d INNER JOIN alimento a ON d.alimento_codigo=a.codigo WHERE d.alimento_codigo=? ORDER BY alimento_codigo");
        $query->execute(array($codigo));

        while ($alimento=$query->fetchObject()) {
           $alimentos[]=$alimento;    
        }

        $cn = null;
        return $alimentos;
    }

    public function getStock()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT d.id, a.descripcion,d.peso_paquete,d.stock,d.reservado, 
                                        d.contenido,d.alimento_codigo, a.codigo
         FROM detalle_alimento d INNER JOIN alimento a ON d.alimento_codigo=a.codigo WHERE d.stock>0 ORDER BY alimento_codigo");
        $query->execute(array());


        while ($alimento=$query->fetchObject()) {
           $alimentos[]=$alimento;    
        }

        $cn = null;
        return $alimentos;
    }

    public function getDetalleAlimentoById($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM detalle_alimento WHERE id=?");
        $query->execute(array($id));

        $detalle_alimento=($query->fetchObject());
        $cn = null;
        return $detalle_alimento;
     }


    public function getDetalleAlimentoByName($name)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM alimento WHERE descripcion=?");
        $query->execute(array($name));

        $alimento=($query->fetchObject());
        $cn = null;
        return $alimento;
    }


    public function insertDetalleAlimento($cod,$cont,$peso,$stock,$reservado)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO detalle_alimento (alimento_codigo,contenido,peso_paquete,
            stock,reservado)
        VALUES (:alimento_codigo,:contenido,:peso_paquete,:stock,:reservado)");
        $query->bindParam(':alimento_codigo', $cod);
        $query->bindParam(':contenido', $cont);
        $query->bindParam(':peso_paquete', $peso);
        $query->bindParam(':stock', $stock);
        $query->bindParam(':reservado', $reservado);
     
        $query->execute();
  
        $cn = null;
    }

    public function insertAlimentoDonado($don,$det,$cant,$ven)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO donaciones_detalle_alimento (donacion_id, detalle_alimento_id, cantidad,
            vencimiento)
        VALUES (:donacion_id, :detalle_alimento_id, :cantidad, :vencimiento)");
        $query->bindParam(':donacion_id', $don);
        $query->bindParam(':detalle_alimento_id', $det);
        $query->bindParam(':cantidad', $cant);
        $query->bindParam(':vencimiento', $ven);
     
        $query->execute();
  
        $cn = null;
    }


    public function editDetalleAlimento($cod,$cont,$peso,$id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE detalle_alimento SET alimento_codigo=?, 
            contenido=?, peso_paquete=? WHERE id=?");
        $query->execute(array($cod,$cont,$peso,$id));

        $cn = null;
    }


    public function updateStockDetalleAlimento($stock,$id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE detalle_alimento SET stock=? WHERE id=?");
        $query->execute(array($stock,$id));

        $cn = null;
    } 


    public function deleteDetalleAlimento($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM detalle_alimento WHERE id=?");
        $query->execute(array($id));

        $cn = null;
    }
   
 }