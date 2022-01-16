<?php

class ThemeDelete extends Dbh {
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function deleteTheme()
    {
        if ($this->emptyInput() == false) {
            header("location: ../admin.php?error=emptyinput");
            exit();
        }

        $this->delTheme($this->id);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->id)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function delTheme($id) {
        $stmt = $this->connect()->prepare('DELETE FROM actual_themes WHERE theme_id = :id;');

        if (!$stmt->execute(array((':id')=>$id))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../admin.php?error=themenotfound");
            exit();
        }

        $stmt = null;
    }

}