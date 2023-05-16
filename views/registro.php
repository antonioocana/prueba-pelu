<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
<?php
  //Definimos el destino de el formulario
  $url_destino = "../controller/registroController.php";
?>
<div class="background">
		<div class="login-box" style="max-height: 800px;">
			<img src="../img/logo.png" class="avatar">
            <h1>Login</h1>
			<form id="formularioRegistro" method="POST" action="<?= $url_destino ?>">
				<p>Nombre</p>
				<input id="nombre" type="text" name="nombre" placeholder="Ingrese su nombre">
				<p>Apellidos</p>
				<input type="text" name="apellido" placeholder="Ingrese sus apellidos">
				<p>Email</p>
				<input id="correo" type="text" name="correo" placeholder="Ingrese su correo electrónico">
				<p>Contraseña</p>
				<input id="password" type="password" name="password" placeholder="Ingrese su contraseña">
				<p>Confirmar contraseña</p>
				<input id="passConfirm" type="password" name="passConfirm" placeholder="Ingrese su contraseña">
				<input type="submit" name="registro" value="Registrarse">
                <p>Iniciar sesión</p>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      //validacion de formulario
      $('#formularioRegistro').validate({
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
          nombre: {
            required: true
          },
          correo: {
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
          nombre: {
            required: "Este campo no puede quedar vacío."
          },
          correo: {
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
</body>
</html>