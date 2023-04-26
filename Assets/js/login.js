$(document).on("click", ".btnCerrarSesion", function () {
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
                window.location.href('Usuarios/CerrarSesion');
            }
        });
}) 