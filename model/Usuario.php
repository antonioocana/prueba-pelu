<?php

namespace model;

use \PDO;
use \PDOException;

require_once("Utils.php");

class Usuario
{

    function addUsuario($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO peluqueria.usuarios (nombre, apellido, correo, password,salt,activo,codActivacion) VALUES ( :nombre, :apellido, :correo,:password,:salt,:activo,:codActivacion)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellido", $usuario["apellido"]);
                $sentencia->bindParam(":correo", $usuario["correo"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function updateUsuario($usuario, $conexPDO)
    {

       
        $result = null;
        if (isset($usuario)  && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE peluqueria.usuarios set activo=:activo where nombre=:nombre");

                //print($sentencia->queryString);
                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":nombre", $usuario["nombre"]);


                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    public function getUsuarioEmail($email, $conexPDO)
    {
        if (isset($email)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM peluqueria.usuarios where correo=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
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