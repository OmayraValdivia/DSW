<?php
session_start();
echo "<p style='color:red'>Está usted <b>desconectado</b></p>\n";  
session_destroy();
?>