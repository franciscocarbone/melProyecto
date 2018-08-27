<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Banco Alimentario La Plata',
	'theme'=>'bootstrap',
	'language'=>'es',
	'sourceLanguage'=>'en', 
	
	// preloading 'log' component
	'preload'=>array('log'),
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        //'highcharts' => realpath(__DIR__ . '/../extensions/yii-highcharts-4.0.4'),
        //'ipvalidator' => realpath(__DIR__ . '/../extensions/ipvalidator'), // change this if necessary
    ),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.giix.components.*', // giix components

		//boostrap widgets
		'application.widgets.bootstrap.*',

		//'ext.AweCrud.components.*', // AweCrud components
        //'ext.yiiext.behaviors.activerecord-relation.EActiveRecordRelationBehavior',

		//Permisos roles y usuarios
		'application.modules.cruge.components.*',
		'application.modules.cruge.extensions.crugemailer.*',
	),

	'modules'=>array(

		'cruge'=>array(
			'tableprefix'=>'cruge_',

			// para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
			//
			// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
			// para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
			//

			'superuserName'=>'admin',

			'availableAuthMethods'=>array('default'),

			'availableAuthModes'=>array('username','email'),

             // url base para los links de activacion de cuenta de usuario
			'baseUrl'=>'http://coco.com/',

			 // NO OLVIDES PONER EN FALSE TRAS INSTALAR
			 'debug'=>true,
			 'rbacSetupEnabled'=>true,
			 'allowUserAlways'=>false,

			// MIENTRAS INSTALAS..PONLO EN: false
			// lee mas abajo respecto a 'Encriptando las claves'
			//
			'useEncryptedPassword' => true,

			// Algoritmo de la función hash que deseas usar
			// Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
			'hash' => 'md5',

			// Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
			// hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
			//  lee en la wiki acerca de:
                            //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
                            //
			// ejemplo:
			//		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
			//		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
			//
			'afterLoginUrl'=>null,
			'afterLogoutUrl'=>null,
			'afterSessionExpiredUrl'=>null,

			// manejo del layout con cruge.
			//
			'loginLayout'=>'//layouts/column2',
			'registrationLayout'=>'//layouts/column2',
			'activateAccountLayout'=>'//layouts/column2',
			'editProfileLayout'=>'//layouts/column2',
			// en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
			// de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
			// requerirá de un portlet para desplegar un menu con las opciones de administrador.
			//
			'generalUserManagementLayout'=>'ui',

			// permite indicar un array con los nombres de campos personalizados, 
			// incluyendo username y/o email para personalizar la respuesta de una consulta a: 
			// $usuario->getUserDescription(); 
			'userDescriptionFieldsArray'=>array('email'), 

		),

		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'grupo_39',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'ext.giix.generators', // giix generators
				'bootstrap.gii',
				//'ext.AweCrud.generators',
			),
		),
		
	),

	// application components
	'components'=>array(

		//  IMPORTANTE:  asegurate de que la entrada 'user' (y format) que por defecto trae Yii
		//               sea sustituida por estas a continuación:
		//


		//CSRF prevension de Cross-Site Request Forgerys
		'request'=>array(
            'enableCsrfValidation'=>true,
             'enableCookieValidation'=>true,
        ),

		'user'=>array(
			'allowAutoLogin'=>true,
			'class' => 'application.modules.cruge.components.CrugeWebUser',
			'loginUrl' => array('/cruge/ui/login'),
		),

		'authManager' => array(
			'class' => 'application.modules.cruge.components.CrugeAuthManager',
		),

		'crugemailer'=>array(
			'class' => 'application.modules.cruge.components.CrugeMailer',
			'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
			'subjectprefix' => 'Tu Encabezado del asunto - ',
			'debug' => true,
		),

		'format' => array(
			'datetimeFormat'=>"d M, Y h:m:s a",
		),

		'messages' => array (
			// Pending on core: http://code.google.com/p/yii/issues/detail?id=2624
			'extensionPaths' => array(
				//'AweCrud' => 'ext.AweCrud.messages',
				'giix' => 'ext.giix.messages', // giix messages directory.
			),
		),

/*
		'booster' => array(
            'class' => 'yiibooster.components.Booster',
        ),
*/
       'bootstrap' => array(
            'class'=>'bootstrap.components.Bootstrap',

            //'class' => 'bootstrap.components.TbApi',   
        ),



		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		//'db'=>require(dirname(__FILE__).'/database.php'),
		'cache' => array('class' => 'system.caching.CDummyCache'),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=grupo_39',
			'emulatePrepare' => true,
			'username' => 'grupo_39',
			'password' => 'RFA57ahI6ESndvNx',
			'charset' => 'utf8',
		),


		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		 'log'=>array(
		 	'class'=>'CLogRouter',
		 	'routes'=>array(
		 		array(
		 			'class'=>'CFileLogRoute',
		 			'levels'=>'error, warning, rbac',
		 		),
		 		// uncomment the following to show log messages on web pages
		 		
		 		// array(
		 		// 	'class'=>'CWebLogRoute',
		 		// ),
		 		
		 	),
		 ),		 

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'franciscocarbone182@gmail.com',
		'privateKey'=>realpath(__DIR__ . '/privKey.key'),
        'publicKey'=>realpath(__DIR__ . '/pubKey.key'),
	),
);
