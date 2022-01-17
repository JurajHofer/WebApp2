<?php

include "../classes/dbh.classes.php";
include "functions.php";

if (isset($_POST["request"])) {
    $request = $_POST["request"];

    $database = new Dbh();
    $stmt = $database->connect()->prepare('SELECT * FROM tanks WHERE tank_type = ?');

    if (!$stmt->execute(array($request))) {
        $stmt = null;
        header("location: admin.php?error=stmtfailed1");
        exit();
    }
    $numberOfRows = $stmt->rowCount();
?>

<div style="overflow-x:auto;">
    <table class="poziadavky">
        <?php
        if ($numberOfRows){
        ?>
        <tr>
            <th>ID</th>
            <th>UID</th>
            <th>PRICE</th>
            <th>TIER</th>
            <th>TYPE</th>
            <th>NATIONALITY</th>
            <th>IMG</th>
        </tr>

        <?php
         } else {
            echo "Nenašli sa žiadne tanky tohto typu";
        }

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $numberOfRows; $i++) {
            tankinfo($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"],$row[$i]["tank_id"]);
        }
        ?>
    </table>
</div>
<?php
}


