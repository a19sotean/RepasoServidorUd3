<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Usuario extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $usuario;
    private $contrasena;
    private $perfil;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByLogin()
    {
        $this->query = "SELECT * FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['contrasena'] = $this->contrasena;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM usuarios WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getEntity($id)
    {
    }
    public function setEntity()
    {
        $this->query = "INSERT INTO usuarios(nombre, usuario, contrasena, perfil)
            VALUES(:nombre, :usuario, :contrasena, :perfil)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['contrasena'] = $this->contrasena;
        $this->parametros['perfil'] = $this->perfil;

        $this->get_results_from_query();
    }
    public function deleteEntity($id){}
    public function editEntity(){}
    public function set(){}
    public function get(){}
    public function delete($usuario_data = array()){}
    public function edit(){}
    public function read(){}
    public function readAll(){}
    public function insert(){}
    public function update(){}

}
