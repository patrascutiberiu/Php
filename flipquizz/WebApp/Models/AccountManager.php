<?php

declare(strict_types=1);

namespace Models;

class AccountManager
{
    protected $filePath;

    protected $filePathSafe;

    protected $accounts = [];

    public function __construct()
    {
        // \cherche la function dans lespace globale
        //function dirname is_file
        //instruction if else 
        $this->filePath = \dirname(__DIR__) . '/data/accounts.php';

        $this->filePathSafe =dirname(__DIR__). '/data/accounts.safe.php';

        //existance dun fichier   \is_dir vers un repertooire
        if (\is_file($this->filePath)) {
            //return du account envoie la valeur la est se trouve dans notre methode maintenant 
            $this->accounts = (require $this->filePath);
        } else {
            //exit('Fichier introuvable');
        }
    }

    /**
     * sauvgarde les fichier
     */
    public function save()
    {

        //on va sauvgarder le fichier actuel sous un autre nomme d'abord
        //@ ignorer une erreur mais l'erreur est bien sauvgarder
        @\copy($this->filePath, $this->filePathSafe);

        $content = '<?php return ';

        //true exporte la variable
        // .concatenation et ajouter de contenu
        $content .= var_export($this->accounts, true);

        $content .= ';';

        \file_put_contents($this->filePath, $content);
    }

    /**
     * controle la validité d'un non d'utilisateur
     * @param string $_username le nom d'utilisateur 
     */
    public function validUsername(string $_username): bool
    {

        if (empty($_username)) {
            return false;
        }

        if (\strlen($_username) < 2) {
            return false;
        }

        return true;

        //return !empty($_username) && \strlen($_username) > 2;
    }

    /**
     * Vérifier si un utilisateur $_username existe
     * si oui, une instance de Account contenant les donées de l'utilisateur est reenvoyée
     * si non, null est renvoyé
     */
    public function getUser(string $_username): ?Account
    {
        //netoyer la variable securiser le schema
        //recuperer la derniere partie du schema
        $_username = \basename($_username);

        if (!$this->validUsername($_username)) {
            return null;
        }

        //strlen conter les nombres de caracteres

        foreach ($this->accounts as $userinfo) {
            if ($userinfo['username'] === $_username) {
                return new Account($userinfo);
            }
        }

        return null;
    }

    /**
     * Retourner la collection d'utilisateurs 
     * @return array la collection d'utilisateur
     */
    public function getAccounts(): array
    {


        return $this->accounts;
    }

    /**
     * 
     *Vérifie si un utilisateur $_username existe et controle la correspondance de mot des passer 
     *Renvoie true en cas de succès et false en cas d'erreur
     * @param string $_username
     * @param string $_password 
     * @return boolean true si la connexion a reusi
     */
    public function login($_username, $_password): bool
    {
        $user = $this->getUser($_username);

        if ($user === null) {
            return false;
        }

        if ($user->checkPassword($_password)) {
            return false;
        }
        return true;
    }

    /**
     * Ajouter un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {
        if (!$this->validUsername($_username)) {
            return false;
        }

        if ($this->getUser($_username) !== null) {
            return false;
        }
        $newUser = [
            'username' => $_username,
            //
            'password' => \password_hash($_password, PASSWORD_BCRYPT),
            'email' => $_email,
        ];

        //[] ajoute a la intre suivante à la collection de donnes
        $this->accounts[] = $newUser;

        //passer par une function plus lent
        //\array_push($this->accounts, $newUser);

        // foreach ($this->accounts as $user) {
        //     if ($user['username'] !== $_username) {
        //         return new Account($user);
        //         var_dump($newUser);
        //     }
        // }

        //
        $this->save();

        return true;
    }

    /**
     * vérifie si un utilisaateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'est pas éte trouvé
     * @param string $_username le nom de l'utilisateur à supprimer 
     * @return bool true si la suppression à functionne false sinon
     */
    public function removeUser(string $_username): bool
    {
        // $user = $this->getUser($_username);

        // if ($user === null) {
        //     return false;
        // }

        //ou sizeof la taille d'un tableau mais count est proconniser
        if (count($this->accounts) < 2) {
            return false;
        }

        $this->accounts;

        foreach ($this->accounts as $key => $user) {
            if ($user['username'] === $_username) {
                //ssuprimer la donne du tableau
                unset($this->accounts[$key]);

                //sauvgarder le nouveau tableau
                $this->save();
                return true;
            }
        }

        return false;
    }
}
