<?php
    class DbConnection
    {
        private static $instance = null;

        private function __construct(){}

        //les met cree une inst de onj ido avec ladress serv, on ajute obtion connexion + tableu de obtion comp en cas derreur dessactiver l'emulation
        
        public static function getInstance()
        {
            if (self::$instance === null) {
                try {
                    //data source name
                    //porte par default 3306
                    //type, adresse, porte, nom base, jeux de caractere
                    $dsn = 'mysql:host=localhost;port=3306;dbname=lanchat;charset=UTF8';

                    //ancien methode
                    //$options=array();

                    $option=[
                        //oblige pdo lever une exception et s'arreter de que onpas en production
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        //mode rec par def                       
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        //requette compile n dezact emul 
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ];

                    //la requette dsn, utilisateur, mot de passe
                    self::$instance = new PDO($dsn,'lanchat','Cdi1234',$option);
        
                } catch (Exception $ex) {
                    exit('Erreur SQL'.$ex->getMessage());
                }
            }
            return self::$instance;
        }
    }
    


