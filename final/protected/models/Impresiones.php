<?php

Yii::import('application.models._base.BaseImpresiones');

class Impresiones extends BaseImpresiones
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getAlimentosVencidos($fecha) 
    { 
        $sql="SELECT alimento.descripcion AS alimento, contenido, SUM(cantidad) AS cantidad, vencimiento
                                FROM donaciones_detalle_alimento donacionAlimento
                                INNER JOIN detalle_alimento detalle ON donacionAlimento.detalle_alimento_id=detalle.id
                                INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
                                WHERE (vencimiento <= '$fecha')and(cantidad > 0)
                                GROUP BY contenido
                                ORDER BY alimento.descripcion"; // your sql here 
        $vencidos=new CSqlDataProvider($sql,array( 'keyField' => 'contenido', 'pagination'=>array( 'pageSize'=>10, ), )); 
        return $vencidos; 
    } 


    public function getAlimentosEntregadosEntreFechas($desde,$hasta) 
    { 
        $sql="SELECT pedido.numero, detallePedido.cantidad, estado.descripcion, entidad.razon_social, 
            detalleAlimento.peso_paquete, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total
            FROM pedido_modelo pedido
            INNER JOIN pedidos_detalle_alimento detallePedido ON detallePedido.pedido_numero=pedido.numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            INNER JOIN entidad_receptora entidad ON entidad.id=pedido.entidad_receptora_id
            INNER JOIN donaciones_detalle_alimento donacionDetalle ON donacionDetalle.id=detallePedido.donacion_detalle_alimento_id
            INNER JOIN detalle_alimento detalleAlimento ON detalleAlimento.id=donacionDetalle.detalle_alimento_id
            
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= '$desde')and(turno.fecha <= '$hasta'))
            GROUP BY entidad.id"; // your sql here 
        $AlimentosEntregados=new CSqlDataProvider($sql,array( 'keyField' => 'razon_social', 'pagination'=>array( 'pageSize'=>10, ), )); 
        return $AlimentosEntregados; 
    }


    public function getPedidosEntregadosEntreFechas($desde,$hasta)
    { 
        $sql="SELECT pedido.numero, turno.fecha, estado.descripcion, 
            SUM(detallePedidos.cantidad*detalle.peso_paquete) as total
            FROM donaciones_detalle_alimento detalleDonaciones
            INNER JOIN detalle_alimento detalle ON detalle.id=detalleDonaciones.detalle_alimento_id
            INNER JOIN alimento alimento ON alimento.codigo=detalle.alimento_codigo
            INNER JOIN pedidos_detalle_alimento detallePedidos ON detallePedidos.donacion_detalle_alimento_id=detalleDonaciones.id
            INNER JOIN pedido_modelo pedido ON pedido.numero=detallePedidos.pedido_numero
            INNER JOIN turno_entrega turno ON turno.id=pedido.turno_entrega_id
            INNER JOIN estado_pedido estado ON estado.id=pedido.estado_pedido_id
            WHERE (estado.descripcion = 'ENTREGADO')and((turno.fecha >= '$desde')and(turno.fecha <= '$hasta'))
            GROUP BY pedido.numero"; // your sql here 
        $PedidosEntregados=new CSqlDataProvider($sql,array( 'keyField' => 'numero', 'pagination'=>array( 'pageSize'=>10, ), )); 
        return $PedidosEntregados; 
    }



/*	public function getAlimentosVencidos($fecha)
    {        

        $vencidos = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_OBJ)
            ->select('alimento.descripcion AS alimento, contenido, SUM(cantidad) AS cantidad, vencimiento')
            ->from('donaciones_detalle_alimento donacionAlimento')
            ->join('detalle_alimento detalle', 'donacionAlimento.detalle_alimento_id=detalle.id')
            ->join('alimento alimento', 'alimento.codigo=detalle.alimento_codigo')
            ->where('vencimiento <=:fecha and cantidad > 0', array(':fecha'=>$fecha))
            ->group('contenido')
            ->order('alimento.descripcion')
            ->queryAll();

        return $vencidos;
    }*/

/*
 	public function getAlimentosEntregadosEntreFechas($desde,$hasta)
    {      
        $AlimentosEntregados = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_OBJ)
            ->select('pedido.numero, detallePedido.cantidad, estado.descripcion, entidad.razon_social, 
                    detalleAlimento.peso_paquete, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total')
            ->from('pedido_modelo pedido')

            ->join('pedidos_detalle_alimento detallePedido', 'detallePedido.pedido_numero=pedido.numero')
            ->join('turno_entrega turno', 'turno.id=pedido.turno_entrega_id')
            ->join('estado_pedido estado', 'estado.id=pedido.estado_pedido_id')
            ->join('entidad_receptora entidad', 'entidad.id=pedido.entidad_receptora_id')
            ->join('donaciones_detalle_alimento donacionDetalle', 'donacionDetalle.id=detallePedido.donacion_detalle_alimento_id')
            ->join('detalle_alimento detalleAlimento', 'detalleAlimento.id=donacionDetalle.detalle_alimento_id')

            ->where('estado.descripcion = "ENTREGADO"')
            ->andWhere('turno.fecha >=:desde and turno.fecha <=:hasta', array(':desde'=>$desde,':hasta'=>$hasta))
            ->group('entidad.id')
            //->order('alimento.descripcion')
            ->queryAll();

        return $AlimentosEntregados;

    }
*/


    public function getPedidosEntregadosEntreFechasGrafico($desde,$hasta)
    {        
 

        $PedidosEntregados = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_OBJ)
            ->select('pedido.numero, turno.fecha, estado.descripcion, 
                        SUM(detallePedidos.cantidad*detalle.peso_paquete) as total')
            ->from('donaciones_detalle_alimento detalleDonaciones')

            ->join('detalle_alimento detalle', 'detalle.id=detalleDonaciones.detalle_alimento_id')
            ->join('alimento alimento', 'alimento.codigo=detalle.alimento_codigo')
            ->join('pedidos_detalle_alimento detallePedidos', 'detallePedidos.donacion_detalle_alimento_id=detalleDonaciones.id')
            ->join('pedido_modelo pedido', 'pedido.numero=detallePedidos.pedido_numero')
            ->join('turno_entrega turno', 'turno.id=pedido.turno_entrega_id')
            ->join('estado_pedido estado', 'estado.id=pedido.estado_pedido_id')

            ->where('estado.descripcion = "ENTREGADO"')
            ->andWhere('turno.fecha >=:desde and turno.fecha <=:hasta', array(':desde'=>$desde,':hasta'=>$hasta))
            ->group('pedido.numero')
            //->order('alimento.descripcion')
            ->queryAll();

        return $PedidosEntregados;

    }


 	public function getAlimentosEntregadosEntreFechasGrafico($desde,$hasta)
    {   

        $AlimentosEntregados = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_ASSOC)
            ->select('entidad.razon_social, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total')
            ->from('pedido_modelo pedido')

            ->join('pedidos_detalle_alimento detallePedido', 'detallePedido.pedido_numero=pedido.numero')
            ->join('turno_entrega turno', 'turno.id=pedido.turno_entrega_id')
            ->join('estado_pedido estado', 'estado.id=pedido.estado_pedido_id')
            ->join('entidad_receptora entidad', 'entidad.id=pedido.entidad_receptora_id')
            ->join('donaciones_detalle_alimento donacionDetalle', 'donacionDetalle.id=detallePedido.donacion_detalle_alimento_id')
            ->join('detalle_alimento detalleAlimento', 'detalleAlimento.id=donacionDetalle.detalle_alimento_id')

            ->where('estado.descripcion = "ENTREGADO"')
            ->andWhere('turno.fecha >=:desde and turno.fecha <=:hasta', array(':desde'=>$desde,':hasta'=>$hasta))
            ->group('entidad.id')
            //->order('alimento.descripcion')
            ->queryAll();

        return $AlimentosEntregados;

       /* 
        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);
        */

    }

   



    //--------------------------------------------PDFS--------------------------------------------------

	public function getAlimentosVencidosPdf($fecha)
	{        
 
        $vencidos = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_ASSOC)
            ->select('alimento.descripcion AS alimento, contenido, SUM(cantidad) AS cantidad, vencimiento')
            ->from('donaciones_detalle_alimento donacionAlimento')
            ->join('detalle_alimento detalle', 'donacionAlimento.detalle_alimento_id=detalle.id')
            ->join('alimento alimento', 'alimento.codigo=detalle.alimento_codigo')
            ->where('vencimiento <=:fecha and cantidad > 0', array(':fecha'=>$fecha))
            ->group('contenido')
            ->order('alimento.descripcion')
            ->queryAll();

        return $vencidos;

		/*
		$vencidos = $query->fetchAll(PDO::FETCH_ASSOC);
		*/
	}


	public function getPedidosEntregadosEntreFechasPdf($desde,$hasta)
    {     

        $PedidosEntregados = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_ASSOC)
            ->select('pedido.numero, SUM(detallePedidos.cantidad*detalle.peso_paquete) as total, 
                        turno.fecha, estado.descripcion')
            ->from('donaciones_detalle_alimento detalleDonaciones')

            ->join('detalle_alimento detalle', 'detalle.id=detalleDonaciones.detalle_alimento_id')
            ->join('alimento alimento', 'alimento.codigo=detalle.alimento_codigo')
            ->join('pedidos_detalle_alimento detallePedidos', 'detallePedidos.donacion_detalle_alimento_id=detalleDonaciones.id')
            ->join('pedido_modelo pedido', 'pedido.numero=detallePedidos.pedido_numero')
            ->join('turno_entrega turno', 'turno.id=pedido.turno_entrega_id')
            ->join('estado_pedido estado', 'estado.id=pedido.estado_pedido_id')

            ->where('estado.descripcion = "ENTREGADO"')
            ->andWhere('turno.fecha >=:desde and turno.fecha <=:hasta', array(':desde'=>$desde,':hasta'=>$hasta))
            ->group('pedido.numero')
            //->order('alimento.descripcion')
            ->queryAll();

        return $PedidosEntregados;
        
/*
        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);
*/
    }


    public function getAlimentosEntregadosEntreFechasPdf($desde,$hasta)
    {    

        $AlimentosEntregados = Yii::app()->db->createCommand()->setFetchMode(PDO::FETCH_ASSOC)
            ->select('entidad.razon_social, SUM(detallePedido.cantidad*detalleAlimento.peso_paquete) as total, 
                    pedido.numero, detallePedido.cantidad, estado.descripcion, detalleAlimento.peso_paquete')
            ->from('pedido_modelo pedido')

            ->join('pedidos_detalle_alimento detallePedido', 'detallePedido.pedido_numero=pedido.numero')
            ->join('turno_entrega turno', 'turno.id=pedido.turno_entrega_id')
            ->join('estado_pedido estado', 'estado.id=pedido.estado_pedido_id')
            ->join('entidad_receptora entidad', 'entidad.id=pedido.entidad_receptora_id')
            ->join('donaciones_detalle_alimento donacionDetalle', 'donacionDetalle.id=detallePedido.donacion_detalle_alimento_id')
            ->join('detalle_alimento detalleAlimento', 'detalleAlimento.id=donacionDetalle.detalle_alimento_id')

            ->where('estado.descripcion = "ENTREGADO"')
            ->andWhere('turno.fecha >=:desde and turno.fecha <=:hasta', array(':desde'=>$desde,':hasta'=>$hasta))
            ->group('entidad.id')
            //->order('alimento.descripcion')
            ->queryAll();

        return $AlimentosEntregados;        
/*
        $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);
*/
    }



}

