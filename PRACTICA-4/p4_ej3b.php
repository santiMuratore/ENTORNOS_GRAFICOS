<html>
<head><title>Documento 2</title></head>
<body>
<?php
/*
 * PRÁCTICA 4 - Ejercicio 3 b)
 * Explicar para qué se utiliza el siguiente código.
 *
 * Es un FORMULARIO QUE SE PROCESA A SÍ MISMO ($_SERVER['PHP_SELF'], método POST):
 *  - Si no se presionó el botón (!isset($_POST['submit'])) muestra el
 *    formulario para ingresar la edad.
 *  - Si se envió el formulario, lee $_POST['age'] y muestra "Mayor de edad"
 *    si es mayor o igual a 21, o "Menor de edad" en caso contrario.
 */
if (!isset($_POST['submit'])) {
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Edad: <input name="age" size="2">
    <input type="submit" name="submit" value="Ir">
    </form>
<?php
    }
else {
    $age = $_POST['age'];
    if ($age >= 21) {
        echo 'Mayor de edad';
        }
    else {
        echo 'Menor de edad';
    }
}
?>
</body></html>
