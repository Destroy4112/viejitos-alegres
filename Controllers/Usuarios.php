<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['estado'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    public function IniciarSesion()
    {
        $usuario = $_POST['usuario_log'];
        $clave = $_POST['clave_log'];

        $data = $this->model->IniciarSesionMdl($usuario, $clave);

        if ($data != false) {
            $_SESSION['Nombre'] = $data['Nombre'];
            $_SESSION['estado'] = true;
            header("Location:" . base_url() . "Principal/home");
        } else {
            $msg = "invalido";
            header("Location:" . base_url() . "?msg=" . $msg);
        }
    }

    public function CerrarSesion()
    {
        session_destroy();
        header("Location:" . base_url());
    }
}
