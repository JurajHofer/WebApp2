<?php

if (isset($_POST["submit"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd,$pwdRepeat,$email);

    // errory
    $signup->signupUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}