<?php

//include "dbh.classes.php";

class Themes extends Dbh {
    public function selectThemes() {
        $stmt = $this->connect()->prepare('SELECT * FROM actual_themes');

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

    public function selectThemesCategory($category) {
        $stmt = $this->connect()->prepare('SELECT * FROM actual_themes WHERE theme_category = :cat');

        if (!$stmt->execute(array((':cat')=>$category))) {
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