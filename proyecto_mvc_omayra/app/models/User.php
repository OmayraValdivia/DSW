<?php 
    class User {
        private $db;
        
        public function __construct() {
            $this->db = new Database;
        }
        public function numFilas() {
            $this->db->query("SELECT * FROM users");
            $this->db->registros();
            $results = $this->db->rowCount();
            return $results;
        }
        public function getUsers() {
            $this->db->query("SELECT user_id, name, email FROM users");
            $results = $this->db->registros();
            return $results;
        }
        public function getUser($id) {
            $this->db->query("SELECT * FROM users where user_id=:id");
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
        }
        public function addUser($datos) {
            $this->db->query("INSERT INTO users (name,email,password) VALUES(:name,:email,:password)");
            //Vincular
            $this->db->bind(':name',$datos['name']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':password',md5($datos['password']));
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function editUser($datos) {
            $this->db->query("UPDATE users SET name = :name, email = :email, password = :password WHERE user_id = :id");
            //Vincular
            $this->db->bind(':id',$datos['user_id']);
            $this->db->bind(':name',$datos['name']);
            $this->db->bind(':email',$datos['email']);
            if($datos['password']==null){
                $this->db->bind(':password',$datos['oldPassword']);
            }else{
                $this->db->bind(':password',md5($datos['password']));
            }
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function delUser($datos) {
            $this->db->query("DELETE FROM users WHERE user_id = :id");
            //Vincular
            $this->db->bind(':id',$datos['user_id']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>