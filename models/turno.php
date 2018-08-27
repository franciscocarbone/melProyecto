<?php

 class Turno
 {

    public function getTurnos()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM turno_entrega ORDER BY fecha, hora");
        $query->execute(array());

        while ($turno=$query->fetchObject()) {
           $turnos[]=$turno;    
        }

        $cn = null;
        return $turnos;
    }


    public function getFechasTurnos()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM turno_entrega 
                                GROUP BY fecha 
                                ORDER BY fecha");
        $query->execute(array());

        while ($turno=$query->fetchObject()) {
           $turnos[]=$turno;    
        }

        $cn = null;
        return $turnos;
    }

   
   
 }