<?php 
    
 class EntregaDirectaController
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/directo.php');

                $modelEntregasDirectas = new Directo(); 
                $directos = $modelEntregasDirectas->getEntregasDirectas();

                $template = $twig->loadTemplate('abm_listado_entregas_directas.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'directos'=>$directos));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/entidad.php');
                $modelEntidades= new Entidad();
                $entidades= $modelEntidades->getEntidades();  
                
                require_once (__DIR__ . '/../models/configuracion.php');
                $modelConfiguracion= new Configuracion();
                $configuracion= $modelConfiguracion->getConfiguracion();
                //armo la fecha de vencimiento con el parametro de las configuraciones
                $diasVenc= $configuracion->vencimiento_stock;
                $fecha=Date('y-m-d', strtotime("+".$diasVenc." days"));
                //levanto las donaciones dentro del rango de dias para vencer
                require_once (__DIR__ . '/../models/donacion.php');
                $modeldonaciones = new Donacion(); 
                $alertaXvencer = $modeldonaciones->getAlimentosPorVencer($fecha);

                $titulo= 'ALTA DE ENTREGA DIRECTA';
                $accion= 'insert_directo';

                $template = $twig->loadTemplate('abm_insertEdit_entrega_directa.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades, 'alertaXvencer'=>$alertaXvencer, 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/directo.php');
                $modelEntregasDirectas = new Directo(); 
                $template = $twig->loadTemplate('abm_listado_entregas_directas.twig.html');

                $params=ARRAY($_POST['entidad']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){
                    $hoy=Date('y-m-d');
                    $modelEntregasDirectas->insertEntregaDirecta($funciones->sanitizar($_POST['entidad']),$hoy); 
                    $ultimaEntrega=$modelEntregasDirectas->getUltimaEntregaDirecta();

                    require_once (__DIR__ . '/../models/detalleAlimento.php');
                    $modeldetallealimentos = new DetalleAlimento();

                    $entrega = $modelEntregasDirectas->getEntregaDirectaById($ultimaEntrega->id);  

                    require_once (__DIR__ . '/../models/donacion.php');
                    $modeldonaciones = new Donacion();
            
                    //Creo el json con los datos obtenidos de la insercion
                    $detalles = json_decode(json_encode($_POST['detalle']),false);       

                    //AGREGAR EN LA TABLA DE donaciones_detalle_alimentos los alimentos donados
                    foreach ($detalles as $det) {
                        $donacion= $modeldonaciones->getItemDonado(intval($det->id_detalle));
                        $detalle=$modeldetallealimentos->getDetalleAlimentoById($donacion->detalle_alimento_id); 
                        $stock=($detalle->stock)+intval($det->cantidad);  //Decremento la cantidad donada para esa donacion
                        $modeldetallealimentos->updateStockDetalleAlimento($stock,intval($detalle->id)); 

                        $donacion= $modeldonaciones->getItemDonado(intval($det->id_detalle));
                        $stock=($donacion->cantidad)-(intval($det->cantidad)); //decremento el stock de los alimentos donados
                        $modeldonaciones->updateStockItemDonacion($stock,intval($det->id_detalle));
                        //AGREGAR EN LA TABLA DE entregas_detalle_alimento los alimentos pedidos
                        $modelEntregasDirectas->insertAlimentoEntregaDirecta($entrega->id,intval($det->id_detalle),intval($det->cantidad));   
                     }                 
 
                    $directos = $modelEntregasDirectas->getEntregasDirectas();

                    $mensaje=' La Entrega Directa se creo correctamente';       
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCES','mensajeConfirmacion'=>$mensaje, 'directos'=>$directos));
                }else{
                    $entregasDirectas = $modelEntregasDirectas->getEntregasDirectas();
                    $mensaje='Hubo un Error al intentear insertar el pedido, algúnos campos estaban vacios';
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'ERROR','mensajeError'=>$mensaje,'entregasDirectas'=>$entregasDirectas)); 
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/pedido.php'); 
                $modelPedidos = new Pedido(); 
                $pedido = $modelPedidos->getpedidoById($_GET['id']);
                $estados= $modelPedidos->getEstados();
                require_once (__DIR__ . '/../models/entidad.php');
                $modelEntidades= new Entidad();
                $entidades= $modelEntidades->getEntidades();
                require_once (__DIR__ . '/../models/turno.php');
                $modelTurno= new Turno();
                $turnos= $modelTurno->getTurnos();

                $titulo= 'EDITAR PEDIDO';
                $accion= 'update_pedido';

                $template = $twig->loadTemplate('abm_insertEdit_pedidos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'pedido'=>$pedido,'entidades'=>$entidades ,'estados'=>$estados, 
                        'turnos'=>$turnos , 'titulo'=>$titulo, 'accion'=>$accion));
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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/pedido.php');
                $modelPedidos = new Pedido(); 

                $template = $twig->loadTemplate('abm_listado_pedidos.twig.html');
            
                $params=ARRAY($_POST['entidad'],$_POST['fecha'],$_POST['estado'],$_POST['turno'],$_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){

                    if (isset($_POST['envio'])) {
                        $envio = 1;
                    } else {
                        $envio = 0;
                    }

                    $modelPedidos->editpedido($funciones->sanitizar($_POST['entidad']),$funciones->sanitizar($_POST['fecha']),
                        $funciones->sanitizar($_POST['estado']),$funciones->sanitizar($_POST['turno']),
                        $envio,$funciones->sanitizar($_POST['id']));
                    $pedidos = $modelPedidos->getPedidosModelo();
                    $mensaje=' El pedido se modfico correctamente'; 
                    echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'mensajeTipo'=>'SUCCESS','mensajeConfirmacion'=>$mensaje,'pedidos'=>$pedidos));

                }else{
                    $mensaje='Hubo un Error al intentear editar el pedido, algúnos campos estaban vacios';
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

     public function eliminar()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/pedido.php');

                $modelPedidos = new Pedido(); 
                $modelPedidos->deletepedido($_GET['id']);

                $pedidos = $modelPedidos->getPedidosModelo();
                $template = $twig->loadTemplate('abm_listado_pedidos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol, 'pedidos'=>$pedidos));
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

      //----------------------------ALIMENTOS PARA EL PEDIDO -------//


     public function altaEditarAlimentosPedido()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();

        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/pedido.php');
                require_once (__DIR__ . '/../models/alimento.php');

                $modelPedidos = new Pedido(); 
                $pedido = $modelPedidos->getPedidoById($_GET['id']);

                $modelalimentos = new Alimento();
                $alimentos = $modelalimentos->getAlimentos();
                //Cargo los alimentos existentes de la donacion
                $detalles = $modelPedidos->getItemsDePedido($_GET['id']);

                $titulo= 'AGREGAR ALIMENTOS AL PEDIDO';
                $accion= 'insert_detalles_pedido';

                $template = $twig->loadTemplate('abm_insertEdit_items_pedido.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol,'alimentos'=>$alimentos,'pedido'=>$pedido,
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


     public function insertUpdateAlimentosPedido()
     {
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION
                require_once (__DIR__ . '/../models/pedido.php');
                $modelPedidos = new Pedido(); 
            
                $template = $twig->loadTemplate('abm_listado_pedidos.twig.html');

                $params=ARRAY($_POST['id']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
                if($funciones->validar($params)){  
                    require_once (__DIR__ . '/../models/detalleAlimento.php');
                    $modeldetallealimentos = new DetalleAlimento();

                    $pedido = $modelPedidos->getPedidoById($_POST['id']);  
                    $items= $modelPedidos->getItemsDePedido($_POST['id']);

                    require_once (__DIR__ . '/../models/donacion.php');
                    $modeldonaciones = new Donacion();

                    //devuelvo todas las cantidades donadas
                    foreach ($items as $item) {
/*
                        $donacion= $modeldonaciones->getItemDonado($item->donacion_detalle_alimento_id);
                        $stock=($donacion->cantidad)+($item->cantidad);  //agrego la cantidad pedida para luego voolver a decrementarla
                        $modeldonaciones->updateStockItemDonacion($stock,$item->donacion_detalle_alimento_id);
*/
                        $detalle=$modeldetallealimentos->getDetalleAlimentoById($item->detalle_alimento_id); 
                        $stock=($detalle->stock)+($item->cantidad);  //agrego la cantidad pedida
                        $modeldetallealimentos->updateStockDetalleAlimento($stock,$item->detalle_alimento_id); 
                        //AGREGAR EN LA TABLA DE donaciones_detalle_alimentos los alimentos donados
                     }


                    //borrar todos los items para la donacion
                    $modelPedidos->deleteItemsDePedido($_POST['id']); 
            
                    //Creo el json con los datos obtenidos de la insercion
                    $detalles = json_decode(json_encode($_POST['detalle']),false);                  
                    
                    foreach ($detalles as $det) {
                        $donacion= $modeldonaciones->getItemDonado(intval($det->id_detalle));
                        $detalle=$modeldetallealimentos->getDetalleAlimentoById($donacion->detalle_alimento_id); 
                        $stock=($detalle->stock)+intval($det->cantidad);  //Decremento la cantidad donada para esa donacion
                        $modeldetallealimentos->updateStockDetalleAlimento($stock,intval($detalle->id)); 

                        $donacion= $modeldonaciones->getItemDonado(intval($det->id_detalle));
                        $stock=($donacion->cantidad)-(intval($det->cantidad)); //decremento el stock de los alimentos donados
                        $modeldonaciones->updateStockItemDonacion($stock,intval($det->id_detalle));
                        //AGREGAR EN LA TABLA DE pedidos_detalle_alimento los alimentos pedidos
                        $modelPedidos->insertAlimentoPedido($pedido->numero,intval($det->id_detalle),intval($det->cantidad));   
                     }                 

                    $mensaje=' Se agregaron los alimentos Exitosamente'; 
                    $pedidos = $modelPedidos->getPedidosModelo();
                    echo $template->render(array('mensajeConfirmacion'=>$mensaje,'mensajeTipo'=>'SUCCESS','nombre'=>$usuario,'rol'=>$rol, 'pedidos'=>$pedidos));

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
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'ABM_ITEMS_PEDIDOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

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