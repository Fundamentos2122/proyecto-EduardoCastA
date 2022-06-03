<?php

include("../models/DB.php");
include("../models/Product.php");

try {
    $connection = DBConnection::getConnection();
} catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);
    exit();
}



if($_SERVER["REQUEST_METHOD"] === "GET") {

    //Obtener un solo registro
    if(array_key_exists("id", $_GET)) {

        $id = $_GET["id"];

        try {
            
            $query = $connection->prepare('SELECT * FROM products WHERE active = 1 AND id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $product;
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['stock'], $row['photo'], $row['active']);
            }
    
            echo json_encode($product->getArray());

        } catch (PDOException $e) {
            echo $e;
        }
        

    } else { //Obtener todos los registros
        
        try {
        
            $query = $connection->prepare('SELECT * FROM products WHERE active = 1');
            $query->execute();
    
            $products = array();
        
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['stock'], $row['photo'], $row['active']);
                $products[] = $product->getArray();
            }
    
            echo json_encode($products);
    
        } catch (PDOException $e) {
            echo $e;
        }
    }

} else if ($_SERVER["REQUEST_METHOD"] === "POST") {

    console_log( $_POST );

    if($_POST["_method"] === "POST") { //Agregar un producto

        $name = trim($_POST["name"]);
        $price = trim($_POST["price"]);
        $description = trim($_POST["description"]);
        $stock = trim($_POST["stock"]);
        $photo = "";

        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
        }

        try {

            $query = $connection->prepare('INSERT INTO products VALUES(NULL, :name, :price, :description, :stock, :photo, 1)');
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':price', $price, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':stock', $stock, PDO::PARAM_INT);
            $query->bindParam(':photo', $photo, PDO::PARAM_STR);
            $query->execute();

            if($quer->rowCount === 0) {
                header('Location: http://localhost/electrops/views/productsList.php?error=5');
            } else {
                header('Location: http://localhost/electrops/views/productsList.php');
            }

        } catch (PDOException $e) {
            echo $e;
        }

    } else if($_POST["_method"] === "PUT") { //Actualizar un producto
    
        $id = trim($_POST["id"]);
        $name = trim($_POST["name"]);
        $price = trim($_POST["price"]);
        $description = trim($_POST["description"]);
        $stock = trim($_POST["stock"]);
        $photo = "";

        $query_string = 'UPDATE products SET name = :name, price = :price, description = :description, stock = :stock';

        if (sizeof($_FILES) > 0 and $_FILES["photo"]["tmp_name"] > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
            $query_string = $query_string . ', photo = :photo';
        }
        
        $query_string = $query_string . ' WHERE id = :id';

        try {

            $query = $connection->prepare($query_string);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':price', $price, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':stock', $stock, PDO::PARAM_INT);
            
            if(sizeof($_FILES) > 0 and $_FILES["photo"]["tmp_name"] > 0){
                $query->bindParam(':photo', $photo, PDO::PARAM_STR);
            }
            
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            if($query->rowCount === 0) {
                header('Location: http://localhost/electrops/views/productsList.php?error=4');
            } else {
                header('Location: http://localhost/electrops/views/productsList.php');
            }

        } catch (PDOException $e) {
            echo $e;
        }

    } else if($_POST["_method"] === "DELETE") { //Eliminar un producto

        $id = $_POST["id"];

        try {
            
            $query = $connection->prepare('UPDATE products SET active = 0 WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            if($query->rowCount === 0) {
                header('Location: http://localhost/electrops/views/productsList.php?error=4');
            } else {
                header('Location: http://localhost/electrops/views/productsList.php');
            }

        } catch (PDOException $e) {
            echo $e;
        }

    }
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

?>