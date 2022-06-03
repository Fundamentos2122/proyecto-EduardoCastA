<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de compras</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/payment-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>
    
<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!array_key_exists("username", $_SESSION)  || (array_key_exists("username", $_SESSION) && $_SESSION["type"] !== "normal")) {
        header('Location: http://localhost/electrops/views/');
        exit();
    }

?>

    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>