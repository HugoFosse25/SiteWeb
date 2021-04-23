<?php
// Classe Personnage
    class Personnage{
        //Propriété
        private $_nom;
        private $_prenom;
        //Méthodes
        public function __construct($id,$pdo){
            $req = "SELECT * FROM `Personnes` WHERE `id`=$id";
            $reponse=$pdo->query($req);
            $tab=$reponse->fetch();
            $this->_nom=$tab["nom"];
            $this->_prenom=$tab["prenom"];
        }
        public function PresenteToi(){
            echo 'Je suis '.$this->_nom." ".$this->_prenom." ";
        }
    }
?>