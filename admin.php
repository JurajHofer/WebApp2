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

require_once('./php/functions.php');
require_once('./classes/tankselect.classes.php');
require_once('./classes/themeselect.classes.php');
require_once('./classes/contactselect.classes.php');

$databaseTanks = new Tanks();
$dataTanks = $databaseTanks->selectTanks();

$databaseThemes = new Themes();
$dataThemes = $databaseThemes->selectThemes();

$databaseContacts = new Contacts();
$dataContacts= $databaseContacts->selectContacts();
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
            <div class="cardpadding">
                <h1>Zoznam prémiových tankov</h1>
                <?php
                if (isset($_GET["error"])) {

                    if ($_GET["error"] == "stmtfailed1" || $_GET["error"] == "stmtfailed2") {
                        echo "<div class=\"form-result error\">Chyba pri načítaní údajov</div>";
                    }
                    if ($_GET["error"] == "emptyinput") {
                        echo "<div class=\"form-result error\">Nezadal si ID, ktoré chceš vymazať</div>";
                    }
                    if ($_GET["error"] == "emptyinputtank" || $_GET["error"] == "emptyinputtheme") {
                        echo "<div class=\"form-result error\">Nezadal si všetky potrebné údaje</div>";
                    }
                    if ($_GET["error"] == "tanknotfound") {
                        echo "<div class=\"form-result error\">Zadal si nesprávne ID tanku</div>";
                    }
                    if ($_GET["error"] == "themenotfound") {
                        echo "<div class=\"form-result error\">Zadal si nesprávne ID témy</div>";
                    }
                    if ($_GET["error"] == "samedata") {
                        echo "<div class=\"form-result error\">Nič si nezmenil</div>";
                    }
                    if ($_GET["error"] == "idnotexists") {
                        echo "<div class=\"form-result error\">Nič si nezmenil</div>";
                    }
                    if ($_GET["error"] == "deletenotpossible") {
                        echo "<div class=\"form-result error\">Tank nie je možné vymazať, vlastnia ho užívatelia</div>";
                    }
                    if ($_GET["error"] == "none") {
                        echo "<div class=\"form-result success\">Úspešne si vykonal akciu</div>";
                    }
                }
                ?>
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
                        $numberOfRows = $dataTanks->rowCount();
                        $row = $dataTanks->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < $numberOfRows; $i++) {
                            tankinfo($row[$i]["tank_uid"],$row[$i]["tank_price"],$row[$i]["tank_tier"],$row[$i]["tank_nationality"],$row[$i]["tank_type"],$row[$i]["tank_img"],$row[$i]["tank_id"]);
                        }
                        ?>
                    </table>
                </div>
                <form action="includes/admin.inc.php" method="post">
                    <div class="grid-containerRows">
                        <div class="grid-container">
                            <h2>Úprava parametrov tanku:</h2>
                        </div>
                        <div class="grid-container">
                            <div class="field">
                                <input type="number" name="iduprava" id="tankidupdate" placeholder="Zadaj ID tanku" min="1" max="500">
                            </div>
                        </div>
                        <div class="grid-container">
                            <button type="button" name="upravit" id="updatebtn" class="button"> ZMENIŤ</button>
                        </div>
                    </div>
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
                                            <input type="text" name="uid2" value="<?php echo $row[2]["tank_uid"]?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <input type="number" name="price2" min="0" max="100000" value="<?php echo $row[2]["tank_price"]?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <input list="tier" name="tier2" value="<?php echo $row[2]["tank_tier"]?>">
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
                                            <input list="type" name="type2" value="<?php echo $row[2]["tank_type"]?>">
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
                                            <input list="nationality" name="nationality2" value="<?php echo $row[2]["tank_nationality"]?>">
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
                                            <input type="text" name="img2" value="<?php echo $row[2]["tank_img"]?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button type="submit" name="potvrditupravu" class="button"> POTVRDIŤ</button>
                    </div>
                    <hr>
                    <div class="grid-containerRows">
                        <div class="grid-container">
                            <h2>Vymazanie tanku:</h2>
                        </div>
                        <div class="grid-container">
                            <div class="field">
                                <input type="number" name="tankiddelete" id="tankiddelete" placeholder="Zadaj ID tanku" min="1" max="500">
                            </div>
                        </div>
                        <div class="grid-container">
                            <button type="submit" name="zmazat" id="deletebtn" class="button"> ZMAZAŤ</button>
                        </div>
                    </div>
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
                                            <input list="tier2" name="tier">
                                            <datalist id="tier2">
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
                                            <input list="type2" name="type">
                                            <datalist id="type2">
                                                <option value="ťažký tank">
                                                <option value="stredný tank">
                                                <option value="ľahký tank">
                                                <option value="stíhač tankov">
                                            </datalist>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <input list="nationality2" name="nationality">
                                            <datalist id="nationality2">
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
                        <button type="submit" name="potvrditpridanie" class="button"> POTVRDIŤ</button>
                    </div>
                    <hr>
                    <h1>Všeobecné otázky</h1>
                    <br>
                    <div style="overflow-x:auto;">
                        <table class="poziadavky">
                            <tr>
                                <th>ID</th>
                                <th>TEXT-ANSWER</th>
                                <th>QUESTION</th>
                                <th>CATEGORY</th>
                            </tr>
                            <?php
                            $numberOfRows = $dataThemes->rowCount();
                            $row = $dataThemes->fetchAll(PDO::FETCH_ASSOC);
                            for ($i = 0; $i < $numberOfRows; $i++) {
                                themeinfo($row[$i]["theme_text"],$row[$i]["theme_question"],$row[$i]["theme_category"],$row[$i]["theme_id"]);
                            }
                            ?>
                        </table>
                    </div>
                    <div class="grid-containerRows">
                        <div class="grid-container">
                            <h2>Pridanie témy:</h2>
                        </div>
                        <div class="grid-container">
                        </div>
                        <div class="grid-container">
                            <button type="button" id="insertbtnthemes" class="button"> PRIDAŤ</button>
                        </div>
                    </div>
                    <div class="hiddeninsertthemes">
                        <div class="grid-containerRows">
                            <div class="grid-container">
                                <div class="field">
                                    <textarea name="themeanswer" cols="30" rows="6" placeholder="Odpoveď" ></textarea>
                                </div>

                            </div>
                            <div class="grid-container">
                                <div class="field">
                                    <textarea name="themequestion" cols="15" rows="6" placeholder="Otázka" ></textarea>
                                </div>
                            </div>
                            <div class="grid-container">
                                <div class="field">
                                    <input list="category" name="themecategory">
                                    <datalist id="category">
                                        <option value="Účet">
                                        <option value="Platby">
                                        <option value="Technické">
                                        <option value="Herné">
                                        <option value="Nahlásenie a odvolanie">
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="potvrditpridanietemy" class="button"> POTVRDIŤ</button>
                    </div>
                    <hr>
                    <div class="grid-containerRows">
                        <div class="grid-container">
                            <h2>Vymazanie témy:</h2>
                        </div>
                        <div class="grid-container">
                            <div class="field">
                                <input type="number" name="themeiddelete" id="themeiddelete" placeholder="Zadaj ID témy" min="1" max="500">
                            </div>
                        </div>
                        <div class="grid-container">
                            <button type="submit" name="potvrditzmazanietemy" id="deletebtnthemes" class="button"> ZMAZAŤ</button>
                        </div>
                    </div>
                </form>
                <h1>Správy od užívateľov</h1>
                <br>
                <div style="overflow-x:auto;">
                    <table class="poziadavky">
                        <tr>
                            <th>ID</th>
                            <th>CATEGORY</th>
                            <th>MESSAGE</th>
                            <th>USER_ID</th>
                        </tr>
                        <?php
                        $numberOfRows = $dataContacts->rowCount();
                        $row = $dataContacts->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < $numberOfRows; $i++) {
                            contactinfo($row[$i]["contact_id"],$row[$i]["contact_category"],$row[$i]["message"],$row[$i]["users_id"]);
                        }
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>

<script src="js/podpora.js"></script>
<script src="js/admin.js"></script>
</body>
</html>