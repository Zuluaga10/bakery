<?php  

namespace Mini\Model;

use Mini\Core\Model;


class mdlLogin extends Model
{
	
  
  private $userId;
  private $userUsername;
  private $userEmail;
  private $userPassword;
  private $userTypeId;
  private $customerDocument;
  private $customerAddress;
  private $customerPhoneNumber;
  private $documentTypeId;
  //encapsulamiento, set y get 
    public function __SET($attr,$val)
    {
        $this->$attr = $val;
    }

    public function __GET($attr)
    {
        return $this->$attr;
    }

    //constructor que hereda de la clase padre  core para establecer conexion
    function __construct()
	{
		try {
			parent::__construct();
		} catch (PDOException $e) {
			exit("error en la conexion.");
		}
		
	}

 		public function logueo()
 		{
          //Llamado al procedimiento y establece su parametro
           $sql="CALL getUser(?)";
           //prepara consulta
           $stm = $this->db->prepare($sql);
           //establece parametro
           $stm->bindParam(1,$this->userEmail);
           $stm->execute();
           //retorna una lista de un objeto
           return $stm->fetch();
         }

         public function createNewUser()
         {
            $sql = "CALL storeUser(?,?,?,?)";
            $stm = $this->db->prepare($sql);
            $stm ->bindParam(1, $this->userUsername);
            $stm ->bindParam(2, $this->userEmail);    
            $stm ->bindParam(3, $this->userPassword); 
            $stm ->bindParam(4, $this->userTypeId);
            $stm->execute();
         }

         public function createCustomer()
         {
            $sql = "CALL storeCustomer(?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
            $stm ->bindParam(1, $this->customerDocument);
            $stm ->bindParam(2, $this->userUsername);    
            $stm ->bindParam(3, $this->customerAddress); 
            $stm ->bindParam(4, $this->customerPhoneNumber);
            $stm ->bindParam(5, $this->documentTypeId);
            $stm ->bindParam(6, $this->userEmail);
            $stm->execute();
         }

         public function getCustomer()
 		{
          //Llamado al procedimiento y establece su parametro
           $sql="CALL getCustomerDocument(?)";
           $stm = $this->db->prepare($sql);
           $stm ->bindParam(1, $this->userEmail);
           $stm->execute();
           return $stm->fetch();
         }

         public function documentsList()
 		{
          //Llamado al procedimiento y establece su parametro
           $sql="CALL getAllDocumentTypes()";
           $stm = $this->db->prepare($sql);
           $stm->execute();
           return $stm->fetchall();
         }

}