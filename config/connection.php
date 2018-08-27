<?php
	$db_host="localhost";
	$db_user="grupo_39";
	$db_pass="RFA57ahI6ESndvNx";
	$db_base="grupo_39";
    $db_charset="utf8";
    try {
	$cn = new PDO("mysql:dbname=$db_base;host=$db_host;charset=$db_charset",$db_user,$db_pass);
    } catch (PDOException $e) {
       // print "Error!: " . $e->getMessage() . "<br/>";
        $mensaje = "Error!: " . $e->getMessage() . "<br/>";
        return $mensaje;
    }
?>