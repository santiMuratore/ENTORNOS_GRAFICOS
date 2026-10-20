<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Login</title>
</head>
<body>
    <h2>Formulario de Autenticación</h2>
    <form action="guardar_sesion.php" method="post">
        <label>Usuario: <input type="text" name="usuario" required></label><br><br>
        <label>Clave: <input type="password" name="clave" required></label><br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>