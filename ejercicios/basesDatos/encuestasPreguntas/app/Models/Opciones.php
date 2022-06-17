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
    private $idPregunta;
    private $opcion;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }

    public function getIdPregunta()
    {
        return $this->idPregunta;
    }

    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;
    }

    public function getOpcion()
    {
        return $this->opcion;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM opciones";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById($id = '')
    {
        $this->query = "SELECT * FROM opciones WHERE id=:id";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByPregunta($idPregunta = '')
    {
        $this->query = "SELECT * FROM opciones WHERE idPregunta=:idPregunta";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByOpcion($opcion = '')
    {
        $this->query = "SELECT * FROM opciones WHERE opcion=:opcion";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByPreguntaOpcion($idPregunta = '', $opcion = '')
    {
        $this->query = "SELECT * FROM opciones WHERE idPregunta=:idPregunta AND opcion=:opcion";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getEntity($id_encuesta){
        $this->query = "SELECT * FROM opciones WHERE id=:id";
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
        $this->query = "INSERT INTO opciones(idPregunta, opcion)
            VALUES(:idPregunta, :opcion)";
        $this->parametros['idPregunta'] = $this->idPregunta;
        $this->parametros['opcion'] = $this->opcion;
        $this->get_results_from_query();
    }

    public function deleteById()
    {
        $this->query = "DELETE FROM opciones WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function editEntity()
    {
        $this->query = "UPDATE opciones SET idPregunta=:idPregunta, opcion=:opcion WHERE id=:id";
        $this->parametros['idPregunta'] = $this->idPregunta;
        $this->parametros['opcion'] = $this->opcion;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }


}