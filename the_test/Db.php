<?php

/**
* La classe Db permet d'interagir avec une connexion PDO
*
* - Initialisation d'instances PDO mysql ou sqlite via ses méthodes statiques
* - Requêtage sur une connexion PDO via ses méthodes d'instance
*
* 
* // Exemple d'utilisation (initialisation d'une instance)
* $pdo = Db::mysql('nom_de_la_base', 'server_address', 'user', 'password');
* $db = new Db($pdo);
* var_dump($db);
* // Exemple d'utilisation (requête simple)
* $result = $db->query('SELECT * from nom_d_une_table;');
* var_dump($result);
* // Exemple d'utilisation (requête de lecture paramétrée)
* $id = 37;
* $result = $db->fetch('SELECT * from nom_d_une_table WHERE id=:id;', [':id' => $id]);
* var_dump($result);
* // Exemple d'utilisation (requête d'écriture paramétrée)
* $new_item = ['firstname' => 'John', 'lastname' => 'Snow'];
* $result = $db->exec('INSERT INTO nom_d_une_table (firstname, lastname) VALUES (:firstname, :lastname);', $newItem);
* var_dump($result);
*
* @author   MDevoldere 
* @version  1.0
* @access   public
*/
class Db
{
    /**
     * Connexion PDO MySQL
     * @param string $dbname 
     * @param string $host 
     * @param string $user 
     * @param string $pwd 
     * @return PDO 
     */
    public static function mysql(string $dbname, string $host = 'localhost', string $user = 'root', string $pwd = ''): \PDO
    {
        try {
            return new PDO('mysql:host=' . $host . ';port=3306;dbname=' . $dbname . ';charset=utf8', $user, $pwd, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            exit('Db Connection Error (1)');
        }
    }

    /**
     * Connexion PDO SQLite
     * @param string $path
     * @return PDO 
     */
    public static function sqlite(string $path)
    {
        try {
            $db = new PDO(('sqlite:' . $path), 'charset=utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->exec('pragma synchronous = off;');
            return $db;
        } catch (PDOException $e) {
            exit('Db Connection Error (2)');
        }
    }


    /** @var PDO $pdo */
    protected $pdo;

    /** Constructeur
     * @param PDO $_pdo La connexion PDO à utiliser
     */
    public function __construct(PDO $_pdo)
    {
        $this->pdo = $_pdo;
    }

    /** Exécute une requête de lecture simple
     * @param string $_query La requête à exécuter
     * @param bool $_all true = retourne toutes les lignes trouvées. false = retourne la 1ère ligne trouvée
     * @return array|false Le jeu de résultat ou empty si aucun résultat
     */
    public function query(string $_query, bool $_all = false): array
    {
        try {
            $stmt = $this->pdo->query($_query);
            $r =  (($_all === false) ? $stmt->fetch() : $stmt->fetchAll());
            return !empty($r) ? $r : [];
        } catch (Exception $e) {
            exit('Db Query Error');
        }
    }

    /** Exécute une requête de lecture paramétrée
     * @param string $_query La requête à exécuter
     * @param array $_values Les paramètres de la requête
     * @param bool $_all true = retourne toutes les lignes trouvées. false = retourne la 1er ligne trouvée
     * @return array Le jeu de résultat ou empty si aucun résultat
     */
    public function fetch(string $_query, array $_values = [], bool $_all = false): array
    {
        try {
            $stmt = $this->pdo->prepare($_query);

            if ($stmt->execute($_values)) {
                $r = (($_all === false) ? $stmt->fetch() : $stmt->fetchAll());
                $stmt->closeCursor();
                return !empty($r) ? $r : [];
            }
            return [];
        } catch (Exception $e) {
            exit('Db Fetch Error');
        }
    }

    /** Exécute une requête d'écriture paramétrée
     * @param string $_query La requête à exécuter
     * @param array $_values Les paramètres de la requête
     * @return int Le nombre de lignes affectées
     */
    public function exec(string $_query, array $_values = []): int
    {
        try {
            $stmt = $this->pdo->prepare($_query);

            if ($stmt->execute($_values)) {
                $r = $stmt->rowCount();
                $stmt->closeCursor();
                return $r;
            }
            return 0;
        } catch (Exception $e) {
            exit('Db Exec Error');
        }
    }
}
