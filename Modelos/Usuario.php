<?php
    class Usuario{
        public function InsertarUsuario( $Nombre,$Paterno,$Materno,$Correo,$Password,$Tipo){
            include '../conexion.php';
            $conectar= new Conexion();
            $consulta= $conectar->prepare("INSERT INTO usuarios (Nombre, ApellidoPaterno, ApellidoMaterno, Correo,Password,TipoUsuario)
             VALUES (:Nombre,:Paterno,:Materno,:Correo,:Password,:Tipo)");

             $consulta->bindParam(":Nombre",$Nombre,PDO::PARAM_STR);
             $consulta->bindParam(":Paterno",$Paterno,PDO::PARAM_STR);
             $consulta->bindParam(":Materno",$Materno,PDO::PARAM_STR);
             $consulta->bindParam(":Correo",$Correo,PDO::PARAM_STR);
             $consulta->bindParam(":Password",$Password,PDO::PARAM_STR);
             $consulta->bindParam(":Tipo",$Tipo,PDO::PARAM_INT);
             $consulta->execute();
             return true;
        } 
  

    public function AutentificarUsuario ($Correo,$Password){
        include '../conexion.php';
        $conectar = new Conexion();
        $consulta=$conectar->prepare("SELECT * FROM usuarios WHERE Correo=:Correo AND Password=:Password" );
        $consulta->bindParam(":Correo",$Correo,PDO::PARAM_STR);
        $consulta->bindParam(":Password",$Password,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO:: FETCH_ASSOC);
        return $consulta->fetchALL();

    }
}
  ?>