<?php 
    
 class ConfiguracionController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_CONFIRGURACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/configuracion.php'); 

                $modelConfiguraciones = new Configuracion(); 
                $configuracion = $modelConfiguraciones->getConfiguracion();
                $titulo= 'EDITAR CONFIGURACIÓNES';
                $accion= 'update_configuracion';

                $template = $twig->loadTemplate('abm_insertEdit_configuraciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'configuracion'=>$configuracion, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_CONFIRGURACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/configuracion.php');

                 $modelConfiguraciones = new Configuracion(); 
                // $alimentos = $modelAlimentos->getAlimentos();
                $template = $twig->loadTemplate('backend.twig.html');

                $params=ARRAY($_POST['latitud'],$_POST['longitud'],$_POST['vencimiento'],$_POST['api'],$_POST['clave'],$_POST['credencial'],$_POST['secreto']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){

                    $modelConfiguraciones->editConfiguracion($funciones->sanitizar($_POST['latitud']),$funciones->sanitizar($_POST['longitud']),
                        $funciones->sanitizar($_POST['vencimiento']),$funciones->sanitizar($_POST['api']),$funciones->sanitizar($_POST['clave']),
                        $funciones->sanitizar($_POST['credencial']),$funciones->sanitizar($_POST['secreto']));
                    $mensaje=' Las configuraciones se modficaron correctamente'; 
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje));

                }else{
                    $mensaje='Hubo un Error al intentear editar las configuraciones, algúnos campos estaban vacios';
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje));
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

     

 }