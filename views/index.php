<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro-PS</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/index-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>

    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <h1 class="title">Electro-PS</h1>
    <p class="grid-margin-p">Electro-PS es un sitio web de comercio electrónico, enfocado en la venta de componentes electrónicos y eléctricos, enfocados principalmente hacia estudiantes o interesados dentro de la materia que deseen desarrollar sus propios proyectos, nuestro propósito es brindarle productos de alta calidad de
    forma fácil y asequible a través de internet</p>

    <h2 class="products-title">Nuestros productos</h2>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="../assets/img/products1.jpg">
        </div>
        <div class="mySlides fade">
            <img src="../assets/img/products2.jpg">
        </div>
        <div class="mySlides fade">
            <img src="../assets/img/products3.jpg">
        </div>
        <div class="mySlides fade">
            <img src="../assets/img/products4.jpg">
        </div>
        <div class="mySlides fade">
            <img src="../assets/img/products5.jpg">
        </div>
        <div class="mySlides fade">
            <img src="../assets/img/products6.jpg">
        </div>
        <br>
        <div class="flex-center">
            <div class="dot-container">
                <span class="dot" onclick="showSlides(0)"></span>
                <span class="dot" onclick="showSlides(1)"></></span>
                <span class="dot" onclick="showSlides(2)"></></span>
                <span class="dot" onclick="showSlides(3)"></></span>
                <span class="dot" onclick="showSlides(4)"></></span>
                <span class="dot" onclick="showSlides(5)"></></span>
            </div>
        </div>
    </div>

    <script src="../assets/js/slider-script.js"></script>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>