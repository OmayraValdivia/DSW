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
        $apellidos = $_POST['apellidos'];
        if ($apellidos == "") {
            echo "<p style='color:red'>No ha escrito sus apellidos</p>";
        } else {
            $_SESSION['apellidos'] = $apellidos;
            ?>
        	<form action="comprobar.php" method="POST">
        		<p>Su nombre y apellidos son: <strong><?php echo $_SESSION['nombre']." ".$apellidos;?></strong></p>
            	<p>¿Es correcto?</p>
                <input type="submit" name="correcto" value="Si" />
                <input type="submit" name="correcto" value="No" />
        	</form>
            <?php 
        }
        ?>
  		<p><a href="index.php">Volver a la primera página.</a></p>
	</body>
</html>