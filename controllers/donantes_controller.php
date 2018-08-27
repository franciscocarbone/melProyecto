<?php 

 class DonanteController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');  

                $modeldonantes = new Donante(); 
                $donantes = $modeldonantes->getDonantes();

                $template = $twig->loadTemplate('abm_listado_donantes.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'donantes'=>$donantes));
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
	    require_once (__DIR__ . '/../models/donante.php');
	    require_once (__DIR__ . '/../config/config_twig.php');

        $modeldonantes = new Donante(); 
        $donantes = $modeldonantes->getResumen();

        $template = $twig->loadTemplate('resumen_donantes.twig.html');
        echo $template->render(array('donantes'=>$donantes));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'VER_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');

                $modeldonantes = new Donante(); 
                $donantes = $modeldonantes->getDonantes();

                $template = $twig->loadTemplate('listado_donantes.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
               
                $titulo= 'ALTA DE DONANTES';
                $accion= 'insert_donante';

                $template = $twig->loadTemplate('abm_insertEdit_donantes.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');

                $modeldonantes = new Donante(); 
                $template = $twig->loadTemplate('abm_listado_donantes.twig.html');

                $params=ARRAY($_POST['razon_social'],$_POST['apellido'],$_POST['nombre'],$_POST['mail'],$_POST['domicilio'],$_POST['telefono']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modeldonantes->insertDonante($funciones->sanitizar($_POST['razon_social']),$funciones->sanitizar($_POST['apellido']),
                                                    $funciones->sanitizar($_POST['nombre']),$funciones->sanitizar($_POST['mail']),$funciones->sanitizar($_POST['domicilio']),
                                                    $funciones->sanitizar($_POST['telefono']));
                    $mensaje=' El donante '.$_POST['apellido'].', '.$_POST['nombre'].' se creo correctamente';  
                    $donantes = $modeldonantes->getDonantes();       
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes));

                }else{
                    $mensaje='Hubo un Error al intentear insertar el donante, algúnos campos estaban vacios';
                    $donantes = $modeldonantes->getDonantes();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes)); 
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');

                $modeldonantes = new Donante(); 
                $donante = $modeldonantes->getDonanteById($_GET['id']);
                $titulo= 'EDITAR DONANTE';
                $accion= 'update_donante';

                $template = $twig->loadTemplate('abm_insertEdit_donantes.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'donante'=>$donante, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');

                $modeldonantes = new Donante(); 
                $template = $twig->loadTemplate('abm_listado_donantes.twig.html');

                $params=ARRAY($_POST['razon_social'],$_POST['apellido'],$_POST['nombre'],$_POST['mail'],$_POST['domicilio'],$_POST['telefono'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modeldonantes->editDonante($funciones->sanitizar($_POST['razon_social']),$funciones->sanitizar($_POST['apellido']),
                        $funciones->sanitizar($_POST['nombre']),$funciones->sanitizar($_POST['mail']),$funciones->sanitizar($_POST['domicilio']),
                        $funciones->sanitizar($_POST['telefono']),$_POST['id']);
                    $mensaje=' El donante '.$_POST['apellido'].', '.$_POST['nombre'].' se modifico correctamente';
                    $donantes = $modeldonantes->getDonantes();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes));

                }else{
                    $mensaje='Hubo un Error al intentear editar el donante, algúnos campos estaban vacios';
                    $donantes = $modeldonantes->getDonantes();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONANTES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donante.php');

                $modeldonantes = new Donante(); 
                $modeldonantes->deleteDonante($_GET['id']);

                $donantes = $modeldonantes->getDonantes();
                $template = $twig->loadTemplate('abm_listado_donantes.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'donantes'=>$donantes));
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
