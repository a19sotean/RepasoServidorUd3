<?php

$usuario="";
$password = "";

$errorUsuario = "";
$errorPassword = ""; 

$procesaFormulario = true;
$procesa = false;

function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

if (isset($_COOKIE['usuarioPassword'])) {
    $partes = explode("/",$_COOKIE['usuarioPassword']);
    $usuario = $partes[0];
    $password = $partes[1];
}

if (isset($_POST['enviar'])) {
    if (empty($_POST['usuario'])) {
        $errorUsuario = "El nombre de usuario es necesario";
        $procesa = true; 
    }else{
        $usuario = clearData($_POST['usuario']);
    }

    if (empty($_POST['password'])) {
        $errorPassword = "La contraseña es necesaria";
        $procesa = true; 
    }else{
        $password = clearData($_POST['password']);
    }

    if ($procesa) {
        $procesaFormulario = true;
    }else{
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $procesaFormulario = false;
            echo("<h1>Hola mundo</h1>");
    
            if ((isset($_POST['guardarLogeo']) == "on")) {
                $partesLog = $usuario."/".$password;
                if (!isset($_COOKIE['usuarioPassword'])) {
                    setcookie('usuarioPassword',$partesLog,time()+36000);
                }
            }else{
                if (isset($_COOKIE['usuarioPassword'])) {
                    setcookie('usuarioPassword',"",time()-36000);
                }            
            }
        }
    }
}

if ($procesaFormulario) {
    ?>
    <form action="" method="post">
        <label >Usuario 
            <input type="text" name="usuario" value="<?php echo $usuario?>">
        </label><span class="error"><?php echo $errorUsuario?></span><br><br>
        <label >Contraseña 
            <input type="password" name="password" value="<?php echo $password?>">
        </label><span class="error"><?php echo $errorPassword?></span><br><br>
    
        <label>Guardar Contraseña 
            <input type="checkbox" name="guardarLogeo" >
        </label>
        <input type="submit" name="enviar" value="Enviar">
    
    </form>
    <?php
}