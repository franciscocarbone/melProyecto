<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<title>Ejercicio 2</title> 
	<meta http-equiv="content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css" />
</head> 
<body> 
	<h1>CONFIRMACIÓN DE LA RESERVA</h1>

	<legend>Datos Personales</legend> 
			<ul>  
	            <li><label for="nombre">Nombre/s:</label> <?php echo $_POST['nombre']	?>  </li>
	            

	            <li><label for="apellido">Apellido:</label> <?php echo $_POST['apellido']	?>  </li>
	            

	            <li><label for="mail">Mail:</label> <?php echo $_POST['mail']	?>  </li>
	       

	            <li><label for="telefono">Teléfono:</label> <?php echo $_POST['telefono']	?> </li>
	           

	            <li><label for="fecha_nacimiento">Fecha de Nacimiento:</label> <?php echo $_POST['fecha_nacimiento']	?>  </li>
	           

	            <li><label for="dni">N° de Documento:</label> <?php echo $_POST['dni']	?> </li> 
	            
            
	        </ul>


	
	
</body> 
</html> 