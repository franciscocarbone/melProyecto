<script>

	$(document).ready(function(){
  		$('#graf').highcharts({
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false
	        },
	        credits: false,
	        title: {
	            text: 'Alimentos Entregados entre las fechas <?php echo $desde; ?> y <?php echo $hasta; ?>'
	        },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                showInLegend: true,
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series: [{
	            type: 'pie',
	            name: 'Browser share',
	            data: <?php echo $data2; ?>,
	        }]
	    });      

    });
	
	 


</script>


<?php 

	$this->widget('bootstrap.widgets.TbGridView', array( 
		'type' => 'striped', 
		'dataProvider' => $data,  
		'columns'=>array( 
			array(
                'header'=>'Entidad',
                'name'=>'razon_social',
            ),
            array(
                'header'=>'Estado',
                'name'=>'descripcion',
            ),
			array(
                'header'=>'Kilos',
                'name'=>'total',
            ),

		),
	));



	// $this->Widget('ext.highcharts.HighchartsWidget', array(
 //        'scripts' => array(
 //            'modules/exporting',
 //            'themes/grid-light',
 //        ),
	// 	'options'=>array(
	// 		'credits' => array('enabled' => false),
	// 		'title' => array('text' => 'Alimentos Entregados entre las fechas '.$desde.' y '.$hasta),
		  
	// 		'series' => array(
	//             array(
	//                 'type' => 'pie',
	//                 'name' => 'Total consumption',
	//                 'data' => $data2,
	//                 'showInLegend' => true,
	//                 'dataLabels' => array(
	//                     'enabled' => true,
	//                     'format' => '<b>{point.name}</b>: {point.percentage:.1f} %',
	//                     'style' => array(
	//                     	'color' => '(Highcharts.theme && Highcharts.theme.contrastTextColor)' || 'black',
	//                     ),
 //                	),
 //            	),     
	// 		),
	// 	)

	// ));

?> 

<div class="clear"></div>

<div id="graf"></div>