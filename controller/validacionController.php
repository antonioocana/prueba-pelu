<?php
namespace controller;

use \model\Usuario;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


/**
 * Los datos que llegan de la vista registro por POST ya deberían de estar validados
 * en javascript, forma email, contraseña correcta, contraseñas iguales, telefono etc
 */

//Si nos nos llega el codigo
if (isset($_POST["codigo"])) {
    //creamos un array de usuario
    $usuario = array();

    //se le insertan los datos 
    $usuario["nombre"] = $_POST["nombre"];

    $usuario["activo"]=1;


    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //actualizamos el estado del usuario
    $resultado = $gestorUsu->updateUsuario($usuario, $conexPDO);

    //Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        echo '<script>alert("El usuario se registro correctamente!");</script>';
    else
        echo '<script>alert("Ha habido un error!");</script>';

    //redirigimos a la pagina de login
    include("../views/login.php");
}else{
    include("../views/validacion.php");
}