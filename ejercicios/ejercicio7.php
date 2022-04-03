<?php
/**
 * Ejercicio 7.
 * 
 * Diseña y almacena en un array una lista de países junto con sus capitales. Muestra un formulario
 * que permita al usuario introducir las capitales de los países presentados. En respuesta al formulario,
 * la aplicación mostrará el número de aciertos y fallos.
 * Incluye una opción que permita visualizar las opciones correctas.
 * Muestra una sopa de letras con 5 de las capitales almacenadas.
 * 
 * @author Andrea Solís Tejada
 */

$paises = [
    "Albania" => "Tirana",
    "Alemania" => "Berlín",
    "Andorra" => "Andorra la Vella",
    "Armenia" => "Ereván",
    "Austria" => "Viena",
    "Azerbaijan" => "Bakú",
    "Belgium" => "Bruselas",
    "Bielorrusia" => "Minsk",
    "Bosnia y Herzegovina" => "Sarajevo",
    "Bulgaria" => "Sofía",
    "Chipre" => "Nicosia",
    "Croacia" => "Zagreb",
    "Dinamarca" => "Copenhague",
    "Eslovaquia" => "Bratislava",
    "Eslovenia" => "Liubliana",
    "España" => "Madrid",
    "Estonia" => "Tallin",
    "Finlandia" => "Helsinki",
    "Francia" => "Paris",
    "Georgia" => "Tiflis",
    "Grecia" => "Atenas",
    "Hungría" => "Budapest",
    "Irlanda" => "Dublín",
    "Islandia" => "Reikiavik",
    "Italia" => "Roma",
    "Kazajistán" => "Nursultán",
    "Letonia" => "Riga",
    "Liechtenstein" => "Vaduz",
    "Lituania" => "Vilna",
    "Luxemburgo" => "Luxemburgo",
    "Macedonia" => "Skopie",
    "Malta" => "La Valeta",
    "Moldavia" => "Chisinau",
    "Mónaco" => "Mónaco",
    "Montenegro" => "Podgorica",
    "Noruega" => "Oslo",
    "Países bajos" => "Ámsterdam",
    "Polonia" => "Varsovia",
    "Portugal" => "Lisboa",
    "Reino Unido" => "Londres",
    "República Checa" => "Praga",
    "Rumanía" => "Bucarest",
    "Rusia" => "Moscú",
    "San Marino" => "San Marino",
    "Serbia" => "Belgrado",
    "Suecia" => "Estocolmo",
    "Suiza" => "Berna",
    "Turquía" => "Ankara",
    "Ucrania" => "Kiev"
];

$aciertos = $fallos = $n = 0;
$respuestas = [];
$mostrarCoincidencias = false;
$procesaFormulario = false;

for ($i = 0; $i < count($paises); $i++) {
    $respuestas[] = "";
}

if (isset($_POST['comprobar'])) {
    $procesaFormulario = true;
}

if (isset($_POST['solucion'])) {
    $procesaFormulario = true;
    $mostrarCoincidencias = true;
}

if ($procesaFormulario) {
    $respuestas = $_POST['capital'];
}

?>

<form action="" method="post">
    <?php
    $n = 0;
    foreach ($paises as $pais => $capital) {
        echo "<input type='text' name='pais' value= " . $pais . " readonly>";
        echo " <input type='text' name='capital[]' value= " . $respuestas[$n] . ">";
        if ($capital == $respuestas[$n]) {
            $aciertos++;
            $clase = "correcto";
        } else {
            $fallos++;
            $clase = "fallo";
        };
        $n++;

        if ($mostrarCoincidencias == false) {
            $tipo = 'hidden';
        } else {
            $tipo = 'text';
        }

        echo " <input class=$clase type=$tipo name='solucion' value=$capital readonly>";
    ?>
    <br><br>
    <style>
        .correcto {
            color: green;
        }

        .fallo {
            color: red;
        }

    </style>
    <?php
    }

    ?>
    <input type="submit" value="Comprobar" name="comprobar">
    <?php if (isset($_POST['comprobar'])) { ?>
    <input type="submit" value="Ver solución" name="solución">
    <?php } ?>
</form>
<?php if (isset($_POST["comprobar"]) || isset($_POST["solucion"])) { ?>
    <ul>
        <li>Número de aciertos: <?php echo $aciertos ?> </li>
        <li>Número de fallos: <?php echo $fallos ?> </li>
    </ul>
<?php } ?>