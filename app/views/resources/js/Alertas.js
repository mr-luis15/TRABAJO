
function logout() {
    Swal.fire({
        title: "¿Seguro que quires cerrar sesion?",
        text: "No podras volveer a acceder a menos que inicies sesion nuevamente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, cerrar sesion",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "../../controllers/autenticar/logout.php";
        }
    });
}

function deleted(mensaje) {
    Swal.fire({
        icon: 'success',
        title: 'Eliminado',
        text: mensaje,
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if(result.isConfirmed) {
            location.reload();
        }
    });
}

function agregado(mensaje) {
    Swal.fire({
        icon: 'success',
        title: 'Agregado',
        text: mensaje
    }).then(() => {
        location.reload();
    });
}

function error(mensaje) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: mensaje
    });
}

function error_servidor() {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Hubo un error al enviar los datos. No se enviaron los datos'
    });
}

function registrado(mensaje) {
    Swal.fire({
        title: "Registrado",
        text: mensaje,
        icon: "success",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "login.php";
        }
    });
}

function cambiarEstado() {
    Swal.fire({
        icon: 'warning',
        title: '¿Marcar como realizado?',
        text: 'Esto cambiara el estado del servicio a realizado',
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Marcar como realizado",
        cancelButtonText: "No"
    });
}

function ready(mensaje, titulo) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: "success",
    }).then((result) => {
        if (result.isConfirmed) {
            location.reload();
        }
    });
}

