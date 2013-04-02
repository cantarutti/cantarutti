<?php

class StatusPoster {

    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "giorgio";
    const DB_NAME = "status_poster";

    public function __construct() {
        echo'kk';
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .
                    $e->getMessage());
        }
        return $this->db;
    }

    public function getStatusPosts() {
        $statement = $this->db->prepare("SELECT name, image, status,timestamp FROM status ORDER BY timestamp DESC,id");
        $statement->execute();
        if ($statement->rowCount() > 0) {
            return $statement->fetchAll();
        }

        return false;
    }

}
echo 'jmnm';
$status = new StatusPoster();
$f = $status->getStatusPosts();
echo $f[1]['name'];



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
