<?php
include_once "m_wardrobe.php";

class c_wardrobe
{
    private $model;

    public function __construct()
    {
        $this->model = new m_wardrobe();
    }

    public function getAllData()
    {
        $rows = $this->model->getAllData();
        return $rows;
    }

    public function getAllLaundryData()
    {
        $rows = $this->model->getAllLaundryData();
        return $rows;
    }

    public function DressMe()
    {
        $rows = $this->model->DressMe();
        return $rows;
    }

    public function displayCelana()
    {
        $rows = $this->model->displayCelana();
        return $rows;
    }

    public function displayBaju()
    {
        $rows = $this->model->displayBaju();
        return $rows;
    }

    public function displayAksesoris()
    {
        $rows = $this->model->displayAksesoris();
        return $rows;
    }

    public function insertCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO)
    {
        $this->model->insertCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO);
    }

    public function insertBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO)
    {
        $this->model->insertBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO);
    }

    public function insertAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO)
    {
        $this->model->insertAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO);
    }

    public function insertIntoLaundry($LAUNDRY_ID, $BAJU_ID, $CELANA_ID)
    {
        $this->model->insertIntoLaundry($LAUNDRY_ID, $BAJU_ID, $CELANA_ID);
    }

    public function editCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO)
    {
        $this->model->editCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO);
    }

    public function editBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO)
    {
        $this->model->editBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO);
    }

    public function editAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO)
    {
        $this->model->editAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO);
    }

    public function deleteFromLaundry($LAUNDRY_ID)
    {
        $this->model->deleteFromLaundry($LAUNDRY_ID);
    }

    public function deleteFromBaju($BAJU_ID)
    {
        $this->model->deleteFromBaju($BAJU_ID);
    }

    public function deleteFromCelana($CELANA_ID)
    {
        $this->model->deleteFromCelana($CELANA_ID);
    }

    public function deleteFromAksesoris($AKSESORIS_ID)
    {
        $this->model->deleteFromAksesoris($AKSESORIS_ID);
    }

    public function getBajuById($BAJU_ID)
    {
        return $this->model->getBajuById($BAJU_ID);
    }

    public function getCelanaById($CELANA_ID)
    {
        return $this->model->getCelanaById($CELANA_ID);
    }

    public function getAccById($AKSESORIS_ID)
    {
        return $this->model->getAccById($AKSESORIS_ID);
    }

    public function getItemById($ITEM_ID, $itemType)
    {
        switch ($itemType) {
            case 'BAJU':
                return $this->getBajuById($ITEM_ID);
            case 'CELANA':
                return $this->getCelanaById($ITEM_ID);
            case 'AKSESORIS':
                return $this->getAccById($ITEM_ID);
            default:
                return null;
        }
    }

}
?>