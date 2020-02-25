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

    public function updateContact(int $_id, string $_name, string $_password, string $_email)
    {
        $_id = $_GET['id'];
        $_id = intval($_id);

        $_name = $_GET['name'];
        $_password = $_GET['password'];
        $_email = $_GET['email'];

        $sql = "UPDATE contact 
        SET contact_name = :contact_name , contact_password = :contact_password, contact_email = :contact_email WHERE contact_id = :contact_id;";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_id' => $_id,
            'contact_name' => $_name,
            'contact_password' => password_hash($_password, PASSWORD_BCRYPT),
            'contact_email' => $_email
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }

    public function updateContact2(string $_name)
    {

        $sql = "UPDATE contact 
        SET contact_name = :contact_name , contact_password = :contact_password, contact_email = :contact_email WHERE contact_id = :contact_id;";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'contact_id' => 'contact_id',
            'contact_name' => $_name,
            'contact_password' => password_hash('contact_password', PASSWORD_BCRYPT),
            'contact_email' => 'contact_email'
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }
}
