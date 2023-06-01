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

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["password"]) && isset($_POST["passConfirm"]) && isset($_POST["correo"])) {
    $usuario = array();
    $usuario["correo"] = Utils::limpiar_datos($_POST["correo"]);
    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    //recogemos el usuario
    $usu = $gestorUsu->getUsuarioEmail($usuario["correo"], $conexPDO);

    $salt = $usu["salt"];
    $usuario["password"]= crypt($_POST["password"],'$6$rounds=5000$'.$salt.'$');
    $usuario["codActivacion"] = Utils::generar_codigo_activacion();
    //Actualizamos el usuario
    $resultado = $gestorUsu->updateUsuarioPass($usuario, $conexPDO);

    //enviamos el correo de registro
    Utils::correo_registro($usuario);
    include("../views/validacion.php");
    
}else{
    include("../views/recuperaPassword.php");
}