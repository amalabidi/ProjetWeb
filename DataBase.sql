-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 juil. 2020 à 13:28
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pausedouceur`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `prix` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `description`, `prix`, `image`, `categorie`) VALUES
(38, 'Bouchée au sauman', 'Notre pâtisserie donnent à chaque pièce de bouchée au saumon salé une touche d’amour pleine de professionnalisme et de bonne volonté de créativité.\r\nEn fait, l’utilisation des crevettes, des poulpes, des œufs de seiches, du avocat est d’abord liée à la fraîcheur.\r\nEnsuite, à des calibres bien définis et enfin à une mise en place dans le design final de la pièce, qui encouragent vraiment à la dégustation et au partage de ce moment formidable.', 80, 'bouchéeAuSaumanEtAvocat.jpg', 'Bouchée froide'),
(39, 'Banathej', '\r\nCette fine bouchée salée, composée  des crevettes, des poulpes, des œufs de seiches, du calamar est d’abord liée à la fraîcheur.\r\nEnsuite, à des calibres bien définis et enfin à une mise en place dans le design final de la pièce, qui encouragent vraiment à la dégustation et au partage de ce moment formidable.\r\n\r\n\r\n\r\n', 40, 'Banathej.jpg', 'Bouchée traditionnelle'),
(40, 'Brochette de beuf', 'Envie de saveurs raffinées  ? Laissez-vous tenter par nos savoureuses brochettes de bœuf , de gruyère et de sauce soja . Raffinées et gourmandes, elles donneront une saveur des plus chics à vos réceptions.', 80, 'bdebouef.jpg', 'Brochette'),
(41, 'Brochette de Gambas', 'Cette savoureuse brochette fraîche et gourmande à base gambas épicé .Idéale pour vos cérémonies de mariage ou soirées.', 90, 'bdegambas.jpeg', 'Brochette'),
(42, 'Brochette de poisson', 'brochette poisson: Une brochette de filet de poisson blanc garnie de champignons de paris et de parmesan.Idéale pour vos cérémonies de mariage ou soirées.', 80, 'bdepoisson.jpg', 'Brochette'),
(43, 'Baklawa pistache', 'Ce dessert traditionnel oriental commun à tous les pays de l\'empire ottoman a été revisité par les tunisiens. Composé de plusieurs couches superposées de pâte phyllo garnies d\'amande parfumée à l\'écorce d\'orange, c\'est un incontournable pour les cérémonies de mariages et de naissance!', 50, 'blakwa.jpg', 'Pâtisserie traditionnelle'),
(44, 'Bouchée au crabe et au fromage', 'Notre pâtisserie donnent à chaque pièce de bouchée au crabe et au fromage salé une touche d’amour pleine de professionnalisme et de bonne volonté de créativité.nous prenons l\'envie de savourer des plats légers, qui nous rapprochent un peu plus de la mer et des vacances.\r\n\r\n\r\n\r\n', 60, 'BouchéeAuCrabeEtAuFromage.jpg', 'Bouchée froide'),
(45, 'Bouchée au gravlax', 'Ces bouchées de gravlax sur pain multigrain sont aussi savoureuses que jolies. Le gout fruité du poisson est rafraîchissant . L\'onctuosité de la crème-moutarde est une merveille.', 80, 'BouchéeDeGravlaxSurPain.jpg', 'Bouchée froide'),
(46, 'Brochette de poulet', 'Envie de saveurs raffinées et exotiques ? Laissez-vous tenter par nos savoureuses brochettes de poulet assaisonnées à l\'asiatique. Raffinées et gourmandes, elles donneront une saveur venue d\'ailleurs à vos réceptions.', 50, 'bpoulet.jpg', 'Brochette'),
(47, 'Chaussont Poulet', 'Cette fine bouchée salée, composée d\'une farce au poulet et thon agrémentée de câpres vous surprendra agréablement ! Cette fine bouchée salée est idéale pour recevoir lors de vos soirées et cocktails dinatoires.', 60, 'chaussant.jpg', 'Bouchée traditionnelle'),
(48, 'Cheese Cake', 'Une alliance délicate d\'une crème de fromage, d\'une compote de framboise, de la rose et d\'un streusel amande pour donner une touche croustillante à cette douceur.A savourer en dessert ou à l\'heure du thé pour un vrai moment gourmand.', 7, 'cheesecake.jpg', 'Petit gâteau'),
(49, 'Coffret Chocolat', 'Un savoir-faire artisanal qui donne un croquant intense et un fondant somptueux, pour une explosion de sensations assurée.', 80, 'coffret.jpg', 'Coffret'),
(50, 'Coffret Hlou', 'Une élégante séléction spécial aid rassemblant une variété de pâtisseries à la douce saveur de l\'amande.', 70, 'cofhlou.jpg', 'Coffret'),
(51, 'Coffret Macaron', 'Qu\'ils soient chocolatés, fruités ou café, surprenez vos palais et celui de vos invités par la finesse de ces macarons qui allient le fondant d’une ganache gourmande et le croustillant d\'une coque lisse et élégante. A servir à vos convives lors de vos réceptions ou en mignardise pour accompagner un thé ou un café.', 90, 'cofmac.jpg', 'Coffret'),
(52, 'Doigt de Fatma', 'composés de poulet relevé par une délicieuse association de fromage et de câpres leur procurant une saveur parfumée et légèrement aigrelette! Cette fine bouchée salée est idéale pour recevoir lors de vos soirées et cocktails dinatoires.', 40, 'doitDeFatma.jpg', 'Bouchée traditionnelle'),
(53, 'Frikasé', 'Nos savoureux fricassés tunisiens revisités dans un format cérémonie, sont idéals pour les petites faims mais également pour toutes vos réceptions.', 40, 'frikasé.jpg', 'Bouchée traditionnelle'),
(54, 'Pièce Montée Chocolat', 'Moderne et chic, cette pièce montée est également riche en saveurs et textures.\r\nUne création gourmande et raffinée, parfaite pour un mariage, des fiançailles, cocktails d\'entreprise ou tout autres événements festifs.', 500, 'gatchoc.jpg', 'Gâteau'),
(55, 'Gateau Chocolat', 'Un dessert tout chocolat mariant force et finesse avec un biscuit chocolaté mêlé à une onctueuse mousse au chocolat noir et garni dune ganache chocolat.A savourer en dessert ou à l heure du thé pour un vrai moment gourmand.', 80, 'gateauchocolat.jpg', 'Gâteau'),
(56, 'Gateau Fraise', 'Fraisier ce dessert allie la légèreté de la génoise à la délicatesse de la crème chantilly et la note acidulée des fraises. Parfait pour accompagner votre café ou pour une soirée gourmande.', 80, 'gatfre.jpg', 'Gâteau'),
(57, 'Hamburger Poulet', 'Le burger est tendance surtout lorsqu\'il est revisité par nos chefs avec une touche gastronomique . Cette fine bouchée salée est idéale pour recevoir lors de vos soirées et cocktails dinatoires.', 60, 'HamburgerPoulet.jpg', 'Bouchée chaude'),
(58, 'Kaak Warka', 'Ce délicieux gâteau traditionnel de couleur blanche et en forme d\'anneau, est composé d\'une fine pâte sucrée à l\'extérieur fourré d\'une pâte fondante à l\'amande et parfumée à l\'eau de rose. C\'est un incontournable pour toutes vos cérémonies et célébrations.', 60, 'kaak.jpg', 'Pâtisserie traditionnelle'),
(59, 'Quiche Poulet', 'Une mini quiche orientale à base de poulet, piment grillés, fromage . Idéale pour vos cérémonies de mariage ou soirées.', 55, 'kuichePoulet.jpg', 'Bouchée chaude'),
(60, 'Millefeuille', 'Ce grand classique est le résultat d\'une superposition de fines couches feuilletées sur lit de crème à la vanille le tout revêtu d\'une légère couche croustillante caramélisée.A savourer en dessert ou à l\'heure du thé pour un vrai moment gourmand.', 5, 'millefeuille.jpg', 'Petit gâteau'),
(61, 'Opera', 'Le grand classique des desserts marie un fin biscuit imbibé de sirop au café surmonté d\'une onctueuse crème café à une délicate ganache au chocolat. A savourer en dessert ou à l heure du thé pour un vrai moment gourmand.', 7, 'opera.jpg', 'Petit gâteau'),
(62, 'Panini', 'Un panini gourmand garni de saumon, basilic et beurre. Parfait pour vos après-midis ,anniversaires ou soirées.', 10, 'Panini.jpg', 'Bouchée chaude'),
(63, 'Panna Cotta', 'une panna cotta vanillée et un coulis de fraises relevé par un peu de menthe ! Un dessert simple et rapide, qui allie douceur et fraîcheur ! \r\n', 10, 'pennacotta.jpg', 'Petit gâteau'),
(64, 'Mini Pizza', 'Découvrez nos mini pizza pleines de saveurs composées d\'une fine pâte de pizza agrémentée d\'une délicieuse sauce à base de tomates fraiches, garnie de thon tunisien, de fromage et d\'olives.', 7, 'pizza.jpg', 'Bouchée chaude'),
(65, 'Samsa', 'Une feuille de malsouka fourrée de noisette et décorée de pistaches en poudre.Idéale pour la rupture du jeune ou pour accompagner un thé durant la soirée.', 80, 'samsa.jpg', 'Pâtisserie traditionnelle'),
(66, 'Tiramisu', 'Ce délicieux dessert au goût franc de café, est composé de mascarpone café et de sa génoise moelleuse imbibée au café. Sa chantilly est également parfumée au café.', 10, 'tiramisu.png', 'Petit gâteau'),
(67, 'Vol au vent Poulet Champignon', 'Une pâte feuilletée garnie de champignon , poulet et fromage .Idéale pour vos cérémonies de mariage ou soirées.', 80, 'VolovantPouletauChampignion.jpg', 'Bouchée chaude'),
(68, 'Pièce Montée', 'Cette pièce montée Jardin fleuri, d\'une finesse et d\'un raffinement inégalés composée d\'entremets superposés recouverts d’une fine couche de pâte à sucre décorée de roses. Peut être commandée pour vos cérémonies de fiançailles ou mariage.', 700, 'piecemonté.jpg', 'Gâteau');

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

DROP TABLE IF EXISTS `article_commande`;
CREATE TABLE IF NOT EXISTS `article_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `articles_id` int(11) DEFAULT NULL,
  `quantity` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3B02521619EB6921` (`client_id`),
  KEY `IDX_3B0252161EBAF6CC` (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_commande`
--

INSERT INTO `article_commande` (`id`, `client_id`, `articles_id`, `quantity`) VALUES
(2, 7, 58, 1.25);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `numero_de_telephone` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C744045588D20D42` (`adresse_email`),
  UNIQUE KEY `UNIQ_C7440455F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `adresse_email`, `username`, `password`, `roles`, `adresse`, `code_postal`, `numero_de_telephone`) VALUES
(5, 'chaimabenghanem@yahoo.fr', 'admin', '$2y$13$aU1fzti.eaOqH9EOx3xr5eKh1gU6n51eJD.B7e2znR2WKxIuk2pKe', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'La Marsa', 2070, 54565507),
(7, 'bghanem.chaima@gmail.com', 'amal', '$2y$13$WuOlRqzuCDIalxge8LGFoeI4ZH8h3FuXPl.xECpvcD2.eDY7KHgPC', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'abc', 2029, 26040326),
(15, 'chaima@bengh.fr', 'fatma', '$2y$13$Mpf4U56S4iRtQyTKCDrBKuVWPb9siAui5zgMwgv1k7azpwBQvs0b2', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'arbu', 3639, 28040925);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `articles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `total` double NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D19EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `client_id`, `articles`, `total`, `etat`) VALUES
(1, '2020-07-12 13:06:19', 7, 'a:1:{i:0;a:2:{s:7:\"article\";a:1:{i:0;O:34:\"Proxies\\__CG__\\App\\Entity\\Articles\":8:{s:17:\"__isInitialized__\";b:1;s:23:\"\0App\\Entity\\Articles\0id\";i:58;s:24:\"\0App\\Entity\\Articles\0nom\";s:10:\"Kaak Warka\";s:32:\"\0App\\Entity\\Articles\0description\";s:273:\"Ce délicieux gâteau traditionnel de couleur blanche et en forme d\'anneau, est composé d\'une fine pâte sucrée à l\'extérieur fourré d\'une pâte fondante à l\'amande et parfumée à l\'eau de rose. C\'est un incontournable pour toutes vos cérémonies et célébrations.\";s:25:\"\0App\\Entity\\Articles\0prix\";d:60;s:30:\"\0App\\Entity\\Articles\0categorie\";s:26:\"Pâtisserie traditionnelle\";s:26:\"\0App\\Entity\\Articles\0image\";s:8:\"kaak.jpg\";s:30:\"\0App\\Entity\\Articles\0imageFile\";N;}}s:8:\"quantity\";d:1.25;}}', 85, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200325172511', '2020-03-25 17:25:21');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_commande`
--
ALTER TABLE `article_commande`
  ADD CONSTRAINT `FK_3B02521619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_3B0252161EBAF6CC` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
