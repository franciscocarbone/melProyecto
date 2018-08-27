<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Donantes';
$this->breadcrumbs=array(
	'Donantes',
);
?>
<h3>Donantes</h3> 

<?php 
	$this->widget('bootstrap.widgets.TbGridView', array( 
		//'fixedHeader' => true, 
		//'headerOffset' => 40, 
		'type' => 'striped', 
		'dataProvider' => $data, 
		//'responsiveTable' => true, 
		//'template' => "{items}", 
		'columns'=>array( 
			array(
                'header'=>'Razon Social',
                'name'=>'razon_social',
            ),
            array(
                'header'=>'Apellido',
                'name'=>'descripcion',
            ),
			array(
                'header'=>'Nombre',
                'name'=>'total',
            ),
            array(
                'header'=>'Mail',
                'name'=>'total',
            ),

		),
	));
?> 

<!-- by updating the file <code><?php echo __FILE__; ?></code>.</p> -->
