<?php

namespace controller;

use \model\Usuario;
use \model\Servicio;
use \model\Utils;

session_start();


//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


//Si nos llegan datos de un usuario, implica que es el formulario el que llama al controlador
if (isset($_POST["correo"]) && isset($_POST["password"])) {
    //limpiamos el email
    $email = Utils::limpiar_datos($_POST["correo"]);
    $gestorUsu = new Usuario();


    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Se hace la peticion
    $resultado = $gestorUsu->getUsuarioEmail($email, $conexPDO);

    $salt = $resultado["salt"];


    $password = crypt($_POST["password"], '$6$rounds=5000$' . $salt . '$');

    //si todo va bien mandamos a mainController
    if (isset($resultado["correo"]) && !empty($resultado["correo"])) {
        if ($resultado["password"] == $password && $resultado["activo"] == 1) {
            $_SESSION["nombre"] = $resultado["nombre"];
            $_SESSION["apellido"] = $resultado["apellido"];
            $_SESSION["correo"] = $resultado["correo"];
            $_SESSION["admin"] = $resultado["admin"];

            header("Location: ../controller/homeController.php");
        } else {
            echo '<script>alert("Contraseña no valida");</script>';
            include("../views/login.php");
        }
    } else {
        include("../views/login.php");
    }
}
