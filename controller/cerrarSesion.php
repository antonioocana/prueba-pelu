<?php
    session_start();
    $_SESSION["nombre"] = "";
    session_destroy();

    header("Location: ../controller/homeController.php");
?>