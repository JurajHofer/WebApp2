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

    public function checkTank($users_id, $tank_id) {
        $stmt = $this->connect()->prepare('SELECT users_id FROM owned_tanks WHERE users_id = ? AND tank_id = ?;');

        if (!$stmt->execute(array($users_id, $tank_id))) {
            $stmt = null;
            header("/premiovyObchod.php?error=stmtfailed2");
            exit();
        }

        $resultCheck = null;
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        } else {
            $resultCheck = false;
        }
        return $resultCheck;
    }

    public function setTankToUser($users_id, $tank_id) {
        $stmt = $this->connect()->prepare('INSERT INTO owned_tanks (users_id, tank_id) VALUES (?,?);');

        if (!$stmt->execute(array($users_id, $tank_id))) {
            $stmt = null;
            header("location: premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

    public function setUserGolds($users_id, $users_golds, $tank_price) {
        $newSum = $users_golds - $tank_price;
        $stmt = $this->connect()->prepare('UPDATE users SET users_golds = ? WHERE users_id = ?;');

        if (!$stmt->execute(array($newSum, $users_id))) {
            $stmt = null;
            header("location: premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: premiovyObchod.php?error=samedata");
            exit();
        }

        $_SESSION["usergolds"] = $newSum;

        $stmt = null;
    }

}