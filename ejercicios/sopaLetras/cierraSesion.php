<?php
    session_start();
    unset($_SESSION['tablero']);
    session_destroy();
    header('location: index.php');
?>
