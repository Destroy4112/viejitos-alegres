<?php

class UsuariosModel
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    public function IniciarSesionMdl($user, $clave)
    {
        $clave = Conexion::encryption($clave);
        $sql = $this->conexion->prepare("SELECT * FROM usuarios WHERE Usuario = :User AND Clave = :Clave LIMIT 1");
        $sql->bindParam(':User', $user);
        $sql->bindParam(':Clave', $clave);
        $sql->execute();
        return $sql->fetch();
    }
}
