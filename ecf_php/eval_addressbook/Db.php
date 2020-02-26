<?php

class Db
{
    private static $instance = null;

    public function __construct()
    {
    }

    public static function getDb()
    {
        try {
            if (Db::$instance === null) {

                $dsn = 'mysql:host=localhost;port=3306;dbname=addressbook;charset=UTF8';
                
                Db::$instance = new PDO($dsn,'addressbook', 'azerty', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]);
            }
            return self::$instance;
        } catch (Exception $e) {
            exit('Erreur connexion basse de donne !' . $e->getMessage());
        }
    }
}
