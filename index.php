<?php
/**
 * Indexación de los ejercicios del servidor.
 */
$ejercicios = array (
    array('id'=>1,'titulo'=>'Número aleatorio','descripcion'=>'Script que muestra al usuario un número aleatorio comprendido entre 2 números que han sido solicitados mediante un formulario.','enlace'=>'./ejercicios/ejercicio1.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio1.php'),
    array('id'=>2,'titulo'=>'Reescritura de contraseñas','descripcion'=>'Script que muestra un formulario con 2 inputs de tipo password y verifica que las 2 contraseñas son iguales.','enlace'=>'./ejercicios/ejercicio2.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio2.php'),
    array('id'=>3,'titulo'=>'Operaciones aritméticas','descripcion'=>'Script que muestra un formulario con una operación aritmética básica, generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se realizó correctamente.','enlace'=>'./ejercicios/ejercicio3.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio3.php'),
    array('id'=>4,'titulo'=>'Encuesta','descripcion'=>'Script que muestra un formulario que permite la votación de 10 items mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.','enlace'=>'./ejercicios/ejercicio4.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio4.php'),
    array('id'=>5,'titulo'=>'Figuras geométricas','descripcion'=>'Script que muestra una figura geométrica utilizando el formato svg. Para ello, el script mostrará un formulario con un radio button con las figuras disponibles: círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará los datos necesarios para su visualización.','enlace'=>'./ejercicios/ejercicio5.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio5.php'),
    array('id'=>6,'titulo'=>'Encuesta 2','descripcion'=>'Ejercicio 4 con array','enlace'=>'./ejercicios/ejercicio6.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio6.php'),
    array('id'=>7,'titulo'=>'Países y capitales','descripcion'=>'Diseña y almacena en un array una lista de países junto con sus capitales. Muestra un formulario que permita al usuario introducir las capitales de los países presentados. En respuesta al formulario, la aplicación mostrará el número de aciertos y fallos. Incluye una opción que permita visualizar las opciones correctas. Muestra una sopa de letras con 5 de las capitales almacenadas.','enlace'=>'./ejercicios/ejercicio7.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio7.php'),
    array('id'=>8,'titulo'=>'Comunidades autónomas','descripcion'=>'A partir de un array que almacena comunidades autónomas y provincias, escribe un programa quemuestre aleatoriamente una comunidad autónoma y presente un formulario con un checkbox que permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al formulario, la aplicación mostrará número de aciertos y fallos. Incluye una opción que permita visualizar las opciones correctas.','enlace'=>'./ejercicios/ejercicio8.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio8.php'),
    array('id'=>9,'titulo'=>'Notas académicas','descripcion'=>'Notas académicas. A partir de un array que almacene los datos de la primera y segunda evaluación de los alumnos de 2o DAW, mostrar un menú de navegación que muestre la siguiente información. • Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota media. • Asignatura con mayor número de aprobados. • Asignatura con mayor número de suspensos. • Número de aprobados en cada asignatura. • Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable.','enlace'=>'./ejercicios/ejercicio9.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ejercicio9.php'),
    array('id'=>10,'titulo'=>'Sopa de letras','descripcion'=>'Sopa de letras de 5 países','enlace'=>'./ejercicios/sopaLetras/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/sopaLetras/index.php'),
    array('id'=>11,'titulo'=>'Autentificacion basica','descripcion'=>'Usuario y contraseña con opción a guardar las credenciales mediante cookies.','enlace'=>'./ejercicios/cookies/ejercicioSimple.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/cookies/ejercicioSimple.php'),
    array('id'=>12,'titulo'=>'Test autoescuela','descripcion'=>'Ejercicio de los test de autoescuela del primer examen.','enlace'=>'./ejercicios/ud4repaso/testsAutoescuela/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ud4repaso/testsAutoescuela'),
    array('id'=>12,'titulo'=>'Puzzles infantiles','descripcion'=>'Puzzles de 2 piezas.','enlace'=>'./ejercicios/ud4repaso/puzles/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/blob/main/ejercicios/ud4repaso/puzles'),
    array('id'=>13,'titulo'=>'BASE DATOS. Capitales','descripcion'=>'Ejercicio de la sopa de letras con base de datos','enlace'=>'./ejercicios/basesDatos/sopa_letras/public/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/tree/main/ejercicios/basesDatos/sopa_letras'),
    array('id'=>14,'titulo'=>'BASE DATOS. Bookmarks','descripcion'=>'Bookmarks en bases de datos','enlace'=>'./ejercicios/basesDatos/bookmarksCorrecto/bookmarks/public/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/tree/main/ejercicios/basesDatos/bookmarksCorrecto/bookmarks'),
    array('id'=>15,'titulo'=>'BASE DATOS. Encuestas','descripcion'=>'Encuestas en bases de datos','enlace'=>'./ejercicios/basesDatos/encuestasPreguntas/public/index.php','repositorio'=>'https://github.com/a19sotean/RepasoServidorUd3/tree/main/ejercicios/basesDatos/encuestasPreguntas')
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
            echo '<dt><a target="_blank" href="'.$valor['repositorio'].'">'.' Ver código '."</a></dt>";
            echo '<dd>'.$valor['descripcion'].'</dd><br>';
        }
        echo "</dl>";
    ?>
</body>
</html>