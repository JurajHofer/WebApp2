<?php

include "../classes/dbh.classes.php";


class TanksPart extends Dbh {
    public function selectTanksPart($newCounter) {
        $stmt = $this->connect()->prepare('SELECT * FROM tanks FETCH FIRST ? ROWS ONLY');

        if (!$stmt->execute(array($newCounter))) {
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


