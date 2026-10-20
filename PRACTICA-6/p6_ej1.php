<?php
/*
 * PRÁCTICA 6 - Manejo de Bases de Datos con PHP
 * Ejercicio 1: Completar
 *
 * (Las respuestas están escritas con la extensión mysqli, estilo procedural.)
 *
 * ---------------------------------------------------------------------
 * Consulta a una base de datos: Para comenzar la comunicación con un servidor
 * de base de datos MySQL, es necesario abrir una conexión a ese servidor.
 * Para inicializar esta conexión, PHP ofrece la función
 *
 *     mysqli_connect()
 *
 * Todos sus parámetros son opcionales, pero hay tres de ellos que
 * generalmente son necesarios:
 *
 *     el nombre (o dirección) del servidor (host), el nombre de usuario
 *     y la contraseña.
 *
 * Una vez abierta la conexión, se debe seleccionar una base de datos para su
 * uso, mediante la función
 *
 *     mysqli_select_db()
 *
 * Esta función debe pasar como parámetro:
 *
 *     el identificador de la conexión (el "link" devuelto por mysqli_connect)
 *     y el nombre de la base de datos que se quiere utilizar.
 *
 * La función mysqli_query() se utiliza para:
 *
 *     enviar (ejecutar) una consulta SQL sobre la base de datos
 *     seleccionada (SELECT, INSERT, UPDATE, DELETE, etc.)
 *
 * y requiere como parámetros:
 *
 *     el identificador de la conexión y la cadena de texto con la
 *     sentencia SQL a ejecutar.
 *
 * La cláusula or die() se utiliza para:
 *
 *     terminar la ejecución del script, mostrando un mensaje, cuando la
 *     función anterior falla (devuelve false), por ejemplo si no se pudo
 *     conectar o la consulta tiene un error.
 *
 * y la función mysqli_error() se puede usar para:
 *
 *     obtener el texto del último error producido por MySQL, para
 *     mostrarlo dentro del die() y saber qué falló.
 *
 * ---------------------------------------------------------------------
 * Si la función mysqli_query() es exitosa, el conjunto resultante retornado
 * se almacena en una variable, por ejemplo $vResult, y a continuación se
 * puede ejecutar el siguiente código (EXPLICACIÓN):
 *
 *   - while ($fila = mysqli_fetch_array($vResultado)): recorre el conjunto
 *     resultado fila por fila. En cada vuelta mysqli_fetch_array() devuelve
 *     la siguiente fila como un array (accesible por índice numérico y por
 *     nombre de columna) y avanza el puntero interno; cuando ya no quedan
 *     filas devuelve null y el while termina.
 *
 *   - Dentro del ciclo se escribe en HTML una fila de tabla (<tr>) por cada
 *     registro, con una celda (<td>) por cada columna que se quiere mostrar:
 *     $fila[0], $fila[1] y $fila[2] son la 1ª, 2ª y 3ª columna de la consulta.
 *
 *   - Luego se abre otra fila con una celda de colspan="5", que ocupa el
 *     ancho de 5 columnas; sirve como fila separadora entre registros.
 *
 *   - mysqli_free_result($vResultado): libera la memoria asociada al
 *     conjunto resultado, cuando ya no se lo necesita.
 *
 *   - mysqli_close($link): cierra la conexión con el servidor MySQL.
 *
 * ERRORES DEL CÓDIGO DEL ENUNCIADO:
 *   - $fila[2'] tiene una comilla de más: debe ser $fila[2].
 *   - La fila con colspan="5" queda sin cerrar (faltan </td> y </tr>).
 *   - El enunciado usa $vResultado y $vResult indistintamente; es la misma
 *     variable y hay que usar siempre el mismo nombre.
 * ---------------------------------------------------------------------
 */

// Desactiva las excepciones de mysqli (PHP 8.1+ las activa por defecto) para
// que funcione el estilo "or die(mysqli_error(...))".
mysqli_report(MYSQLI_REPORT_OFF);

// 1) Conexión con el servidor (servidor, usuario, contraseña)
$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

// 2) Selección de la base de datos
mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base de datos: " . mysqli_error($link));

// 3) Consulta SQL
$vResultado = mysqli_query($link, "SELECT id, ciudad, pais FROM ciudades")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 6 - Ejercicio 1</title>
</head>
<body>
<table border="1">
<?php
// 4) Recorrido del conjunto resultado (código del enunciado, corregido)
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
    <td><?php echo ($fila[0]); ?></td>
    <td><?php echo ($fila[1]); ?></td>
    <td><?php echo ($fila[2]); ?></td>
</tr>
<tr>
    <td colspan="5"></td>
</tr>
<?php
}
// 5) Liberar el resultado y cerrar la conexión
mysqli_free_result($vResultado);

mysqli_close($link);
?>
</table>
</body>
</html>
