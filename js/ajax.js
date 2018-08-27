function cargarDetallesAlimento(element){
    var idAlimento = $("option:selected", element).val();
    
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_detalles&codigo="+ escape(idAlimento),
        success: function(data){
            $("#detalle").html(data);
        },
        error: function(){
           // console.log("ERROR");
        }
    });
}


function cargarDetallesAlimentoPedidos(element){
    var idAlimento = $("option:selected", element).val();
    
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_detalles_donacion&codigo="+ escape(idAlimento),
        success: function(data){
            $("#detalle_donado").html(data);
        },
        error: function(){

            $("#detalle_donado").html("No se encontro ningun resultado");
          
        }
    });
}


function cargarEnviosbyFecha(element){
    var fecha = $("option:selected", element).val();
    
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_envios&fecha="+ escape(fecha),
        success: function(data){

            $("#envios_del_dia").html(data);

            $('.envios').click(function() {

                cargarDatosEnvio($('.td_numero',this).text(),$('.td_fecha',this).text());
                $('#destino_latitud').val($('.td_latitud',this).text());   
                $('#destino_longitud').val($('.td_longitud',this).text());           
                $('.envios ').removeClass('selected');
                $(this).addClass('selected');    
                
                clearMarkers();

                var origen = new google.maps.LatLng($('#latitud').val(), $('#longitud').val());
                addMarker(origen);
                //CARGO EL PUNTO DEL SELECCIONADO EN EL MAPA
                var destino = new google.maps.LatLng($('#destino_latitud').val(), $('#destino_longitud').val());
                addMarker(destino);

                addRoute(origen, destino);
            });
        },
        error: function(){
            //console.log("ERROR");
        }
    });
}

function cargarDatosEnvio(id,fecha){    
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=mostrar_envio&id="+ escape(id)+"&fecha="+ escape(fecha),
        success: function(data){
            $("#clima_envio").html(data);
        },
        error: function(){
            //console.log("ERROR");
        }
    });
}


function cargarAlimentosVencidos(){ 
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_alimentos_vencidos",
        success: function(data){

            $("#grafico").html(data);

            $('#alimentosVencidosPDF').click(function() {
               window.open('helpers/exportar_pdf.php?ctl=alimentosVencidos', '_blank');
            });
        },
        error: function(){
            //console.log("ERROR");
        }
    });
}

function cargarPedidosEntregados(desde,hasta){
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_pedidos_entregados&desde="+ escape(desde)+"&hasta="+ escape(hasta),
        success: function(data){
            $("#grafico").html(data);
          
             $('#pedidosEntregadosPDF').click(function() {
                window.open('helpers/exportar_pdf.php?ctl=pedidosEntregados&desde='+ escape(desde)+'&hasta='+ escape(hasta), '_blank');
            });  
        },
        error: function(){
            //console.log("ERROR");
        }
    }); 
}


function cargarAlimentosEntregados(desde,hasta){
    $.ajax({
        type: "GET",
        url: "backend.php", //llamma al controller
        async: true,
        data: "ctl=cargar_alimentos_entregados&desde="+ escape(desde)+"&hasta="+ escape(hasta),
        success: function(data){
            $("#grafico").html(data);
           
            $('#alimentosEntregadosPDF').click(function() {
                window.open('helpers/exportar_pdf.php?ctl=alimentosEntregados&desde='+ escape(desde)+'&hasta='+ escape(hasta), '_blank');
            });  
        },
        error: function(){
            //console.log("ERROR");
        }
    }); 
}

