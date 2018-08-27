<?php
 // /index.php

 // carga del modelo y los controladores

 require_once __DIR__ . '/controllers/frontend_controller.php';
 require_once __DIR__ . '/controllers/entidades_controller.php';
 require_once __DIR__ . '/controllers/donantes_controller.php';

 // enrutamiento
 $map = array(
     'inicio' => array('controller' =>'FrontendController', 'action' =>'inicio'),
     'login' => array('controller' =>'FrontendController', 'action' =>'login'),
     'linked_in' => array('controller' =>'FrontendController', 'action' =>'linkedIn'),
     'listar_alimentos' => array('controller' =>'AlimentoController', 'action' =>'listar'),
     'listar_donantes' => array('controller' =>'DonanteController', 'action' =>'listar'),
     'resumen_donantes' => array('controller' =>'DonanteController', 'action' =>'resumen'),
     'resumen_entidades' => array('controller' =>'EntidadController', 'action' =>'resumen')
 );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
        $msj= 'Error 404: No existe la ruta ' .$_GET['ctl'];
       
        return $msj;
     }
 } else {
     $ruta = 'inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

    header('Status: 404 Not Found');

    $msj= 'Error 404: El controlador ' .$controlador['controller'] .'->' .$controlador['action'] .' no existe';

    return $msj;
 
 }
