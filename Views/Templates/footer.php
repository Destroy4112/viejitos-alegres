</div>
</div>
<footer class="footer text-center text-muted">
    Diseñado por<a href="https://www.facebook.com/solucionestecnologicasid"> Soluciones Tecnologicas</a>.
</footer>
</div>
<script src="<?= base_url(); ?>Assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url(); ?>Assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>Assets/libs/popper.js/dist/umd/popper.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url(); ?>Assets/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url(); ?>Assets/dist/js/feather.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url(); ?>Assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url(); ?>Assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<!-- themejs -->
<!--Menu sidebar -->
<script src="<?= base_url(); ?>Assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url(); ?>Assets/dist/js/custom.min.js"></script>
<script src="<?= base_url(); ?>Assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>Assets/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script src="<?= base_url(); ?>Assets/js/beneficiarios.js"></script>
<script>
    $(document).on("click", ".btnCerrarSesion", function() {
        Swal.fire({
                title: '¿Quieres salir del sistema?',
                text: "Si lo hace, necesitara iniciar sesion nuevamente",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, salir',
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.replace('http://localhost/viejitos/Usuarios/CerrarSesion');
                }
            });
    })
</script>
</body>

</html>