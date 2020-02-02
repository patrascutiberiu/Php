<?php

class contactManager{

    private $pdo;

    private $pdoStatement; 

    /**
     * contactManager constructeur
     * initaialisation de la connexion à la base de données
     */
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=agenda','root','',[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);

    }

    /**
     * insert un obj contact dans la bdd et met à jour l'obj passé en argument en lui spécifiant un id
     * insert un obj contact dean la bdd
     * @param contact $contact
     * @return bool true si l'obj a été inséré, false si une erreur survient
     */
        private function create(contact $contact){

        $this->pdoStatement= $this->pdo->prepare('INSERT INTO contact (nom, prenom, tel, mail) VALUES (:nom, :prenom, :tel, :mail)');

        if (isset($_POST['lastName'])) {
            $_POST['lastName']= htmlentities($_POST['lastName']);

            if (preg_match("#^[a-zA-Z]{3,20}$#",$_POST['lastName'])) {
                $this->pdoStatement->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
            } else {
                echo 'Le '.$_POST['lastName'].' n\'est pas un nom VALIDE !';
                exit;
            }
        }

        if (isset($_POST['firstName'])) {

            $_POST['firstName']= htmlentities($_POST['firstName']);

            if (preg_match("#^[a-zA-Z]{3,20}$#",$_POST['firstName'])) {
                $this->pdoStatement->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
            } else {
                echo 'Le '.$_POST['firstName'].' n\'est pas un prenom VALIDE !';
                exit;
            }
        }

        if (isset($_POST['phone'])) {

            $_POST['phone'] = htmlentities($_POST['phone']);

            if (preg_match("#^0?\+?[\d]{2,3}([-\. ]?[0-9]{2}){4}$#",$_POST['phone'])) {
                $this->pdoStatement->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
            } else {
                echo 'Le '.$_POST['phone'].' n\'est pas un numéro VALIDE !';
                exit;
            }  
        }    
        
        if (isset($_POST['mail'])) {
        
            $_POST['mail'] = htmlentities($_POST['mail']);
        
            if (preg_match("#^[a-zA-Z0-9\._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#",$_POST['mail'])) {
                $this->pdoStatement->bindValue(':mail', $contact->getMail(), PDO::PARAM_STR);
            } else {
                echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas VALIDE !';
                exit;
            }
        }

        //exécution de la requête
        $executionIsOk = $this->pdoStatement->execute();

        if (!$executionIsOk) {
            return false;
        } else {
            $id = $this->pdo->lastInsertId();
            $contact = $this->read($id);
            return true;
        }
        
    }

    /**
     * récupère un obj contact à partir de son id
     * @param int $id id d'un contact
     * @return bool| contact | null false si une erreur survient, 
     * un obj contact si une correspondance est trouvée, 
     * null s'il n'y a auvun correspondance
     */
    public function read($id){
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id');

        //liaison de parametre
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //exécution de la requête
        $executeIsOk=$this->pdoStatement->execute();


        if ($executeIsOk) {
            
            //rec de notre requltat
            $contact = $this->pdoStatement->fetchObject('contact');

            if($contact == false){
                return null;
            }else
            {
                return $contact;
            }

        }
    }

    /**
     * récupère tous les obj contact de la bdd
     * @return array| bool 
     * tableau d'obj contact ouun tableau vide s'il n'y a aucun objet dans la bdd
     * ou false si un erreur survient 
     */
    public function readAll(){
        $this->pdoStatement = $this->pdo->query('SELECT * FROM contact ORDER BY nom, prenom');

        $contacts = [];

        while ($contact=$this->pdoStatement->fetchObject('contact')) {
            $contacts[] =$contact;
        }
        return $contacts;
    }

    /**
     * met a jour un obj stocké en bdd
     * @param contact $contact obj de type contact
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    private function update(contact $contact){
        $this->pdoStatement = $this->pdo->prepare('UPDATE contact set nom = :nom, prenom = :prenom, tel = :tel, mail = :mail WHERE id=:id LIMIT 1');

        $this->pdoStatement->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mail', $contact->getMail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $contact->getId(), PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    /**
     * supprime un obj stocké en bdd
     * @param contact $contact obj de type contact
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function delete(contact $contact){
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM contact WHERE id=:id LIMIT 1');

        $this->pdoStatement->bindValue(':id', $contact->getId(), PDO::PARAM_INT);

        return $this->pdoStatement->execute();

    }

    public function save(contact &$contact)
    {
        if (is_null($contact->getId())) {
            return $this->create($contact);

        }else {
            return $this->update($contact);
        }
    }
}