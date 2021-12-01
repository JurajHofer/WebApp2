<?php

class DeluserContr extends Deluser {
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
}