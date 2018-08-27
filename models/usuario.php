<?php

 class Usuario
 {
    public function getUser($usu,$pass)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM usuarios where usuario=? and password=?");
        $query->execute(array($usu,$pass));

        $usuario=($query->fetchObject());

        $cn = null;

        return $usuario;
     }


     public function getRoles()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM roles");
        $query->execute();


        while ($rol =$query->fetchObject()){
            $roles[]=$rol;
        }

        $cn = null;

        return $roles;
     }

      public function getUsuarios()
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT  u.usuario_id,u.usuario,u.nombre,u.apellido,r.descripcion FROM usuarios u INNER JOIN roles r ON u.rol_id=r.id");
        $query->execute();

        while ($usuario = $query->fetchObject()) {
           $usuarios[]=$usuario;
        }

     
        $cn = null;
        return $usuarios;
     }

     public function getUsuarioByIdAccion($idUsu,$accion)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM usuarios u INNER JOIN roles_acciones ra ON u.rol_id=ra.id_rol
                        INNER JOIN acciones a ON a.id=ra.id_accion
                        WHERE (u.usuario_id=?) AND (a.descripcion=? OR a.descripcion='TODAS')");
        $query->execute(array($idUsu,$accion));

        $result=($query->fetchObject());

        $cn = null;
        return $result;
     }

     public function getUsuarioById($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM usuarios WHERE usuario_id=?");
        $query->execute(array($id));

        $usuario=($query->fetchObject());
         
        $cn = null;
        return $usuario;
     }

    public function getRolByUsuarioId($idUsu)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT r.descripcion FROM usuarios u INNER JOIN roles r ON u.rol_id=r.id WHERE u.usuario_id=?");
        $query->execute(array($idUsu));

        $rol=($query->fetchObject());

        $cn = null;
        return $rol;
     }

    public function getAccionesByRol($idRol)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM roles_acciones r INNER JOIN acciones a ON a.id=r.id_accion WHERE id_rol=?");
        $query->execute(array($idRol));

        while ($accion=$query->fetchObject()){
            $acciones[]=$accion;
        }

        $cn = null;

        return $acciones;
     }


    public function getAccionesByUsuario($idUsu)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("SELECT * FROM usuarios u INNER JOIN roles_acciones ra ON u.rol_id=ra.id_rol
                        INNER JOIN acciones a ON a.id=ra.id_accion
                        WHERE u.usuario_id=?");
        $query->execute(array($idUsu));

        while ($accion=$query->fetchObject()){
            $acciones[]=$accion;
        }

        $cn = null;

        return $acciones;
     }

    public function insertUsuario($nom,$ape,$usu,$pass,$rol)
     {       
        require (__DIR__ . '/../config/connection.php'); 


        $query = $cn->prepare("INSERT INTO usuarios (nombre, apellido,usuario,password,rol_id)
        VALUES (:nombre, :apellido, :usuario, :password, :rol_id)");
        $query->bindParam(':nombre', $nom);
        $query->bindParam(':apellido', $ape);
        $query->bindParam(':usuario', $usu);
        $query->bindParam(':password', $pass);
        $query->bindParam(':rol_id', $rol);
       
        $query->execute();

        $cn = null;
     }

     public function editUsuario($nom,$ape,$usu,$pass,$rol,$id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("UPDATE usuarios SET nombre=?, apellido=?,usuario=?,
                                password=?,rol_id=? WHERE usuario_id=?");
        $query->execute(array($nom,$ape,$usu,$pass,$rol,$id));

        $cn = null;
     }



       public function deleteUsuario($id)
     {        
        require (__DIR__ . '/../config/connection.php'); 

        $query = $cn->prepare("DELETE FROM usuarios WHERE usuario_id=? ");
        $query->execute(array($id));

        $cn = null;
     }


 }