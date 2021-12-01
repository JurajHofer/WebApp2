<?php

class PasswordContr extends Password {
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
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->pwdLength() == false) {
            header("location: ../index.php?error=passwordlength");
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
}