<?php

 class Configuracion
 {
    
    public function getConfiguracion()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM configuraciones");
        $query->execute();

        $configuracion = $query->fetchObject();
     
        $cn = null;
        return $configuracion;
     }

    public function editConfiguracion($lat,$long,$venc,$api,$clave,$credencial,$secreto)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE configuraciones SET latitud=?, longitud=?,vencimiento_stock=?,
                                clave_api=?,clave_secreta=?,credencial_usuario=?,secreto_usuario=?");
        $query->execute(array($lat,$long,$venc,$api,$clave,$credencial,$secreto));

        $cn = null;
     }

 }