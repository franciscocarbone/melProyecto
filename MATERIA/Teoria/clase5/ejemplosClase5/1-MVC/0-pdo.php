<?php

$usuario=$_GET["usuario"];
try {
	$cn = new PDO("mysql:dbname=base;host=localhost","user","pass");
	$query = $cn->prepare("SELECT * FROM usuarios WHERE id=?");
	$query->execute(array($usuario)); 
	while($row = $query->fetch())
	{ 
		echo $row['nombre']; 
	}
	}
catch(PDOException $e){
	echo "ERROR". $e->getMessage();
	}

echo "<br>Esta es la cookie: ";
print_r($_COOKIE);
echo "<br>Esta es el post: ";
print_r($_POST);
echo "<br>Esta es la get: ";
print_r($_GET);
echo "<br>Este es el request: ";
print_r($_REQUEST);

?>
