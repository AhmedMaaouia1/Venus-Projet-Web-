<?php
    class topic
    {
        private $idtopic;
        private $titre;
        private $descrip;
        private $contenu;



        function __construct($titre, $descrip, $contenu){
			$this->titre=$titre;
			$this->descrip=$descrip;
			$this->contenu=$contenu;
		}

		function setidtopic(int $idtopic){
			$this->idtopic=$idtopic;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
        function setdescrip(string $descrip){
			$this->descrip=$descrip;
		}
        function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}

		function getidtopic(){
			return $this->idtopic;
		}
		function gettitre(){
			return $this->titre;
		}
        function getdescrip(){
			return $this->descrip;
		}
        function getcontenu(){
			return $this->contenu;
		}

 
        
    }
    

?>