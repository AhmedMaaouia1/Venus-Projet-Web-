<?php
class commande 
{

	private $id_commande;
    private $id;
	private $id_user;
	


	 

	function __construct($id, $id_user)
	{
		$this->id=$id;
        $this->id_user=$id_user;	
	}
    

	function getid()
	{
		return $this->id;
	}
    function getid_commande(){
		return $this->id_commande;
	}
	function getid_user(){
		return $this->id_user;
	}

	function setid_commande($id){
	      $this->id_commande=$id;
	}
	function setid_user($id){
		  $this->id_user=$id;
	}
	
	

}

?>