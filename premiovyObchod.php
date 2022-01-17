<?php
    session_start();

    require_once('./php/functions.php');
    require_once('./classes/tankselect.classes.php');

    $database = new Tanks();

    if (isset($_POST["kupit"])) {
        if (isset($_SESSION["userid"])) {
            if ($_SESSION["usergolds"] >= $_POST["tank_price"]) {
                if (!$database->checkTank($_SESSION["userid"],$_POST["tank_id"])) {
                    $database->setTankToUser($_SESSION["userid"],$_POST["tank_id"]);
                    $database->setUserGolds($_SESSION["userid"],$_SESSION["usergolds"],$_POST["tank_price"]);
                    header("location: premiovyObchod.php?error=none");
                } else {
                    header("location: premiovyObchod.php?error=ownedtank");
                }
            } else {
                header("location: premiovyObchod.php?error=notenoughgolds");
            }
        } else {
            header("location: premiovyObchod.php?error=usernotfound");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Svet Tankov</title>
    <link rel="stylesheet" media="screen" href="css.css">

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            const number = 4;
            let counter = number;
            $("#nextbtn").click(function () {
                counter += number;
                $("#container").load("./php/load-component.php", {
                    newCounter: counter
                });
            });
        });
    </script>
</head>
<body>
<div class="topnav">
    <?php include('./partials/topnav.php') ?>
</div>

<div class="header">
    <?php include('./partials/header.php') ?>
</div>
<div class="row">
    <div class="centercontent" id="container">
        <?php
        $data = $database->selectTanksPart();
        $numberOfRows = $data->rowCount();
        $row = $data->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $numberOfRows; $i++) {
            component($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"],$row[$i]["tank_id"]);
        }
        ?>
    </div>
    <button class="zmenit" type="button" id="nextbtn">UKÁZAŤ ĎAĽŠIE PONUKY</button>
</div>
<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="js/premobchod.js"></script>
</body>
</html>
