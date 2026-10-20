<?php
/*
 * PRÁCTICA 4 - Ejercicio 2
 * Indicar si los siguientes códigos son equivalentes.
 *
 * Cada variante se ejecuta por separado para comparar las salidas.
 *
 * a) SON EQUIVALENTES. Los tres imprimen 12345678910.
 *    - Código 1: while con llaves, print $i++ (imprime y luego incrementa).
 *    - Código 2: sintaxis alternativa while: ... endwhile, misma lógica.
 *    - Código 3: do { print ++$i; } while ($i<10) con $i=0 (incrementa y luego
 *      imprime). El do...while evalúa la condición al final, por lo que
 *      siempre se ejecuta al menos una vez.
 *
 * b) SON EQUIVALENTES. Los cuatro imprimen 12345678910.
 *    - for clásico.
 *    - for sin condición: el break corta cuando $i > 10.
 *    - for(;;) bucle infinito cortado con break.
 *    - for con print en la 3ª expresión: las expresiones separadas por coma
 *      se ejecutan en orden (imprime y luego incrementa), cuerpo vacío.
 *
 * c) SON EQUIVALENTES. if/elseif y switch comparan $i contra 0, 1 y 2
 *    (comparación débil ==) e imprimen "i equals 0/1/2". Con otro valor
 *    ninguno imprime nada. En el switch el break es necesario, si no se
 *    ejecutarían los case siguientes.
 */

echo "<h3>a)</h3>";

echo "Código 1: ";
$i = 1;
while ($i <= 10) {
    print $i++;
}
echo "<br>";

echo "Código 2: ";
$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;
echo "<br>";

echo "Código 3: ";
$i = 0;
do {
    print ++$i;
} while ($i<10);
echo "<br>";

echo "<h3>b)</h3>";

echo "for 1: ";
for ($i = 1; $i <= 10; $i++) {
    print $i;
}
echo "<br>";

echo "for 2: ";
for ($i = 1; ;$i++) {
    if ($i > 10) {
        break;
    }
    print $i;
}
echo "<br>";

echo "for 3: ";
$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    print $i;
    $i++;
}
echo "<br>";

echo "for 4: ";
for ($i = 1; $i <= 10; print $i, $i++) ;
echo "<br>";

echo "<h3>c)</h3>";

// Se prueban los dos códigos con los valores 0, 1, 2 y 5
foreach (array(0, 1, 2, 5) as $i) {
    echo "i = $i -> if/elseif: ";
    if ($i == 0) {
        print "i equals 0";
    } elseif ($i == 1) {
        print "i equals 1";
    } elseif ($i == 2) {
        print "i equals 2";
    }

    echo " | switch: ";
    switch ($i) {
        case 0:
            print "i equals 0";
            break;
        case 1:
            print "i equals 1";
            break;
        case 2:
            print "i equals 2";
            break;
    }
    echo "<br>";
}
?>
