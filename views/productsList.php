<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/productsList-styles.css">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>

    <?php 

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!array_key_exists("username", $_SESSION) || (array_key_exists("username", $_SESSION) && $_SESSION["type"] !== "administrator")) {
            header('Location: http://localhost/electrops/views/');
            exit();
        }

    ?>

    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <div class="center">
        <h3>Productos</h3>
    </div>
    <br>
    <div class="center">
        <a href="newProduct.php"><input type="button" value="Agregar nuevo producto" class="primary-button"></a>
    </div>
    <br>
    <?php include 'layouts/errorMessages.php' ?>
    <!-- Modales -->
    <?php include("layouts/modalDeleteProduct.php") ?>
    <br>
    <table id="productsTable">
        <thead id="productsTHead">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody id="productsTBody">
            
        </tbody>
    </table>

    <!-- Scripts -->
    <script src="../assets/js/productsList-script.js"></script>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>