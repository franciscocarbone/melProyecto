<?php

 class Alimento
 {

    public function getAlimentos()
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM alimento ORDER BY descripcion, codigo");
        $query->execute(array());


        while ($alimento=$query->fetchObject()) {
           $alimentos[]=$alimento;    
        }

        $cn = null;
        return $alimentos;
    }

    public function getAlimentoById($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM alimento WHERE id=?");
        $query->execute(array($id));

        $alimento=($query->fetchObject());
        $cn = null;
        return $alimento;
     }


    public function getAlimentoByName($name)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM alimento WHERE descripcion=?");
        $query->execute(array($name));

        $alimento=($query->fetchObject());
        $cn = null;
        return $alimento;
    }


    public function insertAlimento($cod,$nom)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("INSERT INTO alimento (codigo, descripcion)
        VALUES (:codigo, :descripcion)");
        $query->bindParam(':codigo', $cod);
        $query->bindParam(':descripcion', $nom);
     
        $query->execute();
  
        $cn = null;
    }


    public function editAlimento($cod,$nom,$id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE alimento SET codigo=?, descripcion=? WHERE id=?");
        $query->execute(array($cod,$nom,$id));

        $cn = null;
    }


    public function deleteAlimento($id)
    {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM alimento WHERE id=?");
        $query->execute(array($id));

        $cn = null;
    }
   
 }