<?php

if (isset($_POST["submit"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $signup = new LoginContr($uid, $pwd);

    // errory
    $signup->loginUser();

    // naspat na hl. stranku

    if ($_SESSION["user"] == "user") {
        header("location: ../index.php?error=none");
    } elseif ($_SESSION["user"] == "admin") {
        header("location: ../admin.php?error=none");
    }

}