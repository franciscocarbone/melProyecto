<!DOCTYPE html>
<HTML>
 <HEAD>
   <TITLE>Trabajando con include</TITLE>
 </HEAD>
 <BODY>
   <center>
	<H2>Inclusi�n de Archivos</H2>
     <?php
		include("cabecera.inc");
		$base=2;
		$exponente=3;
		include("cuerpo.inc");
		echo "<br>Primera inclusi�n del 'cuerpo.inc'<hr width='40%'>";
		$base=7;
		$exponente=5;
		include("cuerpo.inc");
		echo "<br>Segunda inclusi�n del 'cuerpo.inc'<hr width='40%'>";
		$base=9;
		$exponente=7;
		include("cuerpo.inc");
		echo "<br>Tercera inclusi�n del 'cuerpo.inc'<hr width='40%'>";
		include("pie.inc")
       
     ?>
  </center>
 </BODY>
</HTML>
