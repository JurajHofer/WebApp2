<?php

session_start();

if (isset($_POST["submit"]))
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
    include "../classes/profile-contr.classes.php";
    $profile = new ProfileContr($uid, $id, $email, $uidcurr, $emailcurr);

    // errory
    $profile->updUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}