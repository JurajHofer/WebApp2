

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
    <div class="leftcolumn">
        <div class="card">
            <div class="flex-container">
                <div class="flex-item-left">
                    <img src="pictures/obr.png" alt="">
                </div>
                <div class="flex-item-right">
                    <div class="description">
                        <h2>NOVINKA</h2>
                        <h5>18.10.2021</h5>
                    </div>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex-container">
                <div class="flex-item-left">
                    <img src="pictures/obr.png" alt="">
                </div>
                <div class="flex-item-right">
                    <div class="description">
                        <h2>NOVINKA</h2>
                        <h5>18.10.2021</h5>
                    </div>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex-container">
                <div class="flex-item-left">
                    <img src="pictures/obr.png" alt="">
                </div>
                <div class="flex-item-right">
                    <div class="description">
                        <h2>NOVINKA</h2>
                        <h5>18.10.2021</h5>
                    </div>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor </p>
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