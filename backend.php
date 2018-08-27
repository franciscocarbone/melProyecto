<?php 	
 // /backend.php
 // carga de los controladores

 require_once __DIR__ . '/controllers/backend_controller.php';
 require_once __DIR__ . '/controllers/alimentos_controller.php';
 require_once __DIR__ . '/controllers/detalle_alimentos_controller.php';
 require_once __DIR__ . '/controllers/donantes_controller.php';
 require_once __DIR__ . '/controllers/entidades_controller.php';
 require_once __DIR__ . '/controllers/usuarios_controller.php';
 require_once __DIR__ . '/controllers/donaciones_controller.php';
 require_once __DIR__ . '/controllers/configuracion_controller.php';
 require_once __DIR__ . '/controllers/pedidos_controller.php';
 require_once __DIR__ . '/controllers/entregas_directas_controller.php';
 require_once __DIR__ . '/controllers/graficos_controller.php';
 require_once __DIR__ . '/controllers/envios_controller.php';

 
 // enrutamiento
 $map = array(
        //BACKEND
     'login' => array('controller' =>'BackendController', 'action' =>'login'),
     'inicio' => array('controller' =>'BackendController', 'action' =>'inicio'),
     'logout' => array('controller' =>'BackendController', 'action' =>'logout'),
        //ALIMENTOS
     'listar_alimentos' => array('controller' =>'AlimentoController', 'action' =>'listar'),
     'ver_alimentos' => array('controller' =>'AlimentoController', 'action' =>'ver'),  
     'alta_alimento' => array('controller' =>'AlimentoController', 'action' =>'alta'),
     'insert_alimento' => array('controller' =>'AlimentoController', 'action' =>'insert'),
     'editar_alimento' => array('controller' =>'AlimentoController', 'action' =>'editar'),
     'update_alimento' => array('controller' =>'AlimentoController', 'action' =>'edit'),
     'eliminar_alimento' => array('controller' =>'AlimentoController', 'action' =>'eliminar'),
       //DETALLE ALIMENTOS
     'listar_detalle_alimentos' => array('controller' =>'DetalleAlimentoController', 'action' =>'listar'),
     'ver_stock_alimentos' => array('controller' =>'DetalleAlimentoController', 'action' =>'ver'),  
     'alta_detalle_alimento' => array('controller' =>'DetalleAlimentoController', 'action' =>'alta'),
     'insert_detalle_alimento' => array('controller' =>'DetalleAlimentoController', 'action' =>'insert'),
     'editar_detalle_alimento' => array('controller' =>'DetalleAlimentoController', 'action' =>'editar'),
     'update_detalle_alimento' => array('controller' =>'DetalleAlimentoController', 'action' =>'edit'),
     'eliminar_detalle_alimento' => array('controller' =>'DetalleAlimentoController', 'action' =>'eliminar'),  
     'cargar_detalles' => array('controller' =>'DetalleAlimentoController', 'action' =>'recuperarDetallesXAlimento'),
        //DONANTES
     'listar_donantes' => array('controller' =>'DonanteController', 'action' =>'listar'),
     'ver_donantes' => array('controller' =>'DonanteController', 'action' =>'ver'),
     'alta_donante' => array('controller' =>'DonanteController', 'action' =>'alta'),
     'insert_donante' => array('controller' =>'DonanteController', 'action' =>'insert'),
     'editar_donante' => array('controller' =>'DonanteController', 'action' =>'editar'),
     'update_donante' => array('controller' =>'DonanteController', 'action' =>'edit'),
     'eliminar_donante' => array('controller' =>'DonanteController', 'action' =>'eliminar'),
        //ENTIDADES
     'listar_entidades' => array('controller' =>'EntidadController', 'action' =>'listar'),
     'ver_entidades' => array('controller' =>'EntidadController', 'action' =>'ver'),
     'alta_entidad' => array('controller' =>'EntidadController', 'action' =>'alta'),     
     'insert_entidad' => array('controller' =>'EntidadController', 'action' =>'insert'),
     'editar_entidad' => array('controller' =>'EntidadController', 'action' =>'editar'),
     'update_entidad' => array('controller' =>'EntidadController', 'action' =>'edit'),
     'eliminar_entidad' => array('controller' =>'EntidadController', 'action' =>'eliminar'),
         //USUARIOS
     'listar_usuarios' => array('controller' =>'UsuarioController', 'action' =>'listar'),
     'ver_usuarios' => array('controller' =>'UsuarioController', 'action' =>'ver'),
     'alta_usuario' => array('controller' =>'UsuarioController', 'action' =>'alta'),     
     'insert_usuario' => array('controller' =>'UsuarioController', 'action' =>'insert'),
     'editar_usuario' => array('controller' =>'UsuarioController', 'action' =>'editar'),
     'update_usuario' => array('controller' =>'UsuarioController', 'action' =>'edit'),
     'eliminar_usuario' => array('controller' =>'UsuarioController', 'action' =>'eliminar'),
         //DONACIONES
     'listar_donaciones' => array('controller' =>'DonacionController', 'action' =>'listar'),
     'ver_donaciones' => array('controller' =>'DonacionController', 'action' =>'ver'),
     'alta_donacion' => array('controller' =>'DonacionController', 'action' =>'alta'),     
     'insert_donacion' => array('controller' =>'DonacionController', 'action' =>'insert'),   
     'editar_donacion' => array('controller' =>'DonacionController', 'action' =>'editar'),
     'update_donacion' => array('controller' =>'DonacionController', 'action' =>'edit'),
     'eliminar_donacion' => array('controller' =>'DonacionController', 'action' =>'eliminar'),
     'cargar_detalles_donacion' => array('controller' =>'DonacionController', 'action' =>'recuperarDetallesXAlimentoDonaciones'),   
        //ALIMENTOS DONACION
     'agregar_detalles_donacion' => array('controller' =>'DonacionController', 'action' =>'altaEditarAlimentosDonacion'),
     'insert_detalles_donacion' => array('controller' =>'DonacionController', 'action' =>'insertUpdateAlimentosDonacion'),
        //CONFIGURACIONES
     'editar_configuracion' => array('controller' =>'ConfiguracionController', 'action' =>'editar'),
     'update_configuracion' => array('controller' =>'ConfiguracionController', 'action' =>'edit'),     
        //TURNO
     'agregar_turno' => array('controller' =>'PedidoController', 'action' =>'alta_turno'),
     'insert_turno' => array('controller' =>'PedidoController', 'action' =>'insert_turno'),
        //PEDIDOS
     'listar_pedidos' => array('controller' =>'PedidoController', 'action' =>'listar'),
     'ver_pedidos' => array('controller' =>'PedidoController', 'action' =>'ver'),
     'alta_pedido' => array('controller' =>'PedidoController', 'action' =>'alta'),     
     'insert_pedido' => array('controller' =>'PedidoController', 'action' =>'insert'),
     'editar_pedido' => array('controller' =>'PedidoController', 'action' =>'editar'),
     'update_pedido' => array('controller' =>'PedidoController', 'action' =>'edit'),
     'eliminar_pedido' => array('controller' =>'PedidoController', 'action' =>'eliminar'),
        //ALIMENTOS PEDIDO
     'agregar_detalles_pedido' => array('controller' =>'PedidoController', 'action' =>'altaEditarAlimentosPedido'),
     'insert_detalles_pedido' => array('controller' =>'PedidoController', 'action' =>'insertUpdateAlimentosPedido'),
        //ENTREGAS DIRECTAS
     'listar_directos' => array('controller' =>'EntregaDirectaController', 'action' =>'listar'),
     'alta_directo' => array('controller' =>'EntregaDirectaController', 'action' =>'alta'),     
     'insert_directo' => array('controller' =>'EntregaDirectaController', 'action' =>'insert'),
        //GRAFICOS PDF
     'graficos' => array('controller' =>'GraficoController', 'action' =>'ver'),
     'cargar_alimentos_vencidos' => array('controller' =>'GraficoController', 'action' =>'alimentos_vencidos'),
     
     'cargar_pedidos_entregados' => array('controller' =>'GraficoController', 'action' =>'pedidos_entregados'),
     'cargar_pedidos_entregados_grafico' => array('controller' =>'GraficoController', 'action' =>'pedidos_entregados_grafico'),

     'cargar_alimentos_entregados' => array('controller' =>'GraficoController', 'action' =>'alimentos_entregados'),
     'cargar_alimentos_entregados_grafico' => array('controller' =>'GraficoController', 'action' =>'alimentos_entregados_grafico'),
        //ENVIOS
     'editar_envio' => array('controller' =>'EnvioController', 'action' =>'editar'),
     'mostrar_envio' => array('controller' =>'EnvioController', 'action' =>'mostrarEnvio'),
     'update_envio' => array('controller' =>'EnvioController', 'action' =>'edit'),
     'ver_envios' => array('controller' =>'EnvioController', 'action' =>'envios_del_dia'),
     'cargar_envios' => array('controller' =>'EnvioController', 'action' =>'recuperarEnviosXFecha')
     
 );
    
 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
        header('Status: 404 Not Found');
        $msj= 'Error 404: No existe la ruta ' .$_GET['ctl'];
        
        return $msj;
     }
 } else {
     $ruta = 'inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

    header('Status: 404 Not Found');

    $msj= 'Error 404: El controlador ' .$controlador['controller'] .'->' .$controlador['action'] .' no existe';
        
    return $msj;
 }
