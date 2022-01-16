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

<div class="windowreg">
    <div class="center">
        <h3> Správa Účtu</h3>
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
                    <input type="text" name="uid" class="form__input" id="uid1"  value="<?php echo $_SESSION["useruid"] ?>">
                    <span></span>
                    <label> Login</label>
                </div>
                <div class="textfield">
                    <input type="text" name="email" id="email" value="<?php echo $_SESSION["useremail"] ?>">
                    <span></span>
                    <label> Email</label>
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
                    <input type="password" name="pwd" required>
                    <span></span>
                    <label> Heslo</label>
                </div>
                <div class="textfield">
                    <input type="password" name="pwdrepeat" required>
                    <span></span>
                    <label> Potvrď Heslo</label>
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