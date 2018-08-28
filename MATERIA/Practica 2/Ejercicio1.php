<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<title>Ejercicio 1</title> 
	<meta http-equiv="content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css" />
	<?php  
		session_start();
		if (isset($_SESSION['contador'])) {
			$_SESSION['contador']++;
		}else{
			$_SESSION['contador']= 0;
		}
	?>

</head> 
<body> 
	<table ALIGN="center">
		<caption ALIGN="center">Contador de visitas</caption>
		
		<tbody>
			<tr>
				<td>Nro de Accesos</td>
				<td><?php echo $_SESSION['contador']  ?></td>
			</tr>
			<tr>
				<td>Id</td>
				<td><?php echo session_id() ?></td>
			</tr>
			<tr>
				<td>Nombre Actual</td>
				<td><?php echo session_name() ?></td>
			</tr>
			<tr>
				<td>Nombre Anaterior</td>
			</tr>
		</tbody>
	</table>
</body> 
</html> 