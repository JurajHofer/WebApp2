<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
?>

<a href="hra.php">HRA</a>
<a href="aktualizacie.php">AKTUALIZÁCIE</a>
<a href="#">PRÉMIOVÝ OBCHOD</a>
<a href="#">PODPORA PRE HRÁČOV</a>
<?php
    if (isset($_SESSION["userid"])) {
?>
        <a href="includes/logout.inc.php" style="float:right">ODHLÁSIŤ</a>
        <a href="profil.php" style="float:right"><?php echo $_SESSION["useruid"] ?></a>
<?php
    } else {
?>
        <a href="login.php" style="float:right">PRIHLÁSENIE</a>
<?php
    }
?>
