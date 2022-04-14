<?php
	class Produit{
		private $id;
		private $nom=null;
		private $image=null;
		private $prix=null;
        private $desp=null;
      

		function __construct( $id, $nom, $image, $prix, $desp){
			$this->nom=$nom;
			$this->image=$image;
			$this->prix=$prix;
            $this->desp=$desp;
		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getimage(){
			return $this->image;
		}
	
		function getprix(){
			return $this->prix;
		}
		function getdesp(){
			return $this->desp;
		}

        

		function setid(string $id){
			$this->id=$id;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		
		function setimage(string $image){
			$this->image=$image;
		}
		
        function setprix(string $prix){
			$this->prix=$prix;
		}

        function setdesp(string $desp){
			$this->desp=$desp;
		}

      
		
	}


?>