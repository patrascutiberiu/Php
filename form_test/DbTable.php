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

    abstract public static function get(int $_id);

    abstract public static function getAll();

    abstract public static function insert(string $_name, string $_password, string $_email);

    abstract public static function update(array $contact);

    abstract public static function delete(int $_id);
}
