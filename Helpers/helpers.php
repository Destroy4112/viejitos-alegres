<?php

function base_url()
{
    return BASE_URL;
}
function encabezado($data = "")
{
    $VistaH = "Views/Templates/head.php";
    require_once($VistaH);
}
function pie($data = "")
{
    $VistaP = "Views/Templates/footer.php";
    require_once($VistaP);
}
