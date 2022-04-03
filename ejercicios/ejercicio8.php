<?php
/**
 * Ejercicio 8.
 * 
 * A partir de un array que almacena comunidades autónomas y provincias, escribe un programa que
 * muestre aleatoriamente una comunidad autónoma y presente un formulario con un checkbox que
 * permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al formulario, la
 * aplicación mostrará número de aciertos y fallos.
 * Incluye una opción que permita visualizar las opciones correctas.
 * 
 * @author Andrea Solís Tejada
 */

$comunidades = array(
    'Andalucía' => array("Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"),
    'Aragón' => array("Zaragoza", "Huesca", "Teruel"),
    'Asturias' => array("Asturias"),
    'Baleares' => array("Baleares"),
    'Canarias' => array("Las Palmas", "Santa Cruz de Tenerife"),
    'Cantabria' => array("Cantabria"),
    'Castilla y Leon' => array("Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"),
    'Castilla-La Mancha' => array("Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"),
    'Cataluña' => array("Barcelona", "Gerona", "Lleida", "Tarragona"),
    'Extremadura' => array("Badajoz", "Cáceres"),
    'Galicia' => array("A Coruna", "Lugo", "Ourense", "Pontevedra"),
    'Madrid' => array("Madrid"),
    'Murcia' => array("Murcia"),
    "Navarra" => array("Navarra"),
    "País Vasco" => array("Álava", "Bizkaia", "Gipuzkoa"),
    "La Rioja" => array("La Rioja"),
    "Ceuta" => array("Ceuta"),
    "Melilla" => array("Melilla")
);

$comunidadAleatoria = array_rand($comunidades);
$procesaFormulario = $procesaFormularioMostrar = false;
$aciertos = $fallos = 0;

if(isset($_POST["comunidad"])) {
    $comunidadAleatoria = $_POST["comunidad"];
}

if(isset($_POST["comprobar"])) {
    if (empty($_POST["comprobar"])) {
        $procesaFormulario = false;
        echo "Debes de selecionar al menos una provincia";
    } else {
        $procesaFormulario = true;
    }
}

if($procesaFormulario) {

    foreach ($_POST["provincia"] as $provincia) {
        if (in_array($provincia, $comunidades[$_POST["comunidad"]])) {
            $aciertos++;
        } else {
            $fallos++;
        }
    }

    foreach ($comunidades[$_POST["comunidad"]] as $provincia) {
        if (!in_array($provincia, $_POST["provincia"])) {
             $fallos++;
        }
    }
    $procesaFormularioMostrar = true;
}

?>

<form action="" method="POST">
    <h2><b><input type="hidden" value="<?= $comunidadAleatoria ?>" name="comunidad"><?= $comunidadAleatoria ?></b></h2>
    <?php foreach ($comunidades as $comunidad => $provincias) {
        foreach ($provincias as $provincia) { ?>
            <input type="checkbox" value="<?= $provincia ?>" id="<?= $provincia ?>" name="provincia[]"
                <?= ((isset($_POST["provincia"]) and in_array($provincia, $_POST["provincia"])) ? "checked" : "") ?>>
                <label for="<?= $provincia ?>"><?= $provincia ?></label><br>
        <?php } ?>
    <?php } ?>
    <input type="submit" value="Comprobar" name="comprobar">
    <?php if(isset($_POST["comprobar"])) { ?>
        <input type="submit" value="Mostrar correctas" name="mostrar">
    <?php } ?>
</form>

<?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
        <ul>
            <li>Número de aciertos: <?= $aciertos ?> </li>
            <li>Número de fallos: <?= $fallos ?> </li>
        </ul>
    <?php } ?>

    <?php if (isset($_POST["mostrar"])) { 
        $procesaFormularioMostrar = true; 
        if ($procesaFormularioMostrar) { ?>
        <p>Las provincias de <?= $_POST["comunidad"] ?> son: </p>
        <ul>
            <?php foreach ($comunidades[$_POST["comunidad"]] as $provincia) { ?>
                <li><?= $provincia ?></li>
                <?php } ?>
        </ul>
    <?php } }?>