$(document).on("click", ".btnEliminarBeneficiario", function () {
    var idBeneficiario = $(this).attr("idBeneficiario");
    Swal.fire({
        title: 'Eliminar!',
        text: "¿Esta seguro de borrar este beneficiario?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar',
    })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = "http://localhost/viejitos/Beneficiarios/Eliminar?key=" + idBeneficiario;
            }
        });
});

$(document).on("click", ".btnInactivar", function () {
    var idBeneficiario = $(this).attr("idBeneficiario");
    Swal.fire({
        title: 'Inactivar!',
        text: "¿Esta seguro de inactivar este beneficiario?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, inactivar',
    })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = "http://localhost/viejitos/Beneficiarios/Inactive?key=" + idBeneficiario;
            }
        });
});
