<?php
/**
 * Ejercicio 3. Operaciones aritméticas.
 * Escribe un script que muestre al usuario un formulario con una operación aritmética básica,
 * generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se
 * realizó correctamente.
 * 
 * @author Andrea Solís Tejada
 */

$n1 = rand(1, 100);
$n2 = rand(1, 100);
$n3 = rand(1, 3);
$signos = ["+", "-", "*", "/"];
$resultadoFinal = 0;

if (isset($_POST['resultado'])) {
    $procesaFormulario = true;
    if (empty($_POST['resultado'])) {
        $procesaFormulario = false;
        $msg = "El resultado no puede ser nulo";
        echo $msg;
    }
} else {
    $procesaFormulario = false;
}

?>
    <form action="" method="POST">
        <?php echo "$n1 $signos[$n3] $n2 = " ?> <input type="number" name="resultado">
        <input type="hidden" name="numero1" value="<?php echo $n1 ?>">
        <input type="hidden" name="operacion" value="<?php echo $signos[$n3] ?>">
        <input type="hidden" name="numero2" value="<?php echo $n2 ?>">
        <input type="submit" value="comprobar" name="comprobar">
    </form> <?php 

?>

<?php
if ($procesaFormulario) {
    switch ($_POST['operacion']) {
        case '+':
            $resultadoFinal = $_POST['numero1'] + $_POST['numero2'];
            break;
        case '-':
            $resultadoFinal = $_POST['numero1'] - $_POST['numero2'];
            break;
        case '*':
            $resultadoFinal = $_POST['numero1'] * $_POST['numero2'];;
            break;
        case '/':
            $resultadoFinal = $_POST['numero1'] / $_POST['numero2'];;
            break;
    }
    if ($_POST['resultado'] != $resultadoFinal) {
        $msg = "Operación realizada incorrectamente";
        echo $msg;
    } else {
        $msg = "Operación realizada correctamente";
        echo $msg;
    }
    echo "<br>".$resultadoFinal;
    
} 
?>