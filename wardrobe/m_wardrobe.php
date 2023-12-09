<?php
include_once "koneksi.php";

class m_wardrobe
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getAllData()
    {
        $result = $this->mysqli->query('CALL DisplayAllData();');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAllLaundryData()
    {
        $result = $this->mysqli->query('CALL GetAllLaundryData();');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function DressMe()
    {
        $result = $this->mysqli->query('CALL Dress_Me();');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function displayCelana()
    {
        $result = $this->mysqli->query('select*from wardrobe.celana;');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function displayBaju()
    {
        $result = $this->mysqli->query('select*from wardrobe.baju;');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function displayAksesoris()
    {
        $result = $this->mysqli->query('select*from wardrobe.aksesoris;');
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function insertCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL InsertCelana(?,?,?,?)");
        $stmt->bind_param("ssss", $CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO);
        $stmt->execute();
        $stmt->close();
    }

    public function insertBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL InsertBaju(?,?,?,?)");
        $stmt->bind_param("ssss", $BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO);
        $stmt->execute();
        $stmt->close();
    }

    public function insertAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL InsertAksesoris(?,?,?,?)");
        $stmt->bind_param("ssss", $AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO);
        $stmt->execute();
        $stmt->close();
    }


    public function insertIntoLaundry($LAUNDRY_ID, $BAJU_ID, $CELANA_ID)
    {
        $stmt = $this->mysqli->prepare("CALL InsertIntoLaundry(?,?,?)");
        $stmt->bind_param("sss", $LAUNDRY_ID, $BAJU_ID, $CELANA_ID);
        $stmt->execute();
        $stmt->close();
    }

    public function editCelana($CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL EditCelana(?,?,?,?)");
        $stmt->bind_param("ssss", $CELANA_ID, $CEL_NAMA, $CEL_DESKRIPSI, $CEL_FOTO);
        $stmt->execute();
        $stmt->close();
    }

    public function editBaju($BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL EditBaju(?,?,?,?)");
        $stmt->bind_param("ssss", $BAJU_ID, $BAJU_NAMA, $BAJU_DESKRIPSI, $BAJU_FOTO);
        $stmt->execute();
        $stmt->close();
    }

    public function editAksesoris($AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO)
    {
        $stmt = $this->mysqli->prepare("CALL EditBaju(?,?,?,?)");
        $stmt->bind_param("ssss", $AKSESORIS_ID, $ACC_NAMA, $ACC_DESKRIPSI, $ACC_FOTO);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteFromLaundry($LAUNDRY_ID)
    {
        $stmt = $this->mysqli->prepare("CALL DeleteFromLaundry(?)");
        $stmt->bind_param("s", $LAUNDRY_ID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteFromBaju($BAJU_ID)
    {
        $stmt = $this->mysqli->prepare("CALL DeleteFromBaju(?)");
        $stmt->bind_param("s", $BAJU_ID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteFromCelana($CELANA_ID)
    {
        $stmt = $this->mysqli->prepare("CALL DeleteFromCelana(?)");
        $stmt->bind_param("s", $CELANA_ID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteFromAksesoris($AKSESORIS_ID)
    {
        $stmt = $this->mysqli->prepare("CALL DeleteFromAksesoris(?)");
        $stmt->bind_param("s", $AKSESORIS_ID);
        $stmt->execute();
        $stmt->close();
    }

    public function getBajuById($BAJU_ID)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM wardrobe.baju WHERE BAJU_ID = ?");
        $stmt->bind_param("s", $BAJU_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function getCelanaById($CELANA_ID)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM wardrobe.celana WHERE CELANA_ID = ?");
        $stmt->bind_param("s", $CELANA_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function getAccById($ACC_ID)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM wardrobe.aksesoris WHERE AKSESORIS_ID = ?");
        $stmt->bind_param("s", $ACC_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        } else {
            $stmt->close();
            return null;
        }
    }
}
?>