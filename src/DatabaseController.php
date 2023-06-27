<?php

namespace CrowCMS;

require __DIR__ . "/../vendor/autoload.php";


class DatabaseController {
    
    private $conn;

    public function __construct() {
        $this->conn = new \mysqli('localhost', 'root', 'potato', 'crowcms');

        // Check connection
        if ($this->conn->error) {
            throw new \Exception("Could not connect to the database " . $this->conn->connect_error);
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }

    public function fetchComments() {
        $result = $this->conn->query("select name, title, comment, commentdate from comments");
        $rows = [];

        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function submitComment($name, $title, $comments) {
        // submitten der comments
        date_default_timezone_set('America/New_York');
        try {
            $stmt = $this->conn->prepare("insert into comments (name, title, comment, commentdate) VALUES (?, ?, ?, ?)");
        } catch (\Throwable $th) {
            //throw $th;
            throw new \Exception("Error preparing statement");
        }
        try {
            $stmt->execute([
                $name,
                $title,
                $comments,
                date('Y-m-d H:i:s')
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            throw new \Exception("Error executing statement");
        }
        

    }


}