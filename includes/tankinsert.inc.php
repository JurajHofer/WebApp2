<?php

if (isset($_POST["potvrdit"]))
{
    //zoberie data
    $uid = $_POST["uid"];
    $price = $_POST["price"];
    $tier = $_POST["tier"];
    $type = $_POST["type"];
    $nationality = $_POST["nationality"];
    $img = $_POST["img"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/tankinsert.classes.php";
    include "../classes/tankinsert-contr.classes.php";
    $tank = new TankInsertContr($uid, $price,$tier,$type,$nationality,$img);

    // errory
    $tank->insertTank();

    // naspat na hl. stranku

    header("location: ../admin.php?error=none");


}