<?php 

class User {

    private $_id;
    private $_name;
    private $_username;
    private $_email;
    private $_password;
    private $_photo;
    private $_type;

    public function __construct($id, $name, $username, $email, $password, $photo, $type) {
        
        $this -> setId($id);
        $this -> setName($name);
        $this -> setUsername($username);
        $this -> setEmail($email);
        $this -> setPassword($password);
        $this -> setPhoto($photo);
        $this -> setType($type);

    }

    public function getId() {
        return $this -> _id;
    }

    public function setId($id) {
        $this -> _id = $id;
    }

    public function getName() {
        return $this -> _name;
    }

    public function setName($name) {
        $this -> _name = $name;
    }

    public function getUsername() {
        return $this -> _username;
    }

    public function setUsername($username) {
        $this -> _username = $username;
    }

    public function getEmail() {
        return $this -> _email;
    }

    public function setEmail($email) {
        $this -> _email = $email;
    }

    public function getPassword() {
        return $this -> _password;
    }

    public function setPassword($password) {
        $this -> _password = $password;
    }

    public function getPhoto() {
        return $this -> _photo;
    }

    public function setPhoto($photo) {
        $this -> _photo = base64_encode($photo);
    }

    public function getType() {
        return $this -> _type;
    }

    public function setType($type) {
        $this -> _type = $type;
    }

    public function getArray() {

        $array = array();

        $array["id"] = $this -> getId();
        $array["name"] = $this -> getName();
        $array["username"] = $this -> getUsername();
        $array["email"] = $this -> getEmail();
        $array["photo"] = $this -> getPhoto();
        $array["type"] = $this -> getType();

        return $array;
    }
}

?>