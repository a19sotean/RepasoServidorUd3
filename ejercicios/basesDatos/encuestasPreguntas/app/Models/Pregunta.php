<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Bookmark extends DBAbstractModel
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

    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    //Propiedades del objeto
    private $id;
    private $descripcion;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM preguntas";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM preguntas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getPreguntaByName()
    {
        $this->query = "SELECT * FROM preguntas WHERE descripcion LIKE :descripcion";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getEntity($id){
        $this->query = "SELECT * FROM preguntas WHERE id=:id";
        $this->get_results_from_query();
        if ($this->resultado) {
            $this->rows = array();
            foreach ($this->resultado as $fila) {
                array_push($this->rows, $fila);
            }
        } 
        return $this->rows;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO preguntas(descripcion)
        VALUES(:descripcion,)";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
    }

    public function deleteById()
    {
        $this->query = "DELETE FROM preguntas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
        $this->query = "UPDATE preguntas SET descripcion=:descripcion WHERE id=:id";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }
    public function set()
    {
    }
    public function get()
    {
    }
    public function delete($user_data = array())
    {
    }
    public function edit()
    {
    }
}
