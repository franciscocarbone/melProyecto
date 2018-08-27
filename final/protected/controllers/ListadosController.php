<?php

class ListadosController extends Controller
{

	public function actionListarDonantes(){ 

		$resul=Listados::model()->getDonantes(); 

		$this->renderPartial('donantes', array(
				'data' =>$resul,
		));
	}


	public function actionListarEntidades(){ 

		$resul=Listados::model()->getEntidades(); 

		$this->renderPartial('entidades', array(
				'data' =>$resul,
		));
	}

}