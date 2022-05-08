<?php
	class User{
		private $id;
		private $nom=null;
		private $prenom=null;
		private $email=null;
        private $sexe=null;
        private $region=null;
		private $Mdp;
		private $role="client";
		private $newsletter=null;
		private $Bloque;
		private $confirmKey;
		private $confirm;

		function __construct( $nom, $prenom, $email, $Mdp, $sexe, $region, $newsletter, $confirmKey){
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->email=$email;
            $this->Mdp=$Mdp;
            $this->sexe=$sexe;
            $this->region=$region;
			$this->newsletter=$newsletter;
			$this->confirmKey=$confirmKey;
		}
		function getid(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
	
		function getEmail(){
			return $this->email;
		}
		function getMdp(){
			return $this->Mdp;
		}

        function getsexe(){
			return $this->sexe;
		}

        function getregion(){
			return $this->region;
		}

		function getnews(){
			return $this->newsletter;
		}

		function getrole(){
			return $this->role;
		}

		function getbloque(){
			return $this->Bloque;
		}

		function getkey(){
			return $this->confirmKey;
		}


		function setId(string $id){
			$this->id=$id;
		}

		function setNom(string $nom){
			$this->nom=$nom;
		}

		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		
		function setEmail(string $email){
			$this->email=$email;
		}
		
        function setMdp(string $Mdp){
			$this->Mdp=$Mdp;
		}

        function setsexe(string $sexe){
			$this->sexe=$sexe;
		}

        function setregion(string $region){
			$this->region=$region;
		}
		
		function setnews(string $newsletter){
			$this->newsletter=$newsletter;
		}

		function setrole(string $role){
			$this->role=$role;
		}

		function setbloque(string $Bloque){
			$this->Bloque=$Bloque;
		}
		
	}


?>