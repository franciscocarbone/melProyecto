<HTML>
 <HEAD>
   <TITLE>Formularios</TITLE>
 </HEAD>
 <BODY>
    <?php
    function muestro_valores(){
		echo "<p> Nombre: " . $_REQUEST["nombre"] ."</p>";
		echo "<p> Apellido: ". $_REQUEST["apellido"] ."</p>";
		echo "<p> Turno: ". $_REQUEST["turno"] ."</p>";
	}
	?>
	
	<h2>Hola a todos!!!</h2>
    
    <?php
    
    if (isset($_REQUEST["nombre"])){
		echo "<p>Ingresaste los siguientes datos:</p>";
		muestro_valores();
	}
	else {
		echo "<p>No ingresaste datos??</p>";
	}
     ?>
 </BODY>
</HTML>
