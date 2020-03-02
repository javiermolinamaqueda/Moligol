<?php

    //Javier Molina Maqueda
    require_once "BaseControlador.php";
    require_once "modelos/Botas.php";
    require_once "modelos/Sesion.php";
    require_once "modelos/Marca.php";

    class AdminControlador extends BaseControlador{
        //
        public function __construct(){
            parent::__construct();
            //controlo la sesion
            $ses = new Sesion();
            //si la sesion esta vacia
            if (!$ses->activa())
                //redirigimos a la pagina de login
                header('location:index.php');

            //a esta seccion solo podra acceder el administrador
            if(!$ses->esAdmin())
            header("location:index.php?con=botas&ope=listar");
        }

        public function listarBotas(){
            $bot = Botas::findAll();
            //
            echo $this->twig->render("adminBotas.php.twig",['bot'=>$bot]);
        }

        public function editarBotas(){
            $idBo = $_POST['idBo'] ?? $_GET['idBo'];
            $bot = Botas::find($idBo);

            if(isset($_POST['idMar'])):
                //recogemos los datos del formulario y actualizamos el objeto
                $bot->setIdMar($_POST['idMar']);
                $bot->setInfo($_POST['info']);
                $bot->setPrecio($_POST['precio']);
                $bot->setFoto($_POST['foto']);

                //actualizamos en la base de datos
                $bot->save();

                //mostramos todos los usuarios
                $this->listarBotas();
            else:
                $mar = Marca::findAll();
                echo $this->twig->render("editBotas.php.twig",['bot'=>$bot, 'mar'=>$mar]);
            endif;
        }

        public function addBota(){
            if(isset($_POST['idMar'])):
                //
                $bot = new Botas();
                $bot->setIdMar($_POST['idMar']);
                $bot->setInfo($_POST['info']);
                $bot->setPrecio($_POST['precio']);
                $bot->setFoto($_POST['foto']);
                //
                $bot->save();
                //
                $this->listarBotas();
            else:
                $mar = Marca::findAll();
                echo $this->twig->render("addBotas.php.twig",['mar'=>$mar]);
            endif;
        }
    }