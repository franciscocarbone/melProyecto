var map;
var markers = [];
var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

function initialize() {
	
	var latlng = new google.maps.LatLng($('#latitud').val(), $('#longitud').val());

    var options = {
        zoom: 10,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map($('#map-canvas')[0], options);

    addMarker(latlng);
}

function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}

function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function clearMarkers() {
  setAllMap(null);
}


function addRoute(origen, destino) {
    var request = {
        origin: origen,
        destination: destino,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING
    };


    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setMap(map);
        }
    });
}


$( document ).ready(function() {

	//carga por ajax el los envios
	  $("#turno").change(function(){
	      cargarEnviosbyFecha(this);        
	  });

	  //carga por ajax los envios al cargar la pagina
	  cargarEnviosbyFecha($("#turno"));


	  //carga las entidades receptoras
	  $("#turno").change(function(){
	     $('.tablaEnvios tbody tr').each(function(){
	     	
	        //punto= new Lugar($('.td_entidad',this).text(),$('.td_latitud',this).text(),$('.td_longitud',this).text(), "E");
	        //markers.addMarker(crearMarcador(punto));
	      });           
	  });

	  $('.envios').click(function() {
	    cargarDatosEnvio($('.td_numero',this).text(),$('.td_fecha',this).text());
	   });	  

   	initialize();

    //CARGO LOS PUNTOS EN EL MAPA PARA EL ENVIO DEL DIA
    var origen = new google.maps.LatLng($('#latitud').val(), $('#longitud').val());
    var destino = new google.maps.LatLng($('#destino_latitud').val(), $('#destino_longitud').val());
    addMarker(destino);

    addRoute(origen, destino);

});