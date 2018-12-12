<?php 
//Refirigir paginas
function redirigir($pagina){
    header('location: ' . RUTA_URL . $pagina);
}
?>