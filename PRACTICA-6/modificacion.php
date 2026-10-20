<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: modificacion.php
 * MODIFICACIÓN de una ciudad.
 *
 * Tiene tres estados:
 *  1) Sin parámetros: muestra el listado con un enlace "Modificar" por fila.
 *  2) Con ?id=N: busca la ciudad y muestra el formulario cargado con sus
 *     datos actuales.
 *  3) Al enviar el formulario (POST): valida y ejecuta UPDATE sobre ese id.
 *
 * Los textos se escapan con mysqli_real_escape_string y los números se
 * convierten con (int) / (float) para evitar inyección SQL.
 */
require "conexion.php";

$mensaje = "";
$esError = false;
$ciudadFila = null;   // datos de la ciudad que se está editando

// ---- 3) Se envió el formulario: UPDATE ----
if (isset($_POST['guardar'])) {
    $id         = (int)$_POST['id'];
    $ciudad     = trim($_POST['ciudad']);
    $pais       = trim($_POST['pais']);
    $habitantes = trim($_POST['habitantes']);
    $superficie = trim($_POST['superficie']);
    $tieneMetro = $_POST['tieneMetro'] == "1" ? "1" : "0";

    // Se conservan los valores ingresados por si hay que volver a mostrar el formulario
    $ciudadFila = array(
        'id' => $id, 'ciudad' => $ciudad, 'pais' => $pais,
        'habitantes' => $habitantes, 'superficie' => $superficie,
        'tieneMetro' => $tieneMetro
    );

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

        $sql = "UPDATE ciudades
                SET ciudad = '$ciudadSql', pais = '$paisSql', habitantes = $habSql,
                    superficie = $supSql, tieneMetro = $metroSql
                WHERE id = $id";
        mysqli_query($link, $sql)
            or die("Error al modificar: " . mysqli_error($link));

        $mensaje = "La ciudad con id $id fue modificada correctamente.";
        $ciudadFila = null;   // se vuelve al listado
    }
}

// ---- 2) Se pidió editar una ciudad: SELECT de esa fila ----
elseif (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $res = mysqli_query($link, "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
                                FROM ciudades WHERE id = $id")
        or die("Error en la consulta: " . mysqli_error($link));
    $ciudadFila = mysqli_fetch_array($res);
    mysqli_free_result($res);

    if (!$ciudadFila) {
        $mensaje = "No existe una ciudad con id $id.";
        $esError = true;
        $ciudadFila = null;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificación de ciudad</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Modificación de ciudad</h1>

    <?php if ($mensaje != "") { ?>
        <p class="mensaje<?php echo $esError ? ' error' : ''; ?>"><?php echo $mensaje; ?></p>
    <?php } ?>

<?php if ($ciudadFila) { ?>

    <!-- Formulario con los datos actuales de la ciudad -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $ciudadFila['id']; ?>">
        <p>Id: <b><?php echo $ciudadFila['id']; ?></b></p>
        <p>Ciudad:<br>
            <input type="text" name="ciudad" maxlength="50"
                   value="<?php echo htmlspecialchars($ciudadFila['ciudad']); ?>"></p>
        <p>País:<br>
            <input type="text" name="pais" maxlength="50"
                   value="<?php echo htmlspecialchars($ciudadFila['pais']); ?>"></p>
        <p>Habitantes:<br>
            <input type="text" name="habitantes"
                   value="<?php echo htmlspecialchars($ciudadFila['habitantes']); ?>"></p>
        <p>Superficie:<br>
            <input type="text" name="superficie"
                   value="<?php echo htmlspecialchars($ciudadFila['superficie']); ?>"></p>
        <p>¿Tiene metro?<br>
            <select name="tieneMetro">
                <option value="1"<?php echo $ciudadFila['tieneMetro'] == "1" ? " selected" : ""; ?>>Sí</option>
                <option value="0"<?php echo $ciudadFila['tieneMetro'] == "0" ? " selected" : ""; ?>>No</option>
            </select></p>
        <p><input type="submit" name="guardar" value="Guardar cambios"></p>
    </form>

    <p><a href="modificacion.php">Cancelar</a></p>

<?php } else {
    // ---- 1) Listado con enlace "Modificar" ----
    $resultado = mysqli_query($link, "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
                                      FROM ciudades ORDER BY id")
        or die("Error en la consulta: " . mysqli_error($link));
?>

    <p>Elegí la ciudad que querés modificar:</p>
    <table>
        <tr>
            <th>id</th>
            <th>ciudad</th>
            <th>país</th>
            <th>habitantes</th>
            <th>superficie</th>
            <th>tieneMetro</th>
            <th>acción</th>
        </tr>
<?php
    while ($fila = mysqli_fetch_array($resultado)) {
?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo htmlspecialchars($fila['ciudad']); ?></td>
            <td><?php echo htmlspecialchars($fila['pais']); ?></td>
            <td><?php echo $fila['habitantes']; ?></td>
            <td><?php echo $fila['superficie']; ?></td>
            <td><?php echo $fila['tieneMetro']; ?></td>
            <td><a href="modificacion.php?id=<?php echo $fila['id']; ?>">Modificar</a></td>
        </tr>
<?php
    }
    mysqli_free_result($resultado);
?>
    </table>

<?php } ?>

    <p><a href="menu.html">Volver al menú</a></p>
</body>
</html>
<?php mysqli_close($link); ?>
