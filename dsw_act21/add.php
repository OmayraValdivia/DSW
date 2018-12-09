<?php 
require_once "pdo.php";
session_start();
if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}
$oldmake = isset($_POST['make']) ? $_POST['make'] : '';
$oldyear = isset($_POST['year']) ? $_POST['year'] : '';
$oldmileage = isset($_POST['mileage']) ? $_POST['mileage'] : '';
//Accion de insertar
if (isset($_POST['insertar'])) {  
    //Comprobar que km o año es entero
    if(is_numeric($_POST['mileage']) && is_numeric($_POST['year'])){
        //Comprobar que marca tenga mas de un caracter
        if(strlen($_POST['make'])>=1){
        $sql = "INSERT INTO autos (make, year, mileage) VALUES (:mk, :yr, :mi)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'])
            );
        $_SESSION['success'] = "Registro insertado";
        header("Location: view.php");
        return;
        }else{
            $_SESSION['error'] = "El campo marca es obligatorio.";
            header("Location: add.php");
            return;
        }
    }else{
        $_SESSION['error'] = "Kilometraje y año deben ser numéricos.";
        header("Location: add.php");
        return;
    }
}

if (isset($_POST['cancelar']) ) {
    header("Location: view.php");
    return;
}
?>
<html>
	<head>
		<title>Omayra Valdivia Ortega</title>
	</head>
	<body>
    	<?php
            if ( isset($_SESSION['error']) ) {
                echo('<p style="color: red; font-weight: bold;">'.htmlentities($_SESSION['error']). "</p>\n");
                unset($_SESSION['error']);
            }
        ?>
		<form method="post">
			<h1>Inserta un auto</h1>
			<table>
				<tr align="right"><th><label for="make">Marca:</label></th>
				<td><input type="text" name="make" id="make" value="<?=htmlentities($oldmake)?>"/></></td></tr>
				<tr align="right"><th><label for="year">A&ntilde;o:</label></th>
				<td><input type="text" name="year" id="year" value="<?=htmlentities($oldyear)?>"></td></tr>
				<tr align="right"><th><label for="mileage">Kilometraje:</label></th>
				<td><input type="text" name="mileage" id="mileage" value="<?=htmlentities($oldmileage)?>"></td></tr>
				<tr><td colspan="2" align="right"><input type="submit" name="insertar" value="Insertar"/></td></tr>
				<tr><td colspan="2" align="right"><input type="submit" name="cancelar" value="Cancelar"/></td></tr>
			</table>
		</form>
	</body>
</html>