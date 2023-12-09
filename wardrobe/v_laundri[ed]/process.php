<?php
session_start();
include_once("../c_wardrobe.php");
$controller = new c_wardrobe();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button'])) {
        $metode = $_POST['button'];
        if ($metode == 'remove') {
            if (isset($_POST['input'])) {

                $input = $_POST['input'];
                for ($i = 0; $i < count($input); $i++) {
                    $LAUNDRY_ID = $input[$i];
                    $controller->deleteFromLaundry($LAUNDRY_ID);
                }
                session_destroy();
                header("location:../v_laundri[ed].php");
            }
            else{
                session_destroy();
                header("location:../v_laundri[ed].php");
            }
        }
    }
}else{
$baju = isset($_SESSION['selected_baju']) && is_array($_SESSION['selected_baju']) ? $_SESSION['selected_baju'] : [];
$celana = isset($_SESSION['selected_celana']) && is_array($_SESSION['selected_celana']) ? $_SESSION['selected_celana'] : [];

$maxCount = max(count($baju), count($celana));

for ($i = 0; $i < $maxCount; $i++) {
    $LAUNDRY_ID = generateRandomNumber(1, 1000);
    $BAJU_ID = isset($baju[$i]) ? $baju[$i] : null;
    $CELANA_ID = isset($celana[$i]) ? $celana[$i] : null;
    
    $controller->insertIntoLaundry($LAUNDRY_ID, $BAJU_ID, $CELANA_ID);
}

session_destroy();
header("location:../v_laundri[ed].php");
}

function generateRandomNumber($min = 1, $max = 1000)
{
    return rand($min, $max);
}
?>