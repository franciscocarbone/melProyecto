<?php

class ImpresionesController extends GxController {

	public function filters() {
		return array(
				'accessControl', 
				);
	}


	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('AlimentosVencidos', 'AlimentosEntregadosEntreFechas','GraficarAlimentosEntregadosEntreFechas',
						'PedidosEntregadosEntreFechas','GraficarPedidosEntregadosEntreFechas'),
					'users'=>array('@'),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	
	public function actionAlimentosVencidos(){ 
		$resul=Impresiones::model()->getAlimentosVencidos(Date('y-m-d')); 	 
		$this->render('alimentosVencidos', array(
			'data' =>$resul,
		));		
	} 


	public function actionAlimentosEntregadosEntreFechas(){ 

		$this->render('alimentosEntregados', array());

	}


	public function actionGraficarAlimentosEntregadosEntreFechas(){ 
		$desde = $_GET['desde'];	
		$hasta = $_GET['hasta'];

		$resul=Impresiones::model()->getAlimentosEntregadosEntreFechas($desde,$hasta); 
		$alimentos = Impresiones::model()->getAlimentosEntregadosEntreFechasGrafico($desde,$hasta);
	
        $rows =array();

        foreach ($alimentos as $key=>$value) {
            $row["name"] = $value['razon_social']; 
            $row["y"] =  (int)$value['total'];   
            $row["color"] = 'js:Highcharts.getOptions().colors['.$key.']';
            array_push($rows,$row);
        }

       $resul2 = json_encode($rows, JSON_NUMERIC_CHECK);

		$this->renderPartial('_graficoAlimentosEntregados', array(
				'data' =>$resul,
				'data2' =>$resul2,
				'desde' => $desde,
				'hasta' => $hasta,
		));

		
	}

	public function actionPedidosEntregadosEntreFechas() {

		$this->render('pedidosEntregados', array());

	}


	public function actionGraficarPedidosEntregadosEntreFechas() {
		$desde = $_GET['desde'];	
		$hasta = $_GET['hasta'];

		$resul=Impresiones::model()->getPedidosEntregadosEntreFechas($desde,$hasta); 
		$pedidos = Impresiones::model()->getPedidosEntregadosEntreFechasGrafico($desde,$hasta);

		$nombres =array();
		$totales =array();

        foreach ($pedidos as $valor) {
            array_push($nombres, $valor->numero);
            array_push($totales, (int)$valor->total);
        }

        $nombresjson = json_encode($nombres, JSON_NUMERIC_CHECK);
        $totalesjson = json_encode($totales, JSON_NUMERIC_CHECK);

		$this->renderPartial('_graficoPedidosEntregados', array(
			'data' =>$resul,
			'nombres' =>$nombresjson,
			'totales' =>$totalesjson,
			'desde' =>$desde,
			'hasta' =>$hasta,
		));

	}	

}