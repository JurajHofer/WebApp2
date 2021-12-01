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

    <div class="windowlog">
        <div class="center">
            <h3> PRIHLÁSENIE</h3>
            <form action="includes/login.inc.php" id="login" method="post">
                <div class="textfield">
                    <input type="text" class="form__input" id="uid" name="uid" autofocus required>
                    <span></span>
                    <label> Login</label>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="textfield">
                    <input type="password" class="form__input" id="pwd" name="pwd" autofocus required>
                    <span></span>
                    <label> Heslo</label>
                    <div class="form__input-error-message"></div>
                </div>
                <input type="submit" name="submit" id="loginbtn" value="PRIHLÁSIŤ SA">
                <div class="signuplink">
                    Nemáš vytvorený účet? <a href="registracia.php">Zaregistruj sa!</a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <?php include('./partials/footer.php') ?>
    </div>
<script src="login.js"></script>
</body>

</html>