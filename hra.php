
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Svet Tankov - hra</title>
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
    <div class="leftcolumn">
        <div class="card">
            <p>Svet Tankov je tímová online akčná hra pre viacerých hráčov, venovaná obrneným konfliktom počas druhej svetovej vojny a po nej. Váš arzenál obsahuje stovky obrnených vozidiel rôznych národov, ako sú Nemecko, Sovietsky zväz, USA, Francúzsko, Británia a mnoho ďalších. V hre je k dispozícii päť hlavných tried tankov, z ktorých každá má svoje vlastné silné stránky a úlohy na bojisku.</p>
            <button class="button">STIAHNUŤ</button>
            <h3>Systémové požiadavky</h3>
            <div style="overflow-x:auto;">
                <table class="poziadavky">
                    <tr>
                        <th></th>
                        <th>MINIMÁLNE</th>
                        <th>DOPORUČENÉ</th>
                        <th>ULTRA</th>
                    </tr>
                    <tr>
                        <td>Operačný systém</td>
                        <td>Windows 7/8/10</td>
                        <td>Windows 7/8/10 - 64bit</td>
                        <td>Windows 7/8/10 - 64bit</td>
                    </tr>
                    <tr>
                        <td>Procesor (CPU)</td>
                        <td>Prosesor aspoň s dvoma fyzickými jadrami, ktorý podporuje SSE2</td>
                        <td>Intel Core i5(stolný PC)</td>
                        <td>Intel Core i5-7400 / AMD Ryzen 5 1500 X</td>
                    </tr>
                    <tr>
                        <td>Pamäť (RAM)</td>
                        <td>2 GB</td>
                        <td>4 GB(alebo viac)</td>
                        <td>8 GB(alebo viac)</td>
                    </tr>
                    <tr>
                        <td>Grafická karta</td>
                        <td>NVIDIA GeForce 8600, ATI Radeon HD 4550</td>
                        <td>GeForce GTX660 (2GB) / Radeon HD 7850 (2GB)</td>
                        <td>GeForce GTX 1050ti (4 GB) / Radeon RX 570 (4 GB), DirectX 9.0c</td>
                    </tr>
                    <tr>
                        <td>Zvuk</td>
                        <td>DirectX 9.0c kompatibilný</td>
                        <td>DirectX 9.0c kompatibilný</td>
                        <td>DirectX 9.0c kompatibilný</td>
                    </tr>
                    <tr>
                        <td>Miesto na pevnom disku</td>
                        <td>55 GB</td>
                        <td>55 GB</td>
                        <td>83 GB</td>
                    </tr>
                    <tr>
                        <td>Rýchlosť internetového pripojenia</td>
                        <td>256 Kbps</td>
                        <td>1024 Kbps alebo vyššie (pre hlasový chat)</td>
                        <td>1024 Kbps alebo vyššie (pre hlasový chat)</td>
                    </tr>
                </table>
            </div>
            <br>
            <h3>Hra s históriou</h3>
            <p>Svet Tankov vám dáva velenie nad viac ako 600 bojovými strojmi z polovice 20. storočia, takže môžete vyskúšať svoju guráž proti hráčom z celého sveta s vrcholnými vojnovými strojmi tejto éry. Veľte legendárnym tankom Sherman, Churchill, Tiger a T-34 - ktoré za sebou majú bohatú históriu na bojovom poli - aj vozidlám, ktoré sa chválila úžasnými technickými riešeniami, ale nikdy sa nedostala na výrobnú linku. Ovládnite vo World of Tanks, umenie obrneného boja na desiatkach máp, ktoré oživujú historické lokácie z celej Zeme a zaisťujú rozmanité taktické hranie. Hra má celosvetovo už vyše 160 miliónov oddaných fanúšikov. Vyrazte s nami do boja!</p>
            <br>
            <hr>
            <h3>Screenshoty</h3>
            <div class="gallery">
                <div class="photo">
                    <a href="pictures/gal1.png">
                        <img src="pictures/gal1.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal2.png">
                        <img src="pictures/gal2.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal3.png">
                        <img src="pictures/gal3.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal4.png">
                        <img src="pictures/gal4.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal5.png">
                        <img src="pictures/gal5.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal6.png">
                        <img src="pictures/gal6.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal7.png">
                        <img src="pictures/gal7.png" alt=""/>
                    </a>
                </div>
                <div class="photo">
                    <a href="pictures/gal8.png">
                        <img src="pictures/gal8.png" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="rightcolumn">
        <div class="card">
            <div class="ponuky">
                <?php include('./partials/ponuky.php') ?>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php include('./partials/footer.php') ?>
</div>
</body>
</html>
