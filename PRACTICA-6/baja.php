<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: baja.php
 * BAJA de una ciudad.
 *
 * Muestra el listado de ciudades con un botón "Eliminar" en cada fila. El
 * botón envía el id por POST (no por GET, para que un enlace no pueda borrar
 * datos) y pide confirmación con JavaScript. Al confirmar se ejecuta DELETE
 * sobre ese id y se vuelve a mostrar el listado actualizado.
 */
require "conexion.php";

$mensaje = "";
$esError = false;

if (isset($_POST['eliminar'])) {
    $id = (int)$_POST['id'];

    $sql = "DELETE FROM ciudades WHERE id = $id";
    mysqli_query($link, $sql)
        or die("Error al eliminar: " . mysqli_error($link));

    if (mysqli_affected_rows($link) > 0) {
        $mensaje = "La ciudad con id $id fue eliminada.";
    } else {
        $mensaje = "No existe una ciudad con id $id.";
        $esError = true;
    }
}

$resultado = mysqli_query($link, "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
                                  FROM ciudades ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de ciudad</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Baja de ciudad</h1>

    <?php if ($mensaje != "") { ?>
        <p class="mensaje<?php echo $esError ? ' error' : ''; ?>"><?php echo $mensaje; ?></p>
    <?php } ?>

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
            <td>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                      onsubmit="return confirm('¿Seguro que querés eliminar esta ciudad?');">
                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                    <input type="submit" name="eliminar" value="Eliminar">
                </form>
            </td>
        </tr>
<?php
}
mysqli_free_result($resultado);
mysqli_close($link);
?>
    </table>

    <p><a href="menu.html">Volver al menú</a></p>
</body>
</html>
