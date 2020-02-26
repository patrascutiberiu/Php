<?php

abstract class DbTable
{
    protected $primaryKey;

    protected $tableName;

    protected $pdo;

    public function __construct(string $_primaryKey, string $_tableName)
    {
        $this->primaryKey = $_primaryKey;
        $this->tableName = $_tableName;
        $this->pdo = Db::getDb();
    }

    abstract public static function get(int $id);
    
    abstract public static function getAll();
}