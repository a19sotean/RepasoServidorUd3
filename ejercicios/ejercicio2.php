<?php
/**
 * Ejercicio 2. Reescritura de contraseñas.
 * Escribe un script que muestre un formulario con dos inputs de tipo password y verifique en el
 * servidor que las entradas coinciden.
 * 
 * @author Andrea Solís Tejada
 */

$password1 = $password2 = "";

if (isset($_POST['comprobar'])) {
    $procesaFormulario = true;
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (empty($password1) or empty($password2)) {
        $procesaFormulario = false;
        $msg = "La contraseña es requerida";
        echo $msg;
    }
    if ($password1 != $password2) {
        $procesaFormulario = false;
        $msg = "Las contraseñas no coinciden";
        echo $msg;
    }
    
} else {
    $procesaFormulario = false;
}

 ?>
<form action="" method="POST">
    <input type="password" name="password1" value=<?php echo $password1 ?>>
        <input type="password" name="password2" value=<?php echo $password2 ?>><br>
        <input type="submit" value="comprobar" name="comprobar">
    </form> <?php 
?>
<?php
if ($procesaFormulario) {
    $msg = "Las contraseñas son correctas";
    echo $msg;
}
?>