<?php
session_name("calcular");
session_start();
// Si no esta definida numero en variable de sesion se da valor 0.
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}
$accion = $_POST['accion'];
//Comparamos las distintas acciones con el texto que marcamos del formulario
//Igualar a 0
if ($accion == "Poner a cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir") {
    //Sumar 1
    $_SESSION["numero"] ++;
} elseif ($accion == "bajar") {
    //Restar 1
    $_SESSION["numero"] --;
}
//Regresar al idex.php
header("Location:index.php");
exit;
?>

