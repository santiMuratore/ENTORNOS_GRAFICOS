<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: listado_paginado.php
 * Listado CON paginación de la tabla "ciudades".
 *
 * Funcionamiento:
 *  - $porPagina define cuántos registros se muestran por página.
 *  - El número de página llega por la URL (?pagina=2). Si no llega o es
 *    inválido se muestra la página 1.
 *  - Se cuenta el total de registros con COUNT(*) para calcular la cantidad
 *    de páginas.
 *  - La consulta usa LIMIT desde, cantidad para traer solo los registros de
 *    la página pedida.
 *  - Abajo se arman los enlaces Anterior / números de página / Siguiente.
 */
require "conexion.php";

$porPagina = 4;   // registros por página

// Página actual (mínimo 1)
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) {
    $pagina = 1;
}

// Total de registros y total de páginas
$resTotal = mysqli_query($link, "SELECT COUNT(*) FROM ciudades")
    or die("Error en la consulta: " . mysqli_error($link));
$filaTotal = mysqli_fetch_array($resTotal);
$totalRegistros = (int)$filaTotal[0];
mysqli_free_result($resTotal);

$totalPaginas = max(1, (int)ceil($totalRegistros / $porPagina));
if ($pagina > $totalPaginas) {
    $pagina = $totalPaginas;
}

// Registros de la página pedida
$desde = ($pagina - 1) * $porPagina;
$sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
        FROM ciudades
        ORDER BY id
        LIMIT $desde, $porPagina";
$resultado = mysqli_query($link, $sql)
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de ciudades (paginado)</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Listado de ciudades (con paginación)</h1>

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

    <p>Página <?php echo $pagina; ?> de <?php echo $totalPaginas; ?>
       (<?php echo $totalRegistros; ?> ciudades)</p>

    <div class="paginacion">
<?php
if ($pagina > 1) {
    echo "<a href='listado_paginado.php?pagina=" . ($pagina - 1) . "'>&laquo; Anterior</a>";
}
for ($p = 1; $p <= $totalPaginas; $p++) {
    if ($p == $pagina) {
        echo "<span class='actual'>$p</span>";
    } else {
        echo "<a href='listado_paginado.php?pagina=$p'>$p</a>";
    }
}
if ($pagina < $totalPaginas) {
    echo "<a href='listado_paginado.php?pagina=" . ($pagina + 1) . "'>Siguiente &raquo;</a>";
}
?>
    </div>

    <p><a href="menu.html">Volver al menú</a></p>
</body>
</html>
