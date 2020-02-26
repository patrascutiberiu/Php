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
     * @param int $id
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
        VALUES (ets_name = :ets_name , ets_city = :ets_city, ets_phone = :ets_phone );";

        //ets_name = :ets_name , ets_city = :ets_city, ets_phone = :ets_phone
        $stmt = Db::getDb()->prepare($sql);
        d($this->getName());
        d($this->getCity());
        d($this->getPhone());

        $stmt->bindParam(':ets_name', $this->getName());
        $stmt->bindParam(':ets_city', $this->getCity());
        $stmt->bindParam(':ets_phone', $this->getPhone());


        return $stmt->execute();
    }
}
