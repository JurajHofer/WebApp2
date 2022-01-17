
const url = new URL(window.location.href);

if (url.searchParams.get("error") == "usernotfound") {
    alert("Najskôr sa musíš prihlásiť");
    window.location.replace('http://localhost/WebApp/premiovyObchod.php');
}
if (url.searchParams.get("error") == "notenoughgolds") {
    alert("Nemáš dostatok goldov na účte na kúpu tohto tanku");
    window.location.replace('http://localhost/WebApp/premiovyObchod.php');
}
if (url.searchParams.get("error") == "ownedtank") {
    alert("Tento tank už vlastníš");
    window.location.replace('http://localhost/WebApp/premiovyObchod.php');
}
if (url.searchParams.get("error") == "none") {
    alert("Úspešne si si zakúpil nový tank");
    window.location.replace('http://localhost/WebApp/premiovyObchod.php');
}