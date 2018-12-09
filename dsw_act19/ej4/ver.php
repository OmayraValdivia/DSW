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
            <h1>Act19 - Ej4 - Omayra - Ver datos</h1>
        </header>
        <?php
        if (!count($_SESSION)) {
            echo "<p>Todavía no se ha introducido ningún dato.</p>";
        } else {
            echo "<p>Datos introducidos:</p>";
            echo "<ul>";
            foreach($_SESSION as $indice => $valor) {
                echo "<li>$indice: $valor</li>";
            }
            echo "</ul>";
        }
        ?>
        <p><a href="index.php">Volver al inicio.</a></p>
    </body>
</html>
