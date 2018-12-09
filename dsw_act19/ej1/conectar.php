<?php
session_start();
$_SESSION['success'] = 'conectado';
echo "<p style='color:green'>Está usted <b>".$_SESSION['success']."</b></p>\n"; 
?>