-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for njangui_db
DROP DATABASE IF EXISTS `njangui_db`;
CREATE DATABASE IF NOT EXISTS `njangui_db` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `njangui_db`;

-- Dumping structure for table njangui_db.depot
DROP TABLE IF EXISTS `depot`;
CREATE TABLE IF NOT EXISTS `depot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.depot: ~6 rows (approximately)
DELETE FROM `depot`;
/*!40000 ALTER TABLE `depot` DISABLE KEYS */;
INSERT INTO `depot` (`id`, `id_membre`, `id_reunion`, `montant`, `date`) VALUES
	(1, 1, 2, 60000, '2020-12-20'),
	(2, 3, 2, 35000, '2021-01-02'),
	(3, 1, 2, 15000, '2021-01-01'),
	(5, 5, 7, 15000, '2021-01-03'),
	(6, 4, 2, 20000, '2021-01-04'),
	(7, 6, 2, 25000, '2021-01-10');
/*!40000 ALTER TABLE `depot` ENABLE KEYS */;

-- Dumping structure for table njangui_db.emprunt
DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `reste` int(11) NOT NULL DEFAULT '0',
  `montant_interet` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table njangui_db.emprunt: ~4 rows (approximately)
DELETE FROM `emprunt`;
/*!40000 ALTER TABLE `emprunt` DISABLE KEYS */;
INSERT INTO `emprunt` (`id`, `id_membre`, `id_reunion`, `montant`, `reste`, `montant_interet`, `date`) VALUES
	(4, 2, 2, 40000, 0, 44000, '2021-02-11'),
	(5, 4, 2, 30000, 0, 33000, '2021-01-20'),
	(6, 2, 2, 70000, 20000, 77000, '2021-01-10'),
	(7, 4, 2, 40000, 10000, 44000, '2021-01-20');
/*!40000 ALTER TABLE `emprunt` ENABLE KEYS */;

-- Dumping structure for table njangui_db.log
DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reunion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `action` varchar(250) COLLATE latin1_general_ci DEFAULT '',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.log: ~0 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table njangui_db.membre
DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reunion` int(11) NOT NULL,
  `nom_complet` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `adresse` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `cni` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `contact` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `date_naissance` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `lieu_naissance` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `statut` tinyint(11) NOT NULL DEFAULT '0',
  `cumul_interet` int(11) NOT NULL DEFAULT '0',
  `solde` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.membre: ~6 rows (approximately)
DELETE FROM `membre`;
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id`, `id_reunion`, `nom_complet`, `adresse`, `cni`, `contact`, `date_naissance`, `lieu_naissance`, `statut`, `cumul_interet`, `solde`) VALUES
	(1, 2, 'Jean Ateba ', 'kondengui  ', '123123123  ', '677667788  ', '1987-06-18  ', 'labas  ', 1, 10747, 58729),
	(2, 2, 'Membre 1', 'kondengui', '123', '655667788', '1990-02-12', 'yaoundé', 1, 0, 0),
	(3, 2, 'Membre 2', 'ekounou', '123', '655443322', '1988-12-10', 'sangmelima', 1, 5015, 27522),
	(4, 2, 'atangana ebolo ', 'mvan  2', '123 ', '123123 ', '1990-02-12 ', 'yaoundé ', 1, 1593, 15755),
	(5, 7, 'membre azady 1', 'kondengui', '123', '6557788989', '1988-02-12', 'yaoundé', 1, 0, 15000),
	(6, 2, 'nom du mebre', 'ekounou', '1233', '655445544', '1980-02-12', 'sangmelima', 1, 645, 23400);
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Dumping structure for table njangui_db.reunion
DROP TABLE IF EXISTS `reunion`;
CREATE TABLE IF NOT EXISTS `reunion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `taux` int(11) DEFAULT '5',
  `statut` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.reunion: ~8 rows (approximately)
DELETE FROM `reunion`;
/*!40000 ALTER TABLE `reunion` DISABLE KEYS */;
INSERT INTO `reunion` (`id`, `nom`, `description`, `taux`, `statut`) VALUES
	(1, 'Réunion 1  ù', 'Lorem ipsum dolor  ', 5, 0),
	(2, 'Réunion 2', 'Lorem ipsum dolor 2', 10, 1),
	(3, 'test inactif', 'localhost', 5, 1),
	(4, 'Réunion 3', 'Lorem ipsum dolor 3', 5, 1),
	(5, 'aa edited ', 'lolkjl', 78, 0),
	(6, 'Test', 'lorem ipsum', 7, 0),
	(7, 'AZADY ', 'Réunion azady edited', 5, 1),
	(8, 'Soeurs unies', 'lorem ipsum ', 10, 1);
/*!40000 ALTER TABLE `reunion` ENABLE KEYS */;

-- Dumping structure for table njangui_db.transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reunion` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_emprunt` int(11) NOT NULL,
  `montant` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.transaction: ~15 rows (approximately)
DELETE FROM `transaction`;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`id`, `id_reunion`, `id_membre`, `id_emprunt`, `montant`, `date`) VALUES
	(4, 2, 1, 2, '0', '2021-02-11'),
	(5, 2, 3, 2, '0', '2021-02-11'),
	(6, 2, 1, 2, '0', '2021-02-11'),
	(7, 2, 1, 4, '0', '2021-01-20'),
	(8, 2, 3, 4, '0', '2021-01-20'),
	(9, 2, 1, 4, '0', '2021-01-20'),
	(10, 2, 1, 2, '9338', '2021-01-10'),
	(11, 2, 3, 2, '5278', '2021-01-10'),
	(12, 2, 1, 2, '2233', '2021-01-10'),
	(13, 2, 4, 2, '3045', '2021-01-10'),
	(14, 2, 1, 4, '3800', '2021-01-20'),
	(15, 2, 3, 4, '2200', '2021-01-20'),
	(16, 2, 1, 4, '900', '2021-01-20'),
	(17, 2, 4, 4, '1200', '2021-01-20'),
	(18, 2, 6, 4, '1600', '2021-01-20');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table njangui_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reunion` int(11) DEFAULT NULL,
  `username` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `statut` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table njangui_db.user: ~8 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `id_reunion`, `username`, `password`, `statut`) VALUES
	(1, 2, 'admin', '60bddb16409a2baf76936619afecf778dabe68de', 1),
	(2, 4, 'user', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 0),
	(3, 4, 'user1 edited ', '91c202258addba1980c83a6da0a2507a68a2d815', 1),
	(4, 2, 'test', '4028a0e356acc947fcd2bfbf00cef11e128d484a', 0),
	(5, 2, 'test 4', '4028a0e356acc947fcd2bfbf00cef11e128d484a', 1),
	(6, 4, 'user', '60bddb16409a2baf76936619afecf778dabe68de', 1),
	(7, 7, 'azady', '4c7e65f353a7039d33e8d9ea040ce8acdaa7fbd9', 1),
	(8, 8, 'soeurs', '05c4731d2c75aa6d196c687d9d342afe855047f5', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
