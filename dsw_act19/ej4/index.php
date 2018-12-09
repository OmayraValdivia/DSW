<?php
    session_name("datos");
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Omayra Valdivia Ortega</title>
	</head>
	<body>
   		<header>
            <h1>Act19 - Ej4 - Omayra</h1>
        </header>
        <?php
        if (count($_SESSION)) {
            print "<p>Hay datos guardados.</p>\n";
        } else {
            print "<p>No hay datos guardados.</p>\n";
        }
        ?>
		<p>Elija una opción:</p>
		<ul>
        	<li><a href="nuevo-1.php">Guardar un nuevo dato</a></li>
            <li><a href="ver.php">Ver los datos actuales</a></li>
            <li><a href="borrar-1.php">Borrar datos</a></li>
            <li><a href="cerrar.php">Cerrar la sesión</a></li>
        </ul>
    </body>
</html>
