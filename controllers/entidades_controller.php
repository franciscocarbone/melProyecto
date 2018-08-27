<?php 

 class EntidadController
 {

	public function listar()
	 {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');  

                $modelentidades = new Entidad(); 
                $entidades = $modelentidades->getEntidades();

                $template = $twig->loadTemplate('abm_listado_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'entidades'=>$entidades));
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


	public function resumen()
	 {
        require_once (__DIR__ . '/../models/entidad.php');
	    require_once (__DIR__ . '/../config/config_twig.php');  

        $modelentidades = new Entidad(); 
        $entidades = $modelentidades->getResumen();

	    $template = $twig->loadTemplate('resumen_entidades.twig.html');

	    echo $template->render(array('entidades'=>$entidades));
	}


	 public function ver()
	 {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'VER_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');

                $modelentidades = new Entidad(); 
                $entidades = $modelentidades->getEntidades();

                $template = $twig->loadTemplate('listado_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'entidades'=>$entidades));
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

     public function alta()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');

                $modelentidad = new Entidad(); 
                $estados = $modelentidad->getEstados();
                $necesidades = $modelentidad->getNecesidades();
                $servicios = $modelentidad->getServiciosPrestados();

                $titulo= 'ALTA DE ENTIDAD';
                $accion= 'insert_entidad';

                $template = $twig->loadTemplate('abm_insertEdit_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'estados'=>$estados,
                    'necesidades'=>$necesidades,'servicios'=>$servicios,'accion'=>$accion, 'titulo'=>$titulo));
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



     public function insert()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');

                $modelentidades = new Entidad(); 
                $template = $twig->loadTemplate('abm_listado_entidades.twig.html');

                $params=ARRAY($_POST['razon_social'],$_POST['telefono'],$_POST['domicilio'],$_POST['estado'],$_POST['necesidad'],$_POST['servicio_prestado']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modelentidades->insertEntidad($funciones->sanitizar($_POST['razon_social']),$funciones->sanitizar($_POST['telefono']),
                    $funciones->sanitizar($_POST['domicilio']),$funciones->sanitizar($_POST['estado']),$funciones->sanitizar($_POST['necesidad']),
                    $funciones->sanitizar($_POST['servicio_prestado']),$funciones->sanitizar($_POST['latitud']),$funciones->sanitizar($_POST['longitud']));
                    $mensaje=' La Entidad '.$_POST['razon_social'].' se creo correctamente'; 
                    $entidades = $modelentidades->getEntidades();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));

                }else{
                    $mensaje='Hubo un Error al intentear insertar la Entidad, algúnos campos estaban vacios';
                    $entidades = $modelentidades->getEntidades();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));
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

     public function editar()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php'); 

                $modelentidades = new Entidad(); 
                $entidad = $modelentidades->getEntidadById($_GET['id']);
                $estados = $modelentidades->getEstados();
                $necesidades = $modelentidades->getNecesidades();
                $servicios = $modelentidades->getServiciosPrestados();
                
                $titulo= 'EDITAR ENTIDAD';
                $accion= 'update_entidad';

                $template = $twig->loadTemplate('abm_insertEdit_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'entidad'=>$entidad,'estados'=>$estados,
                    'necesidades'=>$necesidades,'servicios'=>$servicios, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');

                $modelentidades = new Entidad(); 
                $template = $twig->loadTemplate('abm_listado_entidades.twig.html');

                $params=ARRAY($_POST['razon_social'],$_POST['telefono'],$_POST['domicilio'],$_POST['estado'],$_POST['necesidad'],$_POST['servicio_prestado'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modelentidades->editEntidad($funciones->sanitizar($_POST['razon_social']),$funciones->sanitizar($_POST['telefono']),
                        $funciones->sanitizar($_POST['domicilio']),$funciones->sanitizar($_POST['estado']),$funciones->sanitizar($_POST['necesidad']),
                        $funciones->sanitizar($_POST['servicio_prestado']),$funciones->sanitizar($_POST['latitud']),$funciones->sanitizar($_POST['longitud']),$_POST['id']);
                    $mensaje=' La Entidad '.$_POST['razon_social'].' se modifico correctamente'; 
                    $entidades = $modelentidades->getEntidades();   
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));

                }else{
                    $mensaje='Hubo un Error al intentear editar la Entidad, algúnos campos estaban vacios';
                    $entidades = $modelentidades->getEntidades();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));
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

     public function eliminar()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ENTIDADES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');

                $modelentidades = new Entidad(); 
                $modelentidades->deleteEntidad($_GET['id']);

                $entidades = $modelentidades->getEntidades();
                $template = $twig->loadTemplate('abm_listado_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));
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
