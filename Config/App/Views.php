<?php
class Views 
{
    public function getView($controlador, $vista, $data='', $data2='', $data3='', $data4='')
    {
        $controlador = get_class($controlador);
        if ($controlador == 'Home') {
            $vista = 'Views/'.$vista.'.php';
        }else{
            $vista = 'Views/'.$controlador.'/'.$vista.'.php';
        }
        require $vista;
    }
}