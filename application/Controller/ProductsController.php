<?php 
namespace Mini\Controller;
use Mini\Model\mdlProducts;


class ProductsController
{

	function __construct(){
        $this->mdlProducts = new mdlProducts();
    }
	public function index()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/Products/Products.php';
        require APP . 'view/_templates/footer.php';
    }
    public function TableProducts()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/Products/ProductsList.php';
        require APP . 'view/_templates/footer.php';
    }

        public function TableProductsCustomer()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/Products/ProductsListCustomer.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/Products/edit.php';
        require APP . 'view/_templates/footer.php';
    }


    public function storeProduct(){
        sleep(2);

        $this->mdlProducts->__SET("productName", $_POST['name']);
        $this->mdlProducts->__SET("productDescription", $_POST['description']);
        $this->mdlProducts->__SET("productUnitPrice", $_POST['price']);
        $e = $this->mdlProducts->storeProduct();
        header("location:".URL.'Products');
    }

    

    // public function EditarCliente(){
    //     sleep(2);

    //     $fechainicio = $_POST['fechainscripcion'];
    //     $fechainicio_conv = strftime('%Y-%m-%dT%H:%M:%S', strtotime($fechainicio));

    //     $this->mdlProducts->__SET("CedulaCliente", $_POST['cedula']);
    //     $this->mdlProducts->__SET("Nombre", $_POST['nombre']);
    //     $this->mdlProducts->__SET("Apellido", $_POST['apellidos']);
    //     $this->mdlProducts->__SET("Edad", $_POST['edad']);
    //     $this->mdlProducts->__SET("Direccion", $_POST['direccion']);
    //     $this->mdlProducts->__SET("Celular", $_POST['telefono']);
    //     $this->mdlProducts->__SET("Correo", $_POST['correo']);
    //     $this->mdlProducts->__SET("FechaInscripcion",$fechainicio_conv);
    //     $this->mdlProducts->__SET("Plan", $_POST['plan']);

    //     $e = $this ->mdlProducts->EditarCliente();
    //     header("location:".URL.'Products/TablaProducts');

    //     }

    //      public function edit($codi){

    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/Products/edit.php';
    //     require APP . 'view/_templates/footer.php';

    //     }

}