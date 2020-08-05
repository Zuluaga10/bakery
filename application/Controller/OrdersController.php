<?php 
namespace Mini\Controller;
use Mini\Model\mdlOrders;
use Mini\Model\mdlTipoOrders;

class OrdersController
{

	function __construct(){


    }
	public function index()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/orders/Orders.php';
        require APP . 'view/_templates/footer.php';
    }

    public function Orders()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/orders/OrdersSeller.php';
        require APP . 'view/_templates/footer.php';
    }

    public function createOrder(){
        sleep(2);

        $fecha = $_POST['fecha'];
        $fecha_conv = strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha));


        $this->mdlOrders->__SET("Cantidad", $_POST['cantidad']);
        $this->mdlOrders->__SET("Fecha", $fecha_conv);
        $this->mdlOrders->__SET("TipoOrders", $_POST['tipoingreso']);
        $e = $this->mdlOrders->RegistrarIngreso();
        header("location:".URL.'Orders');
    }


    //     public function cambiarEstado(){
    //     $this ->mdlOrders->__SET("IdServicio",$_POST["codigo"]);
    //     $this ->mdlOrders->__SET("Estado",$_POST["estado"]);
    //     $datos= $this ->mdlOrders->cambiarEstado();
    //     if ($datos) {
    //        echo json_encode(["b"=>1]);
    //     }else{
    //         echo json_encode(["b"=>0]);
    //     }
    //     // header("location:".URL."UnidadMedida/unidadMedida");
    // }
}