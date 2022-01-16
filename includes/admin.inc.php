<?php

if (isset($_POST["potvrditpridanie"]))
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
    $tank = new TankInsert($uid, $price,$tier,$type,$nationality,$img);

    // errory
    $tank->insertTank();

    // naspat na hl. stranku
    header("location: ../admin.php?error=none");
}

if (isset($_POST["zmazat"]))
{
    //zoberie data
    $id = $_POST["tankiddelete"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/tankdelete.classes.php";
    $tank = new TankDelete($id);

    // errory
    $tank->deleteTank();

    // naspat na hl. stranku
    header("location: ../admin.php?error=none");
}

if (isset($_POST["potvrditupravu"]))
{
    //zoberie data
    $id = $_POST["iduprava"];
    $uid = $_POST["uid2"];
    $price = $_POST["price2"];
    $tier = $_POST["tier2"];
    $type = $_POST["type2"];
    $nationality = $_POST["nationality2"];
    $img = $_POST["img2"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/tankupdate.classes.php";
    $tank = new TankUpdate($id,$uid, $price,$tier,$type,$nationality,$img);

    // errory
    $tank->updateTank();

    // naspat na hl. stranku
    header("location: ../admin.php?error=none");
}

if (isset($_POST["potvrditpridanietemy"]))
{
    //zoberie data
    $text = $_POST["themeanswer"];
    $question = $_POST["themequestion"];
    $category = $_POST["themecategory"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/themeinsert.classes.php";
    $theme = new ThemeInsert($text, $question,$category);

    // errory
    $theme->insertTheme();

    // naspat na hl. stranku
    header("location: ../admin.php?error=none");
}

if (isset($_POST["potvrditzmazanietemy"]))
{
    //zoberie data
    $id = $_POST["themeiddelete"];

    // inicializuje
    include "../classes/dbh.classes.php";
    include "../classes/themedelete.classes.php";
    $theme = new ThemeDelete($id);

    // errory
    $theme->deleteTheme();

    // naspat na hl. stranku
    header("location: ../admin.php?error=none");
}
