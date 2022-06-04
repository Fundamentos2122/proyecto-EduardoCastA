<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $array = array();

    $array["id"] = $_SESSION["id"];
    $array["username"] = $_SESSION["username"];

    echo json_encode($array)

?>