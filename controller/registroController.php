<?php

namespace controller;

use \model\Usuario;
use \model\Utils;
//Creamos un array para guardar los datos del cliente

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


/**
 * Los datos que llegan de la vista registro por POST ya deberían de estar validados
 * en javascript, forma email, contraseña correcta, contraseñas iguales, telefono etc
 */

//Si nos llegan todos los datos
if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["password"]) && isset($_POST["passConfirm"])) {
    $usuario = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    //Segun los asignamos al array de datos del usuario a registrar
    $usuario["nombre"] = Utils::limpiar_datos($_POST["nombre"]);
    $usuario["correo"] = Utils::limpiar_datos($_POST["correo"]);
    $usuario["apellido"] = Utils::limpiar_datos($_POST["apellido"]);

    //Generamos una salt de 16 posiciones
    $salt = Utils::generar_salt(16);
    $usuario["salt"] = $salt;
    //Encriptamos el password del formulario con la funcion crypt
    //utilizando la salt generada y SHA-512
    $usuario["password"] = crypt($_POST["password"], '$6$rounds=5000$' . $salt . '$');
    //Por defecto el usuario esta deshabilitado
    $usuario["activo"] = 0;
    //Generamos el codigo de activacion
    $usuario["codActivacion"] = Utils::generar_codigo_activacion();

    $gestorUsu = new Usuario();



    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();



    //Añadimos el registro
    $resultado = $gestorUsu->addUsuario($usuario, $conexPDO);

    //enviamos el correo de registro
    Utils::correo_registro($usuario);
    include("../views/validacion.php");
} else {
    include("../views/registro.php");
}