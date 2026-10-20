<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: listado.php
 * Listado SIN paginación de la tabla "ciudades".
 * Muestra todos los registros en una tabla HTML con el formato del enunciado
 * (id, ciudad, país, habitantes, superficie, tieneMetro).
 */
require "conexion.php";

$sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
        FROM ciudades
        ORDER BY id";
$resultado = mysqli_query($link, $sql)
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de ciudades</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Listado de ciudades</h1>

    <table>
        <tr>
            <th>id</th>
            <th>ciudad</th>
            <th>país</th>
            <th>habitantes</th>
            <th>superficie</th>
            <th>tieneMetro</th>
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
