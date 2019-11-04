<?php


namespace App;


use PDO;
use PDOException;

class DB
{
    private $conn;

    public function __construct()
    {
        $servername = "database";
        $username = "root";
        $password = "secret";
        $dbname = 'homestead';
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAll($fields, $tableName, $model){
        $fields = implode(', ',$fields);
        $stmt = $this->conn->prepare("SELECT $fields FROM $tableName");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
        $values = $stmt->fetchAll();
        var_dump($values);
    }
}