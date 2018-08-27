<?php
	require_once  __DIR__. '/../Twig/Autoloader.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem(__DIR__. '/../templates');
	$twig = new Twig_Environment($loader, array(
	    'cache' =>  __DIR__. '/../cache', 
	    'debug' => 'true',
	));