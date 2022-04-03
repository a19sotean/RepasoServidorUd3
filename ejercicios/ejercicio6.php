<?php
/**
 * Ejercicio 6.
 * Modifica el ejercicio 4 de Actividades 1 para almacenar las opciones de la encuesta en un array.
 * 
 * @author Andrea Solís Tejada
 */


if (isset($_POST["enviar"])) {
    $procesaFormulario = true; 
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
    unset($_POST["enviar"]);
    $maxValue = max($_POST);
    
    foreach ($_POST as $key => $value) {
        if($value == $maxValue) {
            echo $key."<br>";
        }
    }
} 
?>