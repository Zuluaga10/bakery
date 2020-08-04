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

         public function storeUser()
         {
            $sql = "CALL storeUser(?,?,?,?)";
            $stm = $this->db->prepare($sql);
            $stm ->bindParam(1, $this->userUsername);
            $stm ->bindParam(2, $this->userEmail);    
            $stm ->bindParam(3, $this->userPassword); 
            $stm ->bindParam(4, $this->userTypeId); 
            $stm->execute();
         }

}