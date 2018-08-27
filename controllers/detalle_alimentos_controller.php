<?php 
    
 class DetalleAlimentoController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php');

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();

                $template = $twig->loadTemplate('abm_listado_detalle_alimentos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'detalle_alimentos'=>$detalle_alimentos));
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

     public function ver()
     {

        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'VER_STOCK'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php');

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $detalle_alimentos = $modelDetalleAlimentos->getStock();

                $template = $twig->loadTemplate('listado_stock_alimentos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'detalle_alimentos'=>$detalle_alimentos));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/alimento.php');
              
                $titulo= 'ALTA DETALLE ALIMENTO';
                $accion= 'insert_detalle_alimento';

                $modelAlimentos = new Alimento;
                $alimentos = $modelAlimentos->getAlimentos();

                $template = $twig->loadTemplate('abm_insertEdit_detalle_alimentos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'titulo'=>$titulo, 'accion'=>$accion, 'alimentos'=>$alimentos));
                
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php');

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $template = $twig->loadTemplate('abm_listado_detalle_alimentos.twig.html');

                $params=ARRAY($_POST['alimento'],$_POST['contenido'],$_POST['peso']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   

                if($funciones->validar($params)){
                    $modelDetalleAlimentos->insertDetalleAlimento($funciones->sanitizar($_POST['alimento']),$funciones->sanitizar($_POST['contenido']),
                    $funciones->sanitizar($_POST['peso']),0,0); //0,0 son los campos stock y reservado que se crean en 0.
                    $mensaje=' El alimento '.$_POST['alimento'].', '.$_POST['contenido'].' se creo correctamente';
                    $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje, 'detalle_alimentos'=>$detalle_alimentos));
                }else{
                    $mensaje='Hubo un Error al intentear insertar el alimaento, algúnos campos estaban vacios';
                    $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje, 'detalle_alimentos'=>$detalle_alimentos)); 
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php');
                require_once (__DIR__ . '/../models/alimento.php'); 

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $detalle = $modelDetalleAlimentos->getDetalleAlimentoById($_GET['id']);
                $modelAlimentos = new Alimento;
                $alimentos = $modelAlimentos->getAlimentos();

                $titulo= 'EDITAR DETALLE ALIMENTO';
                $accion= 'update_detalle_alimento';

                $template = $twig->loadTemplate('abm_insertEdit_detalle_alimentos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'detalle'=>$detalle,'alimentos'=>$alimentos, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php'); 

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $template = $twig->loadTemplate('abm_listado_detalle_alimentos.twig.html');

                $params=ARRAY($_POST['alimento'],$_POST['fecha'],$_POST['contenido'],$_POST['peso']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){

                    $modelDetalleAlimentos->editDetalleAlimento($funciones->sanitizar($_POST['alimento']),$funciones->sanitizar($_POST['fecha']),
                        $funciones->sanitizar($_POST['contenido']), $funciones->sanitizar($_POST['peso']),$_POST['id']);
                    $mensaje=' El alimento '.$_POST['alimento'].', '.$_POST['contenido'].' se Modifico correctamente';  
                    $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();          
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje,'detalle_alimentos'=>$detalle_alimentos));

                }else{
                    $mensaje='Hubo un Error al intentear editar el alimaento, algúnos campos estaban vacios';
                    $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje, 'detalle_alimentos'=>$detalle_alimentos)); 
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DALIMENTOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/detalleAlimento.php'); 

                $modelDetalleAlimentos = new DetalleAlimento(); 
                $modelDetalleAlimentos->deleteDetalleAlimento($_GET['id']);
                $mensaje='El elemento se elimino correctamente';
                $detalle_alimentos = $modelDetalleAlimentos->getDetalleAlimentos();
                $template = $twig->loadTemplate('abm_listado_detalle_alimentos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'detalle_alimentos'=>$detalle_alimentos,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje));
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

     public function recuperarDetallesXAlimento(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/detalleAlimento.php');

        session_start();
        
        $id_alimento=$_GET['codigo'];
    
        $modelDetalleAlimentos = new DetalleAlimento(); 
        $detalles=$modelDetalleAlimentos->getDetalleAlimentosByCodigo($id_alimento); 
        $template = $twig->loadTemplate('_select_detalles_alimento.twig.html');

        echo $template->render(array('detalles'=>$detalles));       
     }

 }