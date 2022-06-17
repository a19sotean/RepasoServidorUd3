<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Opciones;
use App\Models\encuestaPregunta;

require_once('..\app\Config\constantes.php');

class UsuarioController extends BaseController
{

    public function opcionesAdminAction() {
        if (isset($_POST['crearPregunta'])) {
            header('Location:' . DIRBASEURL . '/crearPregunta');
        } else if (isset($_POST['crearEncuesta'])) {
            header('Location:' . DIRBASEURL . '/crearEncuesta');
        }
        $this->renderHTML('../view/admin_view.php');
    }

    // public function crearPreguntaAction() {
    //     if (isset($_POST['btn_cancel'])) {
    //         header('Location:' . DIRBASEURL . '/opcionesAdmin');
    //     } else if (isset($_POST['crearPregunta'])) {
    //         $pregunta = new Pregunta();
    //         $pregunta->setPregunta($_POST['pregunta']);
    //         $pregunta->setTipo($_POST['tipo']);
    //         $pregunta->setEncuesta($_POST['encuesta']);
    //         $pregunta->save();
    //         header('Location:' . DIRBASEURL . '/opcionesAdmin');
    //     }
    //     $this->renderHTML('../view/crearPregunta_view.php');
    // }

    // public function crearEncuestaAction() {
    //     if (isset($_POST['btn_cancel'])) {
    //         header('Location:' . DIRBASEURL . '/opcionesAdmin');
    //     } else if (isset($_POST['crearEncuesta'])) {
    //         $encuesta = new Encuesta();
    //         $encuesta->setEncuesta($_POST['encuesta']);
    //         $encuesta->save();
    //         header('Location:' . DIRBASEURL . '/opcionesAdmin');
    //     }
    //     $this->renderHTML('../view/crearEncuesta_view.php');
    // }

    public function signupAction()
    {
        $user = Usuario::getInstancia();

        if (isset($_POST['btn_signup'])) {
            // Crear usuario
            $user->setNombre($_POST['nombre']);
            $user->setUsuario($_POST['usuario']);
            $user->setContrasena($_POST['contrasena']);
            $user->setPerfil("user");
            $user->setEntity();

            header('Location:' . DIRBASEURL . '/');
        } else if (isset($_POST['btn_cancel'])) {
            header('Location:' . DIRBASEURL . '/');
        }

        $this->renderHTML('../view/signup_view.php');
    }

    public function logoutAction()
    {
        //Cierra sesión y envía a la página de inicio
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/');
    }
}
