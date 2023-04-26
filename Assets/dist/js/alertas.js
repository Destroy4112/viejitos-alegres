const formulario_ajax = document.querySelector(".formulariosAjax");

function enviarFormularioAjax(e) {
    e.preventDefault();

    let data = new FormData(this);
    let method = this.getAttribute("method");
    let action = this.getAttribute("action");
    let tipo = this.getAttribute("data-form");

    let encabezados = new Headers();

    let config = {
        method: method,
        headers: encabezados,
        mode: 'cors',
        caches: 'no-cache',
        body: data
    }

    let texto_alerta;

    if (tipo === "save") {
        texto_alerta = "Los datos quedaran guardados en el sistema";
    } else if (tipo === "delete") {
        texto_alerta = "Los datos seran eliminados del sistema";
    } else if (tipo === "update") {
        texto_alerta = "Los datos del sistema seran actualizados";
    } else {
        texto_alerta = "Quieres realizar la operacion solicitada"
    }

    Swal.fire({
        icon: 'question',
        title: 'Estas seguro?',
        text: texto_alerta,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(action, config)
                .then(response => response.json())
                .then(response => {
                    return alerta_ajax(response);
                })
        }
    })
}

// formulario_ajax.foreach(formulario => {
//     formulario.addEventListener("submit", enviarFormularioAjax)
// });

function alerta_ajax(alerta) {
    if (alerta.Alerta === "simple") {
        Swal.fire({
            icon: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
        })
    } else if (alerta.Alerta === "recargar") {
        Swal.fire({
            icon: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        })
    } else if (alerta.Alerta === "limpiar") {
        Swal.fire({
            icon: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".formulariosAjax").reset();
            }
        })
    } else if (alerta.Alerta === "redireccionar") {
        window.location.href = alerta.Url;
    }
}