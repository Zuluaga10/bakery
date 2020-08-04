<?php 
namespace Mini\Controller;
use Mini\Model\mdlCart;


class CartController
{

    function __construct()
    {
        $this->mdlCart = new mdlCart();
        
    }
	public function index()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/cart/cart.php';
        require APP . 'view/_templates/footer.php';
    }

   

}