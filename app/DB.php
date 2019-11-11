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
        $fields[] = 'id';
        $fields = implode(', ',$fields);
        $stmt = $this->conn->prepare("SELECT $fields FROM $tableName");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
        $values = $stmt->fetchAll();
        return $values;
    }

    public function find($fields, $tableName, $model, $id){
        $fields[] = 'id';
        $fields = implode(', ',$fields);
        $stmt = $this->conn->prepare("SELECT $fields FROM $tableName WHERE id=$id");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
        $values = $stmt->fetch();
        return $values;
    }

    public function insert($fields, $tableName, $values){
        $fields = implode(', ',$fields);
        $values = "'" . implode("', '", $values) . "'";
        $sql = "INSERT INTO $tableName ($fields)
    VALUES ($values)";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
    public function delete($tableName, $id){
        $sql = "DELETE FROM $tableName WHERE id=$id";
        $this->conn->exec($sql);
    }
    public function update($tableName, $id, $values){
        $set = $this->makeSetStatement($values);
        $sql = "UPDATE $tableName SET $set WHERE id=$id";

        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }

    public function makeSetStatement($values){
        $statement = '';
        foreach ($values as $column => $value){
            $statement .= "$column='$value', ";
        }
        $statement = substr($statement, 0, -2);
        return $statement;
    }
}