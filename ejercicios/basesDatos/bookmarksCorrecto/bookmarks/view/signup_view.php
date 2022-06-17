<?php
require('../view/require/header_view.php');
?>

<div id="signupForm">
    <?php
    ?>
    <form action="" method="post">
        <div class="container">
            <h2>Registro Usuario</h2>
            <hr>

            <label for="name">Nombre</label>
            <input type="text" name="name" required>

            <label for="lastname">Apellido</label>
            <input type="text" name="lastname" required><br>

            <label for="name">Nombre de usuario</label>
            <input type="text" name="username" required><br>

            <label for="email">Email</label>
            <input type="text" name="email" required><br>

            <label for="psw">Contraseña</label>
            <input type="password" name="psw" required><br>

            <div class="clearfix">
                <a href="<?php echo DIRBASEURL . '/' ?>"><input type="button" name="btn_cancel" class="btn_cancel" value="Cancelar"></a>
                <button type="submit" name="btn_signup" class="btn_signup">Registrarse</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>