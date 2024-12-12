document.getElementById('formUsuario').addEventListener('submit', function(event) {
    event.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url: "./../controllers/GestionUsuarioController.php?op=insertar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos) {
                console.log(datos); 
                switch (parseInt(datos)) {
                    case 1:
                        location.reload();
                        break;
                    case 2:
                        toastr.error('Hubo un error al tratar de ingresar los datos.');
                        break;
                    default:
                        toastr.error(datos);
                        break;
                }
            },
            error: function() {
                toastr.error('No se ha logrado ingresar el usuario');
            },
        });
});