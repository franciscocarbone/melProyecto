<h3>Alimentos vencidos a la fecha</h3> 

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
                'header'=>'Alimento',
                'name'=>'alimento',
            ),
            array(
                'header'=>'Contenido',
                'name'=>'contenido',
            ),
			array(
                'header'=>'Cantidad',
                'name'=>'cantidad',
            ),

		),
	));

?> 