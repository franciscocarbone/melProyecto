<?php

 class Envio
 {

    public function getEnvioById($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, estado.descripcion, entidad.razon_social,turno.fecha, turno.hora, 
                                pedido.estado_pedido_id, entidad.latitud, entidad.longitud 
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
                                WHERE pedido.numero=?");

        $query->execute(array($id));

        $envio= $query->fetchObject();

        $cn = null;

        return $envio;
     }


     public function getEnviosByFecha($fecha)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, estado.descripcion, entidad.razon_social,turno.fecha, turno.hora, 
                                pedido.estado_pedido_id, entidad.latitud, entidad.longitud  
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
                                WHERE turno.fecha=?
                                ORDER BY turno.hora");

        $query->execute(array($fecha));

        while ($envio = $query->fetchObject()) {
           $envios[]=$envio;
        }

        $cn = null;

        return $envios;
     }


     public function cambiarEstadoEnvio($estado,$numero)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE pedido_modelo SET estado_pedido_id=? WHERE numero=?");
        $query->execute(array($estado, $numero));

        $cn = null;
    }


     public function getEnvios()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, estado.descripcion, entidad.razon_social,turno.fecha, turno.hora, 
                                pedido.estado_pedido_id, entidad.latitud, entidad.longitud 
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id");

        $query->execute(array());

        while ($envio = $query->fetchObject()) {
           $envios[]=$envio;
        }

        $cn = null;

        return $envios;
     }

   
 }