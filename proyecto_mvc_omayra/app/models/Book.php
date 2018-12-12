<?php 
    class Book {
        private $db;
        
        public function __construct() {
            $this->db = new Database;
        }
        
        public function numFilas() {
            $this->db->query("SELECT * FROM books");
            $this->db->registros();
            $results = $this->db->rowCount();
            return $results;
        }
        public function numFilasBooksUser($id) {
            $this->db->query("SELECT * FROM wrapups WHERE user_id=:id");
            $this->db->bind(':id', $id);
            $this->db->registros();
            $results = $this->db->rowCount();
            return $results;
        }
        public function getBooks() {
            $this->db->query("SELECT * FROM books");
            $results = $this->db->registros();
            return $results;
        }
        public function getBook($id) {
            $this->db->query("SELECT * FROM books WHERE book_id=:id");
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
        }
        public function getBooksOfUser($id) {
            $this->db->query("SELECT b.*, w.mark FROM books b RIGHT JOIN wrapups w ON b.book_id = w.book_id WHERE w.user_id=:id");
            $this->db->bind(':id', $id);
            $results = $this->db->registros();
            return $results;
        }
        
        public function existBook($title) {
            $this->db->query("SELECT * FROM books where title=:title");
            $this->db->bind(':title',$title);
            $this->db->registros();
            $results = $this->db->rowCount();
            return $results;
        }
        public function addBook($datos) {
            //Comprobar que no existe ya un libro con ese nombre
            if($this->existBook($datos['title'])>0){
                return false;
            }else{
                $this->db->query("INSERT INTO books (title,autor,editorial) VALUES(:title,:autor,:editorial)");
                //Vincular
                $this->db->bind(':title',$datos['title']);
                $this->db->bind(':autor',$datos['autor']);
                $this->db->bind(':editorial',$datos['editorial']);
                //Execute
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            
            
        }
        public function editBook($datos) {
            $this->db->query("UPDATE books SET title = :title, autor = :autor, editorial = :editorial WHERE book_id = :id");
            //Vincular
            $this->db->bind(':id',$datos['book_id']);
            $this->db->bind(':title',$datos['title']);
            $this->db->bind(':autor',$datos['autor']);
            $this->db->bind(':editorial',$datos['editorial']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function delBook($datos) {
            $this->db->query("DELETE FROM books WHERE book_id = :id");
            //Vincular
            $this->db->bind(':id',$datos['book_id']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>