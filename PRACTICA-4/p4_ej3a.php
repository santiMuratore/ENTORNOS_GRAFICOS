<!--
 PRÁCTICA 4 - Ejercicio 3 a)
 Explicar para qué se utiliza el siguiente código.

 EXPLICACIÓN (en comentarios dentro del PHP más abajo).
-->
<html>
<head><title>Documento 1</title></head>
<body>
<?php
    /*
     * Este código genera una TABLA HTML de 5 filas por 2 columnas
     * ($row = 5, $col = 2), con ancho 90% y borde 1.
     * Cada celda contiene un espacio no separable (&nbsp;).
     * El for externo crea las filas (<tr>) y el for interno crea las
     * celdas (<td>) de cada fila.
     */
    echo "<table width = 90% border = '1' >";
    $row = 5;
    $col = 2;
    for ($r = 1; $r <= $row; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $col;$c++) {
            echo "<td>&nbsp;</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
</body></html>
