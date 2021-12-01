<?php

class Profile extends Dbh {
    protected function updateUser($uid, $id, $email) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_uid = ?, users_email = ? WHERE users_id = ?;');

        if (!$stmt->execute(array($uid, $email, $id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=samedata");
            exit();
        }

        $_SESSION["useruid"] = $uid;
        $_SESSION["useremail"] = $email;

        $stmt = null;
    }

    protected function checkUser($uid, $email, $uidcurr, $emailcurr) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed2");
            exit();
        }

        $resultCheck = null;
        if ($uid == $uidcurr || $email == $emailcurr || ($uid == $uidcurr && $email == $emailcurr)) {
            if ($stmt->rowCount() > 1) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }
        } else {
            if ($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }
        }

        return $resultCheck;
    }

}