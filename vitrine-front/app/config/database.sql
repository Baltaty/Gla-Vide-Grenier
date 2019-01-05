-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 04:15 PM
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
  `prix` double NOT NULL,
  `taille` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `photo` int(11) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `commentaire` varchar(30) NOT NULL,
  `codeV` int(11) NOT NULL,
  `codeDV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'titre 1', '2019-01-02', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 10),
(2, 1, 'titre 2', '0000-00-00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 1),
(3, 2, 'TITRE 3', '2018-11-06', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 9);

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
-- Table structure for table `liste`
--

CREATE TABLE `liste` (
  `numListe` int(11) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `trigramme` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `parametre`
--

CREATE TABLE `parametre` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `texte`
--

CREATE TABLE `texte` (
  `codetext` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `codepage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` text COLLATE utf8_unicode_ci NOT NULL,
  `civilite` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typeUser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trigramme` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `cle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `dateNaissance`, `civilite`, `email`, `password`, `typeUser`, `numero`, `trigramme`, `actif`, `cle`) VALUES
(10, 'KOKO', 'Yves Olivier', 'Thu Jan 03 2019 00:00:00 GMT+0100 (heure normale d’Europe centrale)', 'Monsieur', 'devops.integrale@gmail.com', '$2y$10$.98KyNmsVbbOg95WjckSZeKp.McKS.77fE.bOmCP/yY1uuIbX1Li6', 'Vendeur', '02314458', 'YKO', 1, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

CREATE TABLE `vendeur` (
  `trigramme` varchar(30) NOT NULL,
  `motdepasse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `codeV` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `codeA` int(11) NOT NULL,
  `codeDV` int(11) NOT NULL
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
  ADD KEY `codeDV` (`codeDV`);

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
-- Indexes for table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`trigramme`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`codeV`),
  ADD KEY `codeA` (`codeA`),
  ADD KEY `codeDV` (`codeDV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `codeA` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detailvente`
--
ALTER TABLE `detailvente`
  MODIFY `codeDV` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `texte`
--
ALTER TABLE `texte`
  MODIFY `codetext` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `codeV` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`codeDV`) REFERENCES `detailvente` (`codeDV`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `detailvente`
--
ALTER TABLE `detailvente`
  ADD CONSTRAINT `detailvente_ibfk_1` FOREIGN KEY (`codeV`) REFERENCES `vente` (`codeV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`trigramme`) REFERENCES `vendeur` (`trigramme`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `texte`
--
ALTER TABLE `texte`
  ADD CONSTRAINT `texte_ibfk_1` FOREIGN KEY (`codepage`) REFERENCES `page` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`codeA`) REFERENCES `article` (`codeA`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`codeDV`) REFERENCES `detailvente` (`codeDV`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
