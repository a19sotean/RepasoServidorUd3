<?php
require('../view/require/header_view.php');

if ($_SESSION['usuario']['perfil'] == "admin") {
?>
    <button type="submit" name="crearPregunta">Crear pregunta</button>
    <button type="submit" name="crearEncuesta">Crear encuesta</button>
<?php
echo "preguntas";
}
?>