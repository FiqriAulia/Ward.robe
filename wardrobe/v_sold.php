<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe</title>
    <link rel="stylesheet" href="styles.css">
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="jquery/script.js"></script>
</head>

<body>
    <div class="center">
        <div class="menukiri">
            <form action="v_sold/insert.php" method="post">
                <input type="hidden" value="Baju" name="metode">
                <input class="btn" type="submit" value="Baju">
            </form>
            <input class="invis" type="submit" value="Laundri[ed]">
            <form action="v_sold/insert.php" method="post">
                <input type="hidden" value="Celana" name="metode">
                <input class="btn" type="submit" value="Celana">
            </form>
        </div>
        <div class="box"><!-- Wizart -->
            <div class="wiz">
                <div class="overlap-group">
                    <div class="rectangle"></div>
                    <main>
                        <img class="wake" id="anchor" src="asset/wake.png" />
                        <div id="eyes">
                            <img class="eye" src="asset/Mata.png" alt="mata" style="top: 240px;left: 35px;" />
                            <img class="eye" src="asset/Mata.png" alt="mata" style="top: 240px;left: -52px;" />
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="menukanan">
            <form action="v_sold/insert.php" method="post">
                <input type="hidden" value="Aksesoris" name="metode">
                <input class="btn" type="submit" value="Aksesoris">
            </form>
            <input class="invis" type="submit" value="Wardobe">
            <form action="v_menu.php" method="get">
                <input class="btn" type="submit" value="Back">
            </form>
        </div>
    </div>
</body>

</html>