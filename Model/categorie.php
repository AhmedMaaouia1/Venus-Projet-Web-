<?php
	class Gategorie{
		private $id;
		private $nom=null;
		
      

		function __construct( $id, $nom){
			$this->nom=$nom;
		
		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}

		

        

		function setid(string $id){
			$this->id=$id;
		}
		function setnom(string $nom){
			$this->nom=$nom;

      
		
	}


?>