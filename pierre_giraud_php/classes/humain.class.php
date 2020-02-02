<?php
    abstract class Humain{

        protected $nom;
        protected $dateInscrit;
        protected static $objCrees;
        protected $add;
        protected $postal;
        protected $ville;

        const HEURE_TRAVAIL=35;

        public function __construct($nouveauNom){
            $this->nom=$nouveauNom;
            $this->dateInscrit=date('d-m-Y H:i:s');
            self::$objCrees++;
        }

        // public function setNom($nouveauNom){
        //     $this->nom=$nouveauNom;
        // }

        public function getNom(){
            return $this->nom;
        }

        public function getDateInscrit(){
            return $this->dateInscrit;
        }

        public function getSalaire($taux){
            return $taux *self::HEURE_TRAVAIL;
        }

        public static function totalObjCrees(){
            return self::$objCrees;
        }

        abstract public function adresse($cA,$cP,$cV);

    }


?>