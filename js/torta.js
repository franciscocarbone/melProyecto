function graficoTorta(){	


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
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
			},
			title: {
				text: 'Informes por entidades'
			},
			subtitle: {
				text: subtitulo
			},
			
			tooltip: {
				formatter: function() {
					return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						color: '#000000',
						connectorColor: '#000000',
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						
						
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						}
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Browser share',
				data: []
			}]
		}

			//prepara la url para mandar

		var url= "backend.php?ctl=cargar_alimentos_entregados_grafico&desde="+ escape(desde)+"&hasta="+ escape(hasta);

		$.getJSON(url, function(json) {
			options.series[0].data = json;
			chart = new Highcharts.Chart(options);
		});


	}
}

	


