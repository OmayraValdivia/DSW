<?php
    session_name("datos");
    session_start();
    if (isset($_GET["c"])) {
        $c = $_GET["c"];
        if($c!="" && is_array($c)){
            foreach ($c as $indice => $valor) {
                if (isset($_SESSION[$indice])) {
                    unset($_SESSION[$indice]);
                }
            }
            header("Location:index.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Omayra Valdivia Ortega</title>
	</head>
	<body>
   		<header>
            <h1>Act19 - Ej4 - Omayra - Borrar datos</h1>
        </header>
        <p style='color:red'>No ha seleccionado ningún dato a borrar.</p>
        <p><a href="borrar-1.php">Volver al formulario.</a></p>
    </body>
</html>
