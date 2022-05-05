
<?php
	class Reclamation{
		private $id_reclamation;
		private $prenom_reclamation;
		private $nom_reclamation;
		private $mail_reclamation;
		private $sujet_reclamation;
        private $message_reclamation;
		
		

		function __construct( $prenom_reclamation,$nom_reclamation, $mail_reclamation, $sujet_reclamation, $message_reclamation ){
			$this->prenom_reclamation=$prenom_reclamation;
			$this->nom_reclamation=$nom_reclamation;
			$this->mail_reclamation=$mail_reclamation;
            $this->sujet_reclamation=$sujet_reclamation;
            $this->message_reclamation=$message_reclamation;
			
			
          
		}
		function getid(){
			return $this->id_reclamation;
		}
		function getprenom(){
			return $this->prenom_reclamation;
		}
		function getnom(){
			return $this->nom_reclamation;
		}
		
		function getmail(){
			return $this->mail_reclamation;
		}
		function getsjt(){
			return $this->sujet_reclamation;
		}
        function getmsg(){
			return $this->message_reclamation;
		}
		
	
		function setprenom(string $prenom_reclamation){
			$this->prenom_reclamation=$prenom_reclamation;
		}
		

		function setnom(string $nom_reclamation){
			$this->nom_reclamation=$nom_reclamation;
		}
		
		function setmail(string $mail_reclamation){
			$this->mail_reclamation=$mail_reclamation;
		}
		
        function setsjt(string $sujet_reclamation){
			$this->sujet_reclamation=$sujet_reclamation;
		}
		function setmsg(string $message_reclamation){
			$this->message_reclamation=$message_reclamation;
		}
		
	}


?>
