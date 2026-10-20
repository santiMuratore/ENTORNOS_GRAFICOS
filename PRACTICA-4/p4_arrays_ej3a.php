<?php
/*
 * PRÁCTICA 4 (arrays, funciones) - Ejercicio 3 a)
 * Indicar la salida.
 *
 * getdate() devuelve un array asociativo con la fecha y hora actuales
 * (hours, minutes, seconds, mday, mon, year, etc.). Dentro de comillas
 * dobles se puede interpolar un elemento del array sin comillas en la clave.
 * La salida depende del momento de ejecución, por ejemplo:
 *
 *   Has entrado en esta pagina a las 16 horas, con 15 minutos y 30 segundos,
 *   del 20/10/2026
 */
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] segundos, del $fun[mday]/$fun[mon]/$fun[year]";
?>
