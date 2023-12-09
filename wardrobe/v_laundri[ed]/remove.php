<?php
include_once("../c_wardrobe.php");

$controller = new c_wardrobe();
$rows = $controller->getAllLaundryData();
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
    </header>
    <div class="center">
        <div class="tengah">
            <div class="header-container">
                <h4>Pilih pakaian mana yang sudah selesai di laundry</h4>
                <form action="process.php" method="post">
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="small"></th>
                        <th class="small">No</th>
                        <th class="jenis">Jenis</th>
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
                            <input type="checkbox" name="input[]" value="<?= $rowItem['LAUNDRY_ID'] ?>">
                            </td>
                            <td class="small">
                                <?= $no ?>
                            </td>
                            <td class="jenis">
                                <?= $rowItem['jenis'] ?>
                            </td>
                            <td>
                                <?= $rowItem['nama'] ?>
                            </td>
                            <td>
                                <?= $rowItem['deskripsi'] ?>
                            </td>
                            <td class="fotoble">
                                <img class="foto" src="../gambar/<?= $rowItem['foto'] ?>" alt="">
                            </td>
                        </tr>
                        <?php $no += 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="header-container">
                <input type="submit" name="button" value="remove" class="back"/>
                </form>
            </div>
        </div>
    </div>
</body>

</html>