<div id="loginForm">
    <?php
    //Fomulario login se muestra mientras se está de invitado
    if ($_SESSION['usuario']['perfil'] == "guest") {
    ?>
        <form id="form-login" action="" method="post">
            <div>
                <label>Iniciar sesión
                    <input class="myInput" type="text" name="usuario" id="inputWord" placeholder="Nombre de usuario">
                </label>
                <input class="myInput" type="password" name="contrasena" id="inputWord" placeholder="Contraseña">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
            <div>
            <a href='<?php echo DIRBASEURL ?>/signup'>Registrarse</a>
            </div>


        </form>
    <?php
    }
    ?>
</div>