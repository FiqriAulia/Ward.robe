<?php
session_start();
include_once("../c_wardrobe.php");

$controller = new c_wardrobe();
$rows = $controller->displayBaju();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button']) && $_POST['button'] === 'add') {
        if (isset($_POST['baju'])) {
            $_SESSION['selected_baju'] = $_POST['baju'];
        }

        header("Location: add-2.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="../jquery/jquery-3.7.1.min.js"></script>
    <script src="../jquery/script.js"></script>
</head>

<body>
    <header class="header-container">
        <form action="../v_laundri[ed].php" method="get" class="form-back">
            <input class="back" type="submit" value="Back">
        </form>
        <h3>Laundri[ed]</h3>
        <form action="" method="post">
    </header>
    <div class="center">
        <div class="tengah">
            <div class="header-container">
                <h4>Pilih Baju mana yang di laundry</h4>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="small"></th>
                        <th class="small">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($rows as $rowItem):
                        ?>
                        <tr>
                            <td class="small">
                                <input type="checkbox" name="baju[]" value="<?= $rowItem['BAJU_ID'] ?>">
                            </td>
                            <td class="small">
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $rowItem['BAJU_NAMA'] ?>
                            </td>
                            <td>
                                <?= $rowItem['BAJU_DESKRIPSI'] ?>
                            </td>
                            <td class="fotoble">
                                <img class="foto" src="../gambar/<?= $rowItem['BAJU_FOTO'] ?>" alt="">
                            </td>
                        </tr>
                        <?php $no += 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="header-container">
                <input type="submit" name="button" value="add" class="back" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>