

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

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <form action="includes/profile.inc.php" method="post">
                <h3> Správa Účtu</h3>
                <a>Názov účtu </a>
                <?php echo $_SESSION["useruid"] ?>
                <br>
                <a>Emailová adresa </a>
                <?php echo $_SESSION["useremail"] ?>
                <br>
                <button type="button" id="infobtn">ZMENIŤ UDAJE</button>
                <div class="hiddeninfo">
                    <input type="text" name="uid">
                    <input type="text" name="email">
                    <input type="submit" name="submit" value="ZMENIŤ">
                </div>
            </form>

            <form action="includes/password.inc.php" method="post">
                <button type="button" id="pwdbtn">ZMENIŤ HESLO</button>
                <div class="hiddenpwd">
                    <input type="password" name="pwd">
                    <input type="password" name="pwdrepeat">
                    <input type="submit" name="submit" value="ZMENIŤ">
                </div>
            </form>

            <form action="includes/deluser.inc.php" method="post">
                <input type="submit" name="submit" id="confirmdel" value="VYMAZAŤ">
            </form>
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
<script src="profil.js"></script>
</body>
</html>