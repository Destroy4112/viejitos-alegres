<?php

class Errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function error404()
    {
        $this->views->getView($this, 'error');
    }
}

$err = new Errors();
$err->error404();
