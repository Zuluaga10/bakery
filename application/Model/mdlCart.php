<?php

namespace Mini\Model;

use Mini\Core\Model;

	class mdlCart extends Model{

		private $payId;
		private $amountPay;
		private $tokenPay;
		private $descriptionPay;
		private $installmentsPay;
		private $emailPay;
		

		public function __SET($attr, $value){

			$this->$attr=$value;
		}
		public function __GET($attr){

		 return $this->$attr;
		}

		function __construct(){

			try {
				
				parent::__construct();
			} catch (PDOException $e) {
				exit ("Error en la conexión.");
			}
		}

		public function storeProduct()
		{
			$sql="CALL storeProduct(?,?,?)";
			$stm=$this->db->prepare($sql);
			$stm->bindParam(1, $this->productName);
			$stm->bindParam(2, $this->productDescription);
			$stm->bindParam(3, $this->productUnitPrice);
			$stm->execute();
		}

		public function ListarClientes(){

			$sql="CALL HAR_ListarClientes()";
			$stm=$this->db->prepare($sql);
			$stm->execute();
			return $stm->fetchall();

		}
		
	}