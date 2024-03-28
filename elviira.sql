-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2024 at 02:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elviira`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int NOT NULL,
  `dateCommande` date NOT NULL,
  `heureCommande` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `adresseLivraisonCommande` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `indicationLivraisonCommande` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numPanier` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`numCommande`, `dateCommande`, `heureCommande`, `adresseLivraisonCommande`, `indicationLivraisonCommande`, `numPanier`) VALUES
(1, '2023-12-05', '12:00:00', '123 Main St', 'Near the park', 1),
(2, '2023-12-06', '13:30:00', '456 Oak St', 'Apartment 3B', 2),
(3, '2023-12-07', '15:45:00', '789 Pine St', 'Ring the bell', 3);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `numFacture` int NOT NULL,
  `dateFacture` date NOT NULL,
  `heureFacture` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numCommande` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`numFacture`, `dateFacture`, `heureFacture`, `numCommande`) VALUES
(1, '2023-12-05', '12:30:00', 1),
(2, '2023-12-06', '14:00:00', 2),
(3, '2023-12-07', '16:15:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `nomMarque` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`nomMarque`) VALUES
('Dior'),
('Gucci'),
('Hermès'),
('Louis-Viton');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `numPanier` int NOT NULL,
  `totalPanier` float NOT NULL,
  `numProduit` int NOT NULL,
  `numUser` int NOT NULL,
  `numPromotion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`numPanier`, `totalPanier`, `numProduit`, `numUser`, `numPromotion`) VALUES
(1, 100, 1, 1, 1),
(2, 150, 2, 2, 2),
(3, 200, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `numProduit` int NOT NULL,
  `nomProduit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `couleurProduit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `prixUnitaireProduit` float NOT NULL,
  `descriptionProduit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `qteProduit` int NOT NULL,
  `nomTypeProduit` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `nomMarque` varchar(255) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`numProduit`, `nomProduit`, `couleurProduit`, `prixUnitaireProduit`, `descriptionProduit`, `qteProduit`, `nomTypeProduit`, `nomMarque`) VALUES
(4, 'Jupe Plissé Arpi', 'Gris', 20, 'Jupe à motifqui vous accompagnera très bien dans la vie de tous les jours', 50, 'Jupe', 'Louis-Viton'),
(5, 'Sapato Arpi', 'Noir', 50, 'Chaussure de luxe pour le style', 20, 'Chaussure', 'Gucci'),
(6, 'Chaussure Luxe Noir Arpi', 'Noir', 80, 'Chaussure spéciale noir fait avec du cuir haut de qualité', 25, 'Chaussure', 'Hermès'),
(7, 'Chaussure Arpi', 'Noir', 20, 'Chaussure pour la vie de tous les jours', 50, 'Chaussure', 'Hermès'),
(8, 'Chaussure Luxe Arpi', 'Maron', 50, 'Chaussure maron qui iras très bien avec les ensembles que vous pourrez trouver', 70, 'Chaussure', 'Hermès'),
(9, 'Chaussure Talon Arpi', 'Maron', 80, 'Magnigique talon à mettre pour les occasions', 60, 'Chaussure', 'Dior'),
(10, 'Ballerine Luxe Arpi', 'Beige', 20, 'Magnifique chaussure à mettre pour vos sorties en villes', 40, 'Chaussure', 'Dior'),
(11, 'Ensemble Arpi', 'Blanc', 50, 'Ensemble tendance à mettre dans la vie de tous les jours', 30, 'Ensemble', 'Dior'),
(12, 'Talon Arpi', 'Beige', 50, 'Magnifique soiré pour illuminé vos soirées', 100, 'Chaussure', 'Dior');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `numPromotion` int NOT NULL,
  `codePromotion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`numPromotion`, `codePromotion`) VALUES
(1, 'BLACKFRIDAY'),
(2, 'HOLIDAYSALE'),
(3, 'FREESHIPPING');

-- --------------------------------------------------------

--
-- Table structure for table `taille`
--

CREATE TABLE `taille` (
  `nomTaille` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taille`
--

INSERT INTO `taille` (`nomTaille`) VALUES
('30'),
('31'),
('32'),
('33'),
('34'),
('35'),
('36'),
('37'),
('38'),
('39'),
('40'),
('41'),
('42'),
('43'),
('44'),
('45'),
('46'),
('47'),
('48'),
('L'),
('M'),
('S'),
('XL'),
('XS'),
('XXL'),
('XXXL'),
('XXXXL');

-- --------------------------------------------------------

--
-- Table structure for table `tailleproduit`
--

CREATE TABLE `tailleproduit` (
  `numProduit` int NOT NULL,
  `nomTaille` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tailleproduit`
--

INSERT INTO `tailleproduit` (`numProduit`, `nomTaille`) VALUES
(11, 'L'),
(11, 'M'),
(11, 'S'),
(11, 'XL'),
(11, 'XS'),
(11, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduit`
--

CREATE TABLE `typeproduit` (
  `nomTypeProduit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `typeproduit`
--

INSERT INTO `typeproduit` (`nomTypeProduit`) VALUES
('Accessoire'),
('Chaussure'),
('Ensemble'),
('Jupe'),
('Pantalon'),
('Short');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `numUser` int NOT NULL,
  `nomUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `prenomUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `adresseUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `villeUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `cpUser` int NOT NULL,
  `mailUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `telUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `permUser` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `passWd` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`numUser`, `nomUser`, `prenomUser`, `adresseUser`, `villeUser`, `cpUser`, `mailUser`, `telUser`, `permUser`, `passWd`) VALUES
(1, 'guery', 'matheo', '10 bis rue de la canivole', 'chatenoy le royal', 71880, 'matheoo.guery@gmail.com', '0685109740', 'motherFuckingAdmin', '$2y$10$xD3yjNSlHo67yClgAgk56ua7fHq.Kp3GEaIwuO74c42ZlCPogA7Da'),
(2, 'hamidou', 'yanis', '16 place carnot', 'Lyon', 69002, 'yanishamidou0@gmail.com', '0646676087', 'motherFuckingAdmin', '$2y$10$gdgGITNmR.STTu/32.kbju3.7ZyJDCmMJuCuCfL7/mpPAVXotJK8u'),
(6, 'test', 'test', 'test', 'test', 5, 'test', '5', 'paysant', '$2y$10$vPi1c5T8GIFTAo2neZO5JeR3swXSmBw0FfS3d/zoUnCpHd1Or9i1m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `numPanier` (`numPanier`),
  ADD KEY `numCommande` (`numCommande`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`numFacture`),
  ADD KEY `fk_facture_commande` (`numCommande`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`nomMarque`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`numPanier`),
  ADD KEY `numProduit` (`numProduit`,`numUser`,`numPromotion`),
  ADD KEY `fk_panier_user` (`numUser`),
  ADD KEY `fk_panier_promotion` (`numPromotion`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`),
  ADD KEY `nomTypeProduit` (`nomTypeProduit`),
  ADD KEY `nomMarque` (`nomMarque`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`numPromotion`),
  ADD KEY `numPromotion` (`numPromotion`);

--
-- Indexes for table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`nomTaille`),
  ADD KEY `nomTaille` (`nomTaille`);

--
-- Indexes for table `tailleproduit`
--
ALTER TABLE `tailleproduit`
  ADD PRIMARY KEY (`numProduit`,`nomTaille`),
  ADD KEY `numProduit` (`numProduit`),
  ADD KEY `nomTaille` (`nomTaille`),
  ADD KEY `numProduit_2` (`numProduit`,`nomTaille`);

--
-- Indexes for table `typeproduit`
--
ALTER TABLE `typeproduit`
  ADD PRIMARY KEY (`nomTypeProduit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`numUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `numFacture` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `numPanier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `numPromotion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `numUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_panier` FOREIGN KEY (`numPanier`) REFERENCES `panier` (`numPanier`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_facture_commande` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`),
  ADD CONSTRAINT `fk_panier_promotion` FOREIGN KEY (`numPromotion`) REFERENCES `promotion` (`numPromotion`),
  ADD CONSTRAINT `fk_panier_user` FOREIGN KEY (`numUser`) REFERENCES `user` (`numUser`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_marque` FOREIGN KEY (`nomMarque`) REFERENCES `marque` (`nomMarque`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_typeproduit` FOREIGN KEY (`nomTypeProduit`) REFERENCES `typeproduit` (`nomTypeProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tailleproduit`
--
ALTER TABLE `tailleproduit`
  ADD CONSTRAINT `fk_tailleproduit_produit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`),
  ADD CONSTRAINT `fk_tailleproduit_taille` FOREIGN KEY (`nomTaille`) REFERENCES `taille` (`nomTaille`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
