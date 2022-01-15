

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
            Názov účtu :
            <?php echo $_SESSION["useruid"] ?>
            <br>
            Email :
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
            Zmena hesla
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
            Odstránenie účtu
        </div>
        <form action="includes/profile.inc.php" method="post">
            <button class="zmenit" type="submit" name="zmazatucet" id="confirmdel">ODSTRÁNIŤ</button>
        </form>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>
<script src="js/profil.js"></script>
<script src="js/login.js"></script>
</body>
</html>