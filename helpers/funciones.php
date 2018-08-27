<?php
    
    class Funciones
    {
     public function validarAcceso($idUsu,$accion) 
     {
        require (__DIR__ . '/../config/connection.php');  
        require_once (__DIR__ . '/../models/usuario.php');

        $modelUusuario = new Usuario;
        $usuario=$modelUusuario->getUsuarioByIdAccion($idUsu,$accion);

        $cn = null;
        return $usuario;
     }

    public function validar($params){  
        $result=true;
        while(($result)&&(list ($key, $val) = each($params))){
            if(($val =='')or($val==null)){
                $result=false;
            }
        }
        return $result;     
     }


     public function sanitizar($dato){  
        $dato=strip_tags($dato);
        return $dato;     
     }


    public function dias_transcurridos($fecha)
    {      
        $dias = (strtotime($fecha)-strtotime(Date('y-m-d')))/86400;
        $dias = floor($dias);  
    
        return $dias;
    }


     public function obtenerClima($latitud, $longitud, $dias){     
        $weather= array();      
        try {
            $html = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?lat=".$latitud."&lon=".$longitud."&cnt=".$dias."&mode=json&lang=sp&units=metric");
        }
        catch (Exception $e) {
            $weather['error']= "Error ".$e;
            return $weather;
        }
        $json = json_decode($html);

        $dias--; 
        
        $weather['ciudad']= $json->city->name;
        $weather['temp'] = $json->list[$dias]->temp->day;
        $weather['tempMax'] = $json->list[$dias]->temp->max;
        $weather['tempMin'] = $json->list[$dias]->temp->min;
        $weather['presion'] = $json->list[$dias]->pressure;
        $weather['humedad'] = $json->list[$dias]->humidity;
        $weather['descripcion'] = $json->list[$dias]->weather[0]->description;
        $weather['url'] = "http://openweathermap.org/img/w/".$json->list[$dias]->weather[0]->icon.".png";

        return $weather;
        
    }


    }

