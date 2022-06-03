<?php 

include("../models/DB.php");
include("../models/Sale.php");

try {
    $connection = DBConnection::getConnection();
} catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET") {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = $_SESSION["id"];

    try {
        
        

    } catch (PDOException $e) {
        echo $e;
    }

} else if($_SERVER["REQUEST_METHOD"] === "POST"){

    $$_POST["product"];
    $_POST["unitprice"];
    $_POST["amount"];
    
    try {

        

    } catch (PDOException $e) {
        echo $e;
    }
    
}

?>