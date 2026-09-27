<?php
include "conexion.php";

$id = $_POST['codigo'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$fechaNacimiento = $_POST['fechaNacimiento'] ?? '';
$curso = $_POST['curso'] ?? '';
$email = $_POST['email'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

$sql = "SELECT COUNT(*) AS totalAlumnos FROM alumnos WHERE curso = '$curso'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);

if ($fila['totalAlumnos'] >= 25) {
    echo "No se puede matricular más gente en ese curso";
} else {
    $insertar = "INSERT INTO alumnos (nombre, apellido, fechaNacimiento, curso, email, contraseña)
                 VALUES ('$nombre', '$apellido', '$fechaNacimiento', '$curso', '$email', '$contraseña')";

    if (mysqli_query($conexion, $insertar)) {
        echo "Alumno registrado correctamente";
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
    
}
?>
<br><a href="index.html">← Volver al formulario</a><br>