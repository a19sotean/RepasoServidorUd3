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
    private $fecha;

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

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function getAll()
    {
        $this->query = "SELECT * FROM encuestas";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM encuestas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getEncuestaByName()
    {
        $this->query = "SELECT * FROM encuestas WHERE descripcion LIKE :descripcion";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getEntity($id_encuesta){
        $this->query = "SELECT * FROM encuestas WHERE id=:id";
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
        $this->query = "INSERT INTO encuestas(descripcion, fecha)
            VALUES(:descripcion, :fecha)";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->id_usuario;
        $this->get_results_from_query();
    }

    public function deleteById()
    {
        $this->query = "DELETE FROM encuestas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function editEntity()
    {
        $this->query = "UPDATE encuestas SET descripcion=:descripcion, fecha=:fecha WHERE id=:id";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
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
