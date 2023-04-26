<?php

class Inactivos extends Controller
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['estado'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    public function Listar()
    {
        $data = $this->model->consultarInactivos();
        $this->views->getView($this, 'inactivos', $data);
    }
}
