<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/signup-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>

    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <h1 class="title">Registrarse</h1>

    <div class="card-signup">
        <form  action="../controllers/usersController.php" method="POST" autocomplete="off" class="form-signup" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">
            <div class="group-horizontal">
                <label for="name">Nombre</label>
                <input type="text" name="name" required>
            </div>
            <div class="group-horizontal">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" required>
            </div>
            <div class="group-horizontal">
                <label for="email">Correo</label>
                <input type="text" name="email" required>
            </div>
            <div class="group-horizontal">
                <label for="password">Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div class="group-horizontal">
                <label for="passwordConfirm">Confirmar contraseña</label>
                <input type="password" name="passwordConfirm" required>
            </div>
            <div class="group-horizontal">
                <label for="photo">Foto</label>
                <input type="file" name="photo" required>
            </div>
            <div class="text-end">
                <input type="submit" value="Registrarse" class="primary-button">
            </div>
            <div class="text-start">
            <p>¿Ya tienes cuenta? <a href="login.php" class="enlace">Inicia sesión aquí</a></p>
            </div>  
        </form>
    </div>

    <br>
    <?php include 'layouts/errorMessages.php' ?>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>