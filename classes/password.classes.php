<?php

class Password extends Dbh {
    private $id;
    private $pwd;
    private $pwdRepeat;

    public function __construct($id, $pwd, $pwdRepeat) {
        $this->id = $id;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function newpwdUser() {
        if ($this->emptyInput() == false) {
            header("location: ../profil.php?error=emptyinput");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../profil.php?error=passwordmatch");
            exit();
        }
        if ($this->pwdLength() == false) {
            header("location: ../profil.php?error=passwordlength");
            exit();
        }

        $this->updUser($this->id, $this->pwd);
    }

    private function emptyInput() {
        $result = null;
        if (empty($this->id) || empty($this->pwd) || empty($this->pwdRepeat)) {
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

    private function pwdLength() {
        $result = null;
        if (strlen($this->pwd) < 5) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function updUser($id, $pwd) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_pwd = :pwd WHERE users_id = :id;');

        $hashedPwd =password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array((':pwd')=>$hashedPwd, (':id')=>$id))) {
            $stmt = null;
            header("location: ../profil.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }
}



