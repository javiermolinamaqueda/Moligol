<?php
    
    require_once "modelos/Usuario.php";
    require_once "BaseControlador.php";
    require_once "modelos/Botas.php";
    require_once "modelos/Carrito.php";

    class UsuarioControlador extends BaseControlador{

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

        public function listar(){
            $dat = Usuario::findAll();

            echo $this->twig->render("adminUsu.php.twig",['dat'=>$dat]);
        }

        public function editar(){
            $idUsu = $_GET['idUsu'] ?? $_POST['idUsu'];
            $usu = Usuario::findId($idUsu);

            if(isset($_POST['nombre'])):
                //recogemos los datos del formulario y actualizamos el objeto
                $usu->setNombre($_POST['nombre']);
                $usu->setApellidos($_POST['ape']);
                $usu->setEmail($_POST['email']);
                $usu->setPass($_POST['pass']);
                $usu->setAdmin($_POST['admin']);

                //actualizamos en la base de datos
                $usu->save();

                //mostramos todos los usuarios
                $this->listar();
            else:
                echo $this->twig->render("editUsu.php.twig",['usu'=>$usu]);
            endif;
        }

        public function borrar(){
            $usu = Usuario::findId($_GET['idUsu']);
            $usu->delete();
            //
            $this->listar();
        }
    }