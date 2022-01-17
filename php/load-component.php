<?php

include "../classes/dbh.classes.php";
include "functions.php";


class TanksPart extends Dbh {
    public function selectTanksPart($newCounter) {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks ORDER BY tank_tier DESC, tank_nationality, tank_type LIMIT ?');
        $stmt->bindParam(1,$newCounter,PDO::PARAM_INT);
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
}

$newCounter = $_POST["newCounter"];

$database = new TanksPart();
$data = $database->selectTanksPart($newCounter);
$numberOfRows = $data->rowCount();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < $numberOfRows; $i++) {
    component($row[$i]["tank_uid"], $row[$i]["tank_price"], $row[$i]["tank_tier"], $row[$i]["tank_nationality"], $row[$i]["tank_type"], $row[$i]["tank_img"], $row[$i]["tank_id"]);
}


