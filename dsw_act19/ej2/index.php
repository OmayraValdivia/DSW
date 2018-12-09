<?php
session_name("calcular");
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
            <h1>Act19 - Ej2 - Omayra</h1>
        </header>
		<form action="calcular.php" method="POST">
			<button type="submit" name="accion" value="bajar" style="font-size: 4rem">-</button>
        	<?php
            // Muestra el número, guardado en la sesión
            print "<span style=\"font-size: 4rem\">$_SESSION[numero]</span>\n";
            ?>
            <button type="submit" name="accion" value="subir" style="font-size: 4rem">+</button>
        	<p><input type="submit" name="accion" value="Poner a cero" /></p>
    	</form>
	</body>
</html>

