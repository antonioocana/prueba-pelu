<?php

namespace controller;
session_start();
error_reporting(0);
use \model\Usuario;
use \model\Utils;
use \model\Cita;
use model\Servicio;

//Creamos un array para guardar los datos del cliente

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");
require_once("../model/Cita.php");
require_once("../model/Servicio.php");


/**
 * Los datos que llegan de la vista registro por POST ya deberían de estar validados
 * en javascript, forma email, contraseña correcta, contraseñas iguales, telefono etc
 */

//Si nos llegan todos los datos
if (isset($_POST["fecha"]) && isset($_POST["hora"]) && isset($_POST["peluquero"]) && isset($_POST["servicio"])) {

    $servicio = $_POST["servicio"];
    $gestorServicio = new Servicio();
    $conexPDO = Utils::conectar();
    $gestorUsuario = new Usuario();

    $datosServicios =$gestorServicio->getServicios($conexPDO);
    $datosPeluqueros = $gestorUsuario->getUsuarioPeluquero($conexPDO);
    $datosServicio = $gestorServicio->getServicioId($servicio, $conexPDO);
    //Limpiamos los datos de posibles caracteres o codigo malicioso
    //Segun los asignamos al array de datos del usuario a registrar
    $cita = array();
    $cita["id_usuario"] = $_SESSION["id"];
    $cita["id_peluquero"] = $_POST["peluquero"];
    $cita["fecha"] = $_POST["fecha"];
    $cita["hora"] = $_POST["hora"];
    $cita["total"] = $datosServicio["precio"];
    $cita["pago"] = 0;
    $cita["id_servicio"] = $_POST["servicio"];

    $gestorCita = new Cita();
    //Añadimos el registro
    $resultado = $gestorCita->addCita($cita, $conexPDO);

    echo '<script>alert("Cita pedida correctamente);</script>';
    include("../views/home.php");

} else {
    include("../views/home.php");

}