<?php

if ($_GET["param"]=="1896")
	{
	header("Content-type: text/xml;");
	
	$doc = new DOMDocument('1.0');
	$root = $doc->createElement('Ciudad');
	$root = $doc->appendChild($root);
	$nom = $doc->createElement('Nombre');
	$nom = $root->appendChild($nom);
	$provincia = $doc->createElement('Provincia');
	$provincia = $root->appendChild($provincia);
	$texto = $doc->createTextNode("City Bell");
	$texto = $nom->appendChild($texto);
	$texto = $doc->createTextNode("Buenos AIres");
	$texto = $provincia->appendChild($texto);
	//$doc->save("pruebaAjax.xml");
	echo $doc->saveXML();
	}
else 
	{
	header("Content-type: text/xml;");
	
	$doc = new DOMDocument('1.0');
	$root = $doc->createElement('Ciudad');
	$root = $doc->appendChild($root);
	$nom = $doc->createElement('Nombre');
	$nom = $root->appendChild($nom);
	$provincia = $doc->createElement('Provincia');
	$provincia = $root->appendChild($provincia);
	$texto = $doc->createTextNode("NADA");
	$texto = $nom->appendChild($texto);
	$texto = $doc->createTextNode("NINGUNA");
	$texto = $provincia->appendChild($texto);
	//$doc->save("pruebaAjax.xml");
	echo $doc->saveXML();
	}
?>
