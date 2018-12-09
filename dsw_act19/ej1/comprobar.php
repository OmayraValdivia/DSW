<?php
session_start();
if(isset($_SESSION['success']) && $_SESSION['success']=='conectado'){
    echo "<p style='color:green'>Está usted <b>".$_SESSION['success']."</b></p>\n"; 
}else{
    echo "<p style='color:red'>Está usted <b>desconectado</b></p>\n"; 
}
?>