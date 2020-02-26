<?php

class Entreprise
{
    /**
     * @var int $id 
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $city 
     */
    private $city;

    /**
     * @var string $phone
     */
    private $phone;


    public function __construct(string $name, string $city, string $phone)
    {
        $this->name = $name;
        $this->city = $city;
        $this->phone = $phone;
    }

    /**
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($newPhone)
    {
        $this->phone = $newPhone;
        return $this;
    }

    public function insert()
    {
        $sql = "INSERT INTO entreprises (ets_name, ets_city , ets_phone)
        VALUES ( ?, ?, ? );";

        $stmt = Db::getDb()->prepare($sql);

        //obligatoir de fermer le curseur pour prepare
        return $stmt->execute(array($this->getName(), $this->getCity(), $this->getPhone()));
    }
}
