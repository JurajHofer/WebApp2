<?php

class TankUpdate extends Dbh {
    private $id;
    private $uid;
    private $price;
    private $tier;
    private $type;
    private $nationality;
    private $img;

    public function __construct($id,$uid, $price, $tier, $type, $nationality, $img)
    {
        $this->id = $id;
        $this->uid = $uid;
        $this->price = $price;
        $this->tier = $tier;
        $this->type = $type;
        $this->nationality = $nationality;
        $this->img = $img;
    }

    public function updateTank()
    {
        if ($this->emptyInput() == false) {
            header("location: ../admin.php?error=emptyinput");
            exit();
        }

        if ($this->checkTank($this->id) == false) {
            header("location: ../admin.php?error=idnotexists");
            exit();
        }

        $this->updTank($this->id, $this->uid, $this->price, $this->tier, $this->type, $this->nationality, $this->img);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->id) || empty($this->uid) || empty($this->price) || empty($this->tier) || empty($this->type) || empty($this->nationality) || empty($this->img)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function updTank($id,$uid, $price,$tier,$type,$nationality,$img) {
        $stmt = $this->connect()->prepare('UPDATE tanks SET tank_uid = :uid, tank_price = :price, tank_tier = :tier, tank_type = :typ, tank_nationality = :nationality, tank_img = :img WHERE tank_id = :id;');

        if (!$stmt->execute(array((':uid')=>$uid, (':price')=>$price,(':tier')=>$tier,(':typ')=>$type,(':nationality')=>$nationality,(':img')=>$img,(':id')=>$id))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../admin.php?error=samedata");
            exit();
        }

        $stmt = null;
    }

    protected function checkTank($id) {
        $stmt = $this->connect()->prepare('SELECT tank_uid FROM tanks WHERE tank_id = ;id;');

        if (!$stmt->execute(array((':id')=>$id))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed2");
            exit();
        }

        $resultCheck = null;
            if ($stmt->rowCount() == 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

        return $resultCheck;
    }
}