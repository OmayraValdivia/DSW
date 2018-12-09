<?php
    session_name("datos");
    session_start();
    
    $nombre = $_GET['nombre'];
    $valor = $_GET['valor'];
    if ($nombre!="" && $valor!="") {
        $_SESSION[$nombre] = $valor;
        header("Location:index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Omayra Valdivia Ortega</title>
	</head>
	<body>
   		<header>
            <h1>Act19 - Ej4 - Omayra - Formulario 2</h1>
        </header>
        <p style='color:red'>No ha escrito el nombre o el valor.</p>
		<p><a href="nuevo-1.php">Volver al formulario.</a></p>
    </body>
</html>
