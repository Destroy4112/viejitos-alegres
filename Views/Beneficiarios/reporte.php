<?php
encabezado()
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reportes</h4><br>

                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Filtrar</h4>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="sede" id="select">
                                    <option selected Disabled>Sede</option>
                                    <?php
                                    foreach ($data as $k) { ?>
                                        <option value="<?php echo $k[1]  ?>"> <?php echo $k[1]  ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <button type="button" id="buton" style="height: fit-content;" class="btn btn-success" name="buscar">Buscar</button>
                    </div>
                </div>
                <br><br>

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
                            </tr>
                        </thead>
                        <tbody id="tabla">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const boton = document.querySelector('#buton');
    boton.addEventListener('click', consutar);

    function consutar(e) {
        const selectOption = document.getElementById("select");
        console.log(selectOption.value);

        var datos = {
            "sede": selectOption.value
        }

        $.ajax({
            data: datos,
            url: 'http://localhost/viejitos/Beneficiarios/Reportes',
            type: 'POST',
            success: function(respuesta) {
                $('#tabla').html(respuesta);
            }
        })
    }
</script>

<?php pie() ?>