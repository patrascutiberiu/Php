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
        $contact = $_POST['contact_id'];

        $sql = "DELETE FROM contact WHERE contact_id =" . $contact . ";";

        $stmt = Db::getDb()->prepare($sql);


        // $var = [
        //     'contact_name' => $contact
        // ];

        $stmt->execute(array($contact));

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }

    public function updateContact(string $contact)
    {
        $sql = "UPDATE contact 
        SET contact_name = :contact_name, contact_password = :contact_password, contact_email = :contact_email 
        WHERE contact_id = :contact_id;";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_name' => $_POST['name'],
            'contact_password' => $_POST['password'],
            'contact_email' => $_POST['email']
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor()();

        return $result;
    }
}
