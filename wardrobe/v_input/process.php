<?php
include_once("../c_wardrobe.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $controller = new c_wardrobe();

    if (isset($_POST['metode'])) {
        $metode = $_POST['metode'];
        $randomNumber = generateRandomNumber(1, 1000);
        $targetDirectory = "../gambar/";
        
        // Check if the target directory exists, if not create it
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        if ($metode == "Baju") {
            if (isset($_POST['nama']) && isset($_POST['nomor']) && isset($_POST['deskripsi']) && isset($_FILES['file'])) {
                $BAJU_ID = $_POST['nomor'] . $randomNumber . $randomNumber;
                $BAJU_NAMA = $_POST['nama'];
                $BAJU_DESKRIPSI = $_POST['deskripsi'];
        
                if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $BAJU_FOTO = $randomNumber . $_FILES['file']['name'];
                    $targetFile = $targetDirectory . basename($BAJU_FOTO);
        
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                        $controller->insertBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO);
                        header("location:../v_menu.php");
                        exit();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File upload error.";
                }
            }
        }
        
        if ($metode == "Celana") {
            if (isset($_POST['nama']) && isset($_POST['nomor']) && isset($_POST['deskripsi']) && isset($_FILES['file'])) {
                $CELANA_ID = $_POST['nomor'] . $randomNumber . $randomNumber;
                $CEL_NAMA = $_POST['nama'];
                $CEL_DESKRIPSI = $_POST['deskripsi'];
        
                if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $CEL_FOTO = $randomNumber . $_FILES['file']['name'];
                    $targetFile = $targetDirectory . basename($CEL_FOTO);
        
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                        $controller->insertCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO);
                        header("location:../v_menu.php");
                        exit();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File upload error.";
                }
            }
        }

        if ($metode == "Aksesoris") {
            if (isset($_POST['nama']) && isset($_POST['nomor']) && isset($_POST['deskripsi']) && isset($_FILES['file'])) {
                $ACC_ID = $_POST['nomor'] . $randomNumber . $randomNumber;
                $ACC_NAMA = $_POST['nama'];
                $ACC_DESKRIPSI = $_POST['deskripsi'];
        
                if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $ACC_FOTO = $randomNumber . $_FILES['file']['name'];
                    $targetFile = $targetDirectory . basename($ACC_FOTO);
        
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                        $controller->insertAksesoris($ACC_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO);
                        header("location:../v_menu.php");
                        exit();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File upload error.";
                }
            }
        }
    } else {
        header("location:../v_menu.php");
    }
} else {
    header("location:../v_menu.php");
}

function generateRandomNumber($min = 1, $max = 1000) {
    return rand($min, $max);
}
?>
