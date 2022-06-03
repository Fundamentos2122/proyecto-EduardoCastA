<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/editProduct-style.css">
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

    <h1 class="title">Editar producto</h1>

    <div class="card-editProduct">
        <form action="../controllers/productsController.php" method="POST" class="form-edit" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="" id="form-edit-id">
            <div class="group-horizontal">         
                <label for="name">Nombre</label>
                <input type="text" name="name" id="nameEdit" required>
            </div>
            <div class="group-horizontal">
                <label for="price">Precio</label>
                <input type="text" name="price" id="priceEdit" required>
            </div>
            <div class="group-horizontal">
                <label for="stock">Stock</label>
                <input type="number" name="stock" value="1" min="1" id="stockEdit" required>
            </div>
            <div class="group-horizontal">
                <label for="description">Detalles del producto</label>
                <textarea name="description" rows="4" cols="68" id="descriptionEdit" required></textarea>
            </div>
            <div class="group-horizontal">
                <label for="photo">Foto del producto</label>
                <input type="file" name="photo" id="photoEdit">
            </div>
            <div class="text-end">
                <a href="productsList.php"><input type="button" value="Cancelar" class="secondary-button"></a>
                <input type="submit" value="Guardar" class="primary-button">
            </div>
        </form>
    </div>

    <?php include 'layouts/errorMessages.php' ?>
    <?php include '../assets/js/menu-script.php' ?>
    <script src="../assets/js/editProduct-script.js"></script>

</body>
</html>