<?php

	//Javier Molina Maqueda
	
	require_once "Bdatos/Database.php";

    class Usuario{
        
        private $idUsu;
        private $nombre;
		private $apellidos;
		private $email;
		private $pass;
		private $admin;

        public function __construct() { }

        /** 
        */

	    public function getIdUsu()
	    {
	        return $this->idUsu;
	    }

        /** 
        */

	    public function setIdUsu($idUsu)
	    {
	        $this->idUsu = $idUsu;

	        return $this;
        }
        
        /** 
        */
        
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

        /** 
        */

	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
        }
        
        /** 
        */
        
	    public function getApellidos()
	    {
	        return $this->apellidos;
	    }

        /** 
        */

	    public function setApellidos($ape)
	    {
	        $this->apellidos = $ape;

	        return $this;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($a){
			$this->email = $a;
		}

		public function getPass(){
			return $this->pass;
		}

		public function setPass($a){
			$this->pass = $a;
		}

		public function getAdmin(){
			return $this->admin;
		}

		public function setAdmin($a){
			$this->admin = $a;
		}

		public static function findAll(){
			$db = new Database();
			$db->query("select * from usuario");

			$datos = [];

			while ($item = $db->getObject("Usuario")):
				array_push($datos,$item);
			endwhile;

			return $datos;
		}

		public static function find($ema){
			$db = new Database();
			$db->query("select * from usuario where email='{$ema}'");

			return $db->getObject("Usuario");
		}

		public static function findId($idUsu){
			$db = new Database();
			$db->query("select * from usuario where idUsu='{$idUsu}'");

			return $db->getObject("Usuario");
		}

		public function save(){
			$db = new Database();
			//
			if($this->idUsu != null):
				$db->query("update usuario set nombre='{$this->nombre}',apellidos='{$this->apellidos}',
							email='{$this->email}',pass=MD5('{$this->pass}'),admin='{$this->admin}'
							where idUsu='{$this->idUsu}'");
			else:
				$sql = "insert into usuario (nombre,apellidos,email,pass)
						values ('{$this->nombre}','{$this->apellidos}',
						'{$this->email}',MD5('{$this->pass}'))";

				$db->query($sql);

				$this->idUsu = $db->ultimoId();
			endif;
		}

		public function delete(){
			$db = new Database();
			$db->query("delete from usuario where idUsu=".$this->idUsu);
		}
    }