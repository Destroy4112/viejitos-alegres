<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>| ViejitosAlegres </title>
    <!-- Custom CSS -->
    <link rel="shortcut icon" href="<?= base_url(); ?>Assets/images/icono.png" type="image/x-icon">
    <link href="<?= base_url(); ?>Assets/dist/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>Assets/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>Assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">

            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?= base_url(); ?>Assets/images/icono.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?= base_url(); ?>Assets/images/icono.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?= base_url(); ?>Assets/images/logo-texto.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="<?= base_url(); ?>Assets/images/logo-texto.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                            <?php
                            date_default_timezone_set('America/Bogota');
                            $hora = date("H:i");
                            if ($hora < '12:00 ') {
                                echo 'Buenas Dias';
                            } elseif ($hora < '18:00') {
                                echo 'Buenos Tardes';
                            } else {
                                echo 'Buenas Noches';
                            }
                            ?>
                        </h3>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url(); ?>Assets/images/user.png" alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span class="text-dark"><?= $_SESSION['Nombre'] ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    Mi Perfil</a>
                                <button url="<?= base_url() ?>Usuarios/CerrarSesion" class="dropdown-item btnCerrarSesion"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Cerrar Sesión</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url() ?>Principal/home" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Inicio</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Opciones</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url() ?>Beneficiarios/Agregar" aria-expanded="false"><i data-feather="user-plus" class="feather-icon"></i><span class="hide-menu">Agregar Beneficiario
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url() ?>Beneficiarios/Listar" aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span class="hide-menu">Ver Beneficiarios</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url() ?>Beneficiarios/Reporte" aria-expanded="false"><i data-feather="clipboard" class="feather-icon"></i><span class="hide-menu">Reporte</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url() ?>Inactivos/Listar" aria-expanded="false"><i data-feather="user-minus" class="feather-icon"></i><span class="hide-menu">Inactivos</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">