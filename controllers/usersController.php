<?php 

include("../models/DB.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if($_POST["_method"] === "POST"){ //Registrar usuario
        
        $name = trim($_POST["name"]);
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $passwordConfirm = trim($_POST["passwordConfirm"]);
        $photo = "";
    
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];

            $photo = file_get_contents($tmp_name);
        }

        if($password !== $passwordConfirm){
            header('Location: http://localhost/electrops/views/signup.php?error=1');
            exit();
        }
            
        $password = password_hash($password, PASSWORD_DEFAULT);
        $type = "normal";

        try {
            $query = $connection->prepare('INSERT INTO users VALUES(NULL, :name, :username, :email, :password, :photo, :type)');
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':photo', $photo, PDO::PARAM_STR);
            $query->bindParam(':type', $type, PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() === 0) {
                header('Location: http://localhost/electrops/views/signup.php?error=5');
            }
            else {
                header('Location: http://localhost/electrops/views');
            }
        }
        catch(PDOException $e) {
            echo $e;
        }

    } else if ($_POST["_method"] === "PUT") { //Modificar datos de usuario 

        session_start();

        $id = $_SESSION["id"];

        if(array_key_exists("email", $_POST)) {
       
            $email = $_POST["email"];

            try {
                
                $query = $connection->prepare('UPDATE users SET email = :email WHERE id = :id');
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                if($query->rowCount() === 0) {
                    header('Location: http://localhost/electrops/views/perfil.php?error=4');
                } else {
                    header('Location: http://localhost/electrops/views/perfil.php');
                }

            } catch (PDOException $e) {
                echo $e;
            }


        } else if (array_key_exists("password", $_POST)) {
            
            $password = trim($_POST["password"]);
            $passwordConfirm = trim($_POST["passwordConfirm"]);
    
            if($password !== $passwordConfirm){
                header('Location: http://localhost/electrops/views/perfil.php?error=1');
                exit();
            }

            $password = password_hash($password, PASSWORD_DEFAULT);

            try {
                
                $query = $connection->prepare('UPDATE users SET password = :password WHERE id = :id');
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                if($query->rowCount() === 0) {
                    header('Location: http://localhost/electrops/views/perfil.php?error=4');
                } else {
                    header('Location: http://localhost/electrops/views/perfil.php');
                }

            } catch (PDOException $e) {
                echo $e;
            }

        }

    }

}

?>