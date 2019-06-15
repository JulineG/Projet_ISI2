-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 15 juin 2019 à 15:01
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
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCat` int(11) NOT NULL,
  `nomCat` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nomCat`) VALUES
(1, 'Entrées'),
(2, 'Plats'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `idLog` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('juline191@gmail.com', '$2y$10$r.7/rLunECBEBSYk.aNaZuqrhqA9llDt3PfuPkysQnzpIkovsjd/q', '2019-05-30');

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
(6, 1, 'Salade César', 'La mythique salade César avec des produits frais. ', 9, 'saladecesar.jpg'),
(7, 1, 'Poireaux vinaigrette ', 'Le poireaux vinaigrette de grand_mère remis au goût du jour. ', 7, 'poireaux_salade.jpg'),
(8, 1, 'Asperges, œufs mimosas', 'Asperges des Landes et oeufs mimosas. ', 8, 'asperges.jpg'),
(9, 2, 'Côtes de veau et ses petits légumes', 'Une côte de veau fermière et ses légumes de printemps. ', 15, 'veau.jpg'),
(10, 2, 'Grillades de porc et risotto vert', 'Une brochette de porc aux herbes fraîches et un risotto crémeux. ', 13, 'porki.jpg'),
(11, 2, 'Légumes sautés au tofu', 'Des légumes de saison préparé façon Thaï agrémenté de tofu', 12, 'legtof.jpg'),
(12, 2, 'Souris d\'agneau aux épices douces', 'Une souris agneau parfumée aux épices douces, accompagnée de légumes de saison. ', 15, 'souris.jpg'),
(13, 1, 'Rémoulade de radis noir et crabe', 'Du radis noir façon rémoulade et crabe', 8, 'crabiche.jpg'),
(15, 1, 'Carpaccio de melon et Parme', 'Carpaccio de melon et jambon de Parme AOC. ', 7, 'melonmeleche.jpg'),
(16, 3, 'Profiteroles au café sauce chocolat chaud', 'Profiteroles au café, noix de Pécan et sauce au chocolat chaud. ', 6, 'profiter.jpg'),
(17, 3, 'Tiramisu au café', 'Un classique, le tiramisu café. ', 4, 'tira.jpg'),
(18, 3, 'Glace maison', 'Différents parfums : chocolat, vanille, fraise, melon, mangue, miel, nougat. ', 5, 'gla.jpg'),
(19, 3, 'Nectarines rôties aux framboises', 'Nectarines du marché rôties aux framboises fraîches et glace vanille. ', 6, 'nectou.jpg'),
(21, 1, 'Galettes aux herbes fraîches ', 'Galettes aux herbes fraîches et sauce au yaourt façon aïoli. ', 7, 'galettes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produitscommande`
--

CREATE TABLE `produitscommande` (
  `id` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `city` varchar(50) CHARACTER SET latin1 NOT NULL,
  `postcode` varchar(5) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(10) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `remember_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `password`, `address`, `city`, `postcode`, `phone`, `email`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'Gabrovec', 'Juline', '$2y$10$zQOI3I7chw/Prxa/etFAueQIy30HkpqyfesSwScDfQmLYo9VXOiYq', 'vbzuvbi', 'czdebfyez', '78963', '7896324510', 'juline191@gmail.com', '2019-05-29', '2019-05-29', ''),
(2, 'toto', 'titi', '$2y$10$P/Gqz0dRVFCHUazUDf9oL.FxFcXjfCEPy6TE71yTw958THJVQ72WK', 'trehgtrhh', 'trhytjtuj', '78965', '7896541235', 'toto.titi@gmail.com', '2019-06-07', '2019-06-07', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `client` (`idClient`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `produitscommande`
--
ALTER TABLE `produitscommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande` (`idCommande`),
  ADD KEY `produit` (`idProduit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `produitscommande`
--
ALTER TABLE `produitscommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `client` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `produitscommande`
--
ALTER TABLE `produitscommande`
  ADD CONSTRAINT `commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
