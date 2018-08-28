<?php 
require_once("vendor/twig/twig/lib/Twig/Autoloader.php");
Twig_Autoloader::register();

$templateDir="./templates";
$templateDirCompi="./templates-c";

$loader = new Twig_Loader_Filesystem($templateDir);

$twig = new Twig_Environment($loader);
//, array("cache" => $templateDirCompi,
//           ));
            
$template = $twig->loadTemplate("plantilla-1.twig");
//Probemos descomentando el de abajo y comentadno el de arriba
//$template = $twig->loadTemplate("pruebas.html");


$template->display(array('nombre' => 'Claudia!',
						'lista' => array("1","2",223,4,5, 6)
));

?>




