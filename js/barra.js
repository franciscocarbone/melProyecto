function graficoBarra(){       

    if(($('#desde').val()!="")&&($('#hasta').val()!="")){
    	var desde=$('#desde').val();
    	var hasta=$('#hasta').val();

        var subtitulo="Entre las fechas ";
            subtitulo+=desde;
            subtitulo+=" y ";
            subtitulo+=hasta;

            var options = {
            chart: {
                renderTo: 'conteiner',
                type: 'bar',
                cursor: 'pointer'
            },
            title: { text: 'Informe kilo por fecha'},
            subtitle: { text: subtitulo },
            series: [{}]
        };

        var url= "backend.php?ctl=cargar_pedidos_entregados_grafico&desde="+ escape(desde)+"&hasta="+ escape(hasta);
        
        $.getJSON(url, function(data) {
            options.series[0].data = data;
            var chart = new Highcharts.Chart(options);
            
        });

    }

}
