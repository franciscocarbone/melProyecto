<?php

 class Donante
 {
    
     public function getDonantes()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM donante ORDER BY razon_social");
        $query->execute();

        while ($donante = $query->fetchObject()) {
           $donantes[]=$donante;
        }
     
        $cn = null;
        return $donantes;
     }

 public function getResumen()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT razon_social,apellido_contacto,nombre_contacto,mail_contacto
			       FROM donante ORDER BY apellido_contacto, nombre_contacto");
        $query->execute();

        while ($donante = $query->fetchObject()) {
           $donantes[]=$donante;
        }
     
        $cn = null;
        return $donantes;
     }


     public function getDonanteById($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM donante WHERE id=?");
        $query->execute(array($id));

        $donante=($query->fetchObject());
         
        $cn = null;
        return $donante;
     }


     public function insertDonante($rs,$ape,$nom,$mail,$dom,$tel)
     {        
        require (__DIR__ . '/../config/connection.php'); 


        $query = $cn->prepare("INSERT INTO donante (razon_social, apellido_contacto,nombre_contacto,
            telefono_contacto,mail_contacto,domicilio_contacto)
        VALUES (:razon_social, :apellido_contacto, :nombre_contacto, :telefono_contacto, :mail_contacto, 
            :domicilio_contacto)");
        $query->bindParam(':razon_social', $rs);
        $query->bindParam(':apellido_contacto', $ape);
        $query->bindParam(':nombre_contacto', $nom);
        $query->bindParam(':mail_contacto', $mail);
        $query->bindParam(':domicilio_contacto', $dom);
        $query->bindParam(':telefono_contacto', $tel);
       
        $query->execute();
  
        $cn = null;
     }


     public function editDonante($rs,$ape,$nom,$mail,$dom,$tel,$id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE donante SET razon_social=?, apellido_contacto=?,nombre_contacto=?,
                                mail_contacto=?,domicilio_contacto=?,telefono_contacto=? WHERE id=?");
        $query->execute(array($rs,$ape,$nom,$mail,$dom,$tel,$id));

        $cn = null;
     }


       public function deleteDonante($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM donante WHERE id=? ");
        $query->execute(array($id));

        $cn = null;
     }

    
 }
