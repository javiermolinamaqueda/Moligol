<?php
	// Javier Molina Maqueda

	// importamos AUTOLOAD.PHP para poder utilizar las librerias de TWIG 
	require_once "vendor/autoload.php" ;

	class BaseControlador 
	{
		protected $twig ;

		public function __construct()
		{
			// instanciamos el cargador y le proporcionamos el directorio raíz
			// a partir del cual se encuentran las vistas.
			$loader = new \Twig\Loader\FilesystemLoader("./vistas") ;

			// instanciamos TWIG.
			$this->twig   = new \Twig\Environment($loader) ;
		}
	}