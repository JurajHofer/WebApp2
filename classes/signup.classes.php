<?php

class Signup extends Dbh {
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd,$pwdRepeat,$email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        if ($this->pwdLength() == false) {
            header("location: ../index.php?error=passwordlength");
            exit();
        }
        if ($this->uidLength() == false) {
            header("location: ../index.php?error=uidlength");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        $result = null;
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
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

    private function invalidEmail() {
        $result = null;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result = null;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        $result = null;
        if (!$this->checkUser($this->uid,$this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdLength() {
        $result = null;
        if (strlen($this->pwd) < 5) {
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

    private function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, user, users_golds) VALUES (?,?,?,?,?);');

        $hashedPwd =password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email, "user", 50000))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

    private function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed2");
            exit();
        }

        $resultCheck = null;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
     }
}
