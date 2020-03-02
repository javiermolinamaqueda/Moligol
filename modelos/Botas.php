<?php

    //Javier Molina Maqueda
    require_once "Bdatos/Database.php";

    class Botas {
        
        private $idBo;
        private $idMar;
        private $foto;
        private $precio;
        private $info;

        public function __construct() { }

        /** 
        */
        public function setIdBo($id){
            $this->idBo = $id;
        }

        /**
         * 
         */
        public function getIdBo(){
            return $this->idBo;
        }

                /** 
        */
        public function setInfo($info){
            $this->info = $info;
        }

        /**
         * 
         */
        public function getInfo(){
            return $this->info;
        }

        public function setPrecio($a){
            $this->precio = $a;
        }

        public function getPrecio(){
            return $this->precio;
        }

        /**
         * 
         */
        public function setIdMar($id){
            $this->idMar = $id;
        }

        /**
         * 
         */
        public function getIdMar(){
            return $this->idMar;
        }

        /**
         * 
         */
        public function setFoto($foto){
             $this->foto = $foto;
        }

         /**
          * 
          */
        public function getFoto(){
             return $this->foto;
        }

        /**
         * Busca todas las botas en la base de datos
         * y las devuelve en un array
         */
        public static function findAll(){
            $db = new Database();
            $db->query("select * from botas b join marca m on(b.idMar=m.idMar)");

            $datos = [];

            while($item = $db->getObject("botas")):
                array_push($datos, $item);
            endwhile;

            return $datos;
        }

        /**
         * Busca una bota por su id y la devuelve
         */
        public static function find($id){
            $db = new Database();
            $db->query("select * from botas b join marca m on(b.idMar=m.idMar) where idBo={$id}");

            return $db->getObject("botas");
        }

        public function save(){
			$db = new Database();
			//
			if($this->idBo != null):
				$db->query("update botas set idMar='{$this->idMar}',info='{$this->info}',
							precio='{$this->precio}',foto='{$this->foto}' where idBo='{$this->idBo}'");
			else:
				$sql = "insert into botas (idMar,info,precio,foto)
						values ('{$this->idMar}','{$this->info}','{$this->precio}',
						'{$this->foto}')";

				$db->query($sql);

				$this->idBo = $db->ultimoId();
			endif;
		}
         
    }

