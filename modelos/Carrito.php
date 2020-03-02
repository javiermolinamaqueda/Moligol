<?php

    //Javier Molina Maqueda
    //Clase Carrito
    require_once "Bdatos/Database.php";
    class Carrito{
        private $idCar;
        //

        public function __construct(){
        }

        public function getIdCar(){
            return $this->idCar;
        }

        public function aniadir(){
            $db = new Database();
            $db->query("insert into carrito values()");
            $this->idCar = $db->ultimoId();
        }

        /*public static function getIdCar(){
            $db = new Database();
            $db->query("select idCar from carrito order by idCar desc limit 1");
            $idCar = $db->getObject()->idCar;
            return $idCar;
        }*/

        public static function car_bot($idCar,$idBo,$cant){
            $db = new Database();

            $db->query("insert into car_bot (idCar, idBo, cantidad) values ({$idCar},{$idBo},{$cant})");

        }

        public static function buscar($idCar){
            $db = new Database();
            $db->query("select * 
                            from car_bot c join botas b on(b.idBo=c.idBo) 
                            join marca m on (m.idMar=b.idMar) 
                            where idCar=".$idCar);
            $datos =[];

            while($item = $db->getObject()):
                array_push($datos,$item);
            endwhile;

            return $datos;
        }

        public static function eliminar($idCar,$idBo){
            $db = new Database();
            $db->query("delete from car_bot where idCar={$idCar} and idBo={$idBo}");
        }

        public static function buy($idCar, $idUsu){
            $pdo = new Database();
            $pdo->query("insert into compra (idUsu,idCar) values ('{$idUsu}','{$idCar}')");
        }
    }