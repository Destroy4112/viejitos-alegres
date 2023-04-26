<?php
encabezado();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actualizar Beneficiario</h4><br>

                <form action="<?= base_url(); ?>Beneficiarios/Actualizar" method="POST">

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $data[0] ?>">
                                    <input type="text" name="nombres" value="<?= $data[1] ?>" class="form-control" placeholder="Nombres" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[2] ?>" placeholder="Apellidos" name="apellidos" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[3] ?>" placeholder="Cedula" name="cedula" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="card-title">Fecha nacimiento</h6>
                                    <input type="date" class="form-control" value="<?= $data[4] ?>" id="fecha-nacimiento" name="fecha_na" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h6 class="card-title">Edad</h6>
                                    <input type="text" class="form-control" value="<?= $data[10] ?>" placeholder="Edad" id="edad" disabled>
                                    <input type="hidden" id="edad2" value="<?= $data[10] ?>" name="edad">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="card-title">Fecha expedicion</h6>
                                    <input type="date" class="form-control" value="<?= $data[5] ?>" name="fecha_expe" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[6] ?>" placeholder="Direccion" name="direccion" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[7] ?>" placeholder="Barrio" name="barrio" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[8] ?>" placeholder="Telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $data[9] ?>" placeholder="Puntaje SISBEN" name="sisben" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="sede" required>
                                        <option selected Disabled>Sede</option>
                                        <?php foreach ($data2 as $k) { ?>
                                            <option value="<?php echo $k[1] ?>" <?php
                                                                                if ($data[11] == $k[1]) {
                                                                                    echo ("selected");
                                                                                } ?>>
                                                <?php echo $k[1] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="estado" required>
                                        <option selected Disabled>Estado de vulnerabilidad</option>
                                        <?php foreach ($data3 as $k) { ?>
                                            <option value="<?php echo $k[1] ?>" <?php
                                                                                if ($data[12] == $k[1]) {
                                                                                    echo ("selected");
                                                                                } ?>>
                                                <?php echo $k[1] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="eps" required>
                                        <option selected Disabled>Eps</option>
                                        <?php foreach ($data4 as $k) { ?>
                                            <option value="<?php echo $k[1] ?>" <?php
                                                                                if ($data[13] == $k[1]) {
                                                                                    echo ("selected");
                                                                                } ?>>
                                                <?php echo $k[1] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="observacion" name="observacion" required><?= $data[14] ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success" name="guardar">Guardar</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const nacimiento = document.getElementById("fecha-nacimiento");
    const edad = document.getElementById("edad");
    const edad2 = document.getElementById("edad2");

    const cargarEdad = () => {
        let fechaMilisegundo = new Date(nacimiento.value).getTime();
        let hoyMilisegundo = new Date().getTime();
        let edad = Math.floor(((hoyMilisegundo - fechaMilisegundo) / (1000 * 60 * 60 * 24)) / 365);
        return edad;
    }

    window.addEventListener('load', function() {
        nacimiento.addEventListener('change', function() {
            document.getElementById("edad").value = cargarEdad();
            edad2.value = cargarEdad();
        })
    })
</script>

<?php
if (isset($_GET['msg'])) {
    $alert = $_GET['msg'];

    if ($alert == 'vacio') { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'No completado',
                text: 'Aun faltan campos por llenar en el formulario',
                showConfirmButton: false,
                timer: 1600
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Editar?key=<?= Conexion::encryption($data[0]) ?>');
            });
        </script>
    <?php } elseif ($alert == 'error') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Algo salio mal',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Editar?key=<?= Conexion::encryption($data[0]) ?>');
            });
        </script>
    <?php } elseif ($alert == 'existe') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Ya existe un beneficiario registrado con este documeno',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Editar?key=<?= Conexion::encryption($data[0]) ?>');
            });
        </script>
<?php
    }
}
pie();
?>