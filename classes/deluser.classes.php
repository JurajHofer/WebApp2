<?php


class Deluser extends Dbh {
    private $uid;

    public function __construct($uid) {
        $this->uid = $uid;
    }

    public function deleteUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->delUser($this->uid);
    }

    private function emptyInput() {
        $result = null;
        if (empty($this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function delUser($uid) {
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE users_uid = :uid;');

        if (!$stmt->execute(array((':uid')=>$uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        session_unset();
        session_destroy();

        $stmt = null;
    }
}


