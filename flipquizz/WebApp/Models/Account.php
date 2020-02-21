<?php
//permet a autoloder de la retrouver
namespace Models;

class Account
{
    public $username;

    private $password;

    public $email;

    public $logged;

    public function __construct(array $_user = [])
    {
        if (!empty($_user)) {
            //$this parcurir lobjet actuel
            foreach ($this as $propertyName => $propertyValue) {

                //entre du tableau existe
                if (\array_key_exists($propertyName, $_user)) {

                    $var = $_user[$propertyName];
                    //replir la propriete de tableau avec la donnes existante
                    $this->{$propertyName} = $_user[$propertyName];
                }
            }
        }
    }

    //set une metode de modification et get de acceder
    public function setPassword(string $_pass)
    {
        //ciffrer le lot de passe prem elem nootre pass lautre une constante
        //super pour ciffrer le mot de passe
        $this->password = \password_hash($_pass, PASSWORD_BCRYPT);
    }

    public function checkPassword(string $_pass)
    {
        // if (\password_verify($_pass, $this->password)) {
        //     $this->logged = true;
        // }
        // else{
        //     $this->logged = false;
        // }

        $this->logged = \password_verify($_pass, $this->password);

        return $this->logged;
    }
}
