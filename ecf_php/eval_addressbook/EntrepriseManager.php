<?php

class EntrepriseManager extends DbTable
{
    protected $db;

    public function __construct()
    {
        parent::__construct('ets_id', 'entreprises');
    }

    public static function get(int $_id)
    {
        try {
            $sql = "SELECT * FROM entreprises WHERE ets_id = " . $_id . ";";

            return Db::getDb()->query($sql)->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th;
        }

    }

    public static function getAll(): array
    {
        try {
            return Db::getDb()->query("SELECT ets_name, ets_phone FROM entreprises;")->fetchAll();
        } catch (Exception $th) {
            echo $th;
        }
    }
}