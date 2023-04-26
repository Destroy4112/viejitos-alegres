<?php
encabezado();
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Inactivos</h4><br>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
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
pie()
?>