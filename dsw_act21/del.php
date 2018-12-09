<?php 
require_once "pdo.php";
session_start();
if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}
//Ación eliminar
if (isset($_POST['delete']) ) {
    $sql = "DELETE FROM autos WHERE auto_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':id' => $_POST['auto_id']));
    $_SESSION['success'] = "Registro borrado";
    header("Location: view.php");
    return;
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
		<br>
		<a href="index.php">Cerrar sesión</a>
		<p>Esta seguro que quiere eliminar el auto con id <?php echo $_POST['auto_id']; ?></p>
		<form method="post">
    		<input type="hidden" name="auto_id" value="<?php echo $_POST['auto_id']; ?>"/>
    		<input type="submit" name="delete" value="Eliminar"/>
    		<input type="submit" name="cancelar" value="Cancelar"/>
		</form>
	</body>
</html>