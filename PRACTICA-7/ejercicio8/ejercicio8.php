<?php
$conexion = new mysqli("localhost", "root", "", "prueba");

$busqueda = $_POST['buscar'] ?? '';
$resultados = null;

if (!empty($busqueda)) {
    $stmt = $conexion->prepare("SELECT canciones FROM buscador WHERE canciones LIKE ?");
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $resultados = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 - Buscador de Canciones</title>
</head>
<body>
    <h2>Buscador de Canciones</h2>
    <form action="buscador.php" method="post">
        <input type="text" name="buscar" placeholder="Título o palabra clave..." value="<?php echo htmlspecialchars($busqueda); ?>" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($resultados !== null): ?>
        <h3>Resultados:</h3>
        <?php if ($resultados->num_rows > 0): ?>
            <ul>
                <?php while ($row = $resultados->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($row['canciones']); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron canciones que coincidan con la búsqueda.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>