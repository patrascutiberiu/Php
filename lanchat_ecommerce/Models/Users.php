<?php

class  Users extends DbTable
{


    public function __construct()
    {
        parent::__construct('users','Id_User'); 
    }

    public function select(int $id)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $this->pk . "=:id_user";
        
        //statement
        $stmt = $this->pdo->prepare($sql);

        $values = [
            //':id_user'=>$id
            'id_user'=>$id
        ];

        if($stmt-> execute($values))
        {
            $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
            //fetch_assoc plus rapide
            return $stmt->fetch();
        }
        return null;

        //var_export($sql);
    }
    
    public function selectAll()
    {
        $sql = "SELECT * FROM " .$this->tableName.";";

        $stmt= $this->pdo->prepare($sql);

        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }
        return null;

        /**ou        
        *$stmt= $this->pdo->query($sql);
        *return $stmt->fetchAll(); 
        */
    }

    public function insert(Model $model)
    {
        if ($model instanceof User) 
        {
            //verifier si 
            $data = $model->toArray([$this->pk]);

            //echo '<pre>'.var_export($data,true);
            //recup liste de col de la table
            $dataCols = array_keys($data);

            $cols = implode(', ', $dataCols);

            $marks = ':'.implode(', :', $dataCols);

            $sql = "INSERT INTO " .$this->tableName. "\n (".$cols.") VALUE(".$marks.");";

            $stmt = $this->pdo->prepare($sql);

            //la meme chose que avant
            //$stmt = $this->pdo->prepare("INSERT INTO " .$this->tableName. "\n (".$cols.") VALUE(".$marks.");");

            if ($stmt->execute($data)) {
                //derniere id de la table
                //return $this->pdo->lastInsertId();

                $_model->Id_User = $this->pdo->lastInsertId();

                return $_model->Id_User;
            }
            else {
                return 0;
            }

            debugF($model,'Model to insert');
            debugF($data,'Data');
            debugF($dataCols,'DataCols');
            debugF($cols,'Cols');
            debugF($marks,'Marks');
            debugF($sql,'Sql');
        }
    }

    public function update(Model $model)
    {
        if ($model instanceof User) {
           $sql = "UPDATE " .$this->tableName." SET \n";
           
           $data =$model->toArray();

           $dataCols = [];

           foreach ($data as $col => $value) {
               $dataCols[] = (" ".$col." =:".$col);
           }
           $sql .=implode(', ', $dataCols);
           $sql .= " \n WHERE ".$this->pk."=:".$thid->pk." LIMIT 1";

           $debugF($model, "Model to Update");
           $debugF($data, 'data');
           $debugF($dataCols, 'dataCols');
           $debugF($sql, 'sql');
        }
        
    }

    public function delete(int $id)
    {
        $sql= "DELETE FROM " .$this->tableName." WHERE " .$this->pk. "=:id_user;";
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id_user', $id, PDO::PARAM_INT);

        if ($stmt->execute()) 
        {
            return $stmt->rowCount();
        }
        return 0;
    }
}