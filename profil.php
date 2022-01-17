<?php
session_start();

require_once('./php/functions.php');
require_once('./classes/tankselect.classes.php');

$databaseTanks = new Tanks();
$dataTanks = $databaseTanks->selectUserTanks();
$numberOfRows = $dataTanks->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Svet Tankov</title>
    <link rel="stylesheet" media="screen" href="css.css">
</head>
<body>
<div class="topnav">
    <?php include('./partials/topnav.php') ?>
</div>

<div class="header">
    <?php include('./partials/header.php') ?>
</div>

<div class="windowprofil">
    <div class="center">
        <h3> Správa Účtu</h3>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "username") {
                echo "<div class=\"form-result error\">Použil si nepovelené znaky v tvojom mene</div>";
            }
            if ($_GET["error"] == "useroremailtaken") {
                echo "<div class=\"form-result error\">Užívateľ s daným menom alebo emailom už existuje</div>";
            }
            if ($_GET["error"] == "passwordmatch") {
                echo "<div class=\"form-result error\">Heslá sa nezhodujú</div>";
            }
            if ($_GET["error"] == "passwordlength") {
                echo "<div class=\"form-result error\">Heslo je príliš krátke, musí mať aspoň 5 znakov</div>";
            }
            if ($_GET["error"] == "uidlength") {
                echo "<div class=\"form-result error\">Meno je príliš krátke, musí mať aspoň 3 znaky/div>";
            }
            if ($_GET["error"] == "email") {
                echo "<div class=\"form-result error\">Zadal si invalidnú emailovú adresu</div>";
            }
            if ($_GET["error"] == "stmtfailed1" || $_GET["error"] == "stmtfailed2") {
                echo "<div class=\"form-result error\">Chyba pri načítaní údajov</div>";
            }
            if ($_GET["error"] == "emptyinput") {
                echo "<div class=\"form-result error\">Nezadal si všetky údaje</div>";
            }
            if ($_GET["error"] == "usernotfound") {
                echo "<div class=\"form-result error\">Nenašlo ťa v databáze</div>";
            }
            if ($_GET["error"] == "samedata") {
                echo "<div class=\"form-result error\">Nič si nezmenil</div>";
            }
            if ($_GET["error"] == "none") {
                echo "<div class=\"form-result success\">Úspešne si zmenil údaje</div>";
            }
        }
        ?>
        <div class="udaje">

            <b>Názov účtu :</b>
            <?php echo $_SESSION["useruid"] ?>
            <br>
            <b>Email :</b>
            <?php echo $_SESSION["useremail"] ?>
        </div>

        <form action="includes/profile.inc.php" method="post">
            <button class="zmenit" type="button" id="infobtn">ZMENIŤ</button>
            <div class="hiddeninfo">
                <div class="textfield">
                    <label> Login</label>
                    <input type="text" name="uid" class="form__input" id="uid"  value="<?php echo $_SESSION["useruid"] ?>">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="textfield">
                    <label> Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $_SESSION["useremail"] ?>">
                </div>
                <input type="submit" name="zmenitudaje" value="ZMENIŤ">
            </div>
            <hr>
        </form>

        <div class="udaje2">
            <b>Zmena hesla</b>
        </div>

        <form action="includes/profile.inc.php" method="post">
            <button class="zmenit" type="button" id="pwdbtn">ZMENIŤ</button>
            <div class="hiddenpwd">
                <div class="textfield">
                    <label> Heslo</label>
                    <input type="password" class="form__input" name="pwd" id="pwd" placeholder="Zadaj heslo" required>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="textfield">
                    <label> Potvrď Heslo</label>
                    <input type="password" name="pwdrepeat" id="pwdrepeat" class="form__input" placeholder="Potvrď heslo" required>
                    <div class="form__input-error-message"></div>
                </div>
                <input type="submit" name="zmenitheslo" value="ZMENIŤ">
            </div>
            <hr>
        </form>

        <div class="udaje2">
            <b>Odstránenie účtu</b>
        </div>
        <form action="includes/profile.inc.php" method="post">
            <button class="zmenit" type="submit" name="zmazatucet" id="confirmdel">ODSTRÁNIŤ</button>
            <hr>
        </form>
        <div class="udaje2">
            <p><b>Počet goldov:</b> <?php echo $_SESSION["usergolds"]?></p>
            <p><b>Počet vlastnených tankov: </b><?php echo $numberOfRows ?></p>
            <ul class="d">
                <?php
                    $row = $dataTanks->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        tankname($row[$i]["tank_uid"],$row[$i]["tank_tier"],$row[$i]["tank_type"]);
                    }
                ?>
            </ul>
        </div>

    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>
<script src="js/profil.js"></script>
<script src="js/login.js"></script>
</body>
</html>