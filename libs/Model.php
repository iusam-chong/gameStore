<?php

class Model 
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "message_broad";
    private $charset = "utf8";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=' . $this->charset;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        return $pdo;
    }

    # return each row from db
    protected function select($query, $param = null) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($param);

        $result = $stmt->fetch();
        return $result;
    }

    # return all rows from db
    protected function selectAll($query, $param = null) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($param);

        $result = $stmt->fetchAll();
        return $result;
    }

    # Query insert or delete can be use 
    protected function insert($query, $param) {

        $stmt = $this->connect()->prepare($query);
        $result = $stmt->execute($param);
        
        return $result;
    }
}