<?php

if (isset($_POST["prihlasit"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    $signup = new Login($uid, $pwd);

    // errory
    $signup->loginUser();

    // naspat na hl. stranku

    if ($_SESSION["user"] == "user") {
        header("location: ../index.php?error=none");
    } elseif ($_SESSION["user"] == "admin") {
        header("location: ../admin.php?error=none");
    }
}

if (isset($_POST["zaregistrovat"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    $signup = new Signup($uid, $pwd,$pwdRepeat,$email);

    // errory
    $signup->signupUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}
