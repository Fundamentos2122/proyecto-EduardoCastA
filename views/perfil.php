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

    <div class="information">
        <br>
        <div class="center">
            <?php
                if($_SESSION["photo"] === ""){

                    echo "No hay foto de perfil";
                } else {
                    echo "<img src=\"data:image/jpeg;base64," . $_SESSION["photo"] . "\" alt=\"\">";
                }
            ?>
            <h1 class="name">Nombre de usuario</h1>
            
        </div>
        <br>
        <div class="container" id="card-password">
            <div class="center">
                <h2>Contraseña</h2>
            </div>
            <br>
            <div class="center">
                <form class="form-password">
                    <label for="actualPassword">Contraseña actual:</label>
                    <input type="password" name="actualPassword">
                    <label for="newPassword">Nueva contraseña:</label>
                    <input type="password" name="newPassword">
                    <label for="confirmPassword">Confirmar nueva contraseña:</label>
                    <input type="password" name="confirmPassword">
                    <input type="submit" value="Guardar" class="primary-button">
                </form>
            </div>
        </div>
        <div class="container" id="card-email">
            <div class="center">
                <h2>Contraseña</h2>
            </div>
            <br>
            <div class="center">
                <form class="form-password">
                    <label for="actualPassword">Contraseña actual:</label>
                    <input type="password" name="actualPassword">
                    <label for="newPassword">Nueva contraseña:</label>
                    <input type="password" name="newPassword">
                    <label for="confirmPassword">Confirmar nueva contraseña:</label>
                    <input type="password" name="confirmPassword">
                    <input type="submit" value="Guardar" class="primary-button">
                </form>
            </div>
        </div>
        <br>
        <div class="container" id="card-address">
            <div class="center">
                <h2>Dirección de envio y datos de contacto</h2>
            </div>
            <br>
            <div class="center">
                <form class="form-contact">
                    <label for="country">País: </label>
                    <input type="text" name="country">
                    <label for="state">Estado: </label>
                    <input type="text" name="state">
                    <label for="city">Ciudad: </label>
                    <input type="text" name="city">
                    <label for="zipcode">Código postal: </label>
                    <input type="text" name="zipCode">
                    <label for="direction">Dirección</label>
                    <input type="text" name="direction">
                    <label for="phoneNumber">Número telefónico</label>
                    <input type="text" name="phoneNumber">
                    <input type="submit" value="Guardar" class="primary-button">
                </form>
            </div>
        </div>
        <br>
        <div class="container" id="card-payment">
            <div class="center">
                <h2>Métodos de pago</h2>
            </div>
            <br>
            <div class="center">
                <form class="form-paymet-methods">
                    <input type="submit" value="Agregar método de pago" class="primary-button">
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>