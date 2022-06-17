<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title></title>
</head>

<body>
    
    <header>
        <h2>Encuestas</h2>
        <div id="auth">
            <div>
                <section>
                    <div><?php echo "Perfil: ".strtoupper($_SESSION['usuario']['perfil']) ?></div>
                </section>

                <?php
                if ($_SESSION['usuario']['perfil'] != "guest") {
                ?>
                    <section>
                        <a href="<?php echo DIRBASEURL . '/logout' ?>"><label>Cerrar sesión</label></a>
                    </section>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
</body>

</html>