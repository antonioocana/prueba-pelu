<?php

namespace model;

use \PDO;
use \PDOException;

require_once("Utils.php");

class Servicio
{

    //funcion para obtener todos los arbitros
    public function getServicios($conexPDO)
    {
    
        if ($conexPDO != null) {
            try {
                $sentencia = $conexPDO->prepare("SELECT * FROM peluqueria.servicios");
                //Ejecutamos la sentencia
                $sentencia->execute();
    
                //Devolvemos los datos del jugador
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

}