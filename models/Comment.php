<?php

    class Comment {
        
        private $_id;
        private $_author;
        private $_comment;

        public function __construct($id, $comment, $author) {

            $this->setId($id);
            $this->setComment($comment);
            $this->setAuthor($author);

        }

        public function getId() {
            return $this->_id;
        }

        public function setId($id){
            $this->_id = $id;
        }

        public function getAuthor() {
            return $this->_author;
        }

        public function setAuthor($author){
            $this->_author = $author;
        }

        public function getComment() {
            return $this->_comment;
        }

        public function setComment($comment) {
            $this->_comment = $comment;
        }

        public function getArray() {

            $array = array();

            $array["id"] = $this->getId();
            $array["comment"] = $this->getComment();
            $array["author"] = $this->getAuthor();

            return $array;

        }

    }

?>