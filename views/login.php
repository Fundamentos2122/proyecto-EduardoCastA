<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/login-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>
    
    <!-- Header -->
    <?php include 'layouts/header.php' ?> 

    <h1 class="title">Iniciar sesión</h1>

    <div class="card-login">
        <form action="../controllers/accessController.php" method="POST" autocomplete="off" class="form-login">
            <input type="hidden" name="_method" value="POST">
            <div class="group-horizontal" required>
                <label for="username">Usuario</label>
                <input type="text" name="username" required>
            </div>
            <div class="group-horizontal" required>
                <label for="password">Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div class="text-end">
                <input type="submit" value="Inciar sesión" class="primary-button">
            </div>
            <div class="text-start">
                <p>¿No tienes cuenta? <a href="signup.php" class="enlace">Regístrate aquí</a></p>
            </div>
        </form>
    </div>

    <br>
    <?php include 'layouts/errorMessages.php' ?>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>