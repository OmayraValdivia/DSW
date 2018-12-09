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
            <h1>Act19 - Ej4 - Omayra - Borrar datos</h1>
        </header>
        <?php
        if (!count($_SESSION)) {
            echo "<p>Todavía no se ha introducido ningún dato.</p>";
        } else {
            ?>
            <form action="borrar-2.php" method="get">
            	<p>Marque los datos a borrar:</p>
            	<table>
            		<tbody>
            		<?php 
                    foreach($_SESSION as $indice => $valor) {
                        echo "<tr><td><input type=\"checkbox\" name=\"c[$indice]\" value=\"$valor\" /></td>";
                        echo "<td>$indice: $valor</td></tr>";
                    }
                    ?>
            		</tbody>
            	</table>
            	<p>
            		<input type="submit" value="Borrar"/>
            		<input type="reset" value="Desmarcar casillas"/>
            	</p>
            </form>
            <?php 
        }
        ?>
        <p><a href="index.php">Volver al inicio.</a></p>
    </body>
</html>
