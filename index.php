<?php
/**
 * Indexación de los ejercicios del servidor.
 */
$ejercicios = array (
    array('id'=>1,'titulo'=>'Número aleatorio','descripcion'=>'Script que muestra al usuario un número aleatorio comprendido entre 2 números que han sido solicitados mediante un formulario.','enlace'=>'./ejercicios/ejercicio1.php'),
    array('id'=>2,'titulo'=>'Reescritura de contraseñas','descripcion'=>'Script que muestra un formulario con 2 inputs de tipo password y verifica que las 2 contraseñas son iguales.','enlace'=>'./ejercicios/ejercicio2.php'),
    array('id'=>3,'titulo'=>'Operaciones aritméticas','descripcion'=>'Script que muestra un formulario con una operación aritmética básica, generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se realizó correctamente.','enlace'=>'./ejercicios/ejercicio3.php'),
    array('id'=>4,'titulo'=>'Encuesta','descripcion'=>'Script que muestra un formulario que permite la votación de 10 items mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.','enlace'=>'./ejercicios/ejercicio4.php'),
    array('id'=>5,'titulo'=>'Figuras geométricas','descripcion'=>'Script que muestra una figura geométrica utilizando el formato svg. Para ello, el script mostrará un formulario con un radio button con las figuras disponibles: círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará los datos necesarios para su visualización.','enlace'=>'./ejercicios/ejercicio5.php'),
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de ejercicios</title>
</head>
<body>
    <h1>Listado de ejercicios</h1>
    <?php
        echo "<dl>";
        foreach ($ejercicios as $key => $valor) {
            echo '<dt><a target="_blank" href="'.$valor['enlace'].'">'.$valor['id']." ".$valor['titulo']."</a></dt>";
            echo '<dd>'.$valor['descripcion'].'</dd>';
        }
        echo "</dl>";
    ?>
</body>
</html>