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
        <h3> REGISTRÁCIA</h3>
        <form action="includes/signup.inc.php" method="post">
            <div class="textfield">
                <input type="text" name="uid" required>
                <span></span>
                <label> Login</label>
            </div>
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
            <div class="textfield">
                <input type="text" name="email" required>
                <span></span>
                <label> Email</label>
            </div>
            <input type="submit" name="submit" value="REGISTROVAŤ SA">
        </form>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>
</body>
</html>