<?php

class ContactInsert extends Dbh {
    private $category;
    private $text;
    private $user;

    public function __construct($category, $text, $user)
    {
        $this->category = $category;
        $this->text = $text;
        $this->user = $user;
    }

    public function insertContact()
    {
        if ($this->emptyInputUser() == false) {
            header("location: ../podpora.php?error=usernotfound");
            exit();
        }

        if ($this->emptyInput() == false) {
            header("location: ../podpora.php?error=emptyinput");
            exit();
        }

        $this->insContact($this->category, $this->text, $this->user);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->category) || empty($this->text) || empty($this->user)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function emptyInputUser()
    {
        $result = null;
        if (empty($this->user)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function insContact($category, $text,$user) {
        $stmt = $this->connect()->prepare('INSERT INTO contacts (contact_category, message, users_id) VALUES (:cat,:text,:user);');

        if (!$stmt->execute(array((':cat')=>$category, (':text')=>$text,(':user')=>$user))) {
            $stmt = null;
            header("location: ../podpora.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }

}