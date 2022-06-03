<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/perfil-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>

<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!array_key_exists("username", $_SESSION)) {
        header('Location: http://localhost/electrops/views/');
        exit();
    }

?>

    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <div class="perfil flex-center">
        <div class="information">
            <br>
            <?php
                echo "<img src=\"data:image/jpeg;base64," . $_SESSION["photo"] . "\" alt=\"Foto de perfil\" class=\"perfil-photo\">";
            ?>
            <?php
                echo "<h1 class=\"name\">
                        " . $_SESSION["name"] . "
                        </h1>  
                        <br>
                        <h2 class=\"username\">
                            " . $_SESSION["username"] . "
                        </h2>";
            ?>
        </div>
        <div class="actions">
            <button onclick="changePassword()" class="primary-button">Cambiar contraseña</button>
            <button onclick="changeEmail()" class="primary-button">Cambiar correo</button>
        </div>
    </div>
    <br>

    <div class="center">
        <form action="../controllers/accessController.php" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Cerrar sesión" class="primary-button">
        </form>
    </div>
    <br>

    <?php include 'layouts/errorMessages.php' ?>
    
    <?php include("layouts/modalEmail.php") ?>
    <?php include("layouts/modalPassword.php") ?>

    <!-- Scripts -->
    <?php include '../assets/js/menu-script.php' ?>
    <script src="../assets/js/perfil-script.js"></script>

</body>
</html>