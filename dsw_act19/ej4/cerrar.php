<?php
    session_name("datos");
    session_start();
    session_destroy();
    header("Location:index.php");
    exit;
?>
