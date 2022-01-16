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
            <h1>Často položené otázky</h1>
            <br>
            <h3>Účet</h3>
            <?php
                $dataThemes = $databaseThemes->selectThemesCategory("Účet");
                $numberOfRows = $dataThemes->rowCount();
                $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < $numberOfRows; $i++) {
                    themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
                }
            ?>
            <h3>Platby</h3>
            <?php
            $dataThemes = $databaseThemes->selectThemesCategory("Platby");
            $numberOfRows = $dataThemes->rowCount();
            $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < $numberOfRows; $i++) {
                themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
            }
            ?>
            <h3>Technické</h3>
            <?php
            $dataThemes = $databaseThemes->selectThemesCategory("Technické");
            $numberOfRows = $dataThemes->rowCount();
            $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < $numberOfRows; $i++) {
                themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
            }
            ?>
            <h3>Herné</h3>
            <?php
            $dataThemes = $databaseThemes->selectThemesCategory("Herné");
            $numberOfRows = $dataThemes->rowCount();
            $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < $numberOfRows; $i++) {
                themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
            }
            ?>
            <h3>Nahlásenie a odvolanie</h3>
            <?php
            $dataThemes = $databaseThemes->selectThemesCategory("Nahlásenie a odvolanie");
            $numberOfRows = $dataThemes->rowCount();
            $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < $numberOfRows; $i++) {
                themeinfo2($row[$i]["theme_text"],$row[$i]["theme_question"]);
            }
            ?>
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
</body>
</html>