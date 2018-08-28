<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<title>Ejercicio 2</title> 
	<meta http-equiv="content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css" />

	

</head> 
<body> 

	<form name="reservar" action="confirmacion.php" accept-charset="utf-8" method="post">
		<fieldset style="width: 50%;">
			<legend>Datos Personales</legend> 
			<ul>  
	            <li><label for="nombre">Nombre/s</label>  
	            <input type="text" name="nombre" placeholder="Nombres" required></li> 

	            <li><label for="apellido">Apellido</label>  
	            <input type="text" name="apellido" placeholder="Apellido" required></li> 

	            <li><label for="mail">Mail</label>  
	            <input type="email" name="mail" placeholder="ejemplo@mail.com" required></li> 

	            <li><label for="telefono">Teléfono</label>  
	            <input type="tel" name="telefono" placeholder="ej: (0221) 456-789" required></li>

	            <li><label for="fecha_nacimiento">Fecha de Nacimiento</label>  
	            <input type="date" name="fecha_nacimiento"  placeholder="Fecha de Vencimiento" required></li> 

	            <li><label for="dni">N° de Documento</label>  
	            <select>
	            	<option value="dni">DNI</option>
	            	<option value="le">LE</option>
	            </select>
	            <input type="text" name="dni" placeholder="ingrese su número" required></li>
            
	        </ul>

		</fieldset>

		<fieldset style="width: 50%;">
			<legend>Datos de la Reserva</legend>

			<li><label for="fecha_reserva">Fecha de Reserva</label>  
	            <input type="date" name="fecha_reserva"   required></li>

            <li><label for="cantidad">Cantidad</label>  
	            <input type="number" name="cantidad"   required></li>

	        <li><label for="observacion">Observaciones</label>  
	            <textarea type="text" name="observacion" observacion style="width:100%;"></textarea></li>
		</fieldset>	

		<li>  
	      <input class="reservar" type="submit" value="Establecer Reserva"></li> 
	    <li>  
	      <input class="borrar" type="submit"  value="Borrar Todo"></li> 
	</form>	
</body> 
</html> 