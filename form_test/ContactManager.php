<?php

class ContactManager extends Contact
{
    protected $db;

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
}