<?php

class Dbh {
    public function connect() {
        try {
            $username = "root";
            $password = "dtb456";
            $dbh = new PDO('mysql:host=localhost;dbname=accounts', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}