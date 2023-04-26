<?php

class Beneficiarios extends Controller
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['estado'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    public function Agregar()
    {
        $sedes = $this->model->consultarSedes();
        $estados = $this->model->consultarEstados();
        $eps = $this->model->consultarEps();
        $this->views->getView($this, 'beneficiario-new', $sedes, $estados, $eps);
    }

    public function Listar()
    {
        $data = $this->model->consultarBeneficiarios();
        $this->views->getView($this, 'beneficiarios', $data);
    }

    public function Editar()
    {
        $id = $_GET['key'];
        $data = $this->model->buscarBeneficiarios($id);
        $sedes = $this->model->consultarSedes();
        $estados = $this->model->consultarEstados();
        $eps = $this->model->consultarEps();
        $this->views->getView($this, 'beneficiario-update', $data, $sedes, $estados, $eps);
    }

    public function Insertar()
    {
        if (isset($_POST['cedula'])) {

            if ($_POST['sede'] == "" || $_POST['estado'] == "" || $_POST['eps'] == "") {
                $alert = 'vacio';
                header("Location: " . base_url() . "Beneficiarios/Agregar?msg=$alert");
            } else {
                $datos = array(
                    'Nombres' => $_POST['nombres'],
                    'Apellidos' => $_POST['apellidos'],
                    'Cedula' => $_POST['cedula'],
                    'FechaNa' => $_POST['fecha_na'],
                    'FechaExp' => $_POST['fecha_expe'],
                    'Direccion' => $_POST['direccion'],
                    'Barrio' => $_POST['barrio'],
                    'Telefono' => $_POST['telefono'],
                    'Sisben' => $_POST['sisben'],
                    'Edad' => $_POST['edad'],
                    'Sede' => $_POST['sede'],
                    'EstadoVuln' => $_POST['estado'],
                    'Eps' => $_POST['eps'],
                    'Observaciones' => $_POST['observacion'],
                );
                $id = $this->model->insertarBeneficiario($datos);

                if ($id == "registrado") {
                    $msg = "registrado";
                    header("Location: " . base_url() . "Beneficiarios/Listar?msg=" . $msg);
                } else {
                    if ($id == "existe") {
                        $msg = "existe";
                    } else {
                        $msg = "error";
                    }
                    header("Location: " . base_url() . "Beneficiarios/Agregar?msg=$msg");
                }
            }
        }
    }

    public function Actualizar()
    {
        if (isset($_POST['cedula'])) {
            $i = $_POST['id'];
            if ($_POST['sede'] == "" || $_POST['estado'] == "" || $_POST['eps'] == "") {
                $alert = 'vacio';
                header("Location: " . base_url() . "Beneficiarios/Editar?key=" . Conexion::encryption($i) . "&msg=$alert");
            } else {
                $datos = array(
                    'Nombres' => $_POST['nombres'],
                    'Apellidos' => $_POST['apellidos'],
                    'Cedula' => $_POST['cedula'],
                    'FechaNa' => $_POST['fecha_na'],
                    'FechaExp' => $_POST['fecha_expe'],
                    'Direccion' => $_POST['direccion'],
                    'Barrio' => $_POST['barrio'],
                    'Telefono' => $_POST['telefono'],
                    'Sisben' => $_POST['sisben'],
                    'Edad' => $_POST['edad'],
                    'Sede' => $_POST['sede'],
                    'EstadoVuln' => $_POST['estado'],
                    'Eps' => $_POST['eps'],
                    'Observaciones' => $_POST['observacion'],
                    'Id' => $_POST['id']
                );

                $res = $this->model->actualizarBeneficiario($datos);
                if ($res == "ok") {
                    $msg = "actualizado";
                    header("Location: " . base_url() . "Beneficiarios/Listar?msg=" . $msg);
                } else {
                    if ($res == "existe") {
                        $msg = "existe";
                    } else {
                        $msg = "error";
                    }
                    header("Location: " . base_url() . "Beneficiarios/Editar?key=" . Conexion::encryption($i) . "&msg=$msg");
                }
            }
        }
    }

    public function Eliminar()
    {
        if (isset($_GET["key"])) {

            $datos = $_GET['key'];
            $respuesta = $this->model->eliminarBeneficiario($datos);

            if ($respuesta == "ok") {
                $msg = "eliminado";
            } else {
                $msg = "error";
            }
            header("Location: " . base_url() . "Beneficiarios/Listar?msg=" . $msg);
        }
    }

    public function Inactive()
    {
        $id = Conexion::encryption($_GET['key']);
        $data = $this->model->buscarBeneficiarios($id);
        $sedes = $this->model->consultarSedes();
        $estados = $this->model->consultarEstados();
        $eps = $this->model->consultarEps();
        $this->views->getView($this, 'beneficiario-inactive', $data, $sedes, $estados, $eps);
    }

    public function Inactivar($id)
    {
        if (isset($_POST['cedula'])) {

            if ($_POST['sede'] == "" || $_POST['estado'] == "" || $_POST['eps'] == "") {
                $alert = 'vacio';
                header("Location: " . base_url() . "Beneficiarios/Inactive?key=" . Conexion::decryption($_POST['id']) . "&msg=$alert");
            } else {
                $datos = array(
                    'Id' => $_POST['id'],
                    'Nombres' => $_POST['nombres'],
                    'Apellidos' => $_POST['apellidos'],
                    'Cedula' => $_POST['cedula'],
                    'FechaNa' => $_POST['fecha_na'],
                    'FechaExp' => $_POST['fecha_expe'],
                    'Direccion' => $_POST['direccion'],
                    'Barrio' => $_POST['barrio'],
                    'Telefono' => $_POST['telefono'],
                    'Sisben' => $_POST['sisben'],
                    'Edad' => $_POST['edad'],
                    'Sede' => $_POST['sede'],
                    'EstadoVuln' => $_POST['estado'],
                    'Eps' => $_POST['eps'],
                    'Observaciones' => $_POST['observacion']
                );

                $res = $this->model->inactivarBeneficiario($datos);

                if ($res == "ok") {
                    $msg = "inactivado";
                    header("Location: " . base_url() . "Beneficiarios/Listar?msg=" . $msg);
                } else {
                    if ($res == "existe") {
                        $msg = "existe";
                    } else {
                        $msg = "error";
                    }
                    header("Location: " . base_url() . "Beneficiarios/Inactive?key=" . Conexion::decryption($_POST['id']) . "&msg=$msg");
                }
            }
        }
    }

    public function Reporte()
    {
        $sedes = $this->model->consultarSedes();
        $this->views->getView($this, 'reporte', $sedes);
    }

    public function Reportes()
    {
        $idSede = $_POST['sede'];
        $sedes = $this->model->generarReporte($idSede);
        foreach ($sedes as $i => $valor) {
            echo "<tr>
                    <td>" . ($i + 1) . "</td>
                    <td>" . $valor["nombres"] . "</td>
                    <td>" . $valor["apellidos"] . "</td>
                    <td>" . $valor["cedula"] . "</td>
                    <td>" . $valor["fechaNa"] . "</td>
                    <td>" . $valor["fechaExp"] . "</td>
                    <td>" . $valor["direccion"] . "</td>
                    <td>" . $valor["barrio"] . "</td>
                    <td>" . $valor["telefono"] . "</td>
                    <td>" . $valor["puntajeSis"] . "</td>
                    <td>" . $valor["edad"] . "</td>
                    <td>" . $valor["sede"] . "</td>
                    <td>" . $valor["estadoVuln"] . "</td>
                    <td>" . $valor["eps"] . "</td>
                    <td>" . $valor["observaciones"] . "</td>                                
                </tr>";
        }
    }
}
