<?php
// Classe Personnage
    class Personnages{
        //Propriété
        private $_nom;
        //Méthodes
        public function SetNom($NewNom){
            $this->_nom=$NewNom;
        }
        public function GetNom(){
            return $this->_nom;
        }
        public function PresenteToi(){
            echo 'Je suis '.$this->_nom." ".$this->_prenom." ";
        }
    }
?>