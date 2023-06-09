<?php

session_start();
error_reporting(0);

use model\Usuario;
use \model\Utils;
use \model\Servicio;

require_once("../model/Usuario.php");
require_once("../model/Utils.php");
require_once("../model/Servicio.php");



$gestorUsuario = new Usuario();
$gestorServicio = new Servicio();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();
$datosServicios =$gestorServicio->getServicios($conexPDO);
$datosPeluqueros = $gestorUsuario->getUsuarioPeluquero($conexPDO);

include("../views/home.php");


?>