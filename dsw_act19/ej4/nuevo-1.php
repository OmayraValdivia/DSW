<!DOCTYPE html>
<html>
	<head>
        <title>Omayra Valdivia Ortega</title>
	</head>
	<body>
   		<header>
            <h1>Act19 - Ej4 - Omayra - Insertar dato nuevo</h1>
        </header>
        <form action="nuevo-2.php" method="get">
            <p>Escriba el nuevo dato:</p>
            <table>
              	<tbody>
                	<tr>
                  		<td><label for="nombre"><strong>Nombre del dato:</strong><label></label></td>
                  		<td><input type="text" name="nombre" id="nombre" size="20" maxlength="20" /></td>
                	</tr>
                	<tr>
                  		<td><label for="valor"><strong>Valor del dato:</strong></label></td>
                  		<td><input type="text" name="valor" id="valor" size="30" maxlength="30" /></td>
            		</tr>
            	</tbody>
            </table>
            <p>
            	<input type="submit" value="Guardar" />
            	<input type="reset" value="Borrar" />
            </p>
        </form>
        <p><a href="index.php">Volver al inicio.</a></p>
    </body>
</html>
