<?php
    /**
     * Ejercicio 1.
     * Escenario: Desarrollo de un sistema de test online para una autoescuela.
     * Los test se encuentran almacenados en un array asociativo dentro de un directorio de configuración.
     * Cada test utiliza un directorio para almacenar las fotos que necesita. El nombre de la carpeta es la
     * concatenación de la cadena img y el número de test. Por ejemplo, para el test 1 las imágenes se guardan en
     * el directorio img1. El nombre de cada foto coincide con el número de pregunta.
     * Tareas.
     * ➢ Incorpora el array de test desde el directorio de configuración.
     * ➢ Genera dinámicamente un formulario para que los alumn@s puedan realizar el test.
     * ➢ El sistema debe detectar si existe imagen asociada a la pregunta para mostrarla.
     * ➢ Procesa el formulario de manera que la aplicación informe del número de aciertos y utilice un
     * código de colores para indicar si se ha superado el examen. El test se considera superado si no se
     * han cometido más de dos errores.
     * ➢ Cuando el alumn@ conecta con la aplicación el sistema le indicará el último test realizado y
     * mostrará el siguiente para su realización.
     * ➢ Incorpora a la aplicación un botón que permita al alumn@ empezar a realizar los test desde el
     * principio.
     * ➢ Aplica criterios de usabilidad en el diseño.
     * 
     * SIN COOKIES
     * 
     * @author Andrea Solís Tejada
     */
    include 'config/tests_cnf.php';

    $opcionSeleccionada = 1;
    $procesaTest = false;
    $suspenso = null;
    $comprobados = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $procesaTest = true;

        // Carga de datos de la lista desplegable
        if (isset($_POST["opciones"])) {
            $opcionSeleccionada = $_POST["opciones"];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
    if (!$procesaTest) { ?>
    <h1>Test autoescuela</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Elige el test que quieres realizar:
         <select name="opciones">
         <?php
               foreach ($aTests as $valor) {
                    $selected =($opcionSeleccionada == $valor['valor']) ? 'selected' :''; 
                    echo "<option value = \"" . $valor['idTest'] - 1 . "\" $selected >". $valor['idTest'] . $valor['Permiso'] . $valor['Categoria'] ."</option>";
                 }
         ?>
         </select><br/><br/>
         <input type="submit" name="submit" value="Enviar"><br/><br/>
  </form>
<?php
}
// Procesa formulario
else {
    echo "<h1>Test seleccionado:</h1>";

    $preguntas = $aTests[$opcionSeleccionada];
    echo "<form method='post' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>";
    
    echo "<input name='comprobar' value='".$opcionSeleccionada."' type='hidden'>";
    if ($suspenso) {
        echo "<h3>Estás suspenso</h3>";
    }
     else if(!$suspenso && $suspenso != null) {
         echo "<h3>Estás aprobado</h3>";
     } 
    foreach ($preguntas["Preguntas"] as $index => $preg) {
        echo "<div>";
        echo "<h2>".$preg["Pregunta"]."</h2>";
        echo "<img src='dir_img_test" . $opcionSeleccionada + 1 . "/img". $preg["idPregunta"] .".jpg' /><br/>";
        foreach ($preg["respuestas"] as $respuesta) {
            //if ($comprobados[$index]) echo "✅";
            echo "<label><input type='radio' name='" . $preg["idPregunta"] . "' value='". $respuesta[0] ."' />". $respuesta ."</label><br>";
        }
        echo "</div>";
    }
    echo "<input type='submit' name='comprobarTest' value='Enviar'>";
    echo "</form>";

    if (isset($_POST['comprobarTest'])) {   
        $fallos = 0;
        $aciertos = 0;
        $testAComprobar = $_POST['comprobar'];
        foreach ($aTests[$testAComprobar]["Corrector"] as $index => $value) {
            $comprobados[$index] = $value == $_POST[$index + 1];
            if (!$comprobados[$index]) {
                $fallos++; 
            } else {
                $aciertos++;
            }
        }
        
        if ($fallos <= 2) {
            echo "<h2 style='color:green'>Has aprobado</h2>";
            
        }  else {
            echo "<h2 style='color:red'>Has suspendido</h2>";
        }
        echo "Fallos: ".$fallos."<br>"."Aciertos: ".$aciertos."<br><br>";
        
        echo "<h2>Respuestas: </h2>";
        foreach ($aTests[$testAComprobar]["Corrector"] as $index => $value) {
            echo ($index+1). " ".$value."<br>";
        }
        echo "<br>";
        echo "<input type='button' value='Volver' onclick='history.go(-2)'>";
    }

} ?>
</body>
</html>