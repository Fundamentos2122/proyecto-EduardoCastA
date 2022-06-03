<?php

if(array_key_exists("error", $_GET)){
    if($_GET["error"] === "1") {
        echo "<p class=\"error\">Las contraseñas no coinciden</p><br>";
    } else if ($_GET["error"] === "2") {
        echo "<p class=\"error\">Usuario no encontrado</p><br>";
    } else if ($_GET["error"] === "3") {
        echo "<p class=\"error\">Contraseña invalida</p><br>";
    } else if ($_GET["error"] == "4") {
        echo "<p class=\"error\">Ocurrió un error en la actualización</p><br>";
    } else { 
        echo "<p class=\"error\">Ocurrió un error</p><br>";
    }
}

?>