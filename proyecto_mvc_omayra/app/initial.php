<?php
require_once("config/config.php");

require_once("helpers/url_helper.php");

//Autoload
spl_autoload_register(function($nombreClase){
    require_once "library/" . $nombreClase . ".php";
});

?>