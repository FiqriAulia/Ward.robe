<?php
include_once("../c_wardrobe.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new c_wardrobe();

    if (isset($_POST['metode'])) {
        $metode = $_POST['metode'];

        if (isset($_POST['nama']) && isset($_POST['nomor']) && isset($_POST['deskripsi'])) {
            $item_ID = $_POST['nomor'];
            $item_NAMA = $_POST['nama'];
            $item_DESKRIPSI = $_POST['deskripsi'];
            $targetDirectory = "../gambar/";

            $existingItem = $controller->getItemById($item_ID, $metode);

            if (!empty($_FILES['file']['name']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $randomNumber = generateRandomNumber(1, 1000);
                $item_FOTO = $randomNumber . $randomNumber . $_FILES['file']['name'];
                $targetFile = $targetDirectory . basename($item_FOTO);

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    if ($metode == 'BAJU') {
                        $fileToDelete = $targetDirectory . $existingItem['BAJU_FOTO'];
                        if ($existingItem && file_exists($fileToDelete)) {
                            unlink($fileToDelete);
                        }
                    }
                    if ($metode == 'CELANA') {
                        $fileToDelete = $targetDirectory . $existingItem['CEL_FOTO'];
                        if ($existingItem && file_exists($fileToDelete)) {
                            unlink($fileToDelete);
                        }
                    }
                    if ($metode == 'AKSESORIS') {
                        $fileToDelete = $targetDirectory . $existingItem['ACC_FOTO'];
                        if ($existingItem && file_exists($fileToDelete)) {
                            unlink($fileToDelete);
                        }
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    exit();
                }
            } else {
                if ($metode == 'BAJU') {
                    $item_FOTO = $existingItem['BAJU_FOTO'];
                }
                if ($metode == 'CELANA') {
                    $item_FOTO = $existingItem['CEL_FOTO'];
                }
                if ($metode == 'AKSESORIS') {
                    $item_FOTO = $existingItem['ACC_FOTO'];
                }
            }

            switch ($metode) {
                case 'BAJU':
                    $controller->editBaju($item_ID, $item_NAMA, $item_DESKRIPSI, $item_FOTO);
                    break;
                case 'CELANA':
                    $controller->editCelana($item_ID, $item_NAMA, $item_DESKRIPSI, $item_FOTO);
                    break;
                case 'AKSESORIS':
                    $controller->editAksesoris($item_ID, $item_NAMA, $item_DESKRIPSI, $item_FOTO);
                    break;
                default:
                    break;
            }
            header("location:../v_edit.php");
            exit();
        }
    }
    header("location:../v_edit.php");
} else {
    header("location:../v_edit.php");
}

function generateRandomNumber($min = 1, $max = 1000)
{
    return rand($min, $max);
}
?>