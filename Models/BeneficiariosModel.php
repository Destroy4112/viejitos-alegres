<?php

class BeneficiariosModel
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    public function consultarEps()
    {
        $stament = $this->conexion->prepare("SELECT * FROM eps");
        $stament->execute();
        return $stament->fetchAll();
    }

    public function consultarSedes()
    {
        $stament = $this->conexion->prepare("SELECT * FROM sede");
        $stament->execute();
        return $stament->fetchAll();
    }

    public function consultarEstados()
    {
        $stament = $this->conexion->prepare("SELECT * FROM estadovul");
        $stament->execute();
        return $stament->fetchAll();
    }

    public function insertarBeneficiario($datos)
    {
        $busqueda = $this->conexion->prepare("SELECT * FROM beneficiarios WHERE cedula = :Cedula limit 1");
        $busqueda->bindParam(":Cedula", $datos['Cedula']);
        $data = ($busqueda->execute()) ? $busqueda->fetch() : false;

        if ($data == false) {
            $consulta = $this->conexion->prepare("INSERT INTO beneficiarios (nombres,apellidos,cedula,fechaNa,fechaExp,direccion,barrio,telefono,puntajeSis,edad,sede,estadoVuln,eps,observaciones)
            VALUES(:Nombres,:Apellidos,:Cedula,:FechaNa,:FechaExp,:Direccion,:Barrio,:Telefono,:Sisben,:Edad,:Sede,:EstadoVuln,:Eps,:Observaciones)");
            $consulta->bindParam(":Nombres", $datos['Nombres']);
            $consulta->bindParam(":Apellidos", $datos['Apellidos']);
            $consulta->bindParam(":Cedula", $datos['Cedula']);
            $consulta->bindParam(":FechaNa", $datos['FechaNa']);
            $consulta->bindParam(":FechaExp", $datos['FechaExp']);
            $consulta->bindParam(":Direccion", $datos['Direccion']);
            $consulta->bindParam(":Barrio", $datos['Barrio']);
            $consulta->bindParam(":Telefono", $datos['Telefono']);
            $consulta->bindParam(":Sisben", $datos['Sisben']);
            $consulta->bindParam(":Edad", $datos['Edad']);
            $consulta->bindParam(":Sede", $datos['Sede']);
            $consulta->bindParam(":EstadoVuln", $datos['EstadoVuln']);
            $consulta->bindParam(":Eps", $datos['Eps']);
            $consulta->bindParam(":Observaciones", $datos['Observaciones']);
            return ($consulta->execute()) ? "registrado" : false;
        } else {
            return "existe";
        }
    }

    public function consultarBeneficiarios()
    {
        $stament = $this->conexion->prepare("SELECT * FROM beneficiarios");
        $stament->execute();
        return $stament->fetchAll();
    }

    public function buscarBeneficiarios($id)
    {
        $id = Conexion::decryption($id);
        $stament = $this->conexion->prepare("SELECT * FROM beneficiarios where Id = :id limit 1");
        $stament->bindParam(":id", $id);
        $stament->execute();
        return $stament->fetch();
    }

    public function actualizarBeneficiario($datos)
    {
        $busqueda = $this->conexion->prepare("SELECT * FROM beneficiarios WHERE cedula = :Cedula limit 1");
        $busqueda->bindParam(":Cedula", $datos['Cedula']);
        $data = ($busqueda->execute()) ? $busqueda->fetch() : false;

        if ($data == false || $data['Id'] == $datos['Id']) {
            $consulta = $this->conexion->prepare("UPDATE beneficiarios SET nombres= :Nombres, apellidos=:Apellidos,
            cedula=:Cedula,fechaNa=:FechaNa,fechaExp=:FechaExp,direccion=:Direccion,barrio=:Barrio,telefono=:Telefono, 
            puntajeSis=:Sisben,edad=:Edad,sede=:Sede,estadoVuln=:EstadoVuln,eps=:Eps,observaciones=:Observaciones,estado=1 WHERE Id=:id");
            $consulta->bindParam(":Nombres", $datos['Nombres']);
            $consulta->bindParam(":Apellidos", $datos['Apellidos']);
            $consulta->bindParam(":Cedula", $datos['Cedula']);
            $consulta->bindParam(":FechaNa", $datos['FechaNa']);
            $consulta->bindParam(":FechaExp", $datos['FechaExp']);
            $consulta->bindParam(":Direccion", $datos['Direccion']);
            $consulta->bindParam(":Barrio", $datos['Barrio']);
            $consulta->bindParam(":Telefono", $datos['Telefono']);
            $consulta->bindParam(":Sisben", $datos['Sisben']);
            $consulta->bindParam(":Edad", $datos['Edad']);
            $consulta->bindParam(":Sede", $datos['Sede']);
            $consulta->bindParam(":EstadoVuln", $datos['EstadoVuln']);
            $consulta->bindParam(":Eps", $datos['Eps']);
            $consulta->bindParam(":Observaciones", $datos['Observaciones']);
            $consulta->bindParam(":id", $datos['Id']);
            return ($consulta->execute()) ? "ok" : false;
        } else {
            return "existe";
        }
    }

    public function eliminarBeneficiario($id)
    {
        $consulta = $this->conexion->prepare("DELETE FROM beneficiarios WHERE Id = :id");
        $consulta->bindParam(":id", $id);
        $resultado = $consulta->execute();

        if ($resultado) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function inactivarBeneficiario($datos)
    {
        $activo = $this->buscarBeneficiarios($datos['Id']);

        $consulta = $this->conexion->prepare("INSERT INTO inactivos (nombres,apellidos,cedula,fechaNa,fechaExp,
        direccion,barrio,telefono,puntajeSis,edad,sede,estadoVuln,eps,observaciones)
        VALUES(:Nombres,:Apellidos,:Cedula,:FechaNa,:FechaExp,:Direccion,:Barrio,:Telefono,:Sisben,:Edad,:Sede,
        :EstadoVuln,:Eps,:Observaciones)");
        $consulta->bindParam(":Nombres", $activo[1]);
        $consulta->bindParam(":Apellidos", $activo[2]);
        $consulta->bindParam(":Cedula", $activo[3]);
        $consulta->bindParam(":FechaNa", $activo[4]);
        $consulta->bindParam(":FechaExp", $activo[5]);
        $consulta->bindParam(":Direccion", $activo[6]);
        $consulta->bindParam(":Barrio", $activo[7]);
        $consulta->bindParam(":Telefono", $activo[8]);
        $consulta->bindParam(":Sisben", $activo[9]);
        $consulta->bindParam(":Edad", $activo[10]);
        $consulta->bindParam(":Sede", $activo[11]);
        $consulta->bindParam(":EstadoVuln", $activo[12]);
        $consulta->bindParam(":Eps", $activo[13]);
        $consulta->bindParam(":Observaciones", $activo[14]);
        $consulta->execute();

        $busqueda = $this->conexion->prepare("SELECT * FROM beneficiarios WHERE cedula = :Cedula limit 1");
        $busqueda->bindParam(":Cedula", $datos['Cedula']);
        $data = ($busqueda->execute()) ? $busqueda->fetch() : false;

        if ($data == false) {
            $ID = Conexion::decryption($datos['Id']);
            $stmt = $this->conexion->prepare("UPDATE beneficiarios SET nombres= :Nombres, apellidos=:Apellidos,
            cedula=:Cedula,fechaNa=:FechaNa,fechaExp=:FechaExp,direccion=:Direccion,barrio=:Barrio,telefono=:Telefono, 
            puntajeSis=:Sisben,edad=:Edad,sede=:Sede,estadoVuln=:EstadoVuln,eps=:Eps,observaciones=:Observaciones,estado=1 WHERE Id=:id");
            $stmt->bindParam(":Nombres", $datos['Nombres']);
            $stmt->bindParam(":Apellidos", $datos['Apellidos']);
            $stmt->bindParam(":Cedula", $datos['Cedula']);
            $stmt->bindParam(":FechaNa", $datos['FechaNa']);
            $stmt->bindParam(":FechaExp", $datos['FechaExp']);
            $stmt->bindParam(":Direccion", $datos['Direccion']);
            $stmt->bindParam(":Barrio", $datos['Barrio']);
            $stmt->bindParam(":Telefono", $datos['Telefono']);
            $stmt->bindParam(":Sisben", $datos['Sisben']);
            $stmt->bindParam(":Edad", $datos['Edad']);
            $stmt->bindParam(":Sede", $datos['Sede']);
            $stmt->bindParam(":EstadoVuln", $datos['EstadoVuln']);
            $stmt->bindParam(":Eps", $datos['Eps']);
            $stmt->bindParam(":Observaciones", $datos['Observaciones']);
            $stmt->bindParam(":id", $ID);
            return ($stmt->execute()) ? "ok" : false;
        } else {
            return "existe";
        }
    }

    public function generarReporte($sede)
    {
        $stament = $this->conexion->prepare("SELECT * FROM beneficiarios where sede = :SEDE");
        $stament->bindParam(":SEDE", $sede);
        $stament->execute();
        return $stament->fetchAll();
    }
}
