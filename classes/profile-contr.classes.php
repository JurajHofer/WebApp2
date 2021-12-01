<?php

class ProfileContr extends Profile {
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
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->uidLength() == false) {
            header("location: ../index.php?error=uidlength");
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
}