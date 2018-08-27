<?php

//Yii::import('application.models._base.BaseImpresiones');

class Listados //extends BaseImpresiones
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}



    public function getDonantes() 
    { 
        $sql="SELECT * FROM donante"; // your sql here 
        $donantes=new CSqlDataProvider($sql,array( 'keyField' => 'contenido', 'pagination'=>array( 'pageSize'=>10, ), )); 
        return $donantes; 
    }

}