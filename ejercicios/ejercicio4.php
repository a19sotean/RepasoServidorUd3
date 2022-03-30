<?php
/**
 * Ejercicio 4. Encuesta.
 * Escribe un script que muestre un formulario que permita la votación de 10 items (item1, item2, ...)
 * mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.
 * 
 * @author Andrea Solís Tejada
 */

$estrellas5 = [];
$estrellas4 = [];
$estrellas3 = [];
$estrellas2 = [];
$estrellas1 = [];

if (isset($_POST['enviar'])) {
    for ($i=1; $i <= 10 ; $i++) {
        if ($_POST["item".$i] == 5) {
            array_push($estrellas5, "item".$i);
        } else if ($_POST["item".$i] == 4) {
            array_push($estrellas4, "item".$i);
        } else if ($_POST["item".$i] == 3) {
            array_push($estrellas3, "item".$i);
        } else if ($_POST["item".$i] == 2) {
            array_push($estrellas2, "item".$i);
        } else if ($_POST["item".$i] == 1) {
            array_push($estrellas1, "item".$i);
        }
        $procesaFormulario = true;
    }
} else {
    $procesaFormulario = false;
}

?>

<form method="post">
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo '<label> Item' . $i . 
        '<input type="radio" name="item' . $i . '" value="1"> 
        <input type="radio" name="item' . $i . '" value="2"> 
        <input type="radio" name="item' . $i . '" value="3"> 
        <input type="radio" name="item' . $i . '" value="4"> 
        <input type="radio" name="item' . $i . '" value="5">
        </label><br>';
    }
    ?>

    <input type="submit" value="enviar" name="enviar">
</form>

<?php
if ($procesaFormulario) {
    if (!empty($estrellas5)) {
        foreach ($estrellas5 as $key => $value) {
            echo $value . "<br>";
        }
        return;
    } else if (!empty($estrellas4)) {
        foreach ($estrellas4 as $key => $value) {
            echo $value . "<br>";
        }
        return;
    } else if (!empty($estrellas3)) {
        foreach ($estrellas3 as $key => $value) {
            echo $value . "<br>";
        }
        return;
    } else if (!empty($estrellas2)) {
        foreach ($estrellas2 as $key => $value) {
            echo $value . "<br>";
        }
        return;
    } else if (!empty($estrellas1)) {
        foreach ($estrellas1 as $key => $value) {
            echo $value . "<br>";
        }
        return;
    }
}
?>