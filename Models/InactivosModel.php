<?php

class InactivosModel
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    public function consultarInactivos()
    {
        $stament = $this->conexion->prepare("SELECT * FROM inactivos");
        $stament->execute();
        return $stament->fetchAll();
    }
}
