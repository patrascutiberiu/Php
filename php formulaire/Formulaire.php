<?php

class Formulaire extends DbTable
{

    public function __construct()
    {
        parent::__construct('contact', 'contact_id');
    }

    public static function select(int $_id)
    {

        try {
            $sql = "SELECT * FROM contact WHERE contact_id = :id;";

            $stmt = Db::getDb()->prepare($sql);

            $values = [
                ':id' => $_id
            ];

            $result = null;

            if ($stmt->execute($values)) {
                $result = $stmt->fetch(PDO::FETCH_OBJ);
            }

            $stmt->closeCursor();

            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public static function selectAll()
    {
        try {
            $sql = "SELECT * FROM contact;";

            $stmt = Db::getDb()->query($sql);

            $result = $stmt->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
