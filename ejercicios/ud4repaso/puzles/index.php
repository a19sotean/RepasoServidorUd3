<?php
session_start();
$currentUrl = $_SERVER['PHP_SELF'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if (!isset($_SESSION['correctas'])){
    $_SESSION['correctas'] = 0;
}

if (!isset($_GET['nextBottom']) && !isset($_GET['nextTop'])) {
    $_SESSION['cursorTop'] = 0;
    $_SESSION['cursorBottom'] = 0;
}

if (isset($_GET['nextBottom'])) {
    $_SESSION['cursorBottom']++;
}

if (isset($_GET['nextTop'])) {
    $_SESSION['cursorTop'] =   $_SESSION['cursorTop'] + 1;
}

$_SESSION['imgsTop'] = ["img/1.JPG", "img/2.JPG", "img/3.JPG", "img/4.JPG", "img/5.JPG", "img/6.JPG"];
$_SESSION['imgsBottom'] = ["img/7.JPG", "img/8.JPG", "img/9.JPG", "img/10.JPG", "img/11.JPG", "img/12.JPG"];

$hasNextTopPage = count($_SESSION['imgsTop'])  > $_SESSION['cursorTop'];
$hasNextBottomPage = count($_SESSION['imgsBottom']) >  $_SESSION['cursorBottom'];
if (!$hasNextTopPage) {
    $_SESSION['cursorTop'] = 0;
}

if (!$hasNextBottomPage) {
    $_SESSION['cursorBottom'] = 0;
}


$_SESSION['responses'] = [
    ["img/1.JPG", "img/10.JPG"],
    ["img/2.JPG", "img/11.JPG"],
    ["img/3.JPG", "img/9.JPG"],
    ["img/4.JPG", "img/8.JPG"],
    ["img/5.JPG", "img/12.JPG"],
    ["img/6.JPG", "img/7.JPG"]
];

if (isset($_GET['imgTop']) && isset($_GET['imgBottom'])) {
    $cabeza = $_GET['imgTop'];
    $cuerpo = $_GET['imgBottom'];

    $isCorrect = false;
    foreach ($_SESSION['responses'] as $response) {
        if ($response[0] == $cabeza && $response[1] == $cuerpo) {
            $isCorrect = true;
        }
    }
    if ($isCorrect){
        $_SESSION['correctas']++;
    }
}

?>

<div>
    <img src="<?php echo $_SESSION['imgsTop'][$_SESSION['cursorTop']] ?>" />
    <a href="<?php echo $currentUrl . "?nextTop=true" ?>"><button>Next</button></a>
</div>

<div>
    <img src="<?php echo $_SESSION['imgsBottom'][$_SESSION['cursorBottom']] ?>" />
    <a href="<?php echo $currentUrl . "?nextBottom=true" ?>"><button>Next</button></a>
</div>

<div>

    <a href="<?php echo $currentUrl . "?imgTop=" . $_SESSION['imgsTop'][$_SESSION['cursorTop']]
                    . "&imgBottom=" . $_SESSION['imgsBottom'][$_SESSION['cursorBottom']] ?>">
        <button>Guardar combinación</button>
    </a>
</div>

<div>
    <p>Número de respuestas correctas: <?php echo $_SESSION['correctas'] ?></p>
</div>