<?php

class TankInsert extends Dbh {
    protected function insTank($uid, $price,$tier,$type,$nationality,$img) {
        $stmt = $this->connect()->prepare('INSERT INTO tanks (tank_uid, tank_price, tank_tier, tank_type, tank_nationality, tank_img) VALUES (?,?,?,?,?,?);');

        if (!$stmt->execute(array($uid, $price,$tier,$type,$nationality,$img))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

}