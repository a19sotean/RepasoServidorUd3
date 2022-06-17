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
    private $idEncuesta;

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

    public function setIdEncuesta($idEncuesta)
    {
        $this->idEncuesta = $idEncuesta;
    }

    public function getIdEncuesta()
    {
        return $this->idEncuesta;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getAllEncuesta()
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getAllPregunta()
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById($id = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE id=:id";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByIdEncuesta($idEncuesta = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE idEncuesta=:idEncuesta";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByIdPregunta($idPregunta = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE idPregunta=:idPregunta";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByPreguntaEncuesta($idPregunta = '', $idEncuesta = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE idPregunta=:idPregunta AND idEncuesta=:idEncuesta";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByPregunta($idPregunta = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE idPregunta=:idPregunta";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByEncuesta($idEncuesta = '')
    {
        $this->query = "SELECT * FROM r_encuesta_pregunta WHERE idEncuesta=:idEncuesta";
        $this->get_results_from_query();
        return $this->rows;
    }

    
}