<?php

include "dbh.classes.php";

class Tanks extends Dbh {
    public function selectTanks() {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks ORDER BY tank_tier DESC, tank_nationality,tank_type');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: premiovyObchod.php?error=datanotfound");
            exit();
        }

        return $stmt;
    }

    public function selectTanksPart() {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks ORDER BY tank_tier DESC, tank_nationality, tank_type LIMIT 10');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: premiovyObchod.php?error=datanotfound");
            exit();
        }

        return $stmt;
    }

    public function selectTanksType($type) {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks WHERE tank_tier = :typ');

        if (!$stmt->execute(array((':typ')=>$type))) {
            $stmt = null;
            header("location: hra.php?error=stmtfailed1");
            exit();
        }

        return $stmt;
    }

    public function selectUserTanks() {
        $stmt = $this->connect()->prepare('select tank_uid, tank_tier, tank_type from owned_tanks JOIN tanks USING(tank_id) WHERE users_id = :id;');

        if (!$stmt->execute(array((':id') => $_SESSION["userid"]))) {
            $stmt = null;
            header("location: profil.php?error=stmtfailed1");
            exit();
        }

        return $stmt;
    }

    public function checkTank($users_id, $tank_id) {
        $stmt = $this->connect()->prepare('SELECT users_id FROM owned_tanks WHERE users_id = :userid AND tank_id = :tankid;');

        if (!$stmt->execute(array((':userid')=>$users_id, (':tankid')=>$tank_id))) {
            $stmt = null;
            header("premiovyObchod.php?error=stmtfailed2");
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
        $stmt = $this->connect()->prepare('INSERT INTO owned_tanks (users_id, tank_id) VALUES (:userid,:tankid);');

        if (!$stmt->execute(array((':userid')=>$users_id, (':tankid')=>$tank_id))) {
            $stmt = null;
            header("location: premiovyObchod.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

    public function setUserGolds($users_id, $users_golds, $tank_price) {
        $newSum = $users_golds - $tank_price;
        $stmt = $this->connect()->prepare('UPDATE users SET users_golds = :golds WHERE users_id = :id;');

        if (!$stmt->execute(array((':golds')=>$newSum, (':id')=>$users_id))) {
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