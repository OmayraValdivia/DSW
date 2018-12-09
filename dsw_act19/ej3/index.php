<?php
session_name("nombre_apellidos");
session_start();
// Si no esta definida numero en variable de sesion se da valor 0.
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}
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
		<form action="nombre.php" method="POST">
        	<p>Escriba su nombre:</p>
            <p>
            	<label for="nombre"><strong>Nombre:</strong></label>
            	<input type="text" name="nombre" id="nombre" size="20" maxlength="20" />
            </p>
            <p><input type="submit" value="Siguiente" />
            <input type="reset" value="Borrar" /></p>
    	</form>
    </body>
</html>
  
