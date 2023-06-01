<?php

use model\Usuario;
use \model\Utils;



// Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["nombre"])) {
    // Rellenamos los datos del cliente que le pasaremos a la vista se hace validación de los input type text con htmlspecialchars
    $usuario = array();
    $usuario["nombre"] = htmlspecialchars($_POST["nombre"]);
    $usuario["apellido"] = htmlspecialchars($_POST["apellido"]);
    $usuario["correo"] = htmlspecialchars($_POST["correo"]);

    // Si existe la imagen y no está vacía
    if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["name"])) {
        $usuario["imagen"] = $_FILES["imagen"]["name"];
        // Guarda la imagen en la carpeta seleccionada
        move_uploaded_file($_FILES["imagen"]['tmp_name'], "../img/".$_FILES["imagen"]["name"]);
    } else {
        if (isset($_POST["imagen"])) {
            $usuario["imagen"] = $_POST["imagen"];
        } else {
            $usuario["imagen"] = $_POST["imagenVieja"];
        }
    }

    // Añadimos el código del modelo
    require_once("../model/Usuario.php");
    require_once("../model/Utils.php");

    $gestorUsu = new Usuario();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Modificamos el registro
    $resultado = $gestorUsu->updateUsuarioNoPelu($usuario, $conexPDO);

    // Si ha ido bien el mensaje será distinto
    if ($resultado != null) {
        // Actualizamos el nombre en la sesión
        echo '<script>alert("Perfil actualizado correctamente");</script>';
        session_start();
        session_destroy();
        session_start();
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["apellido"] = $usuario["apellido"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["imagen"] = $usuario["imagen"];
        $_SESSION["admin"] = $resultado["admin"];
        $_SESSION["espelu"] = $resultado["espelu"];


        header("Location: ../views/ajustesPerfil.php");
        //exit();
    } else {
        $mensaje = "El usuario no se pudo actualizar!";
    }
}

// Sin datos del jugador cargados cargamos la vista
include("../views/ajustesPerfil.php");

