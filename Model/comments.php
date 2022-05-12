<?php
    class comments
    {
        private $idcom;
        private $id_topic;
        private $contenu;

        function __construct($idcom,$id_topic,$contenu){
		
			$this->idcom=$idcom;
			$this->id_topic=$id_topic;
            $this->contenu=$contenu;
		}

        function setidcom(string $idcom){
			$this->idcom=$idcom;
		}

        function setid_topic(string $id_topic){
			$this->id_topic=$id_topic;
		}

        function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}

        function getidcom(){
			return $this->idcom;
		}

        function getid_topic(){
			return $this->id_topic;
		}
        
        function getcontenu(){
			return $this->contenu;
		}

 
        
    }
    

?>