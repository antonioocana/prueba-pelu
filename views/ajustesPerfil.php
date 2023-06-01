<?php

namespace views;

session_start();
error_reporting(0);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/formularios.css">

    <title>Ajustes de perfil</title>

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../scss/recuperaPassword.css" rel="stylesheet">
</head>

<body class="text-center">


        <form id="formularioPassword" class="form-signin" method="POST" action="../controller/ajustesPerfilController.php">
            <a href="../controller/homeController.php"><img class="mb-4" src="../img/logo.png" alt="" width="72" height="72"></a>

            <div class="form-floating mb-3 mt-3" hidden>
                <input type="text" class="form-control" id="correo" placeholder="" name="correo" value='<?= (isset($_SESSION) ? $_SESSION["correo"] : "") ?>' hidden>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="correo" placeholder="" name="nombre" value='<?= (isset($_SESSION) ? $_SESSION["nombre"] : "") ?>'>
                <label for="email">Nombre</label>
            </div>

            <div id="div" class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="correo" placeholder="" name="apellido" value='<?= (isset($_SESSION) ? $_SESSION["apellido"] : "") ?>'>
                <label for="email">Apellidos</label>
            </div>

            <div class="form-floating mb-3 mt-3">
                <?php
                print '<input type="file" id="imagen" name="imagen" accept="image/*" />';
                if (isset($_SESSION["imagen"])) {
                    print '<img src="../img/' . $_SESSION["imagen"] . '" id="visualizarImagen" style="width: 150px; height: 150px; border: 0;" alt="">';
                } else {
                    print '<img src="" id="visualizarImagen" style="width: 0px; height: 0px; border: 0;" alt="">';
                }
                ?>
                <input type="hidden" name="imagenVieja" id="imagenVieja" value='<?= (isset($_SESSION) ? $_SESSION["imagen"] : "") ?>'>
            </div>


            <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar perfil</button>
            <a href="../controller/homeController.php">
                <p class="mt-5 mb-3">Volver a inicio</p>
            </a>
        </form>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            //validacion de formulario
            $('#formularioPassword').validate({
                errorClass: "error fail-alert",
                validClass: "valid success-alert",
                rules: {
                    email: {
                        required: true,
                        pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        pattern: /^(?=.*[A-Z])/
                    },
                    passConfirm: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        required: "Este campo no puede quedar vacío.",
                        pattern: "Introduce un correo electrónico válido."
                    },
                    password: {
                        required: "Este campo no puede quedar vacío.",
                        minlength: "La contraseña debe tener al menos 8 caracteres",
                        pattern: "La contraseña debe tener al menos una letra mayúscula."
                    },
                    passConfirm: {
                        required: "Este campo no puede quedar vacío.",
                        equalTo: "Las contraseñas no coinciden."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>
    <script>
        //muestra la imagen nueva cuando esta se modifica
        const inputFile = document.getElementById("imagen");
        const cambioImagen = document.getElementById("visualizarImagen");

        inputFile.addEventListener("change", (event) => {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                cambioImagen.src = reader.result;
            };
        });
    </script>
</body>

</html>