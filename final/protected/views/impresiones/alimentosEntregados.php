<script src="protected/extensions/highcharts/assets/highcharts.js" type="text/javascript"></script>
<script src="protected/extensions/highcharts/assets/modules/exporting.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        graficar();
    });


    function graficar(){       

        $('.btnGraficar').click(function(){
            if(($('#desde').val()!="")&&($('#hasta').val()!="")){
                
                cargarAlimentosEntregados($('#desde').val(),$('#hasta').val());
            }else{
                alert("Debe seleccionar las fechas");
            }
        	
        });
     
    }

    function cargarAlimentosEntregados(desde,hasta){
        $.ajax({
            "type":"GET",
            "url":"<?php echo Yii::app()->createAbsoluteUrl('impresiones/graficarAlimentosEntregadosEntreFechas'); ?>",
            "data":{ 'desde': escape(desde), 'hasta': escape(hasta) },
            "success":function(data){
                $('#grafico').html(data);              
             },
        });      
    }

</script>

<h3>Alimentos Entregados</h3> 

<h4>Seleccione un rango entre fechas para generar el informe</h4>

<div id="fechas">     
    <li>
        <label for="desde">Desde:</label>  
        <input type="date" id="desde" name="desde"  placeholder="Fecha desde" required>
    </li> 
    <li>
        <label for="hasta">Hasta:</label>  
        <input type="date" id="hasta" name="hasta"  placeholder="Fecha hasta" required>
    </li> 
</div>

<div id="fechas">
    <li><input class="btnGraficar" type="submit" value="Graficar"></li>
</div>

<div id="tabla">
    
</div>

<div id="grafico">
    
</div>