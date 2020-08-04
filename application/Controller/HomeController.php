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
    public function TablaEmpleados()
    {
        //Llama a la funcion listar empleados dentro del objeto instanciado 
        //mdlempleados
        $datos= $this->mdlEmpleados->ListarEmpleados();

        require APP . 'view/_templates/header.php';
        require APP . 'view/empleados/TablaEmpleados.php';
        require APP . 'view/_templates/footer.php';
    }

    public function RegistrarEmpleados(){
        //Alerta del js 2 segundos de visibilidad
        sleep(2);

        //relaciona la propiedad del modelo, con la propiedad de la vista
        //$_POST = capture al dato
        $this->mdlEmpleados->__SET("CedulaEmpleado", $_POST['cedula']);
        $this->mdlEmpleados->__SET("Nombre", $_POST['nombre']);
        $this->mdlEmpleados->__SET("Apellido", $_POST['apellidos']);
        $this->mdlEmpleados->__SET("Edad", $_POST['edad']);
        $this->mdlEmpleados->__SET("Celular", $_POST['celular']);
        //Entra a la funcion del modelo empleados (se va para el modelo y ejecuta la funcion)
        $this->mdlEmpleados->RegistrarEmpleado();
        //Redirige a vista empleados
        header("location:".URL.'empleados');
    }

    public function EditarEmpleado(){
        sleep(2);
        //Lo mismo que el registrar
        $this->mdlEmpleados->__SET("CedulaEmpleado", $_POST['cedula']);
        $this->mdlEmpleados->__SET("Nombre", $_POST['nombre']);
        $this->mdlEmpleados->__SET("Apellido", $_POST['apellidos']);
        $this->mdlEmpleados->__SET("Edad", $_POST['edad']);
        $this->mdlEmpleados->__SET("Celular", $_POST['telefono']);
        $e = $this ->mdlEmpleados->EditarEmpleado();
        header("location:".URL.'empleados/TablaEmpleados');

        }

         public function edit($codi){
            //relaciona la propiedad cedula con el parametro codi
         $this ->mdlEmpleados->__SET("CedulaEmpleado",$codi);
         //En la instancia del objeto mdlEmpleado entra a la funcion consutarempleado
         //es para que se muestre la cedula encima del boton editar
         $datos = $this ->mdlEmpleados->ConsultarEmpleado();

        require APP . 'view/_templates/header.php';
        require APP . 'view/empleados/edit.php';
        require APP . 'view/_templates/footer.php';

        }

    //     public function ContadorDias()
    // {

    //     $datos= $this->mdlEmpleados->ContadorDias();
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/empleados/Contadorempleados.php';
    //     require APP . 'view/_templates/footer.php';
    // }


    //     public function cambiarEstado(){
    //     $this ->mdlEmpleados->__SET("IdServicio",$_POST["codigo"]);
    //     $this ->mdlEmpleados->__SET("Estado",$_POST["estado"]);
    //     $datos= $this ->mdlEmpleados->cambiarEstado();
    //     if ($datos) {
    //        echo json_encode(["b"=>1]);
    //     }else{
    //         echo json_encode(["b"=>0]);
    //     }
    //     // header("location:".URL."UnidadMedida/unidadMedida");
    // }
}