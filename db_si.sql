-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_si
CREATE DATABASE IF NOT EXISTS `db_si` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_si`;

-- Dumping structure for table db_si.alternatif
CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alternatif` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_si.alternatif: ~5 rows (approximately)
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
	(1, 'KINGSTON HYPERX FURRY 4GB'),
	(2, 'KLEVV DDR4 Value Series PC21300 8GB'),
	(3, 'CORSAIR VENGEANCE LPX 8GB CMK8GX4M1E3200C16'),
	(4, 'ADATA DDR4 XPG SPECTRIX D60G PC28800 2x8GB'),
	(5, 'Team Memory TForce Night Hawk RGB 2x16GB');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;

-- Dumping structure for table db_si.bobot
CREATE TABLE IF NOT EXISTS `bobot` (
  `id_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bobot`),
  KEY `FK_bobot_kriteria` (`id_kriteria`),
  CONSTRAINT `FK_bobot_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_si.bobot: ~4 rows (approximately)
/*!40000 ALTER TABLE `bobot` DISABLE KEYS */;
INSERT INTO `bobot` (`id_bobot`, `id_kriteria`, `value`) VALUES
	(1, 1, '0.5208'),
	(2, 2, '0.2708'),
	(3, 3, '0.1458'),
	(4, 4, '0.0625');
/*!40000 ALTER TABLE `bobot` ENABLE KEYS */;

-- Dumping structure for table db_si.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `atribut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_si.kriteria: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `atribut`) VALUES
	(1, 'kapasitas', 'benefit'),
	(2, 'tipe memory', 'benefit'),
	(3, 'timing', 'cost'),
	(4, 'harga', 'cost');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

-- Dumping structure for table db_si.matrix_keputusan
CREATE TABLE IF NOT EXISTS `matrix_keputusan` (
  `id_matrix` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `id_skala` int(11) NOT NULL,
  PRIMARY KEY (`id_matrix`),
  KEY `FK_matrix_keputusan_alternatif` (`id_alternatif`),
  KEY `FK_matrix_keputusan_bobot` (`id_bobot`),
  KEY `FK_matrix_keputusan_skala` (`id_skala`),
  CONSTRAINT `FK_matrix_keputusan_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_matrix_keputusan_bobot` FOREIGN KEY (`id_bobot`) REFERENCES `bobot` (`id_bobot`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_matrix_keputusan_skala` FOREIGN KEY (`id_skala`) REFERENCES `skala` (`id_skala`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_si.matrix_keputusan: ~20 rows (approximately)
/*!40000 ALTER TABLE `matrix_keputusan` DISABLE KEYS */;
INSERT INTO `matrix_keputusan` (`id_matrix`, `id_alternatif`, `id_bobot`, `id_skala`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 2),
	(3, 1, 3, 1),
	(4, 1, 4, 1),
	(5, 2, 1, 2),
	(6, 2, 2, 2),
	(7, 2, 3, 2),
	(8, 2, 4, 2),
	(9, 3, 1, 2),
	(10, 3, 2, 3),
	(11, 3, 3, 2),
	(12, 3, 4, 2),
	(13, 4, 1, 2),
	(14, 4, 2, 3),
	(15, 4, 3, 1),
	(16, 4, 4, 3),
	(17, 5, 1, 3),
	(18, 5, 2, 3),
	(19, 5, 3, 2),
	(20, 5, 4, 3);
/*!40000 ALTER TABLE `matrix_keputusan` ENABLE KEYS */;

-- Dumping structure for table db_si.skala
CREATE TABLE IF NOT EXISTS `skala` (
  `id_skala` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_skala`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_si.skala: ~3 rows (approximately)
/*!40000 ALTER TABLE `skala` DISABLE KEYS */;
INSERT INTO `skala` (`id_skala`, `value`, `keterangan`) VALUES
	(1, 1, 'cukup, cukup, ketat, murah'),
	(2, 2, 'besar, cepat, bagus, bagus'),
	(3, 3, 'sangat besar, sangat cepat, longgar, sangat mahal');
/*!40000 ALTER TABLE `skala` ENABLE KEYS */;

-- Dumping structure for view db_si.vmatrixkeputusan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vmatrixkeputusan` (
	`id_matrix` INT(11) NOT NULL,
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_bobot` INT(11) NOT NULL,
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_si.vnilai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vnilai` (
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai_min` BIGINT(11) NULL,
	`nilai_max` BIGINT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.vnormalisasi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vnormalisasi` (
	`id_matrix` INT(11) NOT NULL,
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_bobot` INT(11) NOT NULL,
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi` DECIMAL(23,4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.vprarangking
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vprarangking` (
	`id_matrix` INT(11) NOT NULL,
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_bobot` INT(11) NOT NULL,
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi` DECIMAL(23,4) NULL,
	`prarangking` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.vrangking
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vrangking` (
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ranking` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_jumbobot
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_jumbobot` (
	`jumlah` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_matrixkeputusan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_matrixkeputusan` (
	`id_matrix` INT(11) NOT NULL,
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_bobot` INT(11) NOT NULL,
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_nilais
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_nilais` (
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`nilaiS` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_nilaiv
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_nilaiv` (
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`nilaiV` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_normalisasi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_normalisasi` (
	`id_bobot` INT(11) NOT NULL,
	`id_kriteria` INT(11) NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah` DOUBLE NULL,
	`normalisasi_wp` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_pangkat
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_pangkat` (
	`id_matrix` INT(11) NOT NULL,
	`id_alternatif` INT(11) NOT NULL,
	`nama_alternatif` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`id_kriteria` INT(11) NOT NULL,
	`nama_kriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`atribut` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_bobot` INT(11) NOT NULL,
	`value` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi_wp` DOUBLE NULL,
	`pangkat` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.wp_sums
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_sums` (
	`jum` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_si.vmatrixkeputusan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vmatrixkeputusan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vmatrixkeputusan` AS SELECT matrix_keputusan.id_matrix, alternatif.* ,kriteria.*  ,bobot.id_bobot ,bobot.value ,skala.value AS nilai, skala.keterangan 
FROM matrix_keputusan,skala,bobot,kriteria,alternatif 
WHERE matrix_keputusan.id_alternatif=alternatif.id_alternatif 
AND matrix_keputusan.id_bobot=bobot.id_bobot 
AND matrix_keputusan.id_skala=skala.id_skala 
AND kriteria.id_kriteria=bobot.id_kriteria ;

-- Dumping structure for view db_si.vnilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vnilai`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vnilai` AS SELECT id_kriteria,nama_kriteria,atribut,
	(SELECT if(vmatrixkeputusan.atribut='benefit', MAX(nilai), MIN(nilai))) AS nilai_min,
	(SELECT if(vmatrixkeputusan.atribut='cost', MAX(nilai), MIN(nilai))) AS nilai_max
FROM vmatrixkeputusan
GROUP BY vmatrixkeputusan.id_kriteria ;

-- Dumping structure for view db_si.vnormalisasi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vnormalisasi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vnormalisasi` AS SELECT vmatrixkeputusan.* ,
	(SELECT if(vmatrixkeputusan.atribut='benefit', (vmatrixkeputusan.nilai/vnilai.nilai_max), (vnilai.nilai_min/vmatrixkeputusan.nilai))) AS normalisasi
FROM vmatrixkeputusan, vnilai
WHERE vnilai.id_kriteria=vmatrixkeputusan.id_kriteria 
GROUP BY vmatrixkeputusan.id_matrix ;

-- Dumping structure for view db_si.vprarangking
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vprarangking`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vprarangking` AS SELECT vnormalisasi.*, (vnormalisasi.value*vnormalisasi.normalisasi) AS prarangking
FROM vnormalisasi
GROUP BY vnormalisasi.id_matrix ;

-- Dumping structure for view db_si.vrangking
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vrangking`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vrangking` AS SELECT id_alternatif, nama_alternatif, SUM(prarangking) AS ranking FROM vprarangking
GROUP BY id_alternatif ;

-- Dumping structure for view db_si.wp_jumbobot
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_jumbobot`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_jumbobot` AS SELECT SUM(VALUE) AS jumlah FROM bobot ;

-- Dumping structure for view db_si.wp_matrixkeputusan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_matrixkeputusan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_matrixkeputusan` AS SELECT matrix_keputusan.id_matrix, alternatif.* ,kriteria.*  ,bobot.id_bobot ,bobot.value ,skala.value AS nilai, skala.keterangan
FROM matrix_keputusan,skala,bobot,kriteria,alternatif,wp_jumbobot 
WHERE matrix_keputusan.id_alternatif=alternatif.id_alternatif 
AND matrix_keputusan.id_bobot=bobot.id_bobot 
AND matrix_keputusan.id_skala=skala.id_skala 
AND kriteria.id_kriteria=bobot.id_kriteria ;

-- Dumping structure for view db_si.wp_nilais
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_nilais`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_nilais` AS SELECT id_alternatif, nama_alternatif, EXP(SUM(LOG(wp_pangkat.pangkat))) AS nilaiS 
FROM wp_pangkat 
GROUP BY id_alternatif ;

-- Dumping structure for view db_si.wp_nilaiv
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_nilaiv`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_nilaiv` AS SELECT wp_nilais.id_alternatif, wp_nilais.nama_alternatif, (nilaiS/jum) AS nilaiV 
FROM wp_nilaiS, wp_sums ;

-- Dumping structure for view db_si.wp_normalisasi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_normalisasi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_normalisasi` AS SELECT bobot.id_bobot, bobot.id_kriteria, kriteria.nama_kriteria, bobot.value ,kriteria.atribut, wp_jumbobot.jumlah,
	(SELECT if(kriteria.atribut='benefit', (bobot.value/wp_jumbobot.jumlah), (-(bobot.value/wp_jumbobot.jumlah)))) AS normalisasi_wp
FROM bobot, wp_jumbobot, kriteria
WHERE bobot.id_kriteria=kriteria.id_kriteria ;

-- Dumping structure for view db_si.wp_pangkat
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_pangkat`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_pangkat` AS SELECT wp_matrixkeputusan.*, wp_normalisasi.normalisasi_wp, POW(wp_matrixkeputusan.nilai,wp_normalisasi.normalisasi_wp) AS pangkat 
FROM wp_matrixkeputusan, wp_normalisasi WHERE wp_normalisasi.id_kriteria=wp_matrixkeputusan.id_kriteria ;

-- Dumping structure for view db_si.wp_sums
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_sums`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `wp_sums` AS SELECT SUM(wp_nilais.nilaiS) AS jum FROM wp_nilais ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
