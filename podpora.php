<?php
session_start();

require_once('./php/functions.php');
require_once('./classes/dbh.classes.php');
require_once('./classes/themeselect.classes.php');


$databaseThemes = new Themes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Svet Tankov - hra</title>
    <link rel="stylesheet" media="screen" href="css.css">
</head>
<body>
<div class="topnav">
    <?php include('./partials/topnav.php') ?>
</div>

<div class="header">
    <?php include('./partials/header.php') ?>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <div class="ponukycard">
                <h1>Často položené otázky</h1>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "stmtfailed1" || $_GET["error"] == "stmtfailed2") {
                        echo "<div class=\"form-result error\">Chyba pri načítaní údajov</div>";
                    }
                    if ($_GET["error"] == "emptyinput") {
                        echo "<div class=\"form-result error\">Nezadal si všetky údaje</div>";
                    }
                    if ($_GET["error"] == "usernotfound") {
                        echo "<div class=\"form-result error\">Najskôr sa musíš prihlásiť</div>";
                    }
                    if ($_GET["error"] == "none") {
                        echo "<div class=\"form-result success\">Úspešne si odoslal správu</div>";
                    }
                }
                ?>
                <br>
                <div class="grid-containerRows">
                    <div class="grid-containerleft">
                        <h3>Účet</h3>
                    </div>
                    <div>
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="contactUcet"> UKÁZAŤ</button>
                    </div>
                </div>
                <div class="hiddenUcet">
                    <?php
                    $dataThemes = $databaseThemes->selectThemesCategory("Účet");
                    $numberOfRows = $dataThemes->rowCount();
                    $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                    }
                    ?>
                </div>
                <hr>
                <div class="grid-containerRows">
                    <div class="grid-containerleft">
                        <h3>Platby</h3>
                    </div>
                    <div>
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="contactPlatby"> UKÁZAŤ</button>
                    </div>
                </div>
                <div class="hiddenPlatby">
                <?php
                    $dataThemes = $databaseThemes->selectThemesCategory("Platby");
                    $numberOfRows = $dataThemes->rowCount();
                    $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                    }
                ?>
                </div>
                <hr>
                <div class="grid-containerRows">
                    <div class="grid-containerleft">
                        <h3>Technické</h3>
                    </div>
                    <div>
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="contactTechnicke"> UKÁZAŤ</button>
                    </div>
                </div>
                <div class="hiddenTechnicke">
                <?php
                    $dataThemes = $databaseThemes->selectThemesCategory("Technické");
                    $numberOfRows = $dataThemes->rowCount();
                    $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                    }
                ?>
                </div>
                <hr>
                <div class="grid-containerRows">
                    <div class="grid-containerleft">
                        <h3>Herné</h3>
                    </div>
                    <div>
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="contactHerne"> UKÁZAŤ</button>
                    </div>
                </div>
                <div class="hiddenHerne">
                <?php
                    $dataThemes = $databaseThemes->selectThemesCategory("Herné");
                    $numberOfRows = $dataThemes->rowCount();
                    $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                    }
                ?>
                </div>
                <hr>
                <div class="grid-containerRows">
                    <div class="grid-containerleft">
                        <h3>Nahlásenie a odvolanie</h3>
                    </div>
                    <div>
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="contactNahlasenie"> UKÁZAŤ</button>
                    </div>
                </div>
                <div class="hiddenNahlasenie">
                <?php
                    $dataThemes = $databaseThemes->selectThemesCategory("Nahlásenie a odvolanie");
                    $numberOfRows = $dataThemes->rowCount();
                    $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                    }
                ?>
                </div>
                <hr>
                <div class="grid-containerRows">
                    <div class="grid-container">
                        <h2>Vytvoriť správu:</h2>
                    </div>
                    <div class="grid-container">
                    </div>
                    <div class="grid-container">
                        <button type="button" class="button" id="insertbtncontacts"> VYTVORIŤ</button>
                    </div>
                </div>
                <div class="hiddenInsertContacts">
                    <form action="includes/podpora.inc.php" method="post">
                        <h4>Predmet správy</h4>
                        <div class="field">
                            <input list="category" name="contactcategory">
                            <datalist id="category">
                                <option value="Účet">
                                <option value="Platby">
                                <option value="Technické">
                                <option value="Herné">
                                <option value="Nahlásenie a odvolanie">
                                <option value="Iné">
                            </datalist>
                            <br>
                            <br>
                            <div class="grid-containerRowsMessage">
                                <div>
                                    <textarea name="contactmessage" rows="6" placeholder="Opíšte svoj problém"></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="potvrditpridaniespravy" class="button"> ODOSLAŤ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="rightcolumn">
        <div class="card">
            <div class="ponuky">
                <?php include('./partials/ponuky.php') ?>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="js/podpora.js"></script>
</body>
</html>