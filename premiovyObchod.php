<?php
    session_start();

    require_once('./php/functions.php');
    require_once('./classes/tankselect.classes.php');

    $database = new Tanks();
    $data = $database->selectTanks();

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
</head>
<body>
<div class="topnav">
    <?php include('./partials/topnav.php') ?>
</div>

<div class="header">
    <?php include('./partials/header.php') ?>
</div>
<div class="row">
    <div class="centercontent">
        <?php
            $numberOfRows = $data->rowCount();
            $row = $data->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < $numberOfRows; $i++) {
                component($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"],$row[$i]["tank_id"]);
            }
        ?>
    </div>
</div>
<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="js/premobchod.js"></script>
</body>
</html>
