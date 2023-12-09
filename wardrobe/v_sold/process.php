<?php
include_once("../c_wardrobe.php");

$controller = new c_wardrobe();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['metode'])) {
        $metode = $_POST['metode'];
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $targetDirectory = "../gambar/";

            switch ($metode) {
                case 'Baju':
                    foreach ($input as $LAUNDRY_ID) {
                        $item = $controller->getBajuById($LAUNDRY_ID);
                        if ($item) {
                            $controller->deleteFromBaju($LAUNDRY_ID);

                            $fileToDelete = $targetDirectory . $item['BAJU_FOTO'];
                            if (file_exists($fileToDelete)) {
                                unlink($fileToDelete);
                            }
                        }
                    }
                    break;
                case 'Celana':
                    foreach ($input as $CELANA_ID) {
                        $item = $controller->getCelanaById($CELANA_ID);
                        if ($item) {
                            $controller->deleteFromCelana($CELANA_ID);


                            $fileToDelete = $targetDirectory . $item['CEL_FOTO'];
                            if (file_exists($fileToDelete)) {
                                unlink($fileToDelete);
                            }
                        }
                    }
                    break;
                case 'Aksesoris':
                    foreach ($input as $ACC_ID) {
                        $item = $controller->getAccById($ACC_ID);
                        if ($item) {
                            $controller->deleteFromAksesoris($ACC_ID);

                            $fileToDelete = $targetDirectory . $item['ACC_FOTO'];
                            if (file_exists($fileToDelete)) {
                                unlink($fileToDelete);
                            }
                        }
                    }
                    break;
                default:
                    break;
            }
        }
    }
}

header("location:../v_sold.php");
