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

    public function getServicioId($id, $conexPDO)
    {
        if (isset($id)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM peluqueria.servicios where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $id);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

}