<?php
	class Reponse{
		private $id_reponse;
		private $reply;
		

		function __construct( $reply){
			
			$this->reply=$reply;
		
          
		}
		function getid(){
			return $this->id_reponse;
		}
		function getreply(){
			return $this->reply;
		}
		
	
		function setid(string $id_reponse){
			$this->id_reponse=$id_reponse;
		}
		

		function setreply(string $reply){
			$this->reply=$reply;
		}
		
		
       
	}


?>
