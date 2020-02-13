<?php
abstract class Db
{
    protected $tableName;

    protected $primaryKey;

    protected $pdo;

    public function __construct(string $_tableName, string $_primaryKey)
    {
        $this->tableName = $_tableName;
        $this->primaryKey = $_primaryKey;
        $this->pdo = Db::getInstance();
    }

    abstract public function select(int $id);

    abstract public function selectAll();

    abstract public function insert();

    abstract public function update();

    abstract public function delete(int $id);
}
