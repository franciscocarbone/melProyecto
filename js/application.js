var cant_detalles= 0;


$( document ).ready(function() {

    $( "#abms" ).click(function() {
        $('nav > ul > li > span').removeClass('color_active');
        $(".submenubackend").hide(); 
        $('#abms span').addClass('color_active');           
        $(".submenubackend.abm").show(); 
    });

    $( "#listado" ).click(function() {
        $('nav > ul > li > span').removeClass('color_active');
        $(".submenubackend").hide();
        $('#listado span').addClass('color_active');            
        $(".submenubackend.listado").show(); 
    });

    $( "#pedidos" ).click(function() {
        $('nav > ul > li > span').removeClass('color_active');
        $(".submenubackend").hide();
        $('#pedidos span').addClass('color_active');            
        $(".submenubackend.pedidos").show(); 
    });

    ///////GRAFICOS//////

    $("#pedidosEntregados" ).click(function() {
        if(($('#desde').val()!="")&&($('#hasta').val()!="")){
            $('#submenu > span').removeClass('color1');
            $("#pedidosEntregados" ).addClass('color1');
            cargarPedidosEntregados($('#desde').val(),$('#hasta').val());
        }else{
            alert("Debe seleccionar las fechas");
        }
    });

    $("#alimentosEntregados" ).click(function() {
        if(($('#desde').val()!="")&&($('#hasta').val()!="")){
            $('#submenu > span').removeClass('color1');
            $("#alimentosEntregados" ).addClass('color1');
            cargarAlimentosEntregados($('#desde').val(),$('#hasta').val());
        }else{
            alert("Debe seleccionar las fechas");
        }
        
    });

    $("#AlimentosVencidos" ).click(function() {
        $('#submenu > span').removeClass('color1');
        $("#AlimentosVencidos" ).addClass('color1');
        cargarAlimentosVencidos();
    });
  

    ////////DONACIONES/////////////

    //carga por ajax el detalle en el onchange del alimento
    $("#alimento").change(function(){
        cargarDetallesAlimento(this);
    }); 
    
    ////////PEDIDOS//////
    $("#alimento_donado").change(function(){
        cargarDetallesAlimentoPedidos(this);
    }); 

    a= new Date(); 
    hora=(a.getHours()+':'+a.getMinutes()+':'+a.getSeconds());
    
    $('.td_hora_envio').each(function() {
        if($(this).text()< hora ){
            $(this).addClass('pintar');    
        };
    });

    //si existe un detalle para la donacion le agrego los indices por cant
   $("#tablaDetalle tbody tr").each(function(){
        cant_detalles++;
        $(this).attr('id', ''+cant_detalles+'');

        $(this).find($('input[id="cant"]')).attr('name', 'detalle['+cant_detalles+'][cantidad]');
        $(this).find($('input[id="det_id"]')).attr('name', 'detalle['+cant_detalles+'][id_detalle]');
        $(this).find($('input[id="ven"]')).attr('name', 'detalle['+cant_detalles+'][vencimiento]');       
    });

   $('a.eliminar').click(function(){
                $(this).closest('tr').remove();
            });

    $('#addDetalle').click(function(){
        //Agregar detalle a la donacion 
        if(($("#cantidad").val().length > 1)&($("#vencimiento").val()!=0000-00-00)&($("#detalle").val()!=null)){

            cant_detalles++;
            $("#tablaDetalle").append(
                '<tr id="'+cant_detalles+'">'+
                    '<td><input id="cant" type="hidden" name="detalle['+cant_detalles+'][cantidad]" value="'+$('#cantidad').val()+'">'+$('#cantidad').val()+'</td>'+
                    '<td>'+$('#alimento option:selected').text()+'</td>'+
                    '<td><input id="det_id" type="hidden" name="detalle['+cant_detalles+'][id_detalle]" value="'+$('#detalle option:selected').val()+'">'+$('#detalle option:selected').text()+'</td>'+
                    '<td><input id="ven" type="hidden" name="detalle['+cant_detalles+'][vencimiento]" value="'+$('#vencimiento').val()+'">'+$('#vencimiento').val()+'</td>'+
                    '<td>'+'<a class="eliminar"><img src="imagenes/eliminar.png" alt="eliminar" title="Eliminar"></a>' +'</td>'+
                '</tr>');
                //borro los campos del formulario
                $('.altaItems')[0].reset();
                //elimina una fila de la donacion o el pedido
                $('a.eliminar').click(function(){
                    $(this).closest('tr').remove();
                });
        }
    });

    //Agrego los items al pedido
    $('#addDetallePedido').click(function(){
        //Agregar detalle a la donacion 
        $('#detalle_donado tr').each(function() {

            if($('.cant',this).val()>0){

                cant_detalles++;
                $("#tablaDetalle").append(
                    '<tr id="'+cant_detalles+'">'+                 
                        '<td><input id="det_id" type="hidden" name="detalle['+cant_detalles+'][id_detalle]" value="'+$('.id_contenido',this).val()+'">'+$('.contenido',this).text()+'</td>'+
                        '<td>'+$('#alimento_donado option:selected').text()+'</td>'+
                        '<td><input id="cant" type="hidden" name="detalle['+cant_detalles+'][cantidad]" value="'+$('.cant',this).val()+'">'+$('.cant',this).val()+'</td>'+
                        '<td>'+$('.vencimiento',this).text()+'</td>'+
                        '<td>'+'<a class="eliminar"><img src="imagenes/eliminar.png" alt="eliminar" title="Eliminar"></a>' +'</td>'+
                    '</tr>');
                  
                    //elimina una fila de la donacion o el pedido
                    $('a.eliminar').click(function(){
                    $(this).closest('tr').remove();
                });   
           };

        });
        //borro los campos del formulario
        $('.altaItemsPedido')[0].reset();
    });


    //////ENVIOS/////

    //cargo el envio en el onclick
    $('.envio').click(function() {
        window.location.href = 'backend.php?ctl=editar_envio&id='+$('.td_numero',this).text();
    });


}); 