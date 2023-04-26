<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ViejitosAlegres </title>
    <link href="<?php base_url(); ?>Assets/dist/css/style.css" rel="stylesheet">
    <link href="<?php base_url(); ?>Assets/dist/css/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background-color: #f9fbff;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="display: grid; place-content: center; background-color: #fff;">
                    <img src="<?= base_url(); ?>assets/images/logo2.png" style="width: 450px;" alt="wrapkit">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?= base_url(); ?>Assets/images/icono.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Iniciar Sesión</h2>

                        <form class="mt-4" action="<?= base_url() ?>Usuarios/IniciarSesion" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Usuario</label>
                                        <input class="form-control" id="uname" type="text" placeholder="Ingrese su usuario" name="usuario_log">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Contraseña</label>
                                        <input class="form-control" id="pwd" type="password" placeholder="Ingrese su contraseña" name="clave_log">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark" name="mandar">Iniciar Sesión</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    No tienes cuenta? <a href="#" class="text-danger">Registrate</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['msg'])) {
        $alert = $_GET['msg'];
        
        if ($alert == 'invalido') { ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "No se pudo completar",
                    text: "Usuario o clave incorrectos",
                    timer: 1700,
                    showConfirmButton: false
                }).then(() => {
                    window.location.replace('<?php echo base_url() ?>');
                });
            </script>
    <?php
        }
    }
    pie();
    ?>

</body>

</html>