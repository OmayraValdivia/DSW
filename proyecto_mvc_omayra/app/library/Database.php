<?php 
//Clase Base de Datos
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $nombreDB = DB_NOMBRE;
        
        private $dbh; //DataBase Handler
        private $stmt;
        private $error;
        
        public function __construct() {
            //Configuramos la conexión
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->nombreDB;
            $opciones = array (
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            
            //Crear instacia PDO
            try {
                //Conexion a Base de Datos
                $this->dbh=new PDO($dsn,$this->user,$this->password,$opciones);
                //Para arreglar caracteres especiales
                //$this->dbh->exec("set names:utf8");
            }
            catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        //Preparamos la consulta
        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }
        //Vinculamos la consulta
        public function bind($parametro, $valor, $tipo=null){
            if(is_null($tipo)){
                switch (true){
                    case is_int($valor):
                        $tipo=PDO::PARAM_INIT;
                        break;
                    case is_bool($valor):
                        $tipo=PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo=PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo=PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }
        //Ejecuta la consulta
        public function execute () {
            try {
                return $this->stmt->execute();
            }
            catch (PDOException $e) {
                return false;
            }
        }
        //Obtener todos los registros
        public function registros() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }  
        //Obtener un registro
        public function registro() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        } 
        //Obtener numero de registros
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }

?>