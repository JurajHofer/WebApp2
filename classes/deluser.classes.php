<?php

class Deluser extends Dbh {
    protected function delUser($uid) {
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE users_uid = ?;');

        if (!$stmt->execute(array($uid))) {
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