<?php

/**
 * This is the model base class for the table "donante".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Donante".
 *
 * Columns in table "donante" available as properties of the model,
 * followed by relations of table "donante" available as properties of the model.
 *
 * @property integer $id
 * @property string $razon_social
 * @property string $apellido_contacto
 * @property string $nombre_contacto
 * @property string $telefono_contacto
 * @property string $mail_contacto
 * @property string $domicilio_contacto
 *
 * @property Donaciones[] $donaciones
 */
abstract class BaseImpresiones extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'donante';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Donante|Donantes', $n);
	}

	public static function representingColumn() {
		return 'razon_social';
	}

	public function rules() {
		return array(
			array('razon_social', 'length', 'max'=>100),
			array('apellido_contacto, nombre_contacto, mail_contacto', 'length', 'max'=>50),
			array('telefono_contacto', 'length', 'max'=>30),
			array('domicilio_contacto', 'length', 'max'=>200),
			array('razon_social, apellido_contacto, nombre_contacto, telefono_contacto, mail_contacto, domicilio_contacto', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, razon_social, apellido_contacto, nombre_contacto, telefono_contacto, mail_contacto, domicilio_contacto', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'donaciones' => array(self::HAS_MANY, 'Donaciones', 'donante_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'razon_social' => Yii::t('app', 'Razon Social'),
			'apellido_contacto' => Yii::t('app', 'Apellido Contacto'),
			'nombre_contacto' => Yii::t('app', 'Nombre Contacto'),
			'telefono_contacto' => Yii::t('app', 'Telefono Contacto'),
			'mail_contacto' => Yii::t('app', 'Mail Contacto'),
			'domicilio_contacto' => Yii::t('app', 'Domicilio Contacto'),
			'donaciones' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('razon_social', $this->razon_social, true);
		$criteria->compare('apellido_contacto', $this->apellido_contacto, true);
		$criteria->compare('nombre_contacto', $this->nombre_contacto, true);
		$criteria->compare('telefono_contacto', $this->telefono_contacto, true);
		$criteria->compare('mail_contacto', $this->mail_contacto, true);
		$criteria->compare('domicilio_contacto', $this->domicilio_contacto, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}