<?php
/*
 * PRÁCTICA 4 (arrays, funciones) - Ejercicio 3 b)
 * Indicar la salida.
 *
 * La función sumar() recibe dos sumandos, los suma e imprime la operación.
 * Al llamarla con sumar(5,6) la salida es:
 *
 *   5+6=11
 */
function sumar($sumando1,$sumando2){
    $suma=$sumando1+$sumando2;
    echo $sumando1."+".$sumando2."=".$suma;
}
sumar(5,6);
?>
