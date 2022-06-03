<?php

    class Sale {

        private $_id;
        private $_product;
        private $_unitprice;
        private $_amount;
        private $_date;

        public function __construct() {

        }

        public function getId() {
            return $this -> $_id;
        }

        public function setId($id){
            $this -> $_id = $id; 
        }

        public function getProduct() {
            return $this -> $_product;
        }

        public function setProduct($product) {
            $this -> $_product = $product;
        }

        public function getUnitPrice() {
            return $this -> $_unitprice;
        }

        public function setUnitPrice($unitprice) {
            $this -> $_unitprice = $unitprice;
        }

        public function getAmount() {
            return $this -> $_amount;
        }

        public function setAmount($amount) {
            $this -> $_amount = $amount;
        }

        public function getDate() {
            return $this -> $_date;
        }

        public function setDate($date) {
            $this -> $_date = $date;
        }

        public function getArray() {
            
            $array = array();

            $array["id"] = $this -> getId();
            $array["product"] = $this -> getProduct();
            $array["unitprice"] = $this -> getUnitPrice();
            $array["amount"] = $this -> getAmount();
            $array["date"] = $this -> getDate();

            return $array;

        }
    }

?>