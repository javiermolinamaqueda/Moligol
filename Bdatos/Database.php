<?php 

//Javier Molina Maqueda
//Clase Database

    class Database{
        private $pdo;
        private $res;

        public function __construct(){
            $this->pdo = new PDO("mysql:dbname=moligol;host=localhost;charset=utf8","root","")
                or die("ha ocurrido un error en la base de datos");
        }

        /**
         * cerrar la conexion con la base de datos
         */
        public function __destruct(){
            $this->pdo = null;
        }

        /**
         * Realiza una consulta en la base de datos
         */
        public function query($sql){
            $this->res = $this->pdo->query($sql);
        }

        /**
		 * Devuelve un objeto de la consulta
		 */
        public function getObject($cls = "StdClass"){
            return $this->res->fetchObject($cls);
        }

        /**
         * Devuelve el ultimo id insertado
         */
		public function ultimoId(){
			return $this->pdo->lastInsertId();
		}
    }