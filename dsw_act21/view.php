<?php 
require_once "pdo.php";
session_start();
if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}
?>
<html>
	<head>
		<title>Omayra Valdivia Ortega</title>
	</head>
	<body>
		<br>
		<a href="logout.php">Cerrar sesión</a>
		<br>
		<a href="add.php">Insertar</a>
		<?php
        if ( isset($_SESSION['success']) ) {
            echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
            unset($_SESSION['success']);
        }
        echo "<table border='1'>";
        $stmt = $conn->query("SELECT * FROM autos");
        //Consulta todos los autos y por cada consulta se asocia una fila.
        //Mientras haya fila se rellena los datos de la tabla
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo($row['auto_id']);
            echo("</td><td>");
            echo($row['make']);
            echo("</td><td>");
            echo($row['year']);
            echo("</td><td>");
            echo($row['mileage']);
            echo("</td><td>");
            //Formulario para realizar accion de elimnar.
            echo('<form method="post" action="del.php"><input type="hidden" ');
            //Evitar inyeccion de codigo
            echo('name="auto_id" value="'.htmlentities($row['auto_id']).'">'."\n");
            echo('<input type="submit" value="Eliminar" name="Eliminar">');
            echo("\n</form>\n");
            echo("</td></tr>\n");
        }
        echo "</table>";
        ?>
	</body>
</html>