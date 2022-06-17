<?php

use App\Models\User;
require_once('..\app\Config\parametros.php');

if (isset($_POST['enviar'])) {
    $user = new User();
    $resultado = $user->get([$_POST['usuario'], $_POST['contrasena']]);
    if (!empty($resultado)) {
        foreach ($resultado as $value) {
            $_SESSION['usuario']['perfil'] = $value['perfil'];
            $_SESSION['usuario']['usuario'] = $value['usuario'];
        }
    }
    header('location:' . DIRBASEURL . '/');
}
?>

<form method="post">
    <br>
    <label>Usuario: <input type="text" name="usuario"></label>
    <br>
    <label>contraseña: <input type="text" name="contrasena"></label>
    <br>
    <input type="submit" value="enviar" name="enviar">
</form>