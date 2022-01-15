<?php

class TankInsert extends Dbh {
    private $uid;
    private $price;
    private $tier;
    private $type;
    private $nationality;
    private $img;

    public function __construct($uid, $price, $tier, $type, $nationality, $img)
    {
        $this->uid = $uid;
        $this->price = $price;
        $this->tier = $tier;
        $this->type = $type;
        $this->nationality = $nationality;
        $this->img = $img;
    }

    public function insertTank()
    {
        if ($this->emptyInput() == false) {
            header("location: ../admin.php?error=emptyinput");
            exit();
        }

        $this->insTank($this->uid, $this->price, $this->tier, $this->type, $this->nationality, $this->img);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->uid) || empty($this->price) || empty($this->tier) || empty($this->type) || empty($this->nationality) || empty($this->img)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function insTank($uid, $price,$tier,$type,$nationality,$img) {
        $stmt = $this->connect()->prepare('INSERT INTO tanks (tank_uid, tank_price, tank_tier, tank_type, tank_nationality, tank_img) VALUES (?,?,?,?,?,?);');

        if (!$stmt->execute(array($uid, $price,$tier,$type,$nationality,$img))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

}
