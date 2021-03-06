<?php

class TankDelete extends Dbh {
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function deleteTank()
    {
        if ($this->emptyInput() == false) {
            header("location: ../admin.php?error=emptyinput");
            exit();
        }

        if ($this->checkDelete($this->id) == false) {
            header("location: ../admin.php?error=deletenotpossible");
            exit();
        }

        $this->delTank($this->id);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->id)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function checkDelete($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM owned_tanks WHERE tank_id = :id;');

        if (!$stmt->execute(array((':id')=>$id))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed2");
            exit();
        }

        $result = null;
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
        return $result;
    }

    private function delTank($id) {
        $stmt = $this->connect()->prepare('DELETE FROM tanks WHERE tank_id = :id;');

        if (!$stmt->execute(array((':id')=>$id))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../admin.php?error=tanknotfound");
            exit();
        }

        $stmt = null;
    }

}