<?php  

namespace Mini\Controller;
use Mini\Model\mdlLogin;

class CreateUserController 
{

    private $mdlLogin = null;

    function __construct(){

       $this->mdlLogin = new mdlLogin();

    }

    public function index()
    {
        $Datos= $this ->mdlLogin->documentsList();
        require APP . 'view/create/index.php';

    }

    public function createNewUser()
    {
            //crea variable para obtener el valor del input de la vista y encripta la contraseña
    		$passwordE = md5($_POST['pass']);

            //SET(modelo, $_POST[vista])
    	    $this ->mdlLogin->__SET("userUsername",$_POST['username']);
            $this ->mdlLogin->__SET("userEmail",$_POST['email']);
            $this ->mdlLogin->__SET("userPassword", $passwordE);
            $this ->mdlLogin->__SET("userTypeId", 5);
            //customer
            $this ->mdlLogin->__SET("customerDocument",$_POST['document']);
    	    $this ->mdlLogin->__SET("customerAddress",$_POST['address']);
    	    $this ->mdlLogin->__SET("customerPhoneNumber",$_POST['phone']);
            $this ->mdlLogin->__SET("documentTypeId",$_POST['documenttype']);

            $e = $this ->mdlLogin->createNewUser();
            $e = $this ->mdlLogin->createCustomer();

            //devuelve la vista
            header("location:".URL."Login");
    }

}