<?php

 class Entidad
 {
    public function getEstados()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM estado_entidad");
        $query->execute();

        while ($estado = $query->fetchObject()) {
           $estados[]=$estado;
        }

        $cn = null;
        return $estados;
     }

     public function getNecesidades()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM necesidad_entidad");
        $query->execute();

        while ($necesidad = $query->fetchObject()) {
           $necesidades[]=$necesidad;
        }
  
        $cn = null;
        return $necesidades;
     }

     public function getServiciosPrestados()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM servicio_prestado");
        $query->execute();

        while ($servicio = $query->fetchObject()) {
           $servicios[]=$servicio;
        }
    
        $cn=null;
        return $servicios;
    }

  public function getEntidades()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT er.id,er.razon_social,er.telefono,er.domicilio,e.descripcion AS est_descripcion,
                    er.estado_entidad_id, n.descripcion AS nec_descripcion, er.servicio_prestado_id, s.descripcion AS serv_descripcion 
                    FROM entidad_receptora er 
                    INNER JOIN estado_entidad e ON er.estado_entidad_id=e.id
                    INNER JOIN necesidad_entidad n ON er.necesidad_entidad_id=n.id
                    INNER JOIN servicio_prestado s ON er.servicio_prestado_id=s.id
                    ORDER BY razon_social");
        $query->execute();

        while ($entidad = $query->fetchObject()) {
           $entidades[]=$entidad;
        }

     
        $cn = null;
        return $entidades;
     }


  public function getResumen()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT er.id,er.razon_social,er.telefono,er.domicilio
                    FROM entidad_receptora er");
        $query->execute();

        while ($entidad = $query->fetchObject()) {
           $entidades[]=$entidad;
        }

     
        $cn = null;
        return $entidades;
     }

     public function getEntidadById($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM entidad_receptora WHERE id=?");
        $query->execute(array($id));

        $entidad=($query->fetchObject());
         
        $cn = null;
        return $entidad;
     }


     public function insertEntidad($rs,$tel,$dom,$est,$nec,$serv,$lat,$long)
     {       
        require (__DIR__ . '/../config/connection.php'); 


        $query = $cn->prepare("INSERT INTO entidad_receptora (razon_social, telefono,domicilio,
            estado_entidad_id,necesidad_entidad_id,servicio_prestado_id,latitud,longitud)
        VALUES (:razon_social, :telefono, :domicilio, :estado_entidad_id, :necesidad_entidad_id, 
            :servicio_prestado_id, :latitud, :longitud)");
        $query->bindParam(':razon_social', $rs);
        $query->bindParam(':telefono', $tel);
        $query->bindParam(':domicilio', $dom);
        $query->bindParam(':estado_entidad_id', $est);
        $query->bindParam(':necesidad_entidad_id', $nec);
        $query->bindParam(':servicio_prestado_id', $serv);
        $query->bindParam(':latitud', $lat);
        $query->bindParam(':longitud', $long);
       
        $query->execute();
  
        $cn = null;
     }

     public function editEntidad($rs,$tel,$dom,$est,$nec,$serv,$lat,$long,$id)
     {       
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE entidad_receptora SET razon_social=?, telefono=?,domicilio=?,
                                estado_entidad_id=?,necesidad_entidad_id=?,servicio_prestado_id=?,latitud=?,longitud=? WHERE id=?");
        $query->execute(array($rs,$tel,$dom,$est,$nec,$serv,$lat,$long,$id));

        $cn = null;
     }



       public function deleteEntidad($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM entidad_receptora WHERE id=? ");
        $query->execute(array($id));

        $cn = null;
     }




 }
