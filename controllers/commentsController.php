<?php

include("../models/DB.php");
include("../models/Comment.php");

try {
    $connection = DBConnection::getConnection();
} catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET") {

    $product_id = $_GET["id"];

    try {
        
        $query = $connection->prepare('SELECT * FROM comments WHERE product_id = :product_id');
        $query->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $query->execute();

        $comments = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment($row['id'], $row['comment'], $row['user_username']);
            $comments[] = $comment->getArray();
        }

        echo json_encode($comments);

    } catch(PDOException $e) {
        echo $e;
    }

} else if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $comment = trim($_POST["comment"]);
    $id_user = $_POST["id_user"];
    $product_id = $_POST["product_id"];

    try {
        
        $query = $connection->prepare('INSERT into comments VALUES(NULL, :comment, :id_user, :product_id)');
        $query->bindParam(':comment', $comment, PDO::PARAM_STR);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $query->execute();

        if($quer->rowCount === 0) {
            header('Location: http://localhost/electrops/views/productInfo.php?error=5');
        } else {
            header('Location: http://localhost/electrops/views/productInfo.php?id=' + $product_id);
        }

    } catch (PDOException $e) {
        echo $e;
    }

}

?>