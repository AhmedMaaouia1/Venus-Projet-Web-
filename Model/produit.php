<?php
    class produit {
        private ?int $idproduit = null;
        private string $Nom;
        private string $image;
        private float $prix;
        private int $qte;
        private ?int $cate;

        public function __construct($Nom, $image, $qte,$prix,$cate){
            //$this->idproduit = $id;
            $this->Nom = $Nom;
            $this->prix = $prix;
            $this->qte = $qte;
            $this->image = $image;
            $this->cate = $cate;
        }

        public function getIdproduit() {
            return $this->idproduit;
        }

        public function getNom (){
            return $this->Nom ;
        }

        public function getImage (){
            return $this->image ;
        }

        public function getPrix (){
            return $this->prix ;
        }
        public function getqte (){
            return $this->qte ;
        }
        public function getcate (){
            return $this->cate ;
        }

        public function setNom ($Nom){
            $this->Nom = $Nom;
        }

        public function setImage ($image){
            $this->image = $image;
        }

        public function setPrix ($prix){
            $this->prix = $prix;
        }
        public function setqte ($qte){
            $this->qte = $qte;
        }
        public function setcate ($cate){
            $this->cate = $cate;
        }
    }