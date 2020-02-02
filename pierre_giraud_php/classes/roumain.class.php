<?php
    class Roumain extends Humain{

        private $postal;
        const PAYS='Roumanie';

        // public function setNom($nouveauNom){
        //     parent :: _construct($nouveauNom);
        //     $this->nom=strtoupper($nouveauNom);
        //     //$this->dateInscrit=date('d-m-Y H:i:s');
        // }

        public function __construct($nouveauNom){
            $this->nom=strtoupper($nouveauNom);
            $this->dateInscrit=date('d-m-Y H:i:s');
        }

        public function setPostal($codePostal){
            $this->postal=$codePostal;
        }

        public function getPostal(){
            return $this->postal;
        }

        public function setAdresse($cA,$cP,$cV){
            $this->adresse=$cA;
            $this->postal=$cP;
            $this->ville=$cV;
        }

        public function getAdresse(){
            return $this->adresse.'<br>' .$this->postal.'<br>'.$this->ville.'<br>'.self::PAYS;
        }
    } 
?>