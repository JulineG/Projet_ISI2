-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 12 juin 2019 à 15:28
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `isi2`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  `nomProduit` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `idCat`, `nomProduit`, `description`, `prix`, `image`) VALUES
(2, 3, 'Tarte aux fraises et crème amande', 'Tarte aux fraises à la crème amande', 6, 'tarte_fraises.jpg'),
(3, 3, 'Brownies gourmands', 'Un délicieux brownies, avec un boule de glace vanille BIO. ', 6, 'brownies.jpg'),
(4, 2, 'Poêlée veggie', 'Une poêlée végétarienne, à base de brocolis, de riz complet, des noisettes. ', 8, 'poeleveggie.jpg'),
(5, 2, 'Lotte rôtie aux citrons', 'Une queue de lotte rôtie aux citrons de Menton, tomates et olives. Accompagnée de riz basmati. ', 14, 'lotte.jpg'),
(6, 1, 'SaladeCésar', 'La mythique salade César avec des produits frais. ', 9, 'saladecesar.jpg'),
(7, 1, 'Poireaux vinaigrette ', 'Le poireaux vinaigrette de grand_mère remis au goût du jour. ', 7, 'poireaux_salade.jpg'),
(8, 1, 'Asperges, œufs mimosas', 'Asperges des Landes et oeufs mimosas. ', 8, 'asperges.jpg'),
(9, 2, 'Côtes de veau et ses petits légumes', 'Une côte de veau fermière et ses légumes de printemps. ', 15, 'cotesveau.jpg'),
(10, 2, 'Grillades de porc et risotto vert', 'Une brochette de porc aux herbes fraîches et un risotto crémeux. ', 13, 'porc_risotto.jpg'),
(11, 2, 'Légumes sautés au tofu', 'Des légumes de saison préparé façon Thaï agrémenté de tofu', 12, 'legumestofu.jpg'),
(12, 2, 'Souris d\'agneau aux épices douces', 'Une souris agneau parfumée aux épices douces, accompagnée de légumes de saison. ', 15, 'sourisepices.jpg'),
(13, 1, 'Rémoulade de radis noir et crabe', 'Du radis noir façon rémoulade et crabe', 8, 'crabe_radis.jpg'),
(14, 1, 'Fondant au Roquefort', 'De petits flans délicieusement aromatisé au Roquefort. ', 7, 'fondantroquefort.jpg'),
(15, 1, 'Carpaccio de melon et Parme', 'Carpaccio de melon et jambon de Parme AOC. ', 7, 'carpaccio-melon-parme.jpg'),
(16, 3, 'Profiteroles au café sauce chocolat chaud', 'Profiteroles au café, noix de Pécan et sauce au chocolat chaud. ', 6, 'profiteroles-au-cafe-et-noix-de-pecan-sauce-au-cho'),
(17, 3, 'Tiramisu au café', 'Un classique, le tiramisu café. ', 4, 'tiramisu.jpg'),
(18, 3, 'Glace maison', 'Différents parfums : chocolat, vanille, fraise, melon, mangue, miel, nougat. ', 5, 'glace.jpg'),
(19, 3, 'Nectarines rôties aux framboises', 'Nectarines du marché rôties aux framboises fraîches et glace vanille. ', 6, 'nectarine.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idCat` (`idCat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
