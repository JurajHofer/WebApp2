<?php
    require_once('./php/component.php');
    require_once('./classes/tanks.classes.php');

    $database = new Tanks();
    $data = $database->selectTanks();
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
                component($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"]);
            }
        ?>

    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>
</body>
</html>
