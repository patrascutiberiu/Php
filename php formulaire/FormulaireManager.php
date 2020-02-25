<?php


class FormulaireManager extends Formulaire
{
    protected $db;

    private $password;

    public function setPassword(string $_password)
    {
        $this->password = password_hash($_password, PASSWORD_BCRYPT);
    }

    public function addContact(array $_nouveauContact): bool
    {
        $sql = "INSERT INTO contact (contact_name, contact_password, contact_email)
        VALUES ( :contact_name, :contact_password, :contact_email);";

        $stmt = Db::getDb()->prepare($sql);

        if ($stmt->execute($_nouveauContact)) {
            return $stmt->rowCount() > 0;
        }

        return false;
    }

    public function removeContact(string $contact)
    {
        $contact = intval($contact);

        $sql = "DELETE FROM contact WHERE contact_id =" . $contact . " LIMIT 1;";

        //
        $stmt = Db::getDb()->query($sql);


        $var = [
            'contact_id' => $contact
        ];

        $stmt->execute($var);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        d($result);
        return $result;
    }

    public function updateContact(string $_id, string $_name, string $_password, string $_email)
    {
        $_id = intval($_id);
        $_name = $_GET['contact_name'];
        $_password = $_GET['contact_password'];
        $_email = $_GET['contact_password'];


        $sql = "UPDATE contact 
        SET contact_name = :contact_name, contact_password = :contact_password, contact_email = :contact_email 
        WHERE contact_id =" . $_id . ";";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_name' => $_name,
            'contact_password' => $_password,
            'contact_email' => $_email
        ];

        d($vars);

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor()();

        return $result;
    }
}
