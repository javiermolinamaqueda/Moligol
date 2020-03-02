<?php 
//Javier Molina Maqueda
require_once "controladores/BotasControlador.php";
require_once "controladores/UsuarioControlador.php";
require_once "controladores/CarritoControlador.php";
require_once "controladores/SesionControlador.php";
require_once "controladores/AdminControlador.php";

    $con = "Sesion";
    if (isset($_GET['con']) || isset($_POST['con'])):
        $con = $_GET['con'] ?? $_POST['con'];
    endif;
    
    $ope = "mostrarLogin";
    if (isset($_GET['ope']) || isset($_POST['ope'])):
        $ope = $_GET['ope'] ?? $_POST['ope'];
    endif;
        
    $nameController = "{$con}Controlador";
    $controlador = new $nameController();

    $controlador->$ope();