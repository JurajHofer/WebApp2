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
            <div class="flex-container">
                <div class="flex-item-left">
                    <h3> REGISTRÁCIA </h3>
                    <p> Nemáš ešte vytvorený účet? Zaregistruj sa tu!</p>
                    <form action="includes/signup.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                        <input type="text" name="email" placeholder="E-mail">
                        <br>
                        <button type="submit" name="submit">REGISTROVAŤ SA</button>
                    </form>
                </div>
                <div class="flex-item-right">
                    <h3> PRIHLÁSENIE</h3>
                    <p> Nemáš ešte vytvorený účet? Zaregistruj sa tu!</p>
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <br>
                        <button type="submit" name="submit">PRIHLÁSIŤ SA</button>
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
</body>
</html>