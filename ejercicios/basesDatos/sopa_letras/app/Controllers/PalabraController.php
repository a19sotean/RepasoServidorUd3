<?php

namespace App\Controllers;

use App\Models\Palabra;
use App\Models\User;

class PalabraController extends BaseController
{

    public function AddPalabraAction()
    {
        $lprocesaFormulario = false;
        $data = array();
        $data['palabra'] = $data['msgErrorPalabra'] = "";

        if (!empty($_POST)) {
            $data['palabra'] = $_POST['palabra'];
            $lprocesaFormulario = true;

            if (empty($_POST['palabra'])) {
                $lprocesaFormulario = false;
                $data['msgErrorPalabra'] = "La palabra no puede estar vacía";
            }
        }

        if ($lprocesaFormulario) {
            $objPalabra = Palabra::getInstancia();
            $objPalabra->setPalabra($_POST['palabra']);
            $objPalabra->set();
            header('Location:' . DIRBASEURL . '/');
        } else {
            $this->renderHTML('../views/addPalabra_view.php', $data);
        }
    }

    public function IndexAction()
    {
        $data = array();
        $objPalabra = Palabra::getInstancia();
        $objUsuario = User::getInstancia();
        $data = $objPalabra->getAll();
        if (isset($_POST['entrar'])) {
            if ((!empty($_POST['usuario']) || (!empty($_POST['contrasena'])))) {
                $objUsuario->setUsuario($_POST['usuario']);
                $objUsuario->setContrasena($_POST['contrasena']);
                $resultado = $objUsuario->getByLogin();

                if (!empty($resultado)) {
                    foreach ($resultado as $value) {
                        $_SESSION['usuario']['perfil'] = $value['perfil'];
                        $this->renderHTML('../views/index_view.php', $data);
                    }
                } else {
                    $this->renderHTML('../views/index_view.php', $data);
                }
            }
        } else {
            $this->renderHTML("../views/index_view.php", $data);
        }
    }

    public function EditPalabraAction($request)
    {
        $elementos = explode('/', $request);
        $id = end($elementos);

        if (isset($_POST['palabra'])) {
            $palab = Palabra::getInstancia();
            $palab->setPalabra($_POST['palabra']);
            $palab->setId($id);
            $palab->edit();
            header("location:" . DIRBASEURL . "/");
        }
        $this->renderHTML("../views/editPalabra_view.php", "");
    }

    public function DeletePalabraAction($request)
    {
        $elementos = explode('/', $request);
        $id = end($elementos);
        $objPalabra = Palabra::getInstancia();
        $objPalabra->delete($id);
        header("location:" . DIRBASEURL . "/");
    }

    public function SearchPalabraAction()
    {
        $data = array();
        $objPalabra = Palabra::getInstancia();
        $data = $objPalabra->getByNombre($_POST['busqueda']);
        $this->renderHTML("../views/index_view.php", $data);
    }

    public function cerrarSesionPalabraAction() {
        if (isset($_POST['salir'])) {
            echo "patata";
            unset($_SESSION);
            session_destroy();
            header('Location:' . DIRBASEURL . "/");
        }
    }
}
