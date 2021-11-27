<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Svet Tankov - aktualizácie</title>
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
            <h1>História aktualizácií</h1>
            <p>Velitelia!</p>
            <br>
            <p>Tu sa môžete prostredníctvom rýchleho prehľadu každej aktualizácie pozrieť, ako išiel čas s hrou Svet Tankov. Pokiaľ hľadáte konkrétnu aktualizáciu, môžete si vybrať zo zoznamu v pravom paneli.</p>
            <br>

            <hr>
            <h3 id="1.14">Aktualizácia 1.14 (aug 2021)</h3>
            <ul class="a">
                <li><p><span>Režim "Mapovanie":</span> Cvičný režim pre jedného hráča, ktorý vám na 15 mapách umožní naučiť sa základy taktiky pre náhodné bitky.</p></li>
                <li><p><span>Mechanika poľných vylepšení:</span> Po dosiahnutí elitného stavu svojich vozidiel na VI.-X. úrovni môžete vyladiť ich technické parametre.</p></li>
                <li><p><span>Nová vetva československých ťažkých tankov:</span> Do československého výskumu boli pridané štyri nové ťažké tanky VII. až X. úrovne.</p></li>
                <li><p><span>Mapa Útočisko:</span> Do náhodných bitiek bola pridaná nová letná mapa s rozmermi 1 000 x 1 000 metrov. Je zasadená do demilitarizovaného japonského prístavu 60. rokov 20. storočia.</p></li>
                <li><p><span>Zmeny v podmienkach osobných misií pre delostrelectvo:</span> Niektoré podmienky boli zmenené z dôvodu prepracovania delostrelectva a mechanik HE granátov v predchádzajúcej aktualizácii.</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.13">Aktualizácia 1.13 (júl 2021)</h3>
            <ul class="a">
                <li><p><span>Komplexné prepracovanie HE granátov:</span> V novom systéme budú HE granáty schopné prebiť pancier a spôsobiť poškodenie v mieste dopadu. Budú tiež môcť preraziť clony, pásy a kolesá kolesových vozidiel v mieste dopadu alebo drobné a / alebo zničiteľné prekážky.</p></li>
                <li><p><span>Zmeny samohybných diel a ďalších vozidiel:</span> Delostrelectvo teraz bude mať k dispozícii tri typy granátov. Každý bude mať v boji svoj vlastný účel, trajektóriu a rýchlosť, takže teraz budete mať k dispozícii väčšie množstvo taktických možností. Dva typy granátov nebudú spôsobovať ochromenie, čo významne zníži celkové trvanie ochromenie v bitkách. Hráči, ktorí nehrajú za delostrelectvo, majú teraz k dispozícii tri nové taktické funkcie k boju proti nemu: Zvukovú detekciu (alebo tiež "Šiesty zmysel na delostrelectvo"), jasnejšie trasírky granátov a palebnej značky delostrelectva na minimape. Ďalšou novinkou je prepracovaná špecializácia "Intuícia", ktorou sa bude môcť aj naďalej naučiť nabíjač. Stane sa z nej schopnosť, ktorá vám umožní výrazne urýchliť proces zmeny typu granátu, a bude k dispozícii pre všetky vozidlá v hre.</p></li>
                <li><p><span>Vyváženie prémiových vozidiel a tankov z klanových vojen:</span> Vylepšenia sa dočkajú tri prémiové ľahké tanky a šesť vozidiel za odmenu z klanových vojen. Upravíme ich bojové parametre a posilníme silné stránky tak, aby sme podčiarkli ich hrateľnosť.</p></li>
                <li><p><span>Vylepšenia rozhrania pre výber režimov:</span> Teraz si budete môcť pohodlnejšie vybrať režim, v ktorom chcete hrať! Rozhranie bude tvoriť štandardná obrazovka v plnej veľkosti so samostatnými oknami dostupných herných režimov. Každý režim bude obsahovať stručné zhrnutie a podrobnejší popis na samostatnej stránke. V niektorých z nich budete tiež môcť sledovať svoj postup.</p></li>
                <li><p><span>Prepracovanie mapy Minsk:</span> Na mape, ktorá je situovaná do rodiska spoločnosti Wargaming, sme vykonali niekoľko vylepšení. Ročné obdobia na mape sa navyše zmenilo na jeseň, takže sa v niektorých oblastiach zlepšila viditeľnosť. Táto lokácia bude ponúkať viac možností, pokiaľ ide o výber krídel, a umožní tímom využívanie nových kreatívnych taktík.</p></li>
                <li><p><span>Zmeny vo fragmentoch plánov vozidiel:</span> Ak pri vytváraní plánu konkrétneho vozidla nemáte dostatok národných fragmentov, môžete ich nahradiť fragmenty spojeneckého národa (skupiny v kampani osobných misií "Druhá fronta").</p></li>
                <li><p><span>Prieskumná misia:</span> V tomto režime si budú môcť hráči vyskúšať mapy, ktoré sa nachádzajú v neskorých fázach vývoja.</p></li>
                <li><p><span>X. sezóna hodnotených bitiek 2021-2022:</span> Zmenil sa formát hodnotených bitiek. V X. sezóne budú bitky prebiehať medzi dvoma tímami o 10 hráčoch.</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.12.1">Aktualizácia 1.12.1 (apr 2021)</h3>
            <ul class="a">
                <li><p><span>Vylepšenia bojového rozhranie:</span> Popri ďalších zmien majú hráči teraz v odstřelovacím režime možnosť za pomoci klávesy X uzamykať / odomykať korbu priamo v bitke.</p></li>
                <li><p><span>Výcvikový tábor:</span> Upravené bolo uvítacia okno, obrazovka s výsledkami bitky a okno pre opustenie výcvikového tábora. Bol tiež pridaný panel postupe vo výcviku.</p></li>
                <li><p><span>Odmeny za klanovej úlohy:</span> Boli pridané nové prvky na úpravu vzhľadu.</p></li>
                <li><p><span>Vylepšenia systému tvorby tímov:</span> Systém tvorby tímov bol vylepšený tak, aby bolo pre nováčikov ľahšie porozumieť základom hry World of Tanks a zvyknúť si na ňu. Bola pridaná vozidlá ovládaná umelou inteligenciou, ktorá sa v bitke objaví v prípade, že systém nezoženie dostatok nováčikov na vytvorenie dvoch plných a rovnocenných tímov, alebo v hodinách, kedy je na serveri príliš nízky počet ľudí.</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.12">Aktualizácia 1.12 (mar 2021)</h3>
            <ul class="a">
                <li><p><span>Oceľový lovec 2021:</span> Všetkým vozidlám boli pridané vnútorné moduly. Hráči teraz môžu zostať v bitke a sledovať ju až do jej konca. K výsledkom bitky boli pridané informácie o spôsobenom poškodení a záverečnej úrovni vozidiel. Režim teraz podporuje štandardné funkciu nahrávania záznamov. Tiež bolo vykonaných niekoľko zmien technických parametrov.</p></li>
                <li><p><span>Záverečná sezóna hodnotených bitiek 2020-2021:</span> Nová sezóna hodnotených bitiek priniesla do tohto súťažného režimu nové prvky.</p></li>
                <li><p><span>Battle Pass 2021:</span> V porovnaní s predchádzajúcim rokom sa zaviedlo niekoľko zmien.</p></li>
                <li><p><span>Zmenáreň na fragmenty národných a univerzálnych plánov:</span> Na obmedzenú dobu bola do hry pridaná možnosť vymeniť národné a univerzálne fragmenty za hodnotné herné predmety.</p></li>
                <li><p><span>Vylepšená vizualizácia pásov:</span> Pri vozidlách vybavených hydropneumatickým podvozkom bola na "Maximálna" a "Ultra" kvalitu grafiky vylepšená vizualizácia pásov.</p></li>
                <li><p><span>Nové funkcie inšpirované obľúbenými hernými modifikáciami:</span> Bolo pridaných niekoľko nových prvkov a vylepšení.</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.11.1">Aktualizácia 1.11.1 (jan 2021)</h3>
            <ul class="a">
                <li><p><span>Čata 2.0:</span> Nové funkcie hľadanie členov čaty a vylepšenia dynamických čiat.</p></li>
                <li><p><span>Úpravy herného klienta:</span> Herný klient si zapamätá server, ktorý si hráč vybral. Boli upravené časomiera opráv modulov a kruh blízkeho odhaľovanie na minimape.</p></li>
                <li><p><span>Talianske ťažké tanky:</span> Do vetvy bola pridaná nasledujúce vozidlá, ktoré začínajú od tanku p.43 bis:</p>
                    <ul class="b">
                        <li><p><span>VII. úroveň - </span>Carro d'assalto P.88</p></li>
                        <li><p><span>VIII. úroveň - </span>Progetto CC55 mod. 54</p></li>
                        <li><p><span>IX. úroveň - </span>Progetto C50 mod. 66</p></li>
                        <li><p><span>X. úroveň - </span>Rinoceronte</p></li>
                    </ul>
                <li><p><span>Vojenské známky:</span> Boli opravené niektoré problémy. Vojenské známky sa teraz zobrazujú vo veľkých bitkách. Známky ostatných hráčov je možné prezerať v služobnom záznamu.</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.11">Aktualizácia 1.11 (dec 2020)</h3>
            <ul class="a">
                <li><p><span>Sviatočná operácia 2021:</span> Pridaná sviatočnú garáž a aktivity v rámci akcie "sviatočná operácia".</p></li>
                <li><p><span>Nové vozidlo:</span> Pz.Sfl. IC, nemecký stíhač tankov IV. úrovne</p></li>
            </ul>
            <br>

            <hr>
            <h3 id="1.10">Aktualizácia 1.10 (aug 2020)</h3>
            <ul class="a">
                <li><p><span>Vybavenie 2.0:</span> Užívateľské rozhranie pre vybavenie / spotrebné doplnky a systém vybavenie boli kompletne prepracované. Boli pridané štyri kategórie vybavenie: Palebná sila, Odolnosť, Pohyblivosť a Prieskum. Keď je vybavenie namontované do slotu zodpovedajúcej kategórie, získaný bonus sa zvyšuje. Všetky vozidlá VI.-X. úrovne teraz majú sloty s kategóriami.</p></li>
                <li><p><span>Mapy:</span> Do hry sa vráti značne prepracovaná mapa "Perlová rieka". Mapy Útesy, Prochorovka, Berlín a Ruinberg boli tiež aktualizované a prepracované tak, aby sa vyriešili ich problémy, vylepšila miesta k úkrytu, posilnili štartovej pozície a vznikli nové príležitosti pre oba tímy.</p></li>
                <li><p><span>Nový systém komunikácie v bitke:</span> Systém komunikácie v náhodných bitkách bol revidovaný tak, aby boli rozšírené a vylepšené spôsoby komunikácie medzi hráčmi.</p></li>
                <li><p><span>Prepracované mechaniky bonov:</span> Bony možno teraz získavať iným spôsobom. Cieľom je, aby bol celý systém transparentnejší, zrozumiteľnejšie a lepšie predvídateľný.</p></li>
            </ul>
        </div>
    </div>

    <div class="rightcolumn">
        <div class="card">
            <div class="ponuky">
                <h2>Zoznam aktualizácií</h2>
                <hr>
                <ul class="b">
                    <li><a href="#1.14">Aktualizácia 1.14 (aug 2021)</a></li>
                    <li><a href="#1.13">Aktualizácia 1.13 (júl 2021)</a> </li>
                    <li><a href="#1.12.1">Aktualizácia 1.12.1 (apr 2021)</a> </li>
                    <li><a href="#1.12">Aktualizácia 1.12 (mar 2021)</a> </li>
                    <li><a href="#1.11.1">Aktualizácia 1.11.1 (jan 2021)</a> </li>
                    <li><a href="#1.11">Aktualizácia 1.11 (dec 2020)</a> </li>
                    <li><a href="#1.10">Aktualizácia 1.10 (aug 2020)</a> </li>
                </ul>

            </div>
        </div>

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
