<?php

use \model\Utils;
use \model\Servicio;

require_once("../model/Utils.php");
require_once("../model/Servicio.php");

$gestorServicio = new Servicio();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();
$datosServicios =$gestorServicio->getServicios($conexPDO);


include("../views/servicios.php");


?>