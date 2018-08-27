<?php

 class FrontendController
 {

    public function inicio(){
        require_once (__DIR__ . '/../config/config_twig.php');  

        $template = $twig->loadTemplate('index.twig.html');

        echo $template->render(array());
    }

    public function login(){
        require_once (__DIR__ . '/../config/config_twig.php');

        $template = $twig->loadTemplate('login.twig.html');

        echo $template->render(array());
    }



    public function linkedIn(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/configuracion.php');

        $template = $twig->loadTemplate('linkedin.twig.html');

        $modelConfiguraion= new Configuracion();
        $config = $modelConfiguraion->getConfiguracion();

        define("CONSUMER_KEY", $config->clave_api);
        define("CONSUMER_SECRET", $config->clave_secreta);
        define("OAUTH_TOKEN", $config->credencial_usuario);
        define("OAUTH_TOKEN_SECRET", $config->secreto_usuario);

        $oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);
        $oauth->setToken(OAUTH_TOKEN, OAUTH_TOKEN_SECRET);

        $params = array();
        $headers = array();
        $method = OAUTH_HTTP_METHOD_GET;

        $url= "http://api.linkedin.com/v1/people/~:(first-name,last-name,headline,picture-url)?format=json";
        $oauth->fetch($url, $params, $method, $headers);

        $user = json_decode($oauth->getLastResponse());

        $nombre=$user->{'firstName'};
        $apellido=$user->{'lastName'};
        $actividad=$user->{'headline'};
        $imagen=$user->{'pictureUrl'};

        echo $template->render(array('nombre'=>$nombre, 'apellido'=>$apellido,'actividad'=>$actividad,'imagen'=>$imagen));

        
    }
 }