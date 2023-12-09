<?php
include_once("c_wardrobe.php");

$controller = new c_wardrobe();
$rows = $controller->DressMe();
?>

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
    <header class="header-container">
        <form action="v_menu.php" method="get" class="form-back">
            <input class="back" type="submit" value="Back">
        </form>
        <form action="v_dressme/process.php" method="get" class="form-back">
            <input class="gen" type="submit" value="Re-generate" style="left: 20px;">
        </form>
    </header>

    <div class="center">
        <div class="menukiri">
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
        </div>
        <div class="wardrobe">
            <?php
            if (!empty($rows)) {
                $i = 0;
                foreach ($rows as $row) {
                    if ($i % 2 == 0) {
                        echo '<div class="kotak">';
                    }
                    echo '<div class="lazy" style="
                    background-image: url(\'gambar/' . $row['foto'] . '\');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    ">';
                    echo '</div>';
                    $i++;
                    if ($i % 2 == 0) {
                        echo '</div>';
                    }
                }
                if ($i % 2 != 0) {
                    echo '</div>';
                }
            } else {
                echo 'Yah kamu gaada pakaian.<br>kamu udah jual semuanya';
            }
            ?>
        </div>
    </div>
</body>

</html>