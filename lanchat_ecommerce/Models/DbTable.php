<?php
    abstract class DbTable
    {
        //1 select, selectAll, insert, update, delete
        //2 find, findAll, add, update , remove

        /** Le nom de la table SQL
        * @var string 
        */
        protected $tableName;
        
        /** la clé primaire de la table
        * @var string
        */
        protected $pk;

        /**
        * @var pdo
        */
        protected $pdo;

        public function __construct(string $_tableName, string $_pk)
        {
            $this->tableName = $_tableName;
            $this->pk=$_pk;
            $this->pdo = DbConnection::getInstance();
        }

        //methode abstract pas de parametre
        
        /** 
        * Récupère une ligne de la table
        * @param int $id L'identifiant à rechercher
        * @return Model|null
        * 
        */
        abstract public function select(int $id);

        /**
        * 
        */
        abstract public function selectAll();

        /**
        * 
        */
        abstract public function insert(Model $model);

        /**
        * 
        */
        abstract public function update(Model $model);

        /**
        * 
        */
        abstract public function delete(int $id);

    }