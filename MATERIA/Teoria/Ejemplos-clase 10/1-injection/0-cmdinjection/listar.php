<meta charset="UTF-8" />
<?php
$recibido=$_GET["menu"];
$cmd= "ls ".$recibido;
echo "El parámetro recibido fue ". $recibido. "<br>"; 
echo "El comando que se ejecuta será <strong>". $cmd. "</strong><br>"; 

$cmd_out = shell_exec( $cmd ); 
echo '<pre>'.$cmd_out.'</pre>'; 
 
	

?>
