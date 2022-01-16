<?php

class Contacts extends Dbh
{
    public function selectContacts()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM contacts');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: /admin.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /admin.php?error=datanotfound");
            exit();
        }

        return $stmt;
    }
}