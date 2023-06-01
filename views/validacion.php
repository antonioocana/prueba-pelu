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
            <a href="../controller/homeController.php"><img src="../img/logo.png" alt="Logo" style="max-height: 100px;" class="avatar"></a>
            <h1>Validación</h1>
            <form method="POST" action="../controller/validacionController.php">
                <input type="hidden" class="form-control" id="codActivacion" name="codActivacion" value="<?= $usuario["codActivacion"] ?>">
                <p>Código</p>
                <input type="text" name="codigo" placeholder="Ingrese el código de validación">
                <input type="submit" name="" value="Verificar">
                <input type="hidden" class="form-control" id="nombre" name="nombre" value="<?= $usuario["nombre"] ?>">
                <p>Ir a inicio</p>
            </form>
        </div>
    </div>
</body>

</html>