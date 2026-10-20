<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "Compras");

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_GET['agregar'])) {
    $id_prod = (int)$_GET['agregar'];
    $_SESSION['carrito'][$id_prod] = ($_SESSION['carrito'][$id_prod] ?? 0) + 1;
    header("Location: carrito.php");
    exit();
}

if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}

$productos = $conexion->query("SELECT * FROM catalogo");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 - Carrito de Compras</title>
</head>
<body>
    <h2>Catálogo de Productos</h2>
    <table border="1" cellpadding="5">
        <tr><th>Producto</th><th>Precio</th><th>Acción</th></tr>
        <?php while ($row = $productos->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['producto']); ?></td>
                <td>$<?php echo number_format($row['precio'], 2); ?></td>
                <td><a href="carrito.php?agregar=<?php echo $row['id']; ?>">Añadir al Carrito</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Tu Carrito</h2>
    <?php if (!empty($_SESSION['carrito'])): ?>
        <ul>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $id => $cantidad) {
                $res = $conexion->query("SELECT producto, precio FROM catalogo WHERE id = $id");
                $p = $res->fetch_assoc();
                $subtotal = $p['precio'] * $cantidad;
                $total += $subtotal;
                echo "<li>" . htmlspecialchars($p['producto']) . " x $cantidad = $" . number_format($subtotal, 2) . "</li>";
            }
            ?>
        </ul>
        <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>
        <p><a href="carrito.php?vaciar=1">Vaciar Carrito</a></p>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</body>
</html>