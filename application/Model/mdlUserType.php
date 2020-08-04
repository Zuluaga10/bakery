<?php  

namespace Mini\Model;

use Mini\Core\Model;


class mdlUserType extends Model
{
	
  
  private $userTypeId;
  private $userTypeName;
  private $userEmail;


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

       public function getUserTypeId()
         {
            $sql = "CALL getUserType(?)";
            $stm = $this->db->prepare($sql);
            $stm ->bindParam(1, $this->userTypeId);
            $stm->execute();
            return $stm->fetch();
         }

          public function getUserTypeEmail()
         {
            $sql = "CALL getTypeUser(?)";
            $stm = $this->db->prepare($sql);
            $stm ->bindParam(1, $this->userEmail);
            $stm->execute();
            return $stm->fetchall();
         }

}