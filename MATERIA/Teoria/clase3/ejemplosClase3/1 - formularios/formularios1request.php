<HTML>
 <HEAD>
   <TITLE>Formularios</TITLE>
 </HEAD>
 <BODY>
    <?php
       $metodo=$_SERVER['REQUEST_METHOD'];
       
       echo "<h2>Formularios con método  $metodo</h2>";
       $cad_consulta=$_SERVER['QUERY_STRING'];

       echo "<strog>Query String</strong>: $cad_consulta <HR>";
       foreach ($_REQUEST as $clave => $valor)
            echo "<I
            strong>$clave</strong> = $valor <BR>";
       echo "<HR><BR><HR>";
      
     ?>
 </BODY>
</HTML>
