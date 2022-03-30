<?php
/**
 * Ejercicio 1. Número aleatorio.
 * Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números que
 * han sido solicitados previamente mediante un formulario.
 * 
 * @author Andrea Solís Tejada
 */

$n1 = $n2 = 0;

if (isset($_POST['generar'])) {
    $procesaFormulario = true;
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    if (empty($n1) or empty($n2)) {
        $procesaFormulario = false;
        $msg = "El número es requerido";
        echo $msg;
    }
    if ($n1 > $n2) {
        $procesaFormulario = false;
        $msg = "El primer número no puede ser mayor que el segundo";
        echo $msg;
    }
    if ($n1 < 0 || $n2 < 0) {
        $procesaFormulario = false;
        $msg = "El número no puede ser menor que 0";
        echo $msg;
    }
    
} else {
    $procesaFormulario = false;
}

?>
    <form action="" method="POST">
        <input type="number" name="n1" value=<?php echo $n1 ?>>
        <input type="number" name="n2" value=<?php echo $n2 ?>><br>
        <input type="submit" value="generar" name="generar">
    </form> <?php 
?>

<?php
if ($procesaFormulario) {
    echo rand($n1, $n2);
}
?>