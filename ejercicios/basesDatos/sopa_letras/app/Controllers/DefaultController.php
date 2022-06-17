<?php
namespace App\Controllers;

class DefaultController {
    
    public function indexAction() {
        include("../views/hola_view.php");
    }

    public function render ($fileName, $data=[]) {
        include($fileName);
    }

    public function duplicaAction($numero) {
        $data = array("numero"=>$numero);
        $this->render("../views/duplicate_view.php", $data);
    }
    
}

?>