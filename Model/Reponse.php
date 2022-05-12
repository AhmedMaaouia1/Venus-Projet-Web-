<?php
	class Reponse{
		private $id_reponse;
		private $reply;
		private $id_rec;

		function __construct($id_reponse,$reply, $id_rec){
			$this->id_reponse=$id_reponse;
			$this->reply=$reply;
			$this->id_rec=$id_rec;
		
          
		}
		function getidrec(){
			return $this->id_rec;
		}
		function getid(){
			return $this->id_reponse;
		}
		function getreply(){
			return $this->reply;
		}
		
		function setidrec(string $id_rec){
			$this->id_rec=$id_rec;
		}
		
		function setid(string $id_reponse){
			$this->id_reponse=$id_reponse;
		}
		

		function setreply(string $reply){
			$this->reply=$reply;
		}
		
		
       
	}


?>
