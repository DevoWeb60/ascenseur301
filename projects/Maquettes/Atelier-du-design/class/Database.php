<?php

class Database
{
    // private $username = "thibaultberthelin";
    // private $password = "NOpWqDs2";
    // private $database = "thibaultberthelin_";
    private $username = "devoweb";
    private $password = "root";
    private $host = "localhost:3306";
    private $database = "atelier-design";
    private $charset = 'utf8';
    private $db;

    function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->db = new PDO("mysql:host=" . $this->host . " ;dbname=" . $this->database . ";charset=" . $this->charset, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        } catch (PDOException $e) {
            echo "Erreur Base de donnée : " . $e->getMessage();
        }
    }

    public function query($sql, $params)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function getPartOfPage($part, $page)
    {
        $sql = "SELECT * FROM pages WHERE name = ? AND page = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$part, $page]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function selectPartList($listName)
    {
        $sql = "SELECT * FROM pages WHERE list_name = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$listName]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
