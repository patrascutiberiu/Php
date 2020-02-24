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

        $sql = "DELETE FROM contact WHERE contact_id =" . $contact . ";";

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

    public function updateContact(string $contact)
    {
        $contact = intval($contact);
        $sql = "UPDATE contact 
        SET contact_name = :contact_name, contact_password = :contact_password, contact_email = :contact_email 
        WHERE contact_id =".$contact.";";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_name' => 'contact_name',
            'contact_password' => 'contact_password',
            'contact_email' => 'contact_email'
        ];
d($vars);
        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor()();

        return $result;
    }
}
