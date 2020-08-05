<?php 
namespace Mini\Controller;
//importa el modelo empleados (mdlempleados)
use Mini\Model\mdlEmpleados;

class HomeController
{
    //constructor
	function __construct(){
        //crea instancia del objeto mdlEmpleados


    }
	public function index()
    {

    	//Llama al header primero, luego a la vista y por ultimo al footer
        //. = concatenacion
        //require app = requiere vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/Home.php';
        require APP . 'view/_templates/footer.php';
    }

    public function dashboard()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/dashboard/index.php';
        require APP . 'view/_templates/footer.php';
    }

}