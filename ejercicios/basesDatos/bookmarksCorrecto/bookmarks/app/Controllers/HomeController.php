<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class HomeController extends BaseController
{

    public function indexAction()
    {
        $data = array();
        $user = Usuario::getInstancia();
        foreach ($user->getAll() as $key => $value) {
            $bloqueado = $value['bloqueado'];
        }
        if (isset($_POST["login"])) {

            if ((!empty($_POST['username']) || (!empty($_POST['psswrd'])))) {
                $user->setUser($_POST['username']);
                $user->setPsw($_POST['passwrd']);
                $result = $user->getByLogin();

                if (!empty($result)) {

                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['perfil'];
                        $_SESSION['user']['id'] = $value['id'];

                        if ($_SESSION['user']['profile'] == "user") {
                            header('location:' . DIRBASEURL . '/bookmarks');
                        }

                        if ($_SESSION['user']['profile'] == "admin") {
                            header('location:' . DIRBASEURL . '/users');
                        }
                    }
                } else {
                    //Si los datos no coinciden, sigue como invitado
                    $this->renderHTML('../view/index_view.php');
                }
                //}
            }
        } else {
            //Renderiza página inicio con los datos  
            $this->renderHTML('../view/index_view.php');
        }
    }
}
