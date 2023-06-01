<?php

session_start();
error_reporting(0);
use model\Usuario;
use \model\Utils;
use \model\Servicio;
use \model\Cita;

require_once("../model/Usuario.php");
require_once("../model/Utils.php");
require_once("../model/Servicio.php");
require_once("../model/Cita.php");



$gestorUsuario = new Usuario();
$gestorServicio = new Servicio();
$gestorCita = new Cita();

$idUsuario = $_SESSION["id"];

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();
$datosServicios =$gestorServicio->getServicios($conexPDO);
$datosPeluqueros = $gestorUsuario->getUsuarioPeluquero($conexPDO);
$datosCitas = $gestorCita->getCitasUsuario($idUsuario,$conexPDO);

include("../views/citasUsuario.php");


?>