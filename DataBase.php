<?php
include "config.php";

class DataBase
{
    public function getDBConnection() {
        global $config;
        $link = mysqli_connect($config["host"], $config["user"], $config["password"], $config["database"]);

        // did we connect?
        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        mysqli_select_db($link, 'home_work7') or die ('Wrong db selected!');
        return $link;
    }

    public function insertNewArticle($title, $text, $isPublished) {
        $this->getDBConnection();

        $query = 'SELECT * FROM articles';
        $sql = "INSERT INTO articles (title, text, published) VALUES ('$title', '$text', '$isPublished')";
        if (mysqli_query($this->getDBConnection(), $sql)) {
            echo "New record created successfully";
        }
        mysqli_close($this->getDBConnection());
    }
}