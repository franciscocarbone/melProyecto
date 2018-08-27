<?php 
    
 class EnvioController
 {

    public function editar()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENVIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/envio.php'); 
                $modelEnvios = new Envio(); 
                require_once (__DIR__ . '/../models/pedido.php');
                $modelPedidos= new Pedido();
                $estados= $modelPedidos->getEstados();
                require_once (__DIR__ . '/../models/configuracion.php');
                $modelConfiguraciones= new Configuracion();
                $configuracion= $modelConfiguraciones->getConfiguracion();

                $envio = $modelEnvios->getEnvioById($_GET['id']);

                $titulo= 'ENVIO';
                $accion= 'update_envio';

                $dias= 1;
                $latitud= $envio->latitud;
                $longitud= $envio->longitud;

                $clima= $funciones->obtenerClima($latitud,$longitud, $dias);

                $template = $twig->loadTemplate('envio.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'envio'=>$envio,'configuracion'=>$configuracion,'estados'=>$estados , 'titulo'=>$titulo, 'accion'=>$accion, 'clima' => $clima));
            }else{
                $mensaje= 'El usuario no dispone de los permisos necesarios para realizar la accion';
                $template = $twig->loadTemplate('backend.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje)); 
            }
            
        }else{
            $template = $twig->loadTemplate('login.twig.html');
            echo $template->render(array());
        }
     }


     public function edit()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENVIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/envio.php');
                $modelEnvios = new Envio(); 

                $template = $twig->loadTemplate('backend.twig.html');
            
                $params=ARRAY($_POST['estado'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){

                    $modelEnvios->cambiarEstadoEnvio($funciones->sanitizar($_POST['estado']),$funciones->sanitizar($_POST['id']));

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

                    $mensaje=' El envio se modfico correctamente'; 
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje,'alertaVencimientos'=>$alertaVencimientos, 'alertaEnvios'=>$alertaEnvios));

                }else{
                    $mensaje='Hubo un Error al intentear editar el envio, algúnos campos estaban vacios';
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje,'pedidos'=>$pedidos));
                }
                
            }else{
                $mensaje= 'El usuario no dispone de los permisos necesarios para realizar la accion';
                $template = $twig->loadTemplate('backend.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje)); 
            }   
        }else{
            $template = $twig->loadTemplate('login.twig.html');
            echo $template->render(array());
        }
     }

     public function recuperarEnviosXFecha(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/envio.php');

        session_start();
        
        $fecha=$_GET['fecha'];
    
        $modelEnvios = new Envio(); 
        $envios=$modelEnvios->getEnviosByFecha($fecha); 
        $template = $twig->loadTemplate('_select_fecha_envios.twig.html');

        echo $template->render(array('envios'=>$envios));       
     }


     public function mostrarEnvio(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/envio.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();

        $funciones = new Funciones();
        $modelEnvios = new Envio();
        $envio = $modelEnvios->getEnvioById($_GET['id']);

        $dias=$funciones->dias_transcurridos($_GET['fecha']);

        if($dias < 0){
            $clima['Error']= '';
            $mensaje= "Error al intentar cargar el clima, la facha de envio es anterior al dia de hoy.";
        }elseif($dias >= 0){
            $latitud= $envio->latitud;
            $longitud= $envio->longitud;
            $clima= $funciones->obtenerClima($latitud,$longitud, $dias+1);
        }
                     
        $template = $twig->loadTemplate('_clima_envio.twig.html');

        echo $template->render(array('clima'=>$clima,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje));       
     }


     public function envios_del_dia()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENVIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/envio.php'); 
                $modelEnvios = new Envio(); 
                require_once (__DIR__ . '/../models/configuracion.php');
                $modelConfiguraciones= new Configuracion();
                $configuracion= $modelConfiguraciones->getConfiguracion();
                require_once (__DIR__ . '/../models/turno.php');
                $modelTurno= new Turno();
                $turnos= $modelTurno->getFechasTurnos();

                $envios = $modelEnvios->getEnvios();

               // $envios = $modelEnvios->getEnviosByFecha();

                $titulo= 'ENVIOS DEL DIA';

                $template = $twig->loadTemplate('envios_del_dia.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'envios'=>$envios,'configuracion'=>$configuracion,'turnos'=>$turnos , 'titulo'=>$titulo));
            }else{
                $mensaje= 'El usuario no dispone de los permisos necesarios para realizar la accion';
                $template = $twig->loadTemplate('backend.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje)); 
            }
            
        }else{
            $template = $twig->loadTemplate('login.twig.html');
            echo $template->render(array());
        }
     }
   

 }