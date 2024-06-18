-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wardrobe`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteFromAksesoris` (IN `aksesoris_id_param` INT)  BEGIN
    -- Delete data from AKSESORIS table based on aksesoris_id
    DELETE FROM AKSESORIS
    WHERE AKSESORIS_ID = aksesoris_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteFromBaju` (IN `baju_id_param` INT)  BEGIN
    -- Delete data from BAJU table based on baju_id
    DELETE FROM BAJU
    WHERE BAJU_ID = baju_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteFromCelana` (IN `celana_id_param` INT)  BEGIN
    -- Delete data from CELANA table based on celana_id
    DELETE FROM CELANA
    WHERE CELANA_ID = celana_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteFromLaundry` (IN `laundry_id_param` INT)  BEGIN
    DELETE FROM LAUNDRY
    WHERE LAUNDRY_ID = laundry_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllData` ()  BEGIN
    SELECT 'BAJU' AS jenis, BAJU_ID AS id, BAJU_NAMA AS nama, BAJU_DESKRIPSI AS deskripsi, BAJU_FOTO AS foto
    FROM BAJU

    UNION

    SELECT 'CELANA' AS jenis, CELANA_ID AS id, CEL_NAMA AS nama, CEL_DESKRIPSI AS deskripsi, CEL_FOTO AS foto
    FROM CELANA

    UNION

    SELECT 'AKSESORIS' AS jenis, AKSESORIS_ID AS id, ACC_NAMA AS nama, ACC_DESKRIPSI AS deskripsi, ACC_FOTO AS foto
    FROM AKSESORIS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Dress_Me` ()  BEGIN
    CREATE TEMPORARY TABLE temp_result
    AS
    SELECT BAJU_ID AS id, BAJU_NAMA AS nama, BAJU_DESKRIPSI AS deskripsi, BAJU_FOTO AS foto
    FROM BAJU
    ORDER BY RAND()
    LIMIT 2;

    INSERT INTO temp_result
    SELECT CELANA_ID, CEL_NAMA, CEL_DESKRIPSI, CEL_FOTO
    FROM CELANA
    ORDER BY RAND()
    LIMIT 1;

    INSERT INTO temp_result
    SELECT AKSESORIS_ID, ACC_NAMA, ACC_DESKRIPSI, ACC_FOTO
    FROM AKSESORIS
    ORDER BY RAND()
    LIMIT 1;

    SELECT * FROM temp_result;
    DROP TEMPORARY TABLE IF EXISTS temp_result;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditAksesoris` (IN `aksesoris_id_param` INT, IN `new_nama_param` VARCHAR(255), IN `new_deskripsi_param` TEXT, IN `new_foto_param` VARCHAR(255))  BEGIN
    UPDATE AKSESORIS
    SET
        ACC_NAMA = new_nama_param,
        ACC_DESKRIPSI = new_deskripsi_param,
        ACC_FOTO = new_foto_param
    WHERE
        AKSESORIS_ID = aksesoris_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditBaju` (IN `baju_id_param` INT, IN `new_nama_param` VARCHAR(255), IN `new_deskripsi_param` TEXT, IN `new_foto_param` VARCHAR(255))  BEGIN
    UPDATE BAJU
    SET
        BAJU_NAMA = new_nama_param,
        BAJU_DESKRIPSI = new_deskripsi_param,
        BAJU_FOTO = new_foto_param
    WHERE
        BAJU_ID = baju_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditCelana` (IN `celana_id_param` INT, IN `new_nama_param` VARCHAR(255), IN `new_deskripsi_param` TEXT, IN `new_foto_param` VARCHAR(255))  BEGIN
    UPDATE CELANA
    SET
        CEL_NAMA = new_nama_param,
        CEL_DESKRIPSI = new_deskripsi_param,
        CEL_FOTO = new_foto_param
    WHERE
        CELANA_ID = celana_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllLaundryData` ()  BEGIN
    CREATE TEMPORARY TABLE temp_result
    AS
    SELECT
        L.LAUNDRY_ID,
        'Baju' AS jenis,
        B.BAJU_NAMA AS nama,
        B.BAJU_DESKRIPSI AS deskripsi,
        B.BAJU_FOTO AS foto
    FROM
        LAUNDRY L
        LEFT JOIN BAJU B ON L.LAUNDRY_BAJU_ID = B.BAJU_ID

    UNION

    SELECT
        L.LAUNDRY_ID,
        'Celana' AS jenis,
        C.CEL_NAMA AS nama,
        C.CEL_DESKRIPSI AS deskripsi,
        C.CEL_FOTO AS foto
    FROM
        LAUNDRY L
        LEFT JOIN CELANA C ON L.LAUNDRY_CEL_ID = C.CELANA_ID;

    SELECT * FROM temp_result;

    DROP TEMPORARY TABLE IF EXISTS temp_result;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertAksesoris` (IN `id_param` INT, IN `nama_param` VARCHAR(255), IN `deskripsi_param` TEXT, IN `foto_param` VARCHAR(255))  BEGIN
    INSERT INTO AKSESORIS (AKSESORIS_ID, ACC_NAMA, ACC_DESKRIPSI, ACC_FOTO)
    VALUES (id_param, nama_param, deskripsi_param, foto_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertBaju` (IN `id_param` INT, IN `nama_param` VARCHAR(255), IN `deskripsi_param` TEXT, IN `foto_param` VARCHAR(255))  BEGIN
    INSERT INTO BAJU (BAJU_ID, BAJU_NAMA, BAJU_DESKRIPSI, BAJU_FOTO)
    VALUES (id_param, nama_param, deskripsi_param, foto_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertCelana` (IN `id_param` INT, IN `nama_param` VARCHAR(255), IN `deskripsi_param` TEXT, IN `foto_param` VARCHAR(255))  BEGIN
    INSERT INTO CELANA (CELANA_ID, CEL_NAMA, CEL_DESKRIPSI, CEL_FOTO)
    VALUES (id_param, nama_param, deskripsi_param, foto_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertIntoLaundry` (IN `laundry_id_param` INT, IN `baju_id_param` INT, IN `celana_id_param` INT)  BEGIN

    INSERT INTO LAUNDRY (LAUNDRY_ID, LAUNDRY_BAJU_ID, LAUNDRY_CEL_ID)
    VALUES (laundry_id_param, baju_id_param, celana_id_param);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aksesoris`
--

CREATE TABLE `aksesoris` (
  `AKSESORIS_ID` int(11) NOT NULL,
  `ACC_NAMA` varchar(255) DEFAULT NULL,
  `ACC_DESKRIPSI` text DEFAULT NULL,
  `ACC_FOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aksesoris`
--

INSERT INTO `aksesoris` (`AKSESORIS_ID`, `ACC_NAMA`, `ACC_DESKRIPSI`, `ACC_FOTO`) VALUES
(34926926, 'Gelang Beads', 'gelang', '926IMG-20231203-WA0024.jpg'),
(2147483647, 'Jam Casio', 'jam casio tank', '869IMG-20231203-WA0023.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `BAJU_ID` int(11) NOT NULL,
  `BAJU_NAMA` varchar(255) DEFAULT NULL,
  `BAJU_DESKRIPSI` text DEFAULT NULL,
  `BAJU_FOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`BAJU_ID`, `BAJU_NAMA`, `BAJU_DESKRIPSI`, `BAJU_FOTO`) VALUES
(1903903, 'Work Jacket', 'Work Jacket warna hijau ', '903IMG-20231203-WA0015.jpg'),
(321438438, 'Kemeja Katun', 'Merek Uniqlo warna coklat', '438IMG-20231203-WA0016.jpg'),
(2147483647, 'Batik Tulis', 'Batik', '137IMG-20231203-WA0017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `celana`
--

CREATE TABLE `celana` (
  `CELANA_ID` int(11) NOT NULL,
  `CEL_NAMA` varchar(255) DEFAULT NULL,
  `CEL_DESKRIPSI` text DEFAULT NULL,
  `CEL_FOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `celana`
--

INSERT INTO `celana` (`CELANA_ID`, `CEL_NAMA`, `CEL_DESKRIPSI`, `CEL_FOTO`) VALUES
(325227227, 'Celana Corduroy', 'merek Uniqlo', '227IMG-20231203-WA0013.jpg'),
(346255255, 'Celana Jeans', 'Celana jeans hitam', '255IMG-20231203-WA0014.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `LAUNDRY_ID` int(11) NOT NULL,
  `LAUNDRY_BAJU_ID` int(11) DEFAULT NULL,
  `LAUNDRY_CEL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksesoris`
--
ALTER TABLE `aksesoris`
  ADD PRIMARY KEY (`AKSESORIS_ID`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`BAJU_ID`);

--
-- Indexes for table `celana`
--
ALTER TABLE `celana`
  ADD PRIMARY KEY (`CELANA_ID`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`LAUNDRY_ID`),
  ADD KEY `LAUNDRY_BAJU_ID` (`LAUNDRY_BAJU_ID`),
  ADD KEY `LAUNDRY_CEL_ID` (`LAUNDRY_CEL_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `laundry_ibfk_1` FOREIGN KEY (`LAUNDRY_BAJU_ID`) REFERENCES `baju` (`BAJU_ID`),
  ADD CONSTRAINT `laundry_ibfk_2` FOREIGN KEY (`LAUNDRY_CEL_ID`) REFERENCES `celana` (`CELANA_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
