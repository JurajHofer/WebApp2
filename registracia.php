
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
        <form action="includes/login.inc.php" method="post">
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
            }
            ?>
            <div class="textfield">
                <label> Login</label>
                <input type="text" name="uid" class="form__input" id="uid" placeholder="Zadaj meno" autofocus required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="textfield">
                <label> Heslo</label>
                <input type="password" name="pwd" class="form__input" id="pwd" placeholder="Zadaj heslo" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="textfield">
                <label> Potvrď Heslo</label>
                <input type="password" class="form__input" name="pwdrepeat" id="pwdrepeat" placeholder="Potvrď heslo" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="textfield">
                <label> Email</label>
                <input type="text" name="email" placeholder="Zadaj email" required>
            </div>
            <input type="submit" name="zaregistrovat" value="REGISTROVAŤ SA">
        </form>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="js/login.js"></script>
</body>
</html>