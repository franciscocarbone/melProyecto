<?php

Yii::import('application.models._base.BaseDonante');

class Donante extends BaseDonante
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}