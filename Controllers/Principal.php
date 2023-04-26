<?php

class Principal extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['estado'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    
    public function Home()
    {
        $this->views->getView($this, 'principal');
    }
}