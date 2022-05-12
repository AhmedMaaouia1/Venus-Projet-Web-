<?php
    class categorie {
        private ?int $idcategorie = null;
        private string $Nom;
        private string $image;

        public function __construct($Nom,$image){
            //$this->idcategorie = $id;
            $this->Nom = $Nom;   
            $this->image = $image;
        }

        public function getIdcategorie() {
            return $this->idcategorie;
        }

        public function getNom (){
            return $this->Nom ;
        }

        public function getImage (){
            return $this->image ;
        }

       

        public function setNom ($Nom){
            $this->Nom = $Nom;
        }

        public function setImage ($image){
            $this->image = $image;
        }

      
    }