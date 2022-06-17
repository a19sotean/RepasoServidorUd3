<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Andrea Solís Tejada">
    <title>Sopa de letras</title>
</head>

<body>
    <?php
    if ($_SESSION['usuario']['perfil'] != 'invitado') {
    ?><input type="submit" value="Salir" name="salir">
    <?php } ?>
    <?php
    if ($_SESSION['usuario']['perfil'] == "invitado") {
    ?><form method="post">
            <br>
            <label>Usuario: <input type="text" name="usuario"></label>
            <br>
            <label>contraseña: <input type="text" name="contrasena"></label>
            <br>
            <input type="submit" value="Entrar" name="entrar">
        </form>
    <?php }
    ?>

    <h1>Palabras</h1>
    <form action="palabras/search" method="post">
        <input type="text" name="busqueda" id="">
        <input type="submit" name="buscar" value="Buscar"><br><br>
    </form>

    <?php

    if ($_SESSION["usuario"]["perfil"] == "admin") {
        echo '<a href="palabras/add">Nueva palabra</a>';
    }

    //if ($_SESSION["usuario"]["usuario"] == "admin" && $_SESSION["usuario"]["perfil"] == "admin") {
    foreach ($data as $palabra) {
        if ($_SESSION["usuario"]["perfil"] == "admin") {
            echo "<div>" . $palabra['id'] . " " . $palabra['palabra'] . " <a href=" . DIRBASEURL . "/palabras/edit/" . $palabra['id'] . ">Editar</a> <a href=" . DIRBASEURL . "/palabras/delete/" . $palabra['id'] . ">Borrar</a></div>";
        } else {
            echo "<div>" . $palabra['id'] . " " . $palabra['palabra'] . "</div>";
        }
    }
    // } else {
    //     foreach ($data as $palabra) {
    //         echo "<div>" . $palabra['id'] . " " . $palabra['palabra'] . "</div>";
    //     }
    // }
    ?>
</body>

</html>