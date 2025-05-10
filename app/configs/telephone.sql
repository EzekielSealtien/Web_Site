-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `telephone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `telephone`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- TABLE : role
CREATE TABLE `role` (
  `id_role` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `role` (`id_role`, `description`) VALUES
(1, 'admin'),
(2, 'client');

-- TABLE : utilisateur
CREATE TABLE `utilisateur` (
  `id_utilisateur` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `telephone` VARCHAR(20) DEFAULT NULL,
  `date_naissance` DATE DEFAULT NULL,
  `id_role` INT(11) DEFAULT NULL,
  `mot_de_passe` TEXT NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `fk_role_utilisateur` (`id_role`),
  CONSTRAINT `fk_role_utilisateur` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `telephone`, `date_naissance`, `id_role`, `mot_de_passe`) VALUES
(1, 'kamgue Pharel', 'luc duplex', 'lucduplex@outlook.com', '514-946-7048', '2023-05-12', 1, '...'),
(4, 'ezekiel', 'tene', 'ezekiel@yahoo.fr', '4562522582', '2003-12-11', 2, '...');

-- TABLE : adresse
CREATE TABLE `adresse` (
  `id_adresse` INT(11) NOT NULL AUTO_INCREMENT,
  `rue` VARCHAR(100) NOT NULL,
  `ville` VARCHAR(100) NOT NULL,
  `code_postal` VARCHAR(10) NOT NULL,
  `province` VARCHAR(100) NOT NULL,
  `defaut` INT(11) DEFAULT NULL,
  `id_utilisateur` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `fk_utilisateur` (`id_utilisateur`),
  CONSTRAINT `fk_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `adresse` (`id_adresse`, `rue`, `ville`, `code_postal`, `province`, `defaut`, `id_utilisateur`) VALUES
(1, '17115 rue emile-nelligan', 'Montréal', 'H9J2V6', 'QC', 1, 1),
(4, 'saint laurent', 'Longueuil', 'H2J3G4', 'QC', 1, 4);

-- TABLE : adresseutilisateur
CREATE TABLE `adresseutilisateur` (
  `id_utilisateur` INT(11) DEFAULT NULL,
  `id_adresse` INT(11) DEFAULT NULL,
  KEY `fk_adresse_utilisateur` (`id_adresse`),
  KEY `fk_utilisateur_adresse` (`id_utilisateur`),
  CONSTRAINT `fk_adresse_utilisateur` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`) ON UPDATE CASCADE,
  CONSTRAINT `fk_utilisateur_adresse` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- TABLE : telephone
CREATE TABLE `telephone` (
  `id_telephone` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prix` INT(10) DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `courte_description` VARCHAR(255) DEFAULT NULL,
  `quantite` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `telephone` (`id_telephone`, `nom`, `prix`, `description`, `courte_description`, `quantite`) VALUES
(2, 'Iphone15', 1800, 'en stock', 'iphone 15, 1To, red', 25),
(3, 'iphone14 pro Max', 1600, 'en stock', 'Iphone14 pro Max 128Go', 24),
(4, 'Iphone12 pro Max', 1200, 'en stock', 'Iphone12 Pro Max 256Go Blue', 14),
(6, 'ipad 11', 1766, 'en stock', 'ipad 11 pro, 11e génération', 89),
(7, 'Iphone15 pro Max', 1950, 'en stock', 'Iphone15 pro Max 512Go White Titanium', 12),
(8, 'Iphone13 pro Max Green', 1150, 'en stock', 'Iphone 13 Pro Max Green 512Go', 54),
(13, 'Iphone15 plus', 1250, 'en stock', 'Iphone 15 plus', 3);

-- TABLE : image
CREATE TABLE `image` (
  `id_image` INT(11) NOT NULL AUTO_INCREMENT,
  `id_telephone` INT(11) DEFAULT NULL,
  `chemin_image` TEXT DEFAULT NULL,
  PRIMARY KEY (`id_image`),
  KEY `fk_image_tel` (`id_telephone`),
  CONSTRAINT `fk_image_tel` FOREIGN KEY (`id_telephone`) REFERENCES `telephone` (`id_telephone`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `image` (`id_image`, `id_telephone`, `chemin_image`) VALUES
(1, 2, 'assets/images/iPhone15_1To_red.jpg'),
(2, 3, 'assets/images/iPhone14ProMax_128GB.png'),
(3, 4, 'assets/images/Iphone12ProMax_Blue.png'),
(4, 6, 'assets/images/iPad11.webp'),
(5, 7, 'assets/images/Iphone15ProMax_512GB_WhiteTitanium.jpg'),
(6, 8, 'assets/images/iphone13ProMaxG.jpeg'),
(7, 13, 'assets/images/iPhone15Plus.png');

-- TABLE : commande
CREATE TABLE `commande` (
  `id_commande` INT(11) NOT NULL AUTO_INCREMENT,
  `quantite` INT(11) DEFAULT NULL,
  `prix` VARCHAR(10) DEFAULT NULL,
  `statut` VARCHAR(50) DEFAULT NULL,
  `date_creation` DATE DEFAULT NULL,
  `id_utilisateur` INT(11) DEFAULT NULL,
  `mode_paiement` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `commande` (`id_commande`, `quantite`, `prix`, `statut`, `date_creation`, `id_utilisateur`, `mode_paiement`) VALUES
(19, 129, '20285.88', 'En cours', '2024-04-23', 1, 'Paypal'),
(20, 9, '21780.65', 'En cours', '2024-04-23', 1, 'Paypal'),
(21, 20, '40302.8', 'En cours', '2024-04-23', 1, 'Paypal');

-- TABLE : telephonecommande
CREATE TABLE `telephonecommande` (
  `id_telephone` INT(11) DEFAULT NULL,
  `id_commande` INT(11) DEFAULT NULL,
  `quantite` INT(11) DEFAULT NULL,
  KEY `fk_tel_commande` (`id_telephone`),
  KEY `fk_commande_tel` (`id_commande`),
  CONSTRAINT `fk_tel_commande` FOREIGN KEY (`id_telephone`) REFERENCES `telephone` (`id_telephone`),
  CONSTRAINT `fk_commande_tel` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
