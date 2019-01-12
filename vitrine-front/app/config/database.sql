-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 03:22 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glazik_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(30) NOT NULL,
  `motdepasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `codeA` int(11) NOT NULL,
  `numListe` int(11) NOT NULL,
  `prix` double NOT NULL,
  `taille` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `photo` text,
  `statut` varchar(30) NOT NULL,
  `commentaire` text NOT NULL,
  `codeV` int(11) DEFAULT NULL,
  `codeDV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`codeA`, `numListe`, `prix`, `taille`, `description`, `photo`, `statut`, `commentaire`, `codeV`, `codeDV`) VALUES
(11, 5, 2, 's', 't', NULL, 'NON FOURNI', 'rrr', NULL, NULL),
(13, 7, 500, 'S', 'PULL OVER', NULL, 'NON FOURNI', 'wrijgodrug', NULL, NULL),
(16, 10, 20, 'S', 'ARTICLE HIVER', NULL, 'NON FOURNI', 'KAJFDBNKDFN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  `vue` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `id_cat`, `titre`, `date`, `contenu`, `vue`) VALUES
(1, 1, 'titre 1', '2019-01-02', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 14),
(2, 1, 'titre 2', '0000-00-00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 6),
(3, 2, 'TITRE 3', '2018-11-06', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 11);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(10) NOT NULL,
  `nom_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'Cate 1'),
(2, 'cate 2');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_article`, `auteur`, `commentaire`, `date`) VALUES
(1, 1, 'Hervé Fabrice TRA', 'RTYUYIUOIPO[', '2019-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `detailvente`
--

CREATE TABLE `detailvente` (
  `codeDV` int(11) NOT NULL,
  `codeV` int(11) NOT NULL,
  `codeA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(10) NOT NULL,
  `name_event` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(200) NOT NULL,
  `date_creation` date NOT NULL,
  `event_statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `name_event`, `date`, `lieu`, `date_creation`, `event_statut`) VALUES
(1, 'VIDE DRESSING AL PACHINO', '2019-01-13', 'istic', '2019-01-16', 'created'),
(2, 'vd saint valentino', '2019-02-16', 'insa', '2019-01-01', 'abort'),
(3, 'vd test ok', '2019-03-03', 'Abidjan', '2019-01-08', 'abort'),
(4, 'VIDE DRESSING HALLOWEEN', '2019-03-04', 'Rennes, France', '2019-01-08', 'start'),
(5, 'MARCHE HIVER', '2019-01-18', 'Berlin, Allemagne', '2019-01-08', 'abort');

-- --------------------------------------------------------

--
-- Table structure for table `liste`
--

CREATE TABLE `liste` (
  `numListe` int(11) NOT NULL,
  `id_event` int(10) DEFAULT NULL,
  `nom_liste` varchar(255) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `trigramme` varchar(30) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liste`
--

INSERT INTO `liste` (`numListe`, `id_event`, `nom_liste`, `statut`, `trigramme`, `date_creation`) VALUES
(5, 4, 'tt', 'en vente', 'YKO', '2019-01-08'),
(7, NULL, 'tttttt', 'en cours', 'YKO', '2019-01-08'),
(10, 0, 'LISTE HIVER', 'en cours', 'YKO', '2019-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `dates`) VALUES
(0, 'illchangeafrica@gmail.com', '2019-01-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `code` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`code`, `nom`) VALUES
(1, 'presentation');

-- --------------------------------------------------------

--
-- Table structure for table `parametre`
--

CREATE TABLE `parametre` (
  `id` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parametre`
--

INSERT INTO `parametre` (`id`, `x`, `y`, `z`) VALUES
(1, 9, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `texte`
--

CREATE TABLE `texte` (
  `codetext` int(11) NOT NULL,
  `description` text NOT NULL,
  `codepage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texte`
--

INSERT INTO `texte` (`codetext`, `description`, `codepage`) VALUES
(1, 'super cool et class AND DONE B et herve de la coronia elrtelrKJYLAKDHTKLHLKFNBLAKFMBowrijhgoieRJHOirhoieRHOirheowiRHOiroesoihaeotdihjoaeitjhoeaitjhoaet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `civilite` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typeUser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trigramme` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `cle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `dateNaissance`, `civilite`, `email`, `password`, `typeUser`, `numero`, `trigramme`, `actif`, `cle`, `adresse`, `cp`) VALUES
(10, 'KOKO', 'Yves Olivier', '2019-01-30', 'Monsieur', 'devops.integrale@gmail.com', '$2y$10$1skRGOgqOs78OFvWKjQqNOpfqcGnKjEaxOE062e3N9jRKU6TA8MNW', 'vendeur', '77971622', 'YKO', 1, 'verified', 'xavier grall avenue', ''),
(14, 'Edgar', 'LeBreton', '2019-01-30', 'Monsieur', 'admin@mail.com', '$2y$10$ylEgcXN8lAmztrU3Oc1ue.ddDCA6fzEzXLlUaiwY5I5vBPJYedEJK', 'organisateur', '0909123456', 'LED', 1, '0fe3fb8b71a7899c1d1712127776a5ae', 'Terasse superficile de magne', ''),
(15, 'Tra bi', 'Fabio', '1998-01-18', 'Monsieur', 'fabio@mail.com', '$2y$10$GPgE0WLMZEVD1DOGR6K/wer6l84QXu5x6n2tymJhZ2QGh3/N5dgsm', 'vendeur', '0719227853', 'FTR', 0, 'c9e5dd07e4d5763665f98d1d11f50bb4', 'Xavier grall du jardiens', '44986');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `codeV` int(11) NOT NULL,
  `dateV` date NOT NULL,
  `acheteur` text NOT NULL,
  `acheteur_numero` varchar(30) NOT NULL,
  `acheteur_adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`codeA`),
  ADD KEY `codeV` (`codeV`),
  ADD KEY `codeDV` (`codeDV`),
  ADD KEY `numListe` (`numListe`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `index_cat` (`id_cat`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `index_article_commentaire` (`id_article`);

--
-- Indexes for table `detailvente`
--
ALTER TABLE `detailvente`
  ADD PRIMARY KEY (`codeDV`),
  ADD KEY `codeV` (`codeV`),
  ADD KEY `codeA` (`codeA`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`numListe`),
  ADD KEY `trigramme` (`trigramme`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`codetext`),
  ADD KEY `codepage` (`codepage`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`codeV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `codeA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detailvente`
--
ALTER TABLE `detailvente`
  MODIFY `codeDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `liste`
--
ALTER TABLE `liste`
  MODIFY `numListe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `texte`
--
ALTER TABLE `texte`
  MODIFY `codetext` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `codeV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`numListe`) REFERENCES `liste` (`numListe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `texte`
--
ALTER TABLE `texte`
  ADD CONSTRAINT `texte_ibfk_1` FOREIGN KEY (`codepage`) REFERENCES `page` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
