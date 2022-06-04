<?php 

include("../models/DB.php");

try {
    $connection = DBConnection::getConnection();
} catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    var_dump($_POST);

    $product = $_POST["nameProduct"];
    $unitprice = $_POST["priceProduct"];
    $amount = $_POST["amountProduct"];
    $date = date("Y-m-d", $_SERVER['REQUEST_TIME']);
    $user_id = $_SESSION["id"];
    
    try {

        $query = $connection->prepare('INSERT into sales VALUES(NULL, :product, :unitprice, :amount, :date, :user_id)');
        $query->bindParam(':product', $product, PDO::PARAM_STR);
        $query->bindParam(':unitprice', $unitprice, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_INT);
        $query->bindParam(':date', $date, PDO::PARAM_INT);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount === 0) {
            header('Location: http://localhost/electrops/views/shoppingCart.php?error=5');
        } else {
            header('Location: http://localhost/electrops/views/shoppingCart.php;');
        }

    } catch (PDOException $e) {
        echo $e;
    }
    
}

?>