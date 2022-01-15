<?php

session_start();

if (isset($_POST["zmenitudaje"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $id = $_SESSION["userid"];
    $email = $_POST["email"];
    $uidcurr = $_SESSION["useruid"];
    $emailcurr = $_SESSION["useremail"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/profile.classes.php";

    $profile = new Profile($uid, $id, $email, $uidcurr, $emailcurr);

    // errory
    $profile->updUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}

if (isset($_POST["zmenitheslo"]))
{
    //zoberie data
    $id = $_SESSION["userid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/password.classes.php";

    $newpass = new Password($id, $pwd,$pwdRepeat);

    // errory
    $newpass->newpwdUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}

if (isset($_POST["zmazatucet"]))
{
    //zoberie data
    $uid = $_SESSION["useruid"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/deluser.classes.php";
    $delete = new Deluser($uid);

    // errory
    $delete->deleteUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}