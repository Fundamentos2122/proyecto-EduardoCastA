<?php

    class Product {
        
        private $_id;
        private $_name;
        private $_price;
        private $_description;
        private $_stock;
        private $_photo;
        private $_active;

        public function __construct($id, $name, $price, $description, $stock, $photo, $active){

            $this->setId($id);
            $this->setName($name);
            $this->setPrice($price);
            $this->setDescription($description);
            $this->setStock($stock);
            $this->setPhoto($photo);
            $this->setActive($active);

        }

        public function getId(){
            return $this->_id;
        }

        public function setId($id){
            $this->_id = $id; 
        }

        public function getName() {
            return $this->_name;
        }

        public function setName($name) {
            $this->_name = $name;
        }

        public function getPrice() {
            return $this->_price;
        }

        public function setPrice($price) {
            $this->_price = $price;
        }

        public function getDescription() {
            return $this->_description;
        }

        public function setDescription($description) {
            $this->_description = $description;
        }

        public function getStock() {
            return $this->_stock;
        }

        public function setStock($stock) {
            $this->_stock = $stock;
        }

        public function getPhoto() {
            return $this->_photo;
        }

        public function setPhoto($photo) {
            $this->_photo = base64_encode($photo);
        }

        public function getActive() {
            return $this->_active;
        }

        public function setActive($active) {
            $this->_active = $active;
        }

        public function getArray() {

            $array = array();
    
            $array['id'] = $this->getId();
            $array['name'] = $this->getName();
            $array['price'] = $this->getPrice();
            $array['description'] = $this->getDescription();
            $array['stock'] = $this->getStock();
            $array['photo'] = $this->getPhoto();
            $array['active'] = $this->getActive();

            return $array;
        }

    }

?>