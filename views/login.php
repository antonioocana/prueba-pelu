<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
<div class="background">
		<div class="login-box">

			<form id="formularioLogin" method="POST" action="../controller/loginController.php">
      <a href="../controller/homeController.php"><img src="../img/logo.png" alt="Logo" style="max-height: 100px;" class="avatar"></a>
            	<h1>Login</h1>
				<p>Email</p>
				<input type="text" name="correo" placeholder="Ingrese su correo electrónico">
				<p>Contraseña</p>
				<input type="password" name="password" placeholder="Ingrese su contraseña">
				<input type="submit" name="" value="Entrar">
				<p>¿Aún no tienes cuenta? <a id="globalLink" href="../controller/registroController.php" style="color:aliceblue; text-decoration:none;">Crear cuenta</a></p>
        <p><a id="globalLink" href="../controller/recuperaPasswordController.php" style="color:aliceblue; text-decoration:none;"> He olvidado mi contraseña </a></p>        
			</form>
		</div>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      //validacion de formulario
      $('#formularioLogin').validate({
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
          }
        },
        submitHandler: function(form) {
          form.submit();
        }
      });

    });
  </script>
</html>