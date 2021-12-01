<?php

class Password extends Dbh {
    protected function updUser($id, $pwd) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_pwd = ? WHERE users_id = ?;');

        $hashedPwd =password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($hashedPwd, $id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }
}