<?php
/*
 * PRÁCTICA 5 - Ejercicio 2
 * Confeccionar una página de Contacto que presente un formulario para que los
 * visitantes puedan enviar consultas al webmaster.
 *
 * El formulario se procesa a sí mismo ($_SERVER['PHP_SELF']). Se valida que
 * los campos no estén vacíos y que el email sea válido (filter_var). El email
 * del visitante va en Reply-To y no en From, para evitar inyección de
 * cabeceras. Se usa htmlspecialchars al mostrar datos ingresados por el
 * usuario.
 *
 * NOTA: mail() necesita un servidor de correo configurado en php.ini.
 */
$mensaje = "";

if (isset($_POST['enviar'])) {
    $nombre     = trim($_POST['nombre']);
    $email      = trim($_POST['email']);
    $comentario = trim($_POST['comentario']);

    if ($nombre == "" || $email == "" || $comentario == "") {
        $mensaje = "Por favor, completá todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El email ingresado no es válido.";
    } else {
        $webmaster = "webmaster@ejemplo.com";
        $asunto    = "Consulta desde el sitio web de " . $nombre;

        $cuerpo  = "Nombre: " . $nombre . "\r\n";
        $cuerpo .= "Email: " . $email . "\r\n\r\n";
        $cuerpo .= "Consulta:\r\n" . $comentario;

        $cabeceras  = "From: webmaster@ejemplo.com\r\n";
        $cabeceras .= "Reply-To: " . $email . "\r\n";
        $cabeceras .= "Content-type: text/plain; charset=UTF-8\r\n";

        if (mail($webmaster, $asunto, $cuerpo, $cabeceras)) {
            $mensaje = "¡Gracias " . htmlspecialchars($nombre) . "! Tu consulta fue enviada.";
        } else {
            $mensaje = "Hubo un error al enviar la consulta. Intentá más tarde.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <?php if ($mensaje != "") { echo "<p><b>" . $mensaje . "</b></p>"; } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Nombre:<br><input type="text" name="nombre" size="30"></p>
        <p>Email:<br><input type="text" name="email" size="30"></p>
        <p>Comentario:<br><textarea name="comentario" rows="5" cols="40"></textarea></p>
        <p><input type="submit" name="enviar" value="Enviar"></p>
    </form>
</body>
</html>
