<?php
namespace App\Models;
    require_once('DBAbstractModel.php');

    class Palabra extends DBAbstractModel {
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
        private $palabra;
        private $created_at;
        private $updated_at;

        public function setPalabra($palabra) {
            $this->palabra = $palabra;
        }
        
        public function getPalabra() {
            return $this->palabra;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function set() {
            $this->query = "INSERT INTO palabras(palabra)
                            VALUES(:palabra)";
            $this->parametros['palabra']= $this->palabra;
            $this->get_results_from_query();
            // para relaciones 1-n n-m (ahora como hay una sola tabla no hace falta)
            // $this->id = $this->lastInsert();
            $this->mensaje = 'Palabra añadida.';
        }

        public function get($id='') {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM palabras
                WHERE id = :id";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                //Ejecutamos consulta que devuelve registros.
                $this->get_results_from_query();
                }
                if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
                }
                $this->mensaje = 'palabra encontrada';
                }
                else {
                $this->mensaje = 'palabra no encontrada';
                }
                return $this->rows;
                
        }

        public function getAll() {
            $this->query = "SELECT * FROM palabras";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Palabras encontradas';
            } else {
                $this->mensaje = 'Palabras no encontradas';
            }
            return $this->rows;
        }

        public function edit() {

            $this->query = "
            UPDATE palabras
            SET palabra=:palabra
            WHERE id = :id
            ";

            $this->parametros['id']=$this->id;
            $this->parametros['palabra']=$this->palabra;

            $this->get_results_from_query();
            $this->mensaje = 'palabra modificada';
        }

        public function delete($id='')
        {
            $this->query = "DELETE FROM palabras
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'palabra eliminada';
        }

    //     public function delete($user_data = array())
    // {
    //     foreach ($user_data as $campo => $valor) {
    //         $$campo = $valor;
    //     }
    //     $this->query = "DELETE FROM palabras WHERE id=:id";
    //     $this->parametros['id'] = $id;
    //     $this->get_results_from_query();
    //     //echo $this->mensaje = 'palabra eliminada correctamente';
    // }

        public function getByNombre($filtro='') {
            if($filtro != '') {
                $palabra = "%" . $filtro . "%";
                $this->query = "SELECT * FROM palabras WHERE (palabra LIKE :palabra)";
                // Cargamos los parámetros
                $this->parametros['palabra']=$palabra;

                // Ejecutamos consulta que devuelve registros
                $this->get_results_from_query();
            }
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
            } 
            return $this->rows;
        }

        public function read() {}
        public function readAll() {}
        public function insert() {}
        public function update() {}

    }

?>