<?php 
    class Wrapup {
        private $db;
        
        public function __construct() {
            $this->db = new Database;
        }
        public function getWrapup($user_id,$book_id) {
            $this->db->query("SELECT * FROM wrapups WHERE user_id=:user_id AND book_id=:book_id");
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':book_id', $book_id);
            $fila = $this->db->registro();
            return $fila;
        }
        public function addWrapup($datos) {
            //Comprobar que no existe ya un libro con ese nombre
            $this->db->query("INSERT INTO wrapups (user_id,book_id,mark) VALUES(:user_id,:book_id,:mark)");
            //Vincular
            $this->db->bind(':user_id',$datos['user_id']);
            $this->db->bind(':book_id',$datos['book_id']);
            $this->db->bind(':mark',$datos['mark']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function editWrapup($datos) {
            $this->db->query("UPDATE wrapups SET mark = :mark WHERE book_id = :book_id AND user_id = :user_id");
            //Vincular
            $this->db->bind(':mark',$datos['mark']);
            $this->db->bind(':book_id',$datos['book_id']);
            $this->db->bind(':user_id',$datos['user_id']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function delWrapup($datos) {
            $this->db->query("DELETE FROM wrapups WHERE book_id = :book_id AND user_id = :user_id");
            //Vincular
            $this->db->bind(':book_id',$datos['book_id']);
            $this->db->bind(':user_id',$datos['user_id']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>