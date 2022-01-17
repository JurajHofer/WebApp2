<?php

class Profile extends Dbh {
    private $uid;
    private $id;
    private $email;
    private $uidcurr;
    private $emailcurr;

    public function __construct($uid, $id, $email, $uidcurr, $emailcurr) {
        $this->uid = $uid;
        $this->id = $id;
        $this->email = $email;
        $this->uidcurr = $uidcurr;
        $this->emailcurr = $emailcurr;
    }

    public function updUser() {
        if ($this->emptyInput() == false) {
            header("location: ../profil.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../profil.php?error=username");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../profil.php?error=useroremailtaken");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../profil.php?error=email");
            exit();
        }
        if ($this->uidLength() == false) {
            header("location: ../profil.php?error=uidlength");
            exit();
        }

        $this->updateUser($this->uid, $this->id, $this->email);
    }

    private function emptyInput() {
        $result = null;
        if (empty($this->uid) || empty($this->id) || empty($this->email) || empty($this->uidcurr) || empty($this->emailcurr)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        $result = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        $result = null;
        if (!$this->checkUser($this->uid,$this->email, $this->uidcurr, $this->emailcurr)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = null;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidLength() {
        $result = null;
        if (strlen($this->uid) < 3) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function updateUser($uid, $id, $email) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_uid = :uid, users_email = :email WHERE users_id = :id;');

        if (!$stmt->execute(array((':uid')=>$uid, (':email')=>$email, (':id')=>$id))) {
            $stmt = null;
            header("location: ../profil.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../profil.php?error=samedata");
            exit();
        }

        $_SESSION["useruid"] = $uid;
        $_SESSION["useremail"] = $email;

        $stmt = null;
    }

    private function checkUser($uid, $email, $uidcurr, $emailcurr) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = :uid OR users_email = :email;');

        if (!$stmt->execute(array((':uid')=>$uid, (':email')=>$email))) {
            $stmt = null;
            header("location: ../profil.php?error=stmtfailed2");
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




