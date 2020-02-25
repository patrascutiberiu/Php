<?php

class Contact extends DbTable
{
    public function __construct()
    {
        parent::__construct('contact', 'contact_id');
    }

    public static function get(int $_id)
    {
        try {
            $sql = "SELECT * FROM contact WHERE contact_id = " . $_id . ";";

            return Db::getDb()->query($sql)->fetch();
        } catch (Exception $th) {
            echo $th;
        }

        // try {
        //     $sql = "SELECT * FROM contact WHERE contact_id = :id;";

        //     $stmt = Db::getDb()->prepare($sql);

        //     $values = [
        //         ':id' => $_id
        //     ];

        //     $result = null;

        //     if ($stmt->execute($values)) {
        //         $result = $stmt->fetch();
        //     }

        //     $stmt->closeCursor();

        //     return $result;
        // } catch (Exception $th) {
        //     echo $th;
        // }
    }

    public static function getAll(): array
    {
        try {
            return Db::getDb()->query("SELECT * FROM contact;")->fetchAll();
        } catch (Exception $th) {
            echo $th;
        }
    }

    public static function insert(string $_name, string $_password, string $_email): bool
    {
        $_password = password_hash($_password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO contact (contact_name, contact_password, contact_email) VALUES (:contact_name, :contact_password, :contact_email);";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_name' => $_name,
            'contact_password' => $_password,
            'contact_email' => $_email
        ];

        if ($stmt->execute($vars)) {
            return $stmt->rowCount() > 0;
        }

        return false;
    }

    public static function update(array $contact)
    {
        $sql = "UPDATE contact SET contact_name = :contact_name , contact_password = :contact_password, contact_email = :contact_email WHERE contact_id = :contact_id;";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_id' => $contact['contact_id'],
            'contact_name' => $contact['contact_name'],
            'contact_password' => $contact['password'],
            'contact_email' => $contact['email']
        ];

        return $stmt->execute($vars);
    }

    public static function delete(int $_id): int
    {
        return Db::getDb()->exec("DELETE FROM contact WHERE contact_id = " . $_id . ";");
    }
}
