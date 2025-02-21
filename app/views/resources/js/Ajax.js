// Función para eliminar usuario
function eliminarUsuario(userId) {
    Swal.fire({
        title: "¿Seguro que quieres eliminar este usuario?",
        text: "No lo podrás recuperar y todos los pedidos y servicios relacionados a este usuario serán borrados.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: controller('usuarios', 'eliminarUsuario'),
                type: 'POST',
                data: { id: userId },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;

                    if (response.status === 'success') {
                        deleted(mensaje);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}



$(document).ready(function () {
    $('#enviar').on('click', function () {
        var data = {
            nombre: $('#nombre').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            password: $('#password').val(),
            nivel: $('#nivel').val(),
            codigo: $('#codigo').val()
        };

        $.ajax({
            url: controller('usuarios', 'crearUsuario'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})


$(document).ready(function () {
    $('#editar_usuario').on('click', function () {
        var data = {

            id: $('#id').val(),
            nombre: $('#nombre').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            nivel: $('#nivel').val(),
            codigo: $('#codigo').val()
        };

        //console.log(data);

        $.ajax({
            url: controller('usuarios', 'editarUsuario'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;
                const nivel = response.nivel;

                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Modificado',
                        text: mensaje,
                        icon: "success",
                    }).then((result) => {

                        if (result.isConfirmed) {
                            enviarTablaNivel(nivel);
                        }
                    });
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})




$(document).ready(function () {
    $('#registrarse').on('click', function () {
        var data = {
            nombre: $('#nombre').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            password: $('#password').val(),
            codigo: $('#codigo').val()
        };

        $.ajax({
            url: controller('usuarios', 'registrarse'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    registrado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})




$(document).ready(function () {
    $('#login').on('click', function () {
        var data = {
            correo: $('#correo').val(),
            password: $('#password').val(),
        };

        $.ajax({
            url: controller('autenticar', 'login'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status == 'success') {
                    const nivel = response.nivel;
                    redirigirPorNivel(nivel);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})



$(document).ready(function () {
    $('#agregar_servicio').on('click', function () {
        var data = {
            cliente: $('#cliente').val(),
            tecnico: $('#tecnico').val(),
            direccion: $('#direccion').val(),
            descripcion: $('#descripcion').val(),
            fecha: $('#fecha').val(),

        };

        //console.log(data);

        $.ajax({
            url: controller('servicios', 'crearServicio'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})




function setRealizado(id_servicio) {
    Swal.fire({
        icon: 'warning',
        title: '¿Marcar como REALIZADO?',
        text: 'Esto cambiara el estado del servicio a REALIZADO',
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Marcar como realizado",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: controller('servicios', 'cambiarEstadoServicio'),
                type: 'POST',
                data: { id: id_servicio, estado: "Realizado" },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;
                    const titulo = response.title;

                    if (response.status === 'success') {
                        ready(mensaje, titulo);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}



function setNoRealizado(id_servicio) {
    Swal.fire({
        icon: 'warning',
        title: '¿Marcar como NO REALIZADO?',
        text: 'Esto cambiara el estado del servicio a NO REALIZADO',
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Marcar como no realizado",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: controller('servicios', 'cambiarEstadoServicio'),
                type: 'POST',
                data: { id: id_servicio, estado: "No realizado" },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;
                    const titulo = response.title;

                    if (response.status === 'success') {
                        ready(mensaje, titulo);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}



function eliminarServicio(id_servicio) {
    Swal.fire({
        icon: 'warning',
        title: '¿Eliminar servicio?',
        text: 'No podras recuperar el servicio una vez eliminado',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: controller('servicios', 'eliminarServicio'),
                type: 'POST',
                data: { id: id_servicio },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;
                    const titulo = response.title;

                    if (response.status === 'success') {
                        ready(mensaje, titulo);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}



$(document).ready(function () {
    $('#editar_servicio').on('click', function () {

        var data = {
            id: $('#id').val(),
            cliente: $('#cliente').val(),
            tecnico: $('#tecnico').val(),
            direccion: $('#direccion').val(),
            descripcion: $('#descripcion').val(),
            estado: $('#estado').val(),
            fecha: $('#fecha').val()
        };

        //console.log(data);  // Imprime los datos a la consola antes de enviarlos

        console.log(data);

        $.ajax({
            url: controller('servicios', 'editarServicio'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    Swal.fire({
                        title: "Modificado con exito",
                        text: mensaje,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "servicios.php";
                        }
                    });

                } else if (response.status === 'error') {
                    Swal.fire({
                        title: "Error",
                        text: mensaje,
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                //console.error('Error en la llamada AJAX:', error);  // Imprime el error si falla la llamada
                //console.log("Respuesta del servidor:", xhr.responseText);  // Agrega esto para ver la respuesta completa
                error_servidor();
            }

        });
    });
});



//CATEGORIAS

$(document).ready(function () {
    $('#agregar_categoria').on('click', function () {

        var data = {

            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val()

        };

        //console.log(data);

        $.ajax({

            url: controller('categorias', 'crearCategoria'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})



function eliminarCategoria(idCat) {

    Swal.fire({
        title: "¿Seguro que quires eliminar esta categoria?",
        text: "Todos los productos relacionados seran marcados como 'Categoria no asignada'",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            console.log(idCat);

            $.ajax({

                url: controller('categorias', 'eliminarCategoria'),
                type: 'POST',
                data: { id: idCat },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;

                    if (response.status === 'success') {
                        deleted(mensaje);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }

                },

                error: function (xhr, status, error) {
                    error_servidor();
                }

            })
        }
    })

}


$(document).ready(function () {
    $('#editar_categoria').on('click', function () {

        var data = {

            id: $('#id').val(),
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val()
        };


        console.log(data);

        $.ajax({
            url: controller('categorias', 'editarCategoria'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {

                    Swal.fire({
                        title: "Modificado con éxito",
                        text: mensaje,
                        icon: "success",
                        timer: 2000, // Redirige automáticamente en 2 segundos
                        showConfirmButton: true
                    }).then(() => {
                        window.location.href = 'categorias.php';
                    });
                    

                } else if (response.status === 'error') {
                    Swal.fire({
                        title: "Error",
                        text: mensaje,
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la llamada AJAX:', error);  // Imprime el error si falla la llamada
                console.log("Respuesta del servidor:", xhr.responseText);  // Agrega esto para ver la respuesta completa
                error_servidor();
            }

        });
    });
});



//PRODUCTOS

$(document).ready(function () {
    $('#agregar_producto').on('click', function () {

        var data = {

            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            stock: $('#stock').val(),
            precio: $('#precio').val(),
            id_categoria: $('#id_categoria').val(),
            estado: $('#estado').val()
        };


        console.log(data);

        $.ajax({
            url: controller('productos', 'crearProducto'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje)

                } else if (response.status === 'error') {
                    Swal.fire({
                        title: "Error",
                        text: mensaje,
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        });
    });
});





$(document).ready(function () {
    $('#editar_producto').on('click', function () {

        var data = {

            id: $('#id').val(),
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            stock: $('#stock').val(),
            precio: $('#precio').val(),
            id_categoria: $('#id_categoria').val(),
            estado: $('#estado').val()
        };


        console.log(data);

        $.ajax({
            url: controller('productos', 'editarProducto'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {

                    Swal.fire({

                        title: "Modificado con exito",
                        text: mensaje,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'productos.php'
                        }
                    });



                } else if (response.status === 'error') {
                    Swal.fire({
                        title: "Error",
                        text: mensaje,
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error AJAX:", status, error, xhr.responseText);
                error_servidor();
            }

        });
    });
});








// Función para eliminar usuario
function eliminarProducto(id) {
    Swal.fire({
        title: "¿Seguro que quieres eliminar este producto?",
        text: "No lo podrás recuperar y todos los pedidos y servicios relacionados a este usuario serán borrados.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: controller('productos', 'eliminarProducto'),
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;

                    if (response.status === 'success') {
                        deleted(mensaje);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}



function redirigirPorNivel(nivel) {

    switch (nivel) {
        case 'Administrador':
            window.location.href = 'dashboard.php';
            break;

        case 'Secretaria de Compras':
            window.location.href = 'dashboard.php';
            break;

        case 'Secretaria de Ventas':
            window.location.href = 'dashboard.php';
            break;

        case 'Tecnico':
            window.location.href = 'dashboard.php';
            break;

        case 'Cliente':
            window.location.href = 'vistaCliente.php';
            break;
    }
}


function enviarTablaNivel(nivel) {


    switch (nivel) {

        case 'Administrador':
        case 'Secretaria de Compras':
        case 'Secretaria de Ventas':
            window.location.href = 'empleados.php';
            break;
        case 'Tecnico':
            window.location.href = 'tecnicos.php';
            break;
        case 'Cliente':
            window.location.href = 'clientes.php';
            break;
    }
}

function controller(carpeta, archivo) {

    return "../../controllers/" + carpeta + "/" + archivo + ".php";

}




