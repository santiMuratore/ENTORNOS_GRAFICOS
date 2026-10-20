<?php
/*
 * PRÁCTICA 5 - Ejercicio 3
 * Escribir un script para que un visitante recomiende el sitio a un amigo.
 *
 * El visitante ingresa su nombre, su email y el email de su amigo. Se envía
 * al amigo un correo en formato HTML con el enlace al sitio. Cambiar la URL
 * del enlace por la dirección real del sitio.
 *
 * NOTA: mail() necesita un servidor de correo configurado en php.ini.
 */
$mensaje = "";

if (isset($_POST['enviar'])) {
    $tuNombre    = trim($_POST['tu_nombre']);
    $tuEmail     = trim($_POST['tu_email']);
    $emailAmigo  = trim($_POST['email_amigo']);

    if ($tuNombre == "" || $tuEmail == "" || $emailAmigo == "") {
        $mensaje = "Completá todos los campos.";
    } elseif (!filter_var($tuEmail, FILTER_VALIDATE_EMAIL) ||
              !filter_var($emailAmigo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "Alguna de las direcciones de email no es válida.";
    } else {
        $asunto = $tuNombre . " te recomienda un sitio web";

        $cuerpo = "
        <html><body>
            <p>Hola!</p>
            <p><b>" . htmlspecialchars($tuNombre) . "</b> te recomienda visitar nuestro sitio:</p>
            <p><a href='http://localhost/sitio/index.php'>http://localhost/sitio/index.php</a></p>
        </body></html>";

        $cabeceras  = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
        $cabeceras .= "From: webmaster@ejemplo.com\r\n";
        $cabeceras .= "Reply-To: " . $tuEmail . "\r\n";

        if (mail($emailAmigo, $asunto, $cuerpo, $cabeceras)) {
            $mensaje = "¡Recomendación enviada!";
        } else {
            $mensaje = "No se pudo enviar el correo.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recomendar sitio</title>
</head>
<body>
    <h1>Recomendá este sitio a un amigo</h1>
    <?php if ($mensaje != "") { echo "<p><b>" . $mensaje . "</b></p>"; } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Tu nombre:<br><input type="text" name="tu_nombre"></p>
        <p>Tu email:<br><input type="text" name="tu_email"></p>
        <p>Email de tu amigo:<br><input type="text" name="email_amigo"></p>
        <p><input type="submit" name="enviar" value="Recomendar"></p>
    </form>
</body>
</html>
