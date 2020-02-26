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

    public function insert(Entreprise $entreprise)
    {
        $sql = "UPDATE entreprises SET ets_name = :ets_name , ets_city = :ets_city, ets_phone = :ets_phone WHERE ets_id = :id;";

        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            'id' => $entreprise->getId(),
            'ets_name' => $entreprise->getName(),
            'ets_city' => $entreprise->getCity(),
            'ets_phone' => $entreprise->getPhone()
        ];

        return $stmt->execute($vars);
    }
}
