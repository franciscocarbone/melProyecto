<?php

 class Pedido
 {

    public function getPedidosModelo()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, estado.descripcion, entidad.razon_social,turno.fecha, turno.hora, 
                                pedido.fecha_ingreso, pedido.turno_entrega_id 
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
                                ORDER BY turno.fecha, turno.hora");
        $query->execute(array());

        while ($pedido=$query->fetchObject()) {
           $pedidos[]=$pedido;    
        }

        $cn = null;
        return $pedidos;
    }


    public function getPedidosEntregadosEntreFechas($desde,$hasta)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, turno.fecha, estado.descripcion, 
            SUM(detallePedidos.cantidad*detalle.peso_paquete) as total
            FROM donaciones_detalle_alimento detalleDonaciones
            INNER JOIN detalle_alimento detalle ON detalle.id=detalleDonaciones.detalle_alimento_id
            INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
            INNER JOIN pedidos_detalle_alimento detallePedidos ON detallePedidos.donacion_detalle_alimento_id=detalleDonaciones.id
            INNER JOIN pedido_modelo pedido ON pedido.numero=detallePedidos.pedido_numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= ?)and(turno.fecha <= ?))
            GROUP BY pedido.numero");
        
        $query->execute(array($desde,$hasta));

        while ($pedido=$query->fetchObject()) {
           $pedidos[]=$pedido;    
        }

        $cn = null;
        return $pedidos;
    }

    public function getAlimentosEntregadosEntreFechas($desde,$hasta)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, detallePedido.cantidad, estado.descripcion, entidad.razon_social, 
            detalleAlimento.peso_paquete, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total
            FROM pedido_modelo pedido
            INNER JOIN pedidos_detalle_alimento detallePedido ON detallePedido.pedido_numero=pedido.numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
            INNER JOIN donaciones_detalle_alimento donacionDetalle ON donacionDetalle.id=detallePedido.donacion_detalle_alimento_id
            INNER JOIN detalle_alimento detalleAlimento ON detalleAlimento.id=donacionDetalle.detalle_alimento_id
            
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= ?)and(turno.fecha <= ?))
            GROUP BY entidad.id");
        
        $query->execute(array($desde,$hasta));

        while ($pedido=$query->fetchObject()) {
           $pedidos[]=$pedido;    
        }

        $cn = null;
        return $pedidos;
    }


    public function getAlimentosEntregadosEntreFechasGrafico($desde,$hasta)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT entidad.razon_social, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total
            FROM pedido_modelo pedido
            INNER JOIN pedidos_detalle_alimento detallePedido ON detallePedido.pedido_numero=pedido.numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
            INNER JOIN donaciones_detalle_alimento donacionDetalle ON donacionDetalle.id=detallePedido.donacion_detalle_alimento_id
            INNER JOIN detalle_alimento detalleAlimento ON detalleAlimento.id=donacionDetalle.detalle_alimento_id
            
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= ?)and(turno.fecha <= ?))
            GROUP BY entidad.id");
        
        $query->execute(array($desde,$hasta));

        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);

        $cn = null;
        return $pedidos;
    }


    public function getEstados()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM estado_pedido");
        $query->execute();

        while ($estado = $query->fetchObject()) {
           $estados[]=$estado;
        }

        $cn = null;
        return $estados;
     }

    public function getPedidoById($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare(" SELECT pedido.numero,pedido.entidad_receptora_id,pedido.estado_pedido_id, pedido.envio,
                                estado.descripcion, entidad.razon_social,turno.fecha, turno.hora, pedido.fecha_ingreso,
                                pedido.turno_entrega_id 
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id 
                                WHERE numero=?");

        $query->execute(array($id));

        $pedido=($query->fetchObject());
        $cn = null;

        return $pedido;
     }

     public function getEnviosDelDia($fecha)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, estado.descripcion, entidad.razon_social,turno.fecha, turno.hora 
                                FROM pedido_modelo pedido
                                INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
                                INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
                                INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
                                WHERE (fecha=?)and(envio=1)and(estado.descripcion != 'ENTREGADO') 
                                ORDER BY turno.hora");

        $query->execute(array($fecha));

        while ($envio = $query->fetchObject()) {
           $envios[]=$envio;
        }

        $cn = null;

        return $envios;
     }

     public function getItemsDePedido($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 
        
        $query = $cn->prepare("SELECT item.cantidad, detalle.contenido, alimento.descripcion, ddt.vencimiento,
                                item.donacion_detalle_alimento_id, ddt.id AS id_donacion, ddt.detalle_alimento_id  
                                FROM pedidos_detalle_alimento item
                                INNER JOIN donaciones_detalle_alimento ddt ON ddt.id=item.donacion_detalle_alimento_id
                                INNER JOIN detalle_alimento detalle ON ddt.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                
                                WHERE pedido_numero=?");

        $query->execute(array($id));

        while ($detalle = $query->fetchObject()) {
               $detalles[]=$detalle;
        }
         
        $cn = null;
        return $detalles;
     }


    public function insertPedido($ent,$fecha,$estado,$turno,$envio)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO pedido_modelo (entidad_receptora_id, fecha_ingreso, estado_pedido_id, 
            turno_entrega_id, envio)
        VALUES (:entidad_receptora_id, :fecha_ingreso, :estado_pedido_id, :turno_entrega_id, :envio)");
        $query->bindParam(':entidad_receptora_id', $ent);
        $query->bindParam(':fecha_ingreso', $fecha);
        $query->bindParam(':estado_pedido_id', $estado);
        $query->bindParam(':turno_entrega_id', $turno);
        $query->bindParam(':envio', $envio);
     
        $query->execute();
  
        $cn = null;
    }


    public function insertAlimentoPedido($pedido,$det,$cant)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO pedidos_detalle_alimento (pedido_numero, donacion_detalle_alimento_id, cantidad)
        VALUES (:pedido_numero, :donacion_detalle_alimento_id, :cantidad)");
        $query->bindParam(':pedido_numero', $pedido);
        $query->bindParam(':donacion_detalle_alimento_id', $det);
        $query->bindParam(':cantidad', $cant);
     
        $query->execute();
  
        $cn = null;
    }


    public function editPedido($ent,$fecha,$estado,$turno,$envio,$numero)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE pedido_modelo SET entidad_receptora_id=?, fecha_ingreso=?, estado_pedido_id=?,
        turno_entrega_id=?, envio=? WHERE numero=?");
        $query->execute(array($ent,$fecha,$estado,$turno,$envio,$numero));

        $cn = null;
    }


    public function deletePedido($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM pedido_modelo WHERE numero=?");
        $query->execute(array($id));

        $cn = null;
    }

     public function deleteItemsDePedido($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM pedidos_detalle_alimento WHERE pedido_numero=? ");
        $query->execute(array($id));

        $cn = null;
     }



     public function insertTurno($fecha,$hora)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO turno_entrega (fecha, hora)
        VALUES (:fecha, :hora)");
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':hora', $hora);
     
        $query->execute();
  
        $cn = null;
    }


    //------------------------------------------PDFS -------------------------------------

    public function getPedidosEntregadosEntreFechasPdf($desde,$hasta)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT pedido.numero, SUM(detallePedidos.cantidad*detalle.peso_paquete) as total, 
            turno.fecha, estado.descripcion 
            
            FROM donaciones_detalle_alimento detalleDonaciones
            INNER JOIN detalle_alimento detalle ON detalle.id=detalleDonaciones.detalle_alimento_id
            INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
            INNER JOIN pedidos_detalle_alimento detallePedidos ON detallePedidos.donacion_detalle_alimento_id=detalleDonaciones.id
            INNER JOIN pedido_modelo pedido ON pedido.numero=detallePedidos.pedido_numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= ?)and(turno.fecha <= ?))
            GROUP BY pedido.numero");
        
        $query->execute(array($desde,$hasta));

        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);

        $cn = null;
        return $pedidos;
    }

    public function getAlimentosEntregadosEntreFechasPdf($desde,$hasta)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT entidad.razon_social, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total, 
            pedido.numero, detallePedido.cantidad, estado.descripcion, detalleAlimento.peso_paquete
            FROM pedido_modelo pedido
            INNER JOIN pedidos_detalle_alimento detallePedido ON detallePedido.pedido_numero=pedido.numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
            INNER JOIN donaciones_detalle_alimento donacionDetalle ON donacionDetalle.id=detallePedido.donacion_detalle_alimento_id
            INNER JOIN detalle_alimento detalleAlimento ON detalleAlimento.id=donacionDetalle.detalle_alimento_id
            
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= ?)and(turno.fecha <= ?))
            GROUP BY entidad.id");
        
        $query->execute(array($desde,$hasta));

        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);

        $cn = null;
        return $pedidos;
    }
   
 }