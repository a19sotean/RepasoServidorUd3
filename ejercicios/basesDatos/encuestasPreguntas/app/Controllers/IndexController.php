<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class IndexController extends BaseController
{

    public function indexAction()
    {
        $data = array();
        $user = Usuario::getInstancia();
        if (isset($_POST["login"])) {

            if ((!empty($_POST['usuario']) || (!empty($_POST['contrasena'])))) {
                $user->setUsuario($_POST['usuario']);
                $user->setContrasena($_POST['contrasena']);
                $result = $user->getByLogin();

                if (!empty($result)) {

                    foreach ($result as $value) {
                        $_SESSION['usuario']['perfil'] = $value['perfil'];
                        $_SESSION['usuario']['id'] = $value['id'];

                        if ($_SESSION['usuario']['perfil'] == "user") {
                            header('location:' . DIRBASEURL . '/encuestas');
                        }

                        if ($_SESSION['usuario']['perfil'] == "admin") {
                            header('location:' . DIRBASEURL . '/opcionesAdmin');
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
