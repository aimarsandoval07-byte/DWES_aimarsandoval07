<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de alumnado</title>
    <link rel="stylesheet" href="lista.css">
</head>
<body>
    <h2>Listado de Alumnos:</h2>

    <?php
    require "conexion.php";

    $registros = mysqli_query($conexion, "SELECT * FROM alumnos");
    ?>
    <ul>
    <?php
    $numero = 1;
    while ($fila = mysqli_fetch_array($registros)): ?>
        <li>
            <strong><?= $numero ?>. <?= htmlspecialchars($fila['apellido']) ?>, <?= htmlspecialchars($fila['nombre']) ?></strong><br>
            Fecha de nacimiento: <?= htmlspecialchars($fila['fechaNacimiento']) ?><br>
            Curso: <?= htmlspecialchars($fila['curso']) ?><br>
            Email: <?= htmlspecialchars($fila['email']) ?><br>
            <form method="post" action="borrar.php" onsubmit="return confirm('¿Seguro que quieres borrar este alumno?');">
                <input type="hidden" name="codigo" value="<?= htmlspecialchars($fila['codigo']) ?>">
                <button type="submit">Borrar</button>
            </form>
        </li>
    <?php
        $numero++;
    endwhile;
    mysqli_close($conexion);
    ?>
    </ul>

    <br><a href="index.html">Volver al formulario</a><br>
</body>
</html>