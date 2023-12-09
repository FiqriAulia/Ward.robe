<?php
session_start();
include_once("../c_wardrobe.php");

$controller = new c_wardrobe();
$baju = $controller->displayBaju();
$celana = $controller->displayCelana();
$aksesoris = $controller->displayAksesoris();
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
        <form action="../v_sold.php" method="get" class="form-back">
            <input class="back" type="submit" value="Back">
            </form>
            <h3>Laundri[ed]</h3>
            <form action="process.php" method="post">
    </header>
    <div class="center">
        <div class="tengah">
            <div class="header-container">
                <h4>Pilih <?php echo $_POST['metode']?> mana yang di laundry</h4>
            </div>
            <?php
            if($_POST['metode'] == "Baju"){
                $rows = $baju;
                ?>
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
                                <input type="checkbox" name="input[]" value="<?= $rowItem['BAJU_ID'] ?>">
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
                            <td>
                                <?= $rowItem['BAJU_FOTO'] ?>
                            </td>
                        </tr>
                        <?php $no += 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <?php
            }
            if($_POST['metode'] == "Celana"){
                $rows = $celana;
                ?>
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
                                <input type="checkbox" name="input[]" value="<?= $rowItem['CELANA_ID'] ?>">
                            </td>
                            <td class="small">
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $rowItem['CEL_NAMA'] ?>
                            </td>
                            <td>
                                <?= $rowItem['CEL_DESKRIPSI'] ?>
                            </td>
                            <td>
                                <?= $rowItem['CEL_FOTO'] ?>
                            </td>
                        </tr>
                        <?php $no += 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <?php
            }
            if($_POST['metode'] == "Aksesoris"){
                $rows = $aksesoris;
                ?>
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
                                <input type="checkbox" name="input[]" value="<?= $rowItem['AKSESORIS_ID'] ?>">
                            </td>
                            <td class="small">
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $rowItem['ACC_NAMA'] ?>
                            </td>
                            <td>
                                <?= $rowItem['ACC_DESKRIPSI'] ?>
                            </td>
                            <td>
                                <?= $rowItem['ACC_FOTO'] ?>
                            </td>
                        </tr>
                        <?php $no += 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <?php
            }
            ?>
            <div class="header-container">
                <input type="hidden" name="metode" value="<?php echo $_POST['metode']?>">
                <input type="submit" name="button" value="Sold ??" class="back" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>

