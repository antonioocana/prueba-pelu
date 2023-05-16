<?php 

namespace model;
use \PDO;
use \PDOException;

class Utils {

   
    /**
     * Funcion que se conecta a la BD y nos devuelve una conexion PDO activa
     */
    public static function conectar()
    {
        $conPDO=null;
        try {
            require_once("../global.php");
            $conPDO = new PDO("mysql:host=".$DB_SERVER.";dbname=".$DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;

         } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return $conPDO;
            die();
        }
      
    }

    /**
     * Limpiamos el contenido de las variables
     */
    public static function limpiar_datos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


      /**
       * Funcion que genera una cadena aleatoria
       */
      public static function generar_salt($tam)
      {

        //Definimos un array de caracteres
        $letras = "abcdefghijklmnopqrstuvwxyz1234567890*-.,";

        $salt="";
        //Vamos añadiendo $tam caracteres aleatorios a la salt
        for ($i=0;$i<$tam;$i++)
        {
            $salt.=$letras[rand(0,strlen($letras)-1)];
        } 

        //devolvemos la salt
        return $salt;

      }

      //La funcion genera un codigo número de 4 digitos aleatorio
      public static function generar_codigo_activacion()
      {
        return rand(1111,9999);
      }

      //Funcion que envia el correo de registro
      public static function correo_registro($usuario)
      {
        $to = $usuario["correo"];
        $subject = "Confirma tu Cuenta";
        
        $message = "<b>Bienvenido a esta Web ".$usuario["nombre"]."</b>";
        $message .= "<h1>Tu codigo de verificación es: ".$usuario["codActivacion"]."</h1>";
        
        $header = "From:antoniobnb65@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo '<script>alert("Email enviado correctamente!");</script>';
        }else {
           echo '<script>alert("El email no se ha podido enviar!");</script>';
        }
      }

    
}