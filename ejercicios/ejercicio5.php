<?php
/**
 * Ejercicio 5. Figuras geométricas.
 * Escribe un script que muestre una figura geométrica utilizando el formato svg. Para ello el script
 * mostrará formulario con un radio button con las figuras disponibles: círculo, rectángulo, cuadrado y
 * un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará los
 * datos necesarios para su visualización.
 * 
 * @author Andrea Solís Tejada
 */

$procesaFormularioFigura = $procesaFormularioDibujo = false;
$color = "";

if (isset($_POST["enviar"])) {

    $procesaFormularioFigura = true;

    if (empty($_POST["figura"])) {
        $procesaFormularioFigura = false;
        echo "Debes de selecionar un radio buttom";
    }
}

if (isset($_POST["dibujar"])) { 

    $procesaFormularioFigura = true;
    $procesaFormularioDibujo = true;

    switch ($_POST["figura"]) {
        case 'circle':
            if ((empty($_POST["radio"]))) {
                $procesaFormularioDibujo = false;
                echo "Debes rellenar los datos";
            }
            break;

        case 'rect':
            if ((empty($_POST["ancho"])) || (empty($_POST["alto"]))) {
                $procesaFormularioDibujo = false;
                echo "Debes rellenar los datos";
            }

            if ($_POST["ancho"] == $_POST["alto"]) {
                $procesaFormularioDibujo = false;
                echo "Debes rellenar los datos";
            }
            break;

        case 'cuadrado':
            if ((empty($_POST["dimensiones"]))) {
                $procesaFormularioDibujo = false;
                echo "Debes rellenar los datos";
            }
            break;
    }
}
?>

<form action="" method="post">
    círculo <input type="radio" name="figura" value="circle"><br>
    rectángulo <input type="radio" name="figura" value="rect"><br>
    cuadrado <input type="radio" name="figura" value="cuadrado"><br>
    Color <input type="text" name="color" placeholder="color" value="<?php echo $color?>"> <br>
    <input type="submit" value="enviar" name="enviar">
</form>

<form action="" method="post">
    <?php

    if ($procesaFormularioFigura) {
        switch ($_POST["figura"]) {
            case 'circle':
                echo 'introduce el radio <input type="number" name="radio"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . ' > <br/>';
                break;

            case 'rect':
                echo 'introduce el alto <input type="number" name="alto"> introduce el ancho <input type="number" name="ancho"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <br/>';
                break;

            case 'cuadrado':
                echo 'introduce la medida del lado <input type="number" name="dimensiones"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <br/>';
                break;
        }

        echo '<input type="submit" value="dibujar" name="dibujar">';
    }
    ?>
</form>

<?php

if ($procesaFormularioDibujo) {

    echo '<svg width="400" height="400" >';
    switch ($_POST["figura"]) {
        case 'circle':
            echo '<' . $_POST["figura"] . ' cx="200" cy="180" r="' . $_POST["radio"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'rect':
            echo '<' . $_POST["figura"] . ' x="' . $_POST["ancho"] / 2 . '" y="' . $_POST["alto"] / 2 . '" width="' . $_POST["ancho"] . '" height="' . $_POST["alto"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'cuadrado':
            echo '<rect x="' . $_POST["dimensiones"] / 2 . '" y="' . $_POST["dimensiones"] / 2 . '" width="' . $_POST["dimensiones"] . '" height="' . $_POST["dimensiones"] . '" fill="' . $_POST["color"] . '"/>';
            break;
    }
    echo '</svg>';
}