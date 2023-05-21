<?php


class DBConnection
{
    private $pdo;

    public function __construct($host, $dbName, $user, $password)
    {
        try {
            $dsn = "mysql:host=$host;dbname=$dbName";
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection errors
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function executeQuery($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle query errors
            die("Query failed: " . $e->getMessage());
        }
    }
}



?>