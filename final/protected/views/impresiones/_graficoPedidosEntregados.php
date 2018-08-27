<script>
    
    $(document).ready(function(){
        $('#graf').highcharts({
            chart: {
                type: 'column'
            },
            credits: false,
            title: {
                text: 'Total en kilos entregados entre las fechas <?php echo $desde; ?> y <?php echo $hasta; ?>'
            },
            subtitle: {
                text: 'Por pedido'
            },
            xAxis: {
                categories: <?php echo $nombres; ?>,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Kilos (kg)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} kg</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pedidos',
                data: <?php echo $totales; ?>,

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
                'header'=>'Pedido',
                'name'=>'numero',
            ),
            array(
                'header'=>'Fecha',
                'name'=>'fecha',
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

   

    // $this->widget('ext.highcharts.HighchartsWidget', array(
    //     'scripts' => array(
    //         'modules/exporting',
    //         'themes/grid-light',
    //     ),
    //     'options' => array(
    //         'credits' => array('enabled' => false),
    //         'title' => array('text' => 'Alimentos Entregados entre las fechas '.$desde.' y '.$hasta),
    //         'xAxis' => array(
    //             'categories' => $nombres,
    //         ),
    //         'labels' => array(

    //             'items' => array(
    //                 array(
    //                     'html' => 'Total en kilos de los pedidos entregados',
    //                     'style' => array(
    //                         'left' => '50px',
    //                         'top' => '18px',
    //                         'color' => 'js:(Highcharts.theme && Highcharts.theme.textColor) || \'black\'',
    //                     ),
    //                 ),
    //             ),
    //         ),
           
    //         'series' => array(
    //             array(
    //                 'name' => 'Pedidos',
    //                 'type' => 'column',
    //                 'data' => $totales,
    //             ),
    
    //         ),
    //     )
    // ));

?> 

<div class="clear"></div>

<div id="graf"></div>