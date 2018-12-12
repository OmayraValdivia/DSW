<?php 
//Controlador principal
//Carga vistas y modelos
Class Controller {
    
    public function model ($modelo) {
        // Carga el modelo
        require_once '../app/models/'.$modelo.'.php';
        //Instanciamos el modelo y lo devuelve
        return new $modelo();
    }
    
    public function view ($vista, $datos=[]) {
        // Si el fichero existe lo carga, en caso contrario informa del error y muere
        if(file_exists('../app/views/pages/'.$vista.'.php')){
            require_once '../app/views/pages/'.$vista.'.php';
        }else{
            die('La vista '.$vista.' no existe');
        }
    }
}

?>