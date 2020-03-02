<?php 

    //Javier Molina Maqueda
    require_once "BaseControlador.php";
    require_once "modelos/Carrito.php";
    require_once "Bdatos/Database.php";

    class CarritoControlador extends BaseControlador{

        public function __construct(){
            parent::__construct();
            //controlo la sesion
            $ses = new Sesion();
            //si la sesion esta vacia
            if (!$ses->activa())
                //redirigimos a la pagina de login
                header('location:index.php');
        }

        public function add(){
            //obtengo el id del carrito, el id de la bota y la cantidad
            $idCar = $_SESSION['idCar'];
            $idBo = $_GET['id'];
            $cant = $_GET['cantidad'];

            //añadir a car_bot y redirigir a inicio
            Carrito::car_bot($idCar,$idBo,$cant);
            //
            header("location:index.php?con=botas&ope=listar");
        }

        public function listar(){
            $idCar = $_SESSION['idCar'];
            $dat = Carrito::buscar($idCar);
            //
            echo $this->twig->render("carrito.php.twig",['dat'=>$dat]);
        }

        public function borrar(){
            $idCar = $_SESSION['idCar'];
            $idBo = $_GET['idBo'];
            //
            Carrito::eliminar($idCar,$idBo);
            //
            header("location:index.php?con=carrito&ope=listar");
        }

        public function comprar(){
            $idCar = $_SESSION['idCar'];
            $idUsu = $_SESSION['idUsu'];
            //
            Carrito::buy($idCar,$idUsu);
            
            //añadimos un nuevo carrito
            $car = new Carrito();
            $car->aniadir();
            $idCar = $car->getIdCar();
            //guardo el id del carrito en la sesion
            $_SESSION['idCar'] = $idCar;
            //
            header("location:index.php");
        }
    }