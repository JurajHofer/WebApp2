<?php

include "dbh.classes.php";

class Tanks extends Dbh {
    public function selectTanks() {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: /premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /premiovyObchod.php?error=datanotfound");
            exit();
        }

        return $stmt;
    }

}