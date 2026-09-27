<?php
require "conexion.php";

$codigo = $_POST['codigo'] ?? '';

if ($codigo != '') {
    $borrar = "DELETE FROM alumnos WHERE codigo = '$codigo'";
    mysqli_query($conexion, $borrar);
}

mysqli_close($conexion);

header("Location: lista.php");
exit;