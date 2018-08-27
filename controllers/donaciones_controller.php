<?php 

 class DonacionController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');  

                $modeldonaciones = new Donacion(); 
                $donaciones = $modeldonaciones->getDonaciones();

                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'donaciones'=>$donaciones));
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

     public function recuperarDetallesXAlimentoDonaciones(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/donacion.php');

        session_start();
        
        $id_alimento=$_GET['codigo'];
    
        $modelDonaciones = new Donacion(); 
        $detalles=$modelDonaciones->getDetalleAlimentosDonacionesByCodigo($id_alimento); 
        $template = $twig->loadTemplate('_select_detalles_alimento_pedido.twig.html');

        echo $template->render(array('detalles'=>$detalles));       
     }


    public function resumen()
     {
        require_once (__DIR__ . '/../models/donacion.php');
        require_once (__DIR__ . '/../config/config_twig.php');  

        $modeldonaciones = new Donacion(); 
        $donaciones = $modeldonaciones->getResumen();

        $template = $twig->loadTemplate('resumen_entidades.twig.html');

        echo $template->render(array('donaciones'=>$donaciones));
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
                require_once (__DIR__ . '/../models/donacion.php');

                $modeldonaciones = new Donacion(); 
                $donaciones = $modeldonaciones->getDonaciones();

                $template = $twig->loadTemplate('listado_entidades.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'donaciones'=>$donaciones));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                require_once (__DIR__ . '/../models/alimento.php');

                $modeldonaciones = new Donacion(); 
                $donantes=$modeldonaciones->getDonantes();
                $modelalimentos = new Alimento();
                $alimentos=$modelalimentos->getAlimentos();

                $titulo= 'ALTA DE DONACIÓN';
                $accion= 'insert_donacion';

                $template = $twig->loadTemplate('abm_insertEdit_donaciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'alimentos'=>$alimentos,'donantes'=>$donantes, 'accion'=>$accion, 'titulo'=>$titulo));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');

                $modeldonaciones = new Donacion(); 
                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');

                $params=ARRAY($_POST['donate']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
                    require_once (__DIR__ . '/../models/detalleAlimento.php');
                    $modeldetallealimentos = new DetalleAlimento();         
                    $modeldonaciones->insertDonacion($funciones->sanitizar($_POST['donate']));

                    $mensaje=' La donación se creo Exitosamente'; 
                    $donaciones = $modeldonaciones->getDonaciones();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));

                }else{
                    $mensaje='Hubo un Error al intentear crear la donación, algúnos campos estaban vacios';
                    $donaciones = $modeldonaciones->getDonaciones();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php'); 

                $modeldonaciones = new Donacion(); 
                $donacion = $modeldonaciones->getDonacionById($_GET['id']);
                $donantes = $modeldonaciones-> getDonantes();
                
                $titulo= 'EDITAR DONACION';
                $accion= 'update_donacion';

                $template = $twig->loadTemplate('abm_insertEdit_donaciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'donacion'=>$donacion, 
                                            'donantes'=>$donantes , 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');

                $modeldonaciones = new Donacion(); 
                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');

                $params=ARRAY($_POST['donate'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){

                    $modeldonaciones->editDonacion($funciones->sanitizar($_POST['donate']),$_POST['id']);

                    $mensaje=' La donación se modifico correctamente'; 
                    $donaciones = $modeldonaciones->getDonaciones();   
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));

                }else{
                    $mensaje='Hubo un Error al intentear editar la Donación, algúnos campos estaban vacios';
                    $donaciones = $modeldonaciones->getDonaciones();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                $modeldonaciones = new Donacion(); 
                $modeldonaciones->deleteDonacion($_GET['id']);

                $donaciones = $modeldonaciones->getDonaciones();
                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));
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

     //----------------------------ALIMENTOS PARA LA DONACION -------//


     public function altaEditarAlimentosDonacion()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                require_once (__DIR__ . '/../models/alimento.php');

                $modeldonaciones = new Donacion(); 
                $donacion = $modeldonaciones->getDonacionById($_GET['id']);

                $modelalimentos = new Alimento();
                $alimentos = $modelalimentos->getAlimentos();
                //Cargo los alimentos existentes de la donacion
                $detalles = $modeldonaciones->getItemsDeDonacion($_GET['id']);

                $titulo= 'AGREGAR ALIMENTOS A LA DONACIÓN';
                $accion= 'insert_detalles_donacion';

                $template = $twig->loadTemplate('abm_insertEdit_items_donacion.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'alimentos'=>$alimentos,'donacion'=>$donacion,
                                            'detalles'=>$detalles, 'accion'=>$accion, 'titulo'=>$titulo));
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


     public function insertUpdateAlimentosDonacion()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                $modeldonaciones = new Donacion(); 
            
                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');

                $params=ARRAY($_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){  
                    require_once (__DIR__ . '/../models/detalleAlimento.php');
                    $modeldetallealimentos = new DetalleAlimento();

                    $donacion = $modeldonaciones->getDonacionById($_POST['id']);  


                    $items= $modeldonaciones->getItemsDeDonacion($_POST['id']);
                    //decremento todos los stocks de los detalles alimentos
                    foreach ($items as $item) {
                        $detalle=$modeldetallealimentos->getDetalleAlimentoById($item->detalle_alimento_id); 
                        $stock=($detalle->stock)-($item->cantidad);  //borro del stock la cantidad donada
                        $modeldetallealimentos->updateStockDetalleAlimento($stock,$item->detalle_alimento_id); 
                        //AGREGAR EN LA TABLA DE donaciones_detalle_alimentos los alimentos donados
                     }

                    //borrar todos los items para la donacion
                    $modeldonaciones->deleteItemsDeDonacion($_POST['id']); 
                    //Creo el json con los datos obtenidos de la insercion
                    $detalles = json_decode(json_encode($_POST['detalle']),false);

                    foreach ($detalles as $det) {
                        $detalle=$modeldetallealimentos->getDetalleAlimentoById(intval($det->id_detalle)); 
                        $stock=($detalle->stock)+intval($det->cantidad);  //Agrego al stock la cantidad donada
                        $modeldetallealimentos->updateStockDetalleAlimento($stock,intval($det->id_detalle)); 
                        //AGREGAR EN LA TABLA DE donaciones_detalle_alimentos los alimentos donados
                        $modeldetallealimentos->insertAlimentoDonado($donacion->id,intval($det->id_detalle),intval($det->cantidad),$det->vencimiento);   
                     }                 

                    $mensaje=' Se agregaron los alimentos Exitosamente'; 
                    $donaciones = $modeldonaciones->getDonaciones();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));

                }else{
                    $mensaje='Hubo un Error al intentear agregar los alimentos, algúnos campos estaban vacios';
                    $donaciones = $modeldonaciones->getDonaciones();
                    echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));
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


     public function eliminarDetalle()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_DONACIONES'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/donacion.php');
                $modeldonaciones = new Donacion(); 
                $donacion=$modeldonaciones->getDonacionById($_GET['id']);    

                require_once (__DIR__ . '/../models/detalleAlimento.php');
                $modeldetallealimentos = new DetalleAlimento();          
                $detalle=$modeldetallealimentos-> getDetalleAlimentoById($donacion->detalle_alimento_id);               
                $stock=(($detalle->stock)-($donacion->cantidad));  //Borro del stock cantidad donada

                $modeldetallealimentos->updateStockDetalleAlimento($stock,$detalle->id);
                $modeldonaciones->deleteDonacion($_GET['id']);

                $donaciones = $modeldonaciones->getDonaciones();
                $template = $twig->loadTemplate('abm_listado_donaciones.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'donaciones'=>$donaciones));
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
