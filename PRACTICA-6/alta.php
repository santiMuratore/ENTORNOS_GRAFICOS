<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: alta.php
 * ALTA de una ciudad.
 *
 * El formulario se procesa a sí mismo. Al enviarlo se validan los datos y
 * se inserta un nuevo registro con INSERT. El id es AUTO_INCREMENT, por lo
 * que lo asigna MySQL.
 *
 * Los textos se escapan con mysqli_real_escape_string y los números se
 * convierten con (int) / (float) para evitar inyección SQL.
 */
require "conexion.php";

$mensaje = "";
$esError = false;

// Valores por defecto del formulario
$ciudad = $pais = $habitantes = $superficie = "";
$tieneMetro = "0";

if (isset($_POST['guardar'])) {
    $ciudad     = trim($_POST['ciudad']);
    $pais       = trim($_POST['pais']);
    $habitantes = trim($_POST['habitantes']);
    $superficie = trim($_POST['superficie']);
    $tieneMetro = $_POST['tieneMetro'] == "1" ? "1" : "0";

    if ($ciudad == "" || $pais == "" || $habitantes == "" || $superficie == "") {
        $mensaje = "Completá todos los campos.";
        $esError = true;
    } elseif (!ctype_digit($habitantes)) {
        $mensaje = "Los habitantes deben ser un número entero positivo.";
        $esError = true;
    } elseif (!is_numeric($superficie) || $superficie < 0) {
        $mensaje = "La superficie debe ser un número positivo (por ej. 333.33).";
        $esError = true;
    } else {
        $ciudadSql = mysqli_real_escape_string($link, $ciudad);
        $paisSql   = mysqli_real_escape_string($link, $pais);
        $habSql    = (int)$habitantes;
        $supSql    = (float)$superficie;
        $metroSql  = (int)$tieneMetro;

        $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                VALUES ('$ciudadSql', '$paisSql', $habSql, $supSql, $metroSql)";
        mysqli_query($link, $sql)
            or die("Error al insertar: " . mysqli_error($link));

        $mensaje = "Ciudad agregada correctamente (id " . mysqli_insert_id($link) . ").";
        // Se limpia el formulario
        $ciudad = $pais = $habitantes = $superficie = "";
        $tieneMetro = "0";
    }
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de ciudad</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Alta de ciudad</h1>

    <?php if ($mensaje != "") { ?>
        <p class="mensaje<?php echo $esError ? ' error' : ''; ?>"><?php echo $mensaje; ?></p>
    <?php } ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Ciudad:<br>
            <input type="text" name="ciudad" maxlength="50" value="<?php echo htmlspecialchars($ciudad); ?>"></p>
        <p>País:<br>
            <input type="text" name="pais" maxlength="50" value="<?php echo htmlspecialchars($pais); ?>"></p>
        <p>Habitantes:<br>
            <input type="text" name="habitantes" value="<?php echo htmlspecialchars($habitantes); ?>"></p>
        <p>Superficie:<br>
            <input type="text" name="superficie" value="<?php echo htmlspecialchars($superficie); ?>"></p>
        <p>¿Tiene metro?<br>
            <select name="tieneMetro">
                <option value="1"<?php echo $tieneMetro == "1" ? " selected" : ""; ?>>Sí</option>
                <option value="0"<?php echo $tieneMetro == "0" ? " selected" : ""; ?>>No</option>
            </select></p>
        <p><input type="submit" name="guardar" value="Guardar"></p>
    </form>

    <p><a href="listado.php">Ver listado</a> | <a href="menu.html">Volver al menú</a></p>
</body>
</html>
