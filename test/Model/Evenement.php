<?php
	class Evenement{
		private $id_event;
		private $nom_event=null;
		private $localisation_event=null;
		private $date_event;
		private $dis_event=null;
		
		function __construct( $nom_event, $localisation_event, $date_event, $dis_event){
			$this->nom_event=$nom_event;
			$this->localisation_event=$localisation_event;
			$this->date_event=$date_event;
			$this->dis_event=$dis_event;
		}
		
        
        
        function getid_event(){
			return $this->id_event;
		}
		function getnom_event(){
			return $this->nom_event;
		}
		function getlocalisation_event(){
			return $this->localisation_event;
		}
		function getdate_event(){
			return $this->date_event;
		}
		function getdis_event(){
			return $this->dis_event;
		}
		
        
        
        
        function setnom_event(string $nom_event){
			$this->nom_event=$nom_event;
		}
		function setlocalisation_event(string $localisation_event){
			$this->localisation_event=$localisation_event;
		}
		function setdate_event(string $date_event){
			$this->date_event=$date_event;
		}
		function setdis_event(string $dis_event){
			$this->dis_event=$dis_event;
		}
		
	}


?>