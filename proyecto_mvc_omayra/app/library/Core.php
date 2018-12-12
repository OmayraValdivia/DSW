<?php 
class Core {
    
    protected $controladorActual ="Users"; //Controlador por defecto
    protected $metodoActual = "index"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros
    
    public function __construct() {
        $url = $this->getUrl();
        //Comprobamos si existe el controlador que indicamos en la posicion 0 de $url
        if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
            //Si existe, se indica como controladorActual
            $this->controladorActual = ucwords($url[0]);
            //Eliminamos el controlador de la url (posicion 0)
            unset($url[0]);
        }
        //Requerimos el controlador actual
        require_once "../app/controllers/" . $this->controladorActual . ".php";
        $this->controladorActual = new $this->controladorActual;
        //Si existe la posicion 1 de url (metodo)
        if (isset($url[1])) {
            //Comprobamos si existe el metodo en el controlador actual.
            if (method_exists($this->controladorActual, $url[1])) {
                $this->metodoActual = $url[1];
                unset($url[1]);
            }
        }
        //echo $this->metodoActual;
        
        //Obtener parametros
        $this->parametros = $url ? array_values($url) : [];
        //Callback con parametros array
        call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
    }
    
    public function getUrl(){
        //echo $_GET["url"];
        
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            
            return $url;
        }
    }
}
?>