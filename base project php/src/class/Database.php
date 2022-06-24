<?php

class Database
{
    private $username = "devoweb";
    private $password = "root";
    private $host = "localhost:3306";
    private $database = "france";
    private $charset = 'utf8';

    function __construct()
    {
        return $this->connect();
    }

    public function connect()
    {
        try {
            $db = new PDO("mysql:host=" . $this->host . " ;dbname=" . $this->database . ";charset=" . $this->charset, $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur Base de donnée : " . $e->getMessage();
        }
        return $db;
    }
}
