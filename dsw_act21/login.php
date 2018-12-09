<?php
session_start();
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}
if(isset($_POST['entrar'])){
    //Obtenemos en variables lo que pasamos por formulario
    $email=$_POST['email'];
    $password=$_POST['password'];
    $salt = 'XyZzy12*_';
    //Creamos hash con el salt y la contraseña.
    $stored_hash = hash('md5', 'XyZzy12*_php123');
    //Calculamos con la contraseña pasada el hash con el salt y la llamamos check
    //para luego compararla con la que tenemos guardada
    $check = hash('md5', $salt.$password);
    if ( isset($email) || isset($password) ) {
        //Comprobamos si email o contraseña estan vacios
        if (empty($email) || empty($password)){
            $_SESSION['error'] = "Se requiere email y contraseña";
            header("Location: login.php");
            return;
            //Comprobamos si contraseña no es vacio o si no coincide el hash con el check
        } else if(strlen($password)<1 || $check!=$stored_hash){
            //Guardamos en log de error el aviso del correo que entro incorrectamente
            error_log("Login fail ".$email." ".$check);
            $_SESSION['error'] = "Contraseña incorrecta";
            header("Location: login.php");
            return;
            //Comprobamos que email tenga un signo '@'
        } else if(substr_count($email,"@")!=1){
            $_SESSION['error'] = "El correo electrónico debe tener un signo (@)";
            header("Location: login.php");
            return;
        } else {
            //Guardamos en log de error el aviso del correo que entro incorrectamente
            error_log("Login success ".$email);
            //Redirecciona a  view.php
            $_SESSION['name'] = $email;
            header("Location: view.php");
            return;
        }
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Omayra Valdivia Ortega</title>
	</head>
	<body>
		<div>
			<h1>Entrar</h1>
            <?php
            if ( isset($_SESSION['error']) ) {
                echo('<p style="color: red; font-weight: bold;">'.htmlentities($_SESSION['error']). "</p>\n");
                unset($_SESSION['error']);
            }
            ?>
			<form method="POST">
			<table>
				<tr><th><label for="email">Correo</label></th>
				<td><input type="text" name="email" id="email"></td></tr>
				<tr><th><label for="password">Contraseña</label></th>
				<td><input type="password" name="password" id="password"></td></tr>
				<tr align='center'><td><input type="submit" name="entrar" value="Entrar"></td>
				<td><input type="submit" name="cancel" value="Cancelar"></td></tr>
			</table>
			</form>
		</div>
	</body>
</html>