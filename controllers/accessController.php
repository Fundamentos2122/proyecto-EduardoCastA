<?php

include("../models/DB.php");
include("../models/User.php");

try {
    $connection = DBConnection::getConnection();
} catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST") {

    if($_POST["_method"] === "POST") { //Iniciar sesión

        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        try {
            $query = $connection->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() === 0) {
                header('Location: http://localhost/electrops/views/login.php?error=2');
                exit();
            }

            $user;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row["id"], $row["name"], $row["username"], $row["email"], $row["password"], $row["photo"], $row["type"]);
            }

            if (!password_verify($password, $user->getPassword())) {
                header('Location: http://localhost/electrops/views/login.php?error=3');
                exit();
            }

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION["id"] = $user->getId();
            $_SESSION["name"] = $user->getName();
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["photo"] = $user->getPhoto();
            $_SESSION["type"] = $user->getType();

            if($_SESSION["type"] === "normal") {
                header('Location: http://localhost/electrops/views/');
            } else if ($_SESSION["type"] === "administrator") {
                header('Location: http://localhost/electrops/views/productsList.php');
            }

            exit();
        }
        catch(PDOException $e) {
            echo $e;
        }

    } else if($_POST["_method"] === "DELETE") { //Cerrar sesión

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: http://localhost/electrops/views');
        exit();

    } 

}

?>