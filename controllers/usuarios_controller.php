<?php 

 class UsuarioController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');  

                $modelusuarios = new Usuario(); 
                $usuarios = $modelusuarios->getUsuarios();

                $template = $twig->loadTemplate('abm_listado_usuarios.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'usuarios'=>$usuarios));
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
        require_once (__DIR__ . '/../models/usuario.php');
        require_once (__DIR__ . '/../config/config_twig.php');  

        $modelusuarios = new Usuario(); 
        $usuarios = $modelusuarios->getResumen();

        $template = $twig->loadTemplate('resumen_usuarios.twig.html');

        echo $template->render(array('usuarios'=>$usuarios));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'VER_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');

                $modelusuarios = new Usuario(); 
                $usuarios = $modelusuarios->getUsuarios();

                $template = $twig->loadTemplate('listado_usuarios.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'usuarios'=>$usuarios));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');

                $modelusuarios = new Usuario(); 
                $roles = $modelusuarios->getRoles();

                $titulo= 'ALTA DE USUARIO';
                $accion= 'insert_usuario';

                $template = $twig->loadTemplate('abm_insertEdit_usuarios.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'roles'=>$roles,'accion'=>$accion, 'titulo'=>$titulo));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');

                $modelusuarios = new Usuario(); 
                $template = $twig->loadTemplate('abm_listado_usuarios.twig.html');

                $params=ARRAY($funciones->sanitizar($_POST['nombre']),$funciones->sanitizar($_POST['apellido']),
                    $funciones->sanitizar($_POST['usuario']),$funciones->sanitizar($_POST['password']),$funciones->sanitizar($_POST['rol'])); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modelusuarios->insertUsuario($_POST['nombre'],$_POST['apellido'],$_POST['usuario'],$_POST['password'],$_POST['rol']);
                    $mensaje=' El Usiario '.$_POST['usuario'].' se creo correctamente'; 
                    $usuarios = $modelusuarios->getUsuarios();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'usuarios'=>$usuarios));

                }else{
                    $mensaje='Hubo un Error al intentear insertar el Usuario, algúnos campos estaban vacios';
                    $usuarios = $modelusuarios->getUsuarios();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'usuarios'=>$usuarios));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php'); 

                $modelusuarios = new Usuario(); 
                $usu = $modelusuarios->getUsuarioById($_GET['id']);
                $roles = $modelusuarios->getRoles();
                $titulo= 'EDITAR USUARIO';
                $accion= 'update_usuario';

                $template = $twig->loadTemplate('abm_insertEdit_usuarios.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'usuario'=>$usu,'roles'=>$roles, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');

                $modelusuarios = new Usuario(); 
                $template = $twig->loadTemplate('abm_listado_usuarios.twig.html');

                $params=ARRAY($_POST['nombre'],$_POST['apellido'],$_POST['usuario'],$_POST['password'],$_POST['rol'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
          
                    $modelusuarios->editUsuario($funciones->sanitizar($_POST['nombre']),$funciones->sanitizar($_POST['apellido']),
                            $funciones->sanitizar($_POST['usuario']),$funciones->sanitizar($_POST['password']),
                            $funciones->sanitizar($_POST['rol']),$funciones->sanitizar($_POST['id']));
                    $mensaje=' El Usuario '.$_POST['usuario'].' se modifico correctamente'; 
                    $usuarios = $modelusuarios->getUsuarios();   
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'usuarios'=>$usuarios));

                }else{
                    $mensaje='Hubo un Error al intentear editar el Usuario, algúnos campos estaban vacios';
                    $usuarios = $modelusuarios->getUsuarios();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'usuarios'=>$usuarios));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_USUARIOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/usuario.php');

                $modelusuarios = new Usuario(); 
                $modelusuarios->deleteUsuario($_GET['id']);

                $usuarios = $modelusuarios->getUsuarios();
                $template = $twig->loadTemplate('abm_listado_usuarios.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'usuarios'=>$usuarios));
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