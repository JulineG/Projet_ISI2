-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 12 juin 2019 à 14:21
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

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
(1, 1, 'Salade', 'Salade verte, tomates, oeufs', 9, 'salade.jpg'),
(2, 3, 'Tarte aux fraises', 'Tarte aux fraises accompagnée d\'une boule de glace vanille.', 6, 'tarte_fraises.jpg');

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
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
