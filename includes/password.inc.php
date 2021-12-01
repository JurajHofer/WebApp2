<?php

session_start();

if (isset($_POST["submit"]))
{
    //zoberie data
    $id = $_SESSION["userid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/password.classes.php";
    include "../classes/password-contr.classes.php";
    $newpass = new PasswordContr($id, $pwd,$pwdRepeat);

    // errory
    $newpass->newpwdUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}