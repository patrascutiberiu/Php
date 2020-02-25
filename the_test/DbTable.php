<?php

/** Classe DbTable : Représente une table
 *
 * @author   MDevoldere 
 * @version  1.0
 * @access   public
 */
class DbTable
{
    /** @var Db $db Représente une connexion vers une base de données */
    protected $db;

    /** @var string $name Le nom de la table */
    protected $name;

    /** @var string $pk Le nom de la clé primaire de la table */
    protected $pk;


    /** Constructeur de la classe 
     * @param Db $_db La connexion à la base de données
     * @param string $_table Le nom de la table
     * @param string $_pk Le nom de la clé primaire
     */
    public function __construct(Db $_db, string $_table, string $_pk = 'id')
    {
        $this->db = $_db;

        $this->name = $_table;

        $this->pk = $_pk;
    }

    /** Récupère toutes les lignes/colonnes de la table courante
     * @return array $result le résultat de la requête
     */
    public function getAll(): array
    {
        return $this->db->query(("SELECT * FROM " . $this->name . ";"), true);
    }

    /** Récupère toutes les lignes de la table courante et fait correspondre les clés du tableau du jeu résultat avec la valeur de la clé primaire de chaque élément
     * @return array $result le résultat de la requête sous forme de tableau
     */
    public function getAllSorted(): array
    {
        $in = $this->getAll();
        $out = [];

        if (!$in) {
            return $out;
        }

        foreach ($in as $k => $v) {
            $out[$v[$this->pk]] = $v;
        }

        return $out;
    }

    /** Récupère un élément de la table à partir de son identifiant 
     * @param int $_id l'identifiant à rechercher
     * @return array $result le résultat de la requête sous forme de tableau
     */
    public function get(int $_id): array
    {
        return $this->db->fetch("SELECT * FROM " . $this->name . " WHERE " . $this->pk . "=:id;", [':id' => $_id], false);
    }

    /** Récupère un élément de la table à partir de la valeur d'une colonne
     * @param string $_col la colonne sur laquelle la recherche est effectuée
     * @param string $_value la valeur à rechercher
     * @param bool $_all true = retourne toutes les lignes trouvées. false = retourne la 1er ligne trouvée
     * @return array|false $result le résultat de la requête sous forme de tableau
     */
    public function getBy(string $_col, string $_value, bool $_all = false): array
    {
        return $this->db->fetch("SELECT * FROM " . $this->name . " WHERE " . \basename($_col) . "=:cond;", [':cond' => $_value], $_all);
    }


    /** Insère un nouvel élément
     * @param array $_values Le tableau de valeurs correspondant à la table courante
     * @return int Le nombre de lignes affectées
     */
    public function insert(array $_values): int
    {
        $cols = \array_keys($_values);
        $vals = (':' . \implode(', :', $cols));
        $cols = \implode(',', $cols);

        return $this->db->exec("INSERT INTO " . $this->name . " (" . $cols . ") VALUES (" . $vals . ");", $_values);
    }

    /** Met à jour un élément
     * @param array $_values Le tableau de valeurs correspondant à la table courante. Doit contenir l'identifiant de la ligne à mettre à jour.
     * @return int Le nombre de lignes affectées
     */
    public function update(array $_values): int
    {
        $cols = [];
        foreach ($_values as $k => $v) {
            $cols[$k] = ($k . '=:' . $k);
        }

        return $this->db->exec("UPDATE " . $this->name . " SET " . \implode(', ', $cols) . " WHERE " . $this->pk . "=:" . $this->pk . ";", $_values);
    }

    /** Supprime un élément
     * @param int $_id L'identifiant de la ligne à supprimer
     * @return int Le nombre de lignes affectées
     */
    public function delete(int $_id): int
    {
        return $this->db->exec("DELETE FROM " . $this->name . " WHERE " . $this->pk . "=:id;", [':id' => $_id]);
    }
}
