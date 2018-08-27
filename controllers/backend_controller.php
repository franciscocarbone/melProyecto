<?php

 class BackendController
 {

     public function login()
     {
        require_once (__DIR__ . '/../models/usuario.php');
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');
        session_start();

        $modelusuarios = new Usuario(); 
        $usuario = $modelusuarios-> getUser($_POST['usuario'],$_POST['password']);

        if($usuario){ //Si encuentro un usuario     

            $_SESSION['idu'] = $usuario->usuario_id;
            $_SESSION['usuario'] = $usuario->apellido.', '.$usuario->nombre;
            $rol=$modelusuarios->getRolByUsuarioId($usuario->usuario_id);  
            $_SESSION['rol'] = $rol->descripcion;   

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];     
            
            $template = $twig->loadTemplate('backend.twig.html');

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ALERTAS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            $template = $twig->loadTemplate('backend.twig.html');
            
            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                require_once (__DIR__ . '/../models/configuracion.php'); 
                require_once (__DIR__ . '/../models/pedido.php'); 

                $modelConfiguracion= new Configuracion();
                $configuracion= $modelConfiguracion->getConfiguracion();
                //armo la fecha de vencimiento con el parametro de las configuraciones
                $diasVenc= $configuracion->vencimiento_stock;
                $fecha=Date('y-m-d', strtotime("+".$diasVenc." days"));
                //levanto las donaciones dentro del rango de dias para vencer
                $modeldonaciones = new Donacion(); 
                $alertaVencimientos = $modeldonaciones->getAlimentosPorVencer($fecha);
                //levanto los pedidos del dia
                $modelPedidos = new Pedido();
                $alertaEnvios = $modelPedidos->getEnviosDelDia(Date('y-m-d'));
           
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'alertaVencimientos'=>$alertaVencimientos, 'alertaEnvios'=>$alertaEnvios));
            }else{
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol));
            }

            
        }else{
            $mensaje='Usuario o Contraseña incorrectos';
            $template = $twig->loadTemplate('login.twig.html');
            echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR'));
        } 
     }


     public function inicio()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ALERTAS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION
            $template = $twig->loadTemplate('backend.twig.html');
            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                    require_once (__DIR__ . '/../models/donacion.php');
                    require_once (__DIR__ . '/../models/configuracion.php');  
                    require_once (__DIR__ . '/../models/pedido.php'); 

                    $modelConfiguracion= new Configuracion();
                    $configuracion= $modelConfiguracion->getConfiguracion();
                    //armo la fecha de vencimiento con el parametro de las configuraciones
                    $diasVenc= $configuracion->vencimiento_stock;
                    $fecha=Date('y-m-d', strtotime("+".$diasVenc." days"));
                    //levanto las donaciones dentro del rango de dias para vencer
                    $modeldonaciones = new Donacion(); 
                    $alertaVencimientos = $modeldonaciones->getAlimentosPorVencer($fecha);
                    //levanto los pedidos del dia
                    $modelPedidos = new Pedido();
                    $alertaEnvios = $modelPedidos->getEnviosDelDia(Date('y-m-d'));
               
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'alertaVencimientos'=>$alertaVencimientos, 'alertaEnvios'=>$alertaEnvios));
                }else{
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol));
                }

            }else{
                $template = $twig->loadTemplate('login.twig.html');
                echo $template->render(array());
         }
     }

     public function logout()
     {
        session_start();
        require_once (__DIR__ . '/../config/config_twig.php');  
        session_destroy();
        $template = $twig->loadTemplate('index.twig.html');

        echo $template->render(array());
     }
 
 }