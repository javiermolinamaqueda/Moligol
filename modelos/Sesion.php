<?php 

//Javier Molina Maqueda
require_once "modelos/usuario.php";
    class Sesion{
        //
        public function __construct(){
            session_start();
        }

        public function add($key, $valor){
            $_SESSION[$key] = $valor;
        }

        public function get($key){
            return !empty($_SESSION[$key]) ? $_SESSION[$key] : null ;
        }

        public function cerrarSesion(){
            $_SESSION = [] ;
            session_destroy();
        }

        public function activa(){
            //si la sesion esta vacia
            if (empty($_SESSION))
                return false;
            //si no
            return true;
        }

        public static function login(){
			$ema = $_POST['email'];
            $pass = $_POST['pass'];

			//realizar consulta y devolver true o false
			$db = new Database();
			$db->query("select * from usuario where email like '{$ema}' and pass like MD5('{$pass}')");

			if ($db->getObject("usuario"))
				return true;
			//si no
			return false;
        }

        public function esAdmin(){
            $usr = Usuario::findId($_SESSION['idUsu']);
                if(!$usr->getAdmin())
                    return false;
                //si no
                return true;
        }
    }