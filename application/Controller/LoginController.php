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
        
         //header("location: ".URL."Home/index");
         
          $this->mdlLogin->__SET("userEmail",$_POST["email"]);
          $resultado = $this->mdlLogin->logueo();
// password_encrypt
          
          
          if ($resultado != false) {
            
           $contrasenaE = md5($_POST['pass']);
            if ($resultado["userPassword"] == $contrasenaE ) {
              
              //Cliente
              if(!$resultado["UserTypeId"])
              {

              }else{
              if ($resultado["UserTypeId"] == 5 ) {

                $customer = $this->mdlLogin->getCustomer();
                
                
                session_start();
                $_SESSION["Rol"] = $resultado["UserTypeId"];
                $_SESSION["name"] = $resultado["userUsername"];
                $_SESSION["email"] = $resultado["userEmail"];
                $_SESSION["document"] = $customer["customerDocument"];

                
                header("location: ".URL."home");

              }
              if ($resultado["UserTypeId"] == 3) {
                  session_start();
                  $_SESSION["Rol"] = $resultado["UserTypeId"];
                  $_SESSION["name"] = $resultado["userUsername"];                  
                  $_SESSION["email"] = $resultado["userEmail"];
                  // $_SESSION["document"] = $resultado["sellerDocument"];
                  
                  header("location: ".URL."home");
                }
                if($resultado["UserTypeId"] == 2)
                {
                  session_start();
                  $_SESSION["Rol"] = $resultado["UserTypeId"];
                  $_SESSION["name"] = $resultado["userUsername"];                  
                  $_SESSION["email"] = $resultado["userEmail"];
                  header("location: ".URL."home");
                }
              }

            }else {


              header('location: ' . URL . 'Login');

            }

          }else {

          header('location: ' . URL . 'Login');

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
        unset($_SESSION["email"]);

        //retorna la vista login
        header('location: ' . URL . 'Login');

    }

}