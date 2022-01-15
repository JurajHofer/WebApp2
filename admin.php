<?php
session_start();

if (isset($_SESSION["user"]))  {
    if ($_SESSION["user"] != "admin") {
        echo "Nie si admin!";
        exit;
    }
} else {
    echo "Nie si prihlaseny";
    exit;
}

require_once('./php/tankinfo.php');
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
    <div class="centercontentAdmin">
        <div class="card">

<!--                <div class="flex-containerColumns">-->

            <h1>Zoznam prémiových tankov</h1>
            <br>
            <div style="overflow-x:auto;">
                <table class="poziadavky">
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
                    $numberOfRows = $data->rowCount();
                    $row = $data->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $numberOfRows; $i++) {
                        tankinfo($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"],$row[$i]["tank_id"]);
                    }
                    ?>
                </table>
            </div>
            <br>
            <div class="grid-containerRows">
                <div class="grid-container">
                    <h2>Úprava parametrov tanku:</h2>
                </div>
                <div class="grid-container">
                    <div class="field">
                        <input type="text" name="id" placeholder="Zadaj id tanku">
                    </div>
                </div>
                <div class="grid-container">
                    <button type="button" id="updatebtn" class="button"> ZMENIŤ</button>
                </div>
            </div>
            <br>
            <div class="hiddenUpdate">
                <div style="overflow-x:auto;">
                    <table class="poziadavky">
                        <tr>
                            <th>UID</th>
                            <th>PRICE</th>
                            <th>TIER</th>
                            <th>TYPE</th>
                            <th>NATIONALITY</th>
                            <th>IMG</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                            <td>
                                <div class="field">
                                    <input type="text" name="id" placeholder="Zadaj id tanku">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" name="potvrdit" class="button"> POTVRDIŤ</button>
            </div>
            <hr>
            <div class="grid-containerRows">
                <div class="grid-container">
                    <h2>Vymazanie tanku:</h2>
                </div>
                <div class="grid-container">
                    <div class="field">
                        <input type="text" name="id" placeholder="Zadaj id tanku">
                    </div>
                </div>
                <div class="grid-container">
                    <button type="submit" name="zmazat" class="button"> ZMAZAŤ</button>
                </div>
            </div>
            <br>
            <hr>
            <div class="grid-containerRows">
                <div class="grid-container">
                    <h2>Pridanie tanku:</h2>
                </div>
                <div class="grid-container">

                </div>
                <div class="grid-container">
                    <button type="button" class="button" id="insertbtn"> PRIDAŤ</button>
                </div>
            </div>
            <br>
            <form action="includes/tankinsert.inc.php" method="post">
                <div class="hiddenInsert">
                    <div style="overflow-x:auto;">
                        <table class="poziadavky">
                            <tr>
                                <th>UID</th>
                                <th>PRICE</th>
                                <th>TIER</th>
                                <th>TYPE</th>
                                <th>NATIONALITY</th>
                                <th>IMG</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="field">
                                        <input type="text" name="uid" >
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input type="number" name="price" min="0" max="100000" >
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input list="tier" name="tier">
                                        <datalist id="tier">
                                            <option value="II">
                                            <option value="III">
                                            <option value="IV">
                                            <option value="V">
                                            <option value="VI">
                                            <option value="VII">
                                            <option value="VIII">
                                        </datalist>
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input list="type" name="type">
                                        <datalist id="type">
                                            <option value="ťažký tank">
                                            <option value="stredný tank">
                                            <option value="ľahký tank">
                                            <option value="stíhač tankov">
                                        </datalist>
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input list="nationality" name="nationality">
                                        <datalist id="nationality">
                                            <option value="nemecký">
                                            <option value="britský">
                                            <option value="americký">
                                            <option value="sovietsky">
                                            <option value="japonský">
                                            <option value="čínsky">
                                            <option value="francúzsky">
                                            <option value="poľský">
                                            <option value="švédsky">
                                            <option value="československý">
                                        </datalist>
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input type="text" name="img" >
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit" name="potvrdit" class="button"> POTVRDIŤ</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="admin.js"></script>
</body>
</html>