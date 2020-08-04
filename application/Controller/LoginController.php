<?php  

namespace Mini\Controller;
use Mini\Model\mdlLogin;
use Mini\Model\mdlUserType;

class LoginController 
{
	
	
    //atributos
    private $mdlLogin = null;

    function __construct(){

        //crea una instancia del modelo 
       $this->mdlLogin = new mdlLogin();
       $this->mdlUserType = new mdlUserType();

    }

    public function index()
    {
        //retorna la vista
        require APP . 'view/login/index.php';

    }


    public function logueo()
    {

      if (isset($_POST["login"])) {

          //Relaciona email que ingresa en vista con modelo
          $this->mdlLogin->__SET("userEmail",$_POST["email"]);
          //Crea variable resultado y ejecuta la funcion logueo del modelo
          $resultado = $this->mdlLogin->logueo();

          // password_encrypt
          //Si hay datos del correo retorna true, sino false
          if ($resultado != false) {
            //Se crea variable contraseña
            $contrasenaE = md5($_POST['pass']);// Lo que venga del input de la vista se encripta

            //Compara contraseña de base de datos con la de la vista
            if ($resultado["userPassword"] == $contrasenaE ) {

                //sesion

                //retorna la vista welcome
                header("location: ".URL."Home");

                }else{
                    header("location: ".URL."Login");
                }

      }
      else{
                    header("location: ".URL."Login");
            }
  }
  
  }
    public function salir()
    {

       //session_start();
        //Crea la sesion
        session_start();
        //Destruye la sesion creada
        session_destroy();
        //Los datos que va a destruir
        unset($_SESSION["id"]);
        unset($_SESSION["email"]);

        //retorna la vista login
        header('location: ' . URL . 'Login');

    }

}