<?php
encabezado();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reemplazar al Beneficiario: <span style="color: deepskyblue;"> <?= $data['nombres'] . " " . $data['apellidos'] ?></span></h4><br>

                <form action="<?= base_url(); ?>Beneficiarios/Inactivar" method="POST">

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" value="<?= Conexion::encryption($data['Id']) ?>" name="id">
                                    <input type="text" class="form-control" placeholder="Nombres" name="nombres" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cedula" name="cedula" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="card-title">Fecha nacimiento</h6>
                                    <input type="date" class="form-control" id="fecha-nacimiento" name="fecha_na" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h6 class="card-title">Edad</h6>
                                    <input type="text" class="form-control" placeholder="Edad" id="edad" disabled>
                                    <input type="hidden" id="edad2" name="edad">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="card-title">Fecha expedicion</h6>
                                    <input type="date" class="form-control" name="fecha_expe" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Barrio" name="barrio" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Puntaje SISBEN" name="sisben" required>
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
                                        <?php
                                        foreach ($data2 as $i) { ?> ?>
                                            <option value="<?php echo $i[1]  ?>"> <?php echo $i[1]  ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="estado" required>
                                        <option selected Disabled>Estado de vulnerabilidad</option>
                                        <?php
                                        foreach ($data3 as $i) { ?> ?>
                                            <option value="<?php echo $i[1]  ?>"> <?php echo $i[1]  ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="eps" required>
                                        <option selected Disabled>Eps</option>
                                        <?php
                                        foreach ($data4 as $i) { ?> ?>
                                            <option value="<?php echo $i[1]  ?>"> <?php echo $i[1]  ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="observacion" name="observacion" required></textarea>
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
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Inactive?key=<?= $data[0] ?>');
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
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Inactive?key=<?= $data[0] ?>');
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
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Inactive?key=<?= $data[0] ?>');
            });
        </script>
<?php
    }
}
pie();
?>