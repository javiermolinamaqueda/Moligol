<?php

    //Javier Molina Maqueda
    require_once "modelos/Sesion.php";
    require_once "BaseControlador.php";
    require_once "modelos/Usuario.php";
    class SesionControlador extends BaseControlador{

        public function __construct(){
            parent::__construct();
            //
        }

        public function login(){
            //llamar al modelo 
            if (Sesion::login()):
                //si hace login iniciamos session
                session_start();
                $_SESSION['_sesion'] = true;

                //guardo el email del usuario en la sesion
                $usu = Usuario::find($_POST['email']);
                $_SESSION['idUsu'] = $usu->getIdUsu();

                //comprobamos si el usuario es admin o no
                if(!$usu->getAdmin()):
                    //creamos un nuevo carrito
                    $car = new Carrito();
                    $car->aniadir();
                    $idCar = $car->getIdCar();
                    //guardo el id del carrito en la sesion
                    $_SESSION['idCar'] = $idCar;
                    //
                    header("location:index.php?con=botas&ope=listar");
                else:
                    header("location:index.php?con=usuario&ope=listar");
                endif;

                //Busco todas las botas
                //$datos = Botas::findAll();

                //muestro la vista y le paso un array con todas las botas
                //echo $this->twig->render("inicio.php.twig",['dat'=>$datos,
                                                            //'car'=>$idCar]);
            else:
                //si no
                //redirigimos a la pagina de login
                echo $this->twig->render("login.php.twig");

            endif;
        
        }

        public function mostrarLogin(){
            //pagina de login
            $ses = new Sesion();
            if($ses->activa()):
                if($ses->esAdmin()):
                    header("location:index.php?con=usuario&ope=listar");
                else:
                    header("location:index.php?con=botas&ope=listar");
                endif;
            else:
                echo $this->twig->render("login.php.twig");
            endif;
                
        }

        public function cerrarSesion(){
            $ses = new Sesion();
            $ses->cerrarSesion();
            //
            header('location:index.php');
        }

        public function registro(){
            if(isset($_POST['nombre'])):
                //
                $usu = new Usuario();
                $usu->setNombre($_POST['nombre']);
                $usu->setApellidos($_POST['ape']);
                $usu->setEmail($_POST['email']);
                $usu->setPass($_POST['pass']);
                //
                $usu->save();
                //
                $this->login();
            else:
                echo $this->twig->render("registro.php.twig");
            endif;
        }
    }