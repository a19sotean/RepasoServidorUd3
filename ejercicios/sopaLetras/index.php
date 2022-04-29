<?php
/**
 * Sopa de letras de capitales
 * 
 * @author Andrea Solís Tejada
 */

DEFINE("TAMANO", 9);
session_start();

if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['dataArray'] = array();
    $_SESSION['posicion'] = 1;
    $_SESSION['correctas'] = array();
    crearTablero();
}

mostrarTablero();

// Comprobar click
if (isset($_GET['columna'])) {
    $clickColumna = $_GET['columna'];
}

if (isset($_GET['fila'])) {
    $clickFila = $_GET['fila'];
    $clickColumna = $_GET['columna'];

    $_SESSION['posicion'] = 1 - $_SESSION['posicion'];


    //Posición de inicio
    if ($_SESSION['posicion'] == 0) {

        //Cierra sesión que contiene posición final
        unset($_SESSION['acabar']);
        $_SESSION['empezar'] = $clickFila . $clickColumna;

        foreach ($_SESSION['dataArray'] as $key => $value) {

            foreach ($value as $key => $posicion) {
                if ($key == "Empieza") {
                    if ($clickFila . $clickColumna == $posicion) {
                        //Guardo la posición
                        $_SESSION['posicionFila'] = array_keys($_SESSION['dataArray'], $value);
                    }
                }
            }
        }
    }

    // Posición del final
    if ($_SESSION['posicion'] == 1) {

        unset($_SESSION['empezar']);

        //En caso de acertar posición inicial
        if (isset($_SESSION['posicionFila'])) {
            $_SESSION['acabar'] = $clickFila . $clickColumna;

            foreach ($_SESSION['dataArray'] as $key => $value) {
                foreach ($value as $key => $posicion) {
                    if ($key == "Acaba") {
                        if ($clickFila . $clickColumna == $posicion) {
                            $_SESSION['posicionColumna'] = array_keys($_SESSION['dataArray'], $value);
                        }
                    }
                }
            }

            // En caso de acertar se comprueban los índices
            if ($_SESSION['posicionFila'] == $_SESSION['posicionColumna']) {
                $index =  $_SESSION['posicionFila'][0];
                $_SESSION['dataArray'][$index]["Estado"] = true;

                foreach ($_SESSION['dataArray'] as $key => $value) {
                    if ($key == $index) {
                        array_push($_SESSION['correctas'], $_SESSION['dataArray'][$index]["Nombre"]);
                    }
                }
            }
            unset($_SESSION['posicionFila']);
            unset($_SESSION['posicionColumna']);
        }
    }
}

// Datos de la tabla
$direccionFila = "";
$direccionColumna = "";
$mismaLetra = false;

$capitalesDataArray = array();

$letrasArray = array();

//Coordenadas de primera y última letra
$primeraLetraFila = "";
$primeraLetraColumna = "";
$ultimaLetraFila = "";
$ultimaLetraColumna = "";
$fila = "";
$columna = "";
$palabra = true;

$palabra = false;
$letraComprobada = "";
$palabraComprobada = "";

function comprobarLetras($clickFila, $clickColumna) {
    echo $clickFila;
    echo $clickColumna;
}

function crearTablero()
{
    //Array inicial que cargamos con valor 0
    for ($i = 0; $i <= TAMANO; $i++) {
        for ($j = 0; $j <= TAMANO; $j++) {
            $_SESSION["tablero"][$i][$j] = "0";
        }
    }

    $capitales = array("MADRID", "LISBOA", "PARIS", "LONDRES", "DUBLIN");
    foreach ($capitales as $key => $nombreCapital) {

        //Extrae la palabra del array y la separa en letras dentro de un nuevo array
        $letrasArray = str_split($nombreCapital);

        //Mientras no se comprueba que la palabra se puede colocar, genera posiciones aleatorias
        do {
            $palabraComprobada = 0;
            $primeraLetraFila = rand(0, TAMANO);
            $primeraLetraColumna = rand(0, TAMANO);

            $direccion = array("+", "-", "=");
            do {
                $direccionFila = $direccion[rand(0, 2)];
                switch ($direccionFila) {
                    case '+':
                        $ultimaLetraFila = $primeraLetraFila + (count($letrasArray) - 1);
                        break;
                    case '-':
                        $ultimaLetraFila = $primeraLetraFila - (count($letrasArray) - 1);
                        break;
                    case '=':
                        $ultimaLetraFila = $primeraLetraFila;
                        break;
                }
            } while ($ultimaLetraFila > TAMANO || $ultimaLetraFila < 0);

            // Calculamos la posición de columna de la última letra
            do {

                do {
                    $direccionColumna = $direccion[rand(0, 2)];
                } while ($direccionColumna == "=" && $direccionFila == "=");

                switch ($direccionColumna) {
                    case '+':
                        $ultimaLetraColumna = $primeraLetraColumna + (count($letrasArray) - 1);
                        break;
                    case '-':
                        $ultimaLetraColumna = $primeraLetraColumna - (count($letrasArray) - 1);
                        break;
                    case '=':
                        $ultimaLetraColumna = $primeraLetraColumna;
                        break;
                }
            } while ($ultimaLetraColumna > TAMANO || $ultimaLetraColumna < 0);

            // variables con la posición de la letra incial y se usan como índices
            $fila = $primeraLetraFila;
            $columna = $primeraLetraColumna;

            // Si no se puede colocar vuelve al inicio a generar otra
            foreach ($letrasArray as $key => $letra) {

                //Si hay letra, comprobamos que coinciden.
                $mismaLetra = false;

                if ($_SESSION["tablero"][$fila][$columna] == $letra) {
                    $mismaLetra = true;
                }

                if (($_SESSION["tablero"][$fila][$columna] != "0") && !$mismaLetra) {
                    $palabraComprobada++;
                }

                // Dirección
                if ($direccionFila == "+") {
                    $fila = $fila + 1;
                } else if ($direccionFila == "-") {
                    $fila = $fila - 1;
                }

                if ($direccionColumna == "+") {
                    $columna = $columna + 1;
                } else if ($direccionColumna == "-") {
                    $columna = $columna - 1;
                }
            }
        } while ($palabraComprobada != 0);

        // array con los datos de las palabras seleccionadas
        $_SESSION['dataArray'][] = array("Nombre" => $nombreCapital, "Empieza" => $primeraLetraFila . $primeraLetraColumna, "Acaba" => $ultimaLetraFila . $ultimaLetraColumna, "Estado" => false);

        $fila = $primeraLetraFila;
        $columna = $primeraLetraColumna;
        foreach ($letrasArray as $key => $letra) {

            $_SESSION["tablero"][$fila][$columna] =  $letra;

            if ($direccionFila == "+") {
                $fila = $fila + 1;
            } else if ($direccionFila == "-") {
                $fila = $fila - 1;
            }

            if ($direccionColumna == "+") {
                $columna = $columna + 1;
            } else if ($direccionColumna == "-") {
                $columna = $columna - 1;
            }
        }
    } 
}

function mostrarTablero()

{
    $letras = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    echo "<h1>Sopa de Letras</h1>
    <div id='container'>";
    for ($i = 0; $i <= TAMANO; $i++) {
        echo "<div class='fila'>";
        for ($j = 0; $j <= TAMANO; $j++) {

            if ($_SESSION["tablero"][$i][$j] == 0) {
                $_SESSION["tablero"][$i][$j] = $letras[rand(0, 25)];
            }
            echo "<div class='base'><a href=\"index.php?fila=" . $i . "&columna=" . $j . "\">" . $_SESSION["tablero"][$i][$j]  . "</a></div>";
        }
        echo "</div>";
    }


    echo "</div><br>";
    echo ('<a href="cierraSesion.php">Nueva partida</a> <br>');
    echo "<br>";
    echo "<h2>Capitales a encontrar:</h2>";
    $capitales = array("MADRID", "LISBOA", "PARIS", "LONDRES", "DUBLIN");
    foreach ($capitales as $key => $nombreCapital) {
        echo "<p>" . $nombreCapital . "</p>";
    }
}


?>

<style>

    a {
        text-decoration: none;
        color: black;

    }

    a:hover {
        color: blueviolet;
    }

    #container {
        background-color: aqua;
        width: 300px;
        padding: 10px;
        text-align: center;
    }

    .base {
        width: 30px;
        height: 30px;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .upper {
        color: blue;
    }

    .fila {
        display: flex;
    }

    .acabar {
        color: blueviolet;
    }
</style>
<h2>Capitales encontradas</h2>
<?php
if (count(array_unique($_SESSION['correctas'])) == 5) {
    echo ('<br><h2 class="acabar">HAS GANADO</h2>');
}
foreach (array_unique($_SESSION['correctas']) as $key => $value) {
    echo ($value) . "<br>";
}
?>

</html>