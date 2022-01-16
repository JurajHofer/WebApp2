<?php

session_start();

if (isset($_POST["potvrditpridaniespravy"]))
{
//zoberie data
$category = $_POST["contactcategory"];
$text = $_POST["contactmessage"];
$user = $_SESSION["userid"];

// inicializuje
include "../classes/dbh.classes.php";
include "../classes/contactinsert.classes.php";
$theme = new ContactInsert($category, $text,$user);

// errory
$theme->insertContact();

// naspat na hl. stranku
header("location: ../podpora.php?error=none");
}