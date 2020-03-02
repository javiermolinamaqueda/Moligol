<?php

    //Javier Molina Maqueda

    class Marca{
        private $idMar;
        private $nombre;
        //
        public function getIdMar(){ return $this->idMar; }
        public function getNombre(){ return $this->nombre; }
        public function setNombre($a){ $this->nombre=$a; }

        public static function findAll(){
            $db = new Database();
            $db->query("select * from marca");

            $datos = [];

            while($item = $db->getObject("marca")):
                array_push($datos, $item);
            endwhile;

            return $datos;
        }
    }