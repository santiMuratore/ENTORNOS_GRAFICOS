<?php
/*
 * PRÁCTICA 5 - Ejercicio 1
 * Escribir un script en PHP para poder enviar un correo electrónico, con
 * formato HTML, a través del servidor.
 *
 * Para enviar en formato HTML hay que indicar el Content-type text/html en las
 * cabeceras (4º parámetro de mail()), junto con MIME-Version.
 *
 * NOTA: mail() necesita un servidor de correo configurado en php.ini
 * (SMTP, smtp_port y sendmail_from en Windows/XAMPP, o sendmail_path en
 * Linux). Sin esa configuración la función devuelve false. Para probar,
 * poner un correo propio como destinatario.
 */
$destinatario = "tucorreo@ejemplo.com";
$asunto       = "Prueba de correo en formato HTML";

$cuerpo = "
<html>
<head><title>Prueba</title></head>
<body>
    <h1>Hola!</h1>
    <p>Este es un correo enviado desde <b>PHP</b> con formato <i>HTML</i>.</p>
    <table border='1'>
        <tr><th>Materia</th><th>Práctica</th></tr>
        <tr><td>Entornos Gráficos</td><td>5</td></tr>
    </table>
</body>
</html>";

$cabeceras  = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: Sitio Web <webmaster@ejemplo.com>\r\n";

if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
    echo "El correo se envió correctamente.";
} else {
    echo "No se pudo enviar el correo.";
}
?>
