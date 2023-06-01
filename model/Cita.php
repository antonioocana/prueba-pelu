<?php

namespace model;

use \PDO;
use \PDOException;

require_once("Utils.php");

class Cita
{

    function addCita($cita, $conexPDO)
    {

        $result = null;
        if (isset($cita) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO peluqueria.citas (id_usuario, id_peluquero, fecha, hora,total,pago, id_servicio) VALUES ( :id_usuario, :id_peluquero, :fecha,:hora,:total,:pago, :id_servicio)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id_usuario", $cita["id_usuario"]);
                $sentencia->bindParam(":id_peluquero", $cita["id_peluquero"]);
                $sentencia->bindParam(":fecha", $cita["fecha"]);
                $sentencia->bindParam(":hora", $cita["hora"]);
                $sentencia->bindParam(":total", $cita["total"]);
                $sentencia->bindParam(":pago", $cita["pago"]);
                $sentencia->bindParam(":id_servicio", $cita["id_servicio"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }






    public function getCitasNoDisponibles($peluquero, $fecha, $conexPDO)
    {
        if (isset($peluquero)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM peluqueria.citas where id_peluquero=? AND fecha=date(?)");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $peluquero);
                    $sentencia->bindParam(2, $fecha);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetchAll();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }
    public function getCitasUsuario($idUsuario, $conexPDO)
    {
        if (isset($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM peluqueria.citas where id_usuario=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetchAll();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }



    
    
}