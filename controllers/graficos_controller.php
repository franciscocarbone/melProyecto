<?php 

 class GraficoController
 {


    public function ver()
    { 
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        session_start();
        if(isset($_SESSION['usuario'])){ //si esta iniciada la sesion

            $usuario = $_SESSION['usuario'];
            $rol = $_SESSION['rol'];

            $funciones = new Funciones();
            $acceso = $funciones->validarAcceso($_SESSION['idu'],'VER_GRAFICOS'); //VALIDO EL ACCESO PARA EL USUARIO Y LA ACCION

            if($acceso){ //SI TIENE PERMISO PARA ESTE ACCION

                $template = $twig->loadTemplate('graficos.twig.html');
                echo $template->render(array('nombre'=>$usuario,'rol'=>$rol));
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

    public function alimentos_vencidos(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/donacion.php');
        require_once (__DIR__ . '/../helpers/funciones.php');
    
        //levanto las donaciones vencidas
        $modeldonaciones = new Donacion(); 
        $alimentos = $modeldonaciones->getAlimentosVencidos(Date('y-m-d'));

        $template = $twig->loadTemplate('_alimentos_vencidos.twig.html');

        echo $template->render(array('alimentos'=>$alimentos));       
     }

    //-------------------GRAFICO DE BARRA ------------------------

     public function pedidos_entregados(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/pedido.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        $funciones = new Funciones();
        $params=ARRAY($_GET['desde'],$_GET['hasta']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
        if($funciones->validar($params)){

            //levanto el total de kilos por pedido entre fechas
            $modelPedidos = new Pedido(); 
            $alimentos = $modelPedidos->getPedidosEntregadosEntreFechas($_GET['desde'],$_GET['hasta']);

            $template = $twig->loadTemplate('_pedidos_entregados.twig.html');

            echo $template->render(array('alimentos'=>$alimentos));
        }else{
            $mensaje='Hubo un Error al intentear generar el grafico, algúnos campos estaban vacíos';
            echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));
        }       
     }

     public function pedidos_entregados_grafico(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/pedido.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        $funciones = new Funciones();
        $params=ARRAY($_GET['desde'],$_GET['hasta']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
        if($funciones->validar($params)){
            
            //levanto el total de kilos por pedido entre fechas
            $modelPedidos = new Pedido(); 
            $alimentos = $modelPedidos->getPedidosEntregadosEntreFechas($_GET['desde'],$_GET['hasta']);


            $rows =array();

            foreach ($alimentos as $valor) {
                $row[0] = $valor->numero; 
                $row[1] = $valor->total;
                array_push($rows,$row);
            }

             echo json_encode($rows, JSON_NUMERIC_CHECK);

        }       
    }

    //-------------------GRAFICO DE TORTA ------------------------

     public function alimentos_entregados(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/pedido.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        $funciones = new Funciones();
        $params=ARRAY($_GET['desde'],$_GET['hasta']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
        if($funciones->validar($params)){
            
            //levanto el total de kilos por pedido entre fechas
            $modelPedidos = new Pedido(); 
            $alimentos = $modelPedidos->getAlimentosEntregadosEntreFechas($_GET['desde'],$_GET['hasta']);

            $template = $twig->loadTemplate('_alimentos_entregados.twig.html');

            echo $template->render(array('alimentos'=>$alimentos));
        }else{
            $mensaje='Hubo un Error al intentear generar el grafico, algúnos campos estaban vacíos';
            echo $template->render(array('mensajeError'=>$mensaje,'mensajeTipo'=>'ERROR','nombre'=>$usuario,'rol'=>$rol, 'entidades'=>$entidades));
        }       
    }


    public function alimentos_entregados_grafico(){
        require_once (__DIR__ . '/../config/config_twig.php');
        require_once (__DIR__ . '/../models/pedido.php');
        require_once (__DIR__ . '/../helpers/funciones.php');

        $funciones = new Funciones();
        $params=ARRAY($_GET['desde'],$_GET['hasta']); //VALIDO EN EL SERVIDOR QUE LOS DATOS NO SEAN NULOS NI BLANCOS   
        if($funciones->validar($params)){
            
            //levanto el total de kilos por pedido entre fechas
            $modelPedidos = new Pedido(); 
            $alimentos = $modelPedidos->getAlimentosEntregadosEntreFechasGrafico($_GET['desde'],$_GET['hasta']);

            $rows =array();

            foreach ($alimentos as $valor) {
                $row[0] = $valor['razon_social']; 
                $row[1] = $valor['total'];
                array_push($rows,$row);
            }

             echo json_encode($rows, JSON_NUMERIC_CHECK);

        }       
    }


     


 }
