<?php

session_start();

if (isset($_POST["submit"]))
{
    //zoberie data
    $uid = $_SESSION["useruid"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/deluser.classes.php";
    include "../classes/deluser-contr.classes.php";
    $delete = new DeluserContr($uid);

    // errory
    $delete->deleteUser();

    // naspat na hl. stranku
    header("location: ../index.php?error=none");
}