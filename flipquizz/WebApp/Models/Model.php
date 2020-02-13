<?php

namespace Models;

/** Classe Model : Représente une table
 *  
 */
abstract class Model
{
    /** @var PDO $pdo représente une connexion PDO vers une base de données */
    protected $pdo;

    /** @var string $tableName Le nom de la table */
    protected $tableName;

    /** @var string $primaryKey Le nom de la clé primaire de la table */
    protected $primaryKey;

    /** Constructeur de la classe Model
     * @param string $_table Le nom de la table
     * @param string $_pk Le nom de la clé primaire
     */
    protected function __construct(string $_table, string $_pk)
    {
        $this->tableName = $_table;

        $this->primaryKey = $_pk;

        $this->pdo = Db::getInstance(); // Récupère la connexion PDO
    }

    /** Récupère toutes les lingnes de la table courante
     * une procedure n'a pas envoyer une valeur 
     * @return array $result le résultat de la requête
     */
    public function getAll()
    {
        $sql = ("SELECT * FROM " . $this->tableName);

        /** @var $stmt PDOStatement */
        $stmt = $this->pdo->query($sql);

        $result = $stmt->fetchAll();

        return $result;

        //return $this->pdo->query("SELECT * FROM ".$this->tableName)->fetchAll();

    }

    /** Récupère une élément de la table à partir de son identifiant
     * @param integer $_id l'identifiant à rechercher
     * @return array | false ( | = ou ) $result le résultat de la requête sous forme de tableau ou false si la requête est fausse
     */
    public function get(int $_id)
    {
        try {

            $sql = ("SELECT * FROM " . $this->tableName . " WHERE " . $this->primaryKey . " =:id;");

            $vars = [
                ':id' => $_id
            ];

            $stmt = Db::getInstance()->prepare($sql);

            $result = null;

            if ($stmt->execute($vars)) {

                $result = $stmt->fetchAll();
            }

            $stmt->closeCursor(); // ferme le courseur de la requête /!\ obligatoir pour debloquer la base de donnée

            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function count()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as nb FROM " . $this->tableName . ";");

        $result = $stmt->fetch();

        //recouperer le nombre par son alias qu'on a declarer dans la requette
        //d($result['nb']);

        return $result['nb'];
    }
}
