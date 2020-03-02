<?php

//Javier Molina Maqueda
require_once "BaseControlador.php";
require_once "modelos/Botas.php";

    class BotasControlador extends BaseControlador{
        //

        public function __construct(){
            parent::__construct();
            //controlo la sesion
            $ses = new Sesion();
            //si la sesion esta vacia
            if (!$ses->activa())
                //redirigimos a la pagina de login
                header('location:index.php');
        }

        public function listar(){
            //Busco todas las botas
            $datos = Botas::findAll();
            //$idCar = $_GET['idCar'];
            //muestro la vista y le paso un array con todas las botas y el carrito
            echo $this->twig->render("inicio.php.twig",['dat'=>$datos]);
        }

        public function info(){
            $bot = Botas::find($_GET['id']);
            //mostrar vista
            echo $this->twig->render("infoBota.php.twig",['bot'=>$bot]);
        }
    }