<?php
session_name("nombre_apellidos");
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Omayra Valdivia Ortega</title>
	</head>
	<body>
   		<header>
            <h1>Act19 - Ej3 - Omayra</h1>
        </header>
        <?php
        $correcto = $_POST['correcto'];
        if ($correcto == "No") {
            echo "<p style='color:red'>Su nombre y apellidos <strong>no</strong> son: <strong>".
            $_SESSION['nombre']." ".$_SESSION['apellidos']."</strong></p>";
        } else {
            echo "<p style='color:green'>Su nombre y apellidos son: <strong>".
                $_SESSION['nombre']." ".$_SESSION['apellidos']."</strong></p>";
        }
        ?>
  		<p><a href="index.php">Volver a la primera página.</a></p>
	</body>
</html>
