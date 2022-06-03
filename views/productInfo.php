<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/productInfo-style.css">
    <link rel="icon" href="../assets/icons/favicon.ico" type="image/png">
</head>
<body>
    
    <!-- Header -->
    <?php include 'layouts/header.php' ?>

    <div id="productInformation">
    </div>

    <div id="comments">
        <?php

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(array_key_exists("username", $_SESSION) || (array_key_exists("username", $_SESSION) && $_SESSION["type"] === "normal")) {
                echo "<div id=\"newComment\">
                        <form>
                            <textarea id=\"newComment-textarea\" cols=\"30\" rows=\"10\"></textarea>
                            <button id=\"btnSave\" onclick=\"saveComment(". $_SESSION["id"] . "," .$_GET["id"] . ")\">Guardar</button>
                        </form> 
                    </div>";
            }
            include 'layouts/errorMessages.php'
        ?>
        
        <div id="commentSection">

        </div>
    </div>
    
    <script src="../assets/js/productInfo-script.js"></script>
    <script src="../assets/js/comments-script.js"></script>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>