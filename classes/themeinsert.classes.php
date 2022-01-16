<?php

class ThemeInsert extends Dbh {
    private $text;
    private $question;
    private $category;

    public function __construct($text, $question, $category)
    {
        $this->text = $text;
        $this->question = $question;
        $this->category = $category;
    }

    public function insertTheme()
    {
        if ($this->emptyInput() == false) {
            header("location: ../admin.php?error=emptyinput");
            exit();
        }

        $this->insTheme($this->text, $this->question, $this->category);
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->text) || empty($this->question) || empty($this->category)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function insTheme($text, $question, $category) {
        $stmt = $this->connect()->prepare('INSERT INTO actual_themes (theme_text, theme_question, theme_category) VALUES (?,?,?);');

        if (!$stmt->execute(array($text, $question,$category))) {
            $stmt = null;
            header("location: ../admin.php?error=stmtfailed1");
            exit();
        }

        $stmt = null;
    }
}