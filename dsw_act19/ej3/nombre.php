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
        $nombre = $_POST['nombre'];
        if ($nombre == "") {
            echo "<p style='color:red'>No ha escrito su nombre</p>";
        } else {
            $_SESSION["nombre"] = $nombre;
            ?>
        	<form action="apellidos.php" method="POST">
        		<p>Su nombre es: <strong><?php echo $nombre?></strong></p>
            	<p>Escriba su apellidos:</p>
                <p>
                	<label for="apellidos"><strong>Apellidos:</strong></label>
                	<input type="text" name="apellidos" id="apellidos" size="30" maxlength="30" />
                </p>
                <p><input type="submit" value="Siguiente" />
                <input type="reset" value="Borrar" /></p>
        	</form>
            <?php 
        }
        ?>
  		<p><a href="index.php">Volver a la primera página.</a></p>
	</body>
</html>
