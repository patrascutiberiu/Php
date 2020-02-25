<?php

class Db
{
    
    private static $instance = null;

    public function __construct()
    {
        
    }

    public static function getDb(){
        if (Db::$instance === null) {
            Db::$instance= new PDO('mysql:host=localhost;port=3306;dbname=formulaire;charset=UTF8','root','',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }

        return self::$instance;
    }
}