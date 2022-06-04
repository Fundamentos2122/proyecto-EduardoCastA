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
                        <form action=\"../controllers/commentsController.php\" method=\"POST\" autocomplete=\"off\">
                            <input type=\"hidden\" name=\"_method\" value=\"POST\">
                            <input type=\"hidden\" name=\"user_username\" value=\"\" id=\"form-username-user\">
                            <input type=\"hidden\" name=\"id_user\" value=\"\" id=\"form-id-user\">
                            <input type=\"hidden\" name=\"id_product\" value=\"\" id=\"form-id-product\">
                            <textarea name=\"comment\" cols=\"30\" rows=\"10\"></textarea>
                            <input type=\"submit\" value=\"Guardar\">
                        </form> 
                    </div>";
            }

            include 'layouts/errorMessages.php';

        ?>
        
        <div id="commentSection">

        </div>
    </div>
    
    <script src="../assets/js/productInfo-script.js"></script>
    <script src="../assets/js/comments-script.js"></script>
    <script src="../assets/js/comment-information-script.js"></script>
    <?php include '../assets/js/menu-script.php' ?>

</body>
</html>