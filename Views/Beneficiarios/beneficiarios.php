<?php
encabezado()
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Beneficiarios</h4><br>
                <div class="table-responsive">

                    <table id="zero_config" class="table table-striped table-bordered no-wrap tablaJs">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cedula</th>
                                <th>Nacimiento</th>
                                <th>Expedicion</th>
                                <th>Direccion</th>
                                <th>Barrio</th>
                                <th>Telefono</th>
                                <th>SISBEN</th>
                                <th>Edad</th>
                                <th>Sede</th>
                                <th>Estado</th>
                                <th>Eps</th>
                                <th>Observaciones</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $i => $valor) { ?>
                                <tr>
                                    <td> <?php echo ($i + 1); ?> </td>
                                    <td> <?php echo $valor["nombres"]; ?> </td>
                                    <td> <?php echo $valor["apellidos"]; ?> </td>
                                    <td> <?php echo $valor["cedula"]; ?> </td>
                                    <td> <?php echo $valor["fechaNa"]; ?> </td>
                                    <td> <?php echo $valor["fechaExp"]; ?> </td>
                                    <td> <?php echo $valor["direccion"]; ?> </td>
                                    <td> <?php echo $valor["barrio"]; ?> </td>
                                    <td> <?php echo $valor["telefono"]; ?> </td>
                                    <td> <?php echo $valor["puntajeSis"]; ?> </td>
                                    <td> <?php echo $valor["edad"]; ?> </td>
                                    <td> <?php echo $valor["sede"]; ?> </td>
                                    <td> <?php echo $valor["estadoVuln"]; ?> </td>
                                    <td> <?php echo $valor["eps"]; ?> </td>
                                    <td> <?php echo $valor["observaciones"]; ?> </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>Beneficiarios/Editar?key=<?= Conexion::encryption($valor["Id"]) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger center-block btnEliminarBeneficiario" idBeneficiario="<?= $valor["Id"] ?>"><i class="fa fa-trash"></i></button>
                                            <button class="btn btn-warning btnInactivar" idBeneficiario="<?= $valor["Id"] ?>"><i class="fa fa-ban"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['msg'])) {
    $alert = $_GET['msg'];

    if ($alert == 'actualizado') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho!',
                text: 'Beneficiario actualizado correctamente',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Listar');
            });
        </script>
    <?php } elseif ($alert == 'registrado') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho!',
                text: 'Beneficiario creado correctamente',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Listar');
            });
        </script>
    <?php } elseif ($alert == 'eliminado') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho!',
                text: 'Beneficiario eliminado correctamente',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Listar');
            });
        </script>
    <?php } elseif ($alert == 'inactivado') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho!',
                text: 'Beneficiario reemplazado correctamente',
                showConfirmButton: false,
                timer: 1700
            }).then(() => {
                window.location.replace('<?php echo base_url() ?>Beneficiarios/Listar');
            });
        </script>
<?php
    }
}

pie();
?>