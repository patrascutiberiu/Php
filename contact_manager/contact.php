<?php

class contact{
    
    /**
     * @var int $id     pas de setter à prevoir
     */
    private $id;

    /**
     * @var string $nom
     */
    private $nom;

    /**
     * 
     * 
     */
    private $prenom;

    /**
     * @var string $tel
     */
    private $tel;

    /**
     * @var string $mail
     */
    private $mail;

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param string $nom
     * @return contact
     */
    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    public function getTel(){
        return $this->tel;
    }

    public function setTel($tel){
        $this->tel = $tel;
        return $this;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
        return $this;
    }


}
