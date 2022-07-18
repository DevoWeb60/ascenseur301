-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 juil. 2022 à 09:14
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atelier-design`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Architecture'),
(2, 'Architecture d\'intérieure'),
(3, 'Design mobilier'),
(4, 'Design objet');

-- --------------------------------------------------------

--
-- Structure de la table `methods`
--

CREATE TABLE `methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `methods`
--

INSERT INTO `methods` (`id`, `title`, `content`) VALUES
(1, 'Planification', 'Suite à l’étude de site existante, nous discuterons et conviendrons des options de conception avec vous jusqu’à ce que vous soyez satisfait des dessins proposés. Des conseils de planification préalable pourraient également être organisés.\r\n'),
(2, 'Contrôle de la construction', 'L’atelier du design produira des dessins techniques pour la soumission du contrôle de la construction afin de se conformer à la réglementation.'),
(3, 'Administration des contrats', 'Nous avons une équipe locale qui achèvera votre projet avec la plus haute qualité et professionnalisme, nous pouvons également vous aider à choisir un entrepreneur qui répondra le mieux à vos besoins.\r\nNous préparerons un contrat de construction où les étapes et les conditions de base du projet seront convenues.'),
(4, 'Gestion de projet', 'Pendant les phases de planification et de contrôle de la construction, nous coordonnerons toutes les informations nécessaires. Lors des phases de construction, nous effectuons des inspections sur site pour nous assurer que l’entrepreneur construit conformément aux spécifications convenues.\r\nL’atelier du design peut gérer votre projet de la conception à la réalisation.');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `page` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `list_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `content`, `page`, `picture`, `list_name`) VALUES
(1, 'valeurs', 'Les valeurs de l’atelier du design', 'Nous aimons\r\n\r\nPenser grand sans négliger les détails\r\nLes matériaux qui s’améliorent avec l’âge et respectent l’environnement\r\nLes concepts clairement communicants\r\nConcevoir intelligemment pour les gens et la planète\r\nCollaborer avec d’autres passionnés\r\nLe pouvoir de l’artisanat et du design pour faire du bien\r\nLa richesse de l’urbanité', 'home', '', NULL),
(2, 'creations', 'Nouvelle création', '<strong>Pénéloppe Solette</strong>\r\nColorés, esthétiques et chics, les nouvelles lampes à poser en mosaïque\r\nvitrail au design bohème, mixe de styles Art déco associé à une touche\r\nethnique comme un souvenir de voyages', 'home', 'nouvelle-creation.webp', 'home-list-1'),
(3, 'prix', 'prix du design 2018', '<strong>Bill Hattérahl</strong>\r\nMélange contemporain et moderne avec une touche de touche rustique, cette banquette avec ses lignes arrondies sinueuses inspirées du design danois est un classique vintage. Le rotin teinté dans les tons acajou et ébène est habilement tissé à la main. Les bases en fer foncé apportent un soutien robuste et un contraste visuel à cette banquette élégante.', 'home', 'prix-design-2018.webp', 'home-list-1'),
(4, 'agency-description', 'L\'agence', 'Créée en 2010 par RENÉ SENS et LAURE BRILLE, l’atelier du design est aujourd’hui emmenée par ses quatre associés. L’agence d’architecture et de design s’est construite comme une structure ouverte, favorisant le dialogue, la diversité et les coopérations. \r\n\r\nCes libertés d’échanges et d’associations l’ont vite positionnée au coeur de groupements pluridisciplinaires, affirmant la force et l’efficacité du «travailler ensemble». Architectes & designer, participent à cette dynamique. C’est ainsi, par la diversité d’échelles, de programmes et d’approches que naissent les plus sensibles inventions et les plus riches collaborations.\r\n\r\nL’équipe de l’atelier du design a appris à bousculer ses certitudes, à croiser les regards, à convoquer l’interdisciplinarité de l’équipe pour ouvrir le dialogue, à inviter des acteurs extérieurs pour réunir maitrise d’oeuvre et maitrise d’ouvrage autour de réflexions architecturales et urbaines durables : l’architecte ne peut pas faire cavalier seul. Nous cherchons à rendre l’architecture actrice de son territoire (ressources naturelles, connexions urbaines…), à proposer des solutions justes et pérennes, tout en respectant les coûts et la matière et en s’engageant vers la voie du durable. L’objectif de l’agence est de s’éloigner des réflexions standardisées pour innover face aux contraintes quotidiennes que rencontrent les acteurs de la ville.\r\n\r\nLes expériences universitaires et professionnelles très différentes de chacun nous permettent de nous construire un solide bagage commun, que nous complétons par les différentes formations auxquelles certains d’entre nous sont inscrits.\r\nNos compétences informatiques et notre maîtrise des logiciels BIM (Building Information Modeling) nous permettent d’interagir efficacement avec les différents intervenants sur des projets importants.\r\n\r\n Cela nous amène à faire profiter les maîtres d’ouvrages que nous assistons des dernières technologies ainsi que des moyens de représentations les plus récents.', 'agency', NULL, NULL),
(5, 'a-text-1', 'Personnes, culture et lumière', 'Les gens, la culture et la lumière sont nos préoccupations. La bonne architecture / le bon design se mesure par son adaptabilité et sa réponse à l’environnement, à la vie sociale, aux personnes qui l’utilisent et à la lumière qui la remplit.', 'agency', 'annexes/maison.webp', 'agency-list-1'),
(6, 'a-text-2', NULL, 'Notre design est pour les gens - tout le monde. Nous voulons que les espaces que nous concevons favorisent l’interaction sociale et ouvrent la voie à la vie, sans barrières. En ce sens, nous ne sommes pas attachés à un style en particulier, mais nous croyons au pouvoir du design adapté aux besoins, aux souhaits et à l’espace. Dans nos coeurs, l’architecture ne fait qu’encadrer la lumière à la fois littéralement et métaphoriquement. Le manipuler est notre point de départ pour trouver des réponses élégantes aux questions de nos clients. De cette façon, nous n’abandonnerons jamais la beauté dans notre quête du fonctionnel et du pragmatique.', 'agency', 'annexes/cafe.webp', 'agency-list-1'),
(7, 'a-text-3', NULL, 'Les questions environnementales, sociales et économiques font partie intégrante de notre processus. Cet état d’esprit encourage la collaboration avec nos collègues de l’équipe de conception, les clients, les investisseurs, les parties prenantes et, bien sûr, les utilisateurs finaux. Plus non seulement pour le protéger, mais pour tenter d’une certaine manière de capturer sa beauté impossible.', 'agency', 'annexes/ampule.webp', 'agency-list-1');

-- --------------------------------------------------------

--
-- Structure de la table `reels`
--

CREATE TABLE `reels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reels`
--

INSERT INTO `reels` (`id`, `title`, `picture`, `author`, `category`, `description`) VALUES
(1, 'La Bastide', 'archi/bastide.webp', 1, 1, 'Cette rénovation d’une maison du 18e siècle  comprend une extension en verre avec de grandes  portes coulissantes donnant sur le jardin, une  chambre en duplex au deuxième étage et la  rénovation totale de l’intérieur. \n\nL’utilisation somptueuse des matériaux comprend  des salles de bains en marbre Cararra et des sols  et des escaliers en noyer noir américain. Des stores  et des rideaux automatisés, des menuiseries sur  mesure et des éléments de climatisation ont été  ajoutés.'),
(2, 'évolution', 'archi/evolution.webp', 1, 1, 'Une extension moderne et innovante en bois de  cette maison individuelle de 600 m² comprend une  magnifique façade en verre\n\nAu centre de la maison se trouve une entrée et une  salle à manger uniques à double hauteur, avec des  portes vitrées coulissantes hautes de six mètres,  assurant une connexion théâtrale entre l’intérieur et  l’extérieur.'),
(3, 'moderne et fonctionnelle', 'archi/moderne.webp', 1, 1, 'Une nouvelle maison moderne de cinq chambres et  550 m2 située en ville. \n\nElle remplace une habitation existante dans laquelle  un des clients avait grandi.\n\nLe dossier exigeait une nouvelle maison qui  profiterait du site et permettrait aux propriétaires  d’amuser et d’accueillir des invités. Cette habitation  fonctionnent principalement comme une maison de  travail intime pour une famille de six personnes.'),
(4, 'Appartement en duplex à lyon', 'design-interieur/duplex.webp', 2, 2, 'Malgré sa superficie modeste, cet appartement de deux chambres à  coucher et une salle de bain et demi se sent néanmoins spacieux et  serein. Le design moderne présente une palette de couleurs apaisante  composée de gris clair lisse, de tons de bois naturel et chaud, de blanc  frais et de tons verts atténués. Toute la vie de famille se déroule dans  un seul espace de vie principal comprenant un salon confortable, une  salle à manger spacieuse à six places et un vaste arrangement de  cuisine contemporaine.'),
(5, 'Restaurant : Le 51', 'design-interieur/le-51.webp', 2, 2, 'Avec ses 40 sièges, ce petit restaurant spécialisé dans la cuisine  de bistrot dispose de nombreux atouts déco. Il se démarque  particulièrement avec ses différents espaces separés par des cloisons  ajourées en bois. Des matériaux bois, béton, métal apportent une  ambiance urbaine, moderne et conviviale. Les murs de béton sont  utilisés comme ardoise. \n\nSur une surface de 70 m², Laure a mis en place un cadre élégant et  décontracté en phase avec la clientèle ciblée par le restaurant, plutôt  urbaine et jeune. L’ambiance, noire et presque terne, met en valeur le  plafond en métal très travaillé'),
(6, 'Durtas', 'design-meubles/durtas.webp', 3, 3, 'Le fauteuil Durtas, d’inspiration rétro déclarée, est une combinaison  élégante de tradition et de modernité. Un fauteuil avec une ligne  gracieuse, avec une structure en bois, créé pour être une chaise  aussi raffinée que confortable, grâce au dossier mobile s’adaptant  à la posture du dos. La structure de support est en frêne massif.  Dos et assise en contreplaqué. Le rembourrage est en mousse de  polyuréthane sans CFC et fibre 100% polyester. La couverture est  complètement amovible.'),
(7, 'Sofsay', 'design-meubles/sofsay.webp', 3, 3, 'Des lignes simples et harmonieuses, en plus de la légèreté visuelle,  soulignées par l’élégant pied de pont en aluminium, disponible en  deux finitions. La gamme Hampton Memory propose des canapés de  différentes tailles et un fauteuil assorti. Deux versions des coussins  arrières sont également disponibles. Les couvertures dans un large  choix de tissus et de cuirs peuvent être choisies toutes entièrement  amovibles.'),
(8, 'Assiette Gatbsy', 'designObjet/assiette-gatsby.webp', 4, 4, 'Sur un marché aux puces, Pénélope a trouvé un jour un service  d’assiettes décorées style Art déco. Inspirées de ce service, elle  a imaginé cette assiettes à mi- chemins entre design scandinave  et marché aux puces. Ce service en porcelaine graphique,  accompagnera votre intérieur de tous les jours'),
(9, 'Set de bureau', 'designObjet/set-bureau.webp', 4, 4, 'Ce set de bureau en bois à plusieurs fonctions. Tout d’abord, il  vous permettra de mettre votre ordinateur portable et votre écran  d’ordinateur de bureau à bonne hauteur. Ensuite, vous pourrez  profiter d’un gain de place grâce à l’espace de rangement sous votre  ordinateur. Enfin conçu en bois avec de douces courbes, ce support  apporte une touche de design très agréable sur un bureau. \n\nExiste en deux coloris: Noyer ou Bouleau');

-- --------------------------------------------------------

--
-- Structure de la table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `iframe` text NOT NULL,
  `address_map` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `site_info`
--

INSERT INTO `site_info` (`id`, `title`, `slogan`, `phone`, `email`, `address`, `iframe`, `address_map`, `logo`) VALUES
(1, 'L\'atelier du design', 'l\'expertise d\'une équipe\npluridisciplinaire', '01 02 03 04 05', 'contact@atelierdudesign.fr', '18, rue du Paradis\r\n75000 PARIS', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2624.1265096253323!2d2.3515219!3d48.8748648!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1317f46ef3%3A0x1880f11531ba7a37!2s18%20Rue%20de%20Paradis%2C%2075010%20Paris!5e0!3m2!1sfr!2sfr!4v1653393003334!5m2!1sfr!2sfr', 'https://goo.gl/maps/BBbAS4maBMBX5DdB9', 'Logo.svg');

-- --------------------------------------------------------

--
-- Structure de la table `social_network`
--

CREATE TABLE `social_network` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `social_network`
--

INSERT INTO `social_network` (`id`, `name`, `icon`, `link`) VALUES
(1, 'Facebook', 'fab fa-facebook-square', 'https://facebook.com'),
(2, 'Linked In', 'fab fa-linkedin', 'https://linkedin.com'),
(3, 'Pinterest', 'fab fa-pinterest', 'https://pinterest.com'),
(4, 'Twitter', 'fab fa-twitter', 'https://twitter.com'),
(5, 'Instagram', 'fab fa-instagram', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `name`, `role`, `description`, `picture`) VALUES
(1, 'René Sens', 1, 'Architecte diplômé d’état\nAprès un passage remarqué à Montréal, il obtient son diplôme de l’École Nationale d’Architecture de Lyon (Vaulx-en-Velin, 69), en 2009, suite à quoi il fonde l’atelier du design afin d’exercer à son compte comme architecte.\n\nUn petit projet n’existe pas, l’architecture se concrétise partout et pour tous... L’atelier du design cherche à proposer une écriture simple, contemporaine, économique et juste, inspirée du site et de son contexte. Nos projets cherchent à optimiser les potentialités des lieux en analysant au mieux les contraintes et en respectant au mieux les attentes du client.', 'rene-sens.webp'),
(2, 'Laure brille', 2, 'Diplômée de l’École Nationale Supérieure des Arts Décoratifs (ENSAD), cette architecte d’intérieur porte sur la création le regard d’une nouvelle génération d’architectes. Sobriété, sérénité, douceur des lignes ses intérieurs reflètent une grande rigueur de conception.\r\n\r\nElle se découvre un don pour créer et investir des espaces, travailler pour le public ainsi que mener des équipes.', 'laure-brille.webp'),
(3, 'Bill Hatterahl', 3, 'Il étudie le design d’intérieur puis se spécialise dans l’utilisation du bois. Il se fait alors remarquer et participe à plusieurs expositions à travers l’Europe. Son travail est clairement identifiable grâce à la tension visible qui émane de ses créations, aux courbes et aux déformations post-modernes… Bill met en avant les savoir-faire authentiques. \r\n\r\nC’est un amateur d’un luxe moderne, simple et naturel, qui privilégie les lignes pures et aux matières précieuses. Assurant la fabrication de ses modèles dans des ateliers où le travail manuel correspond toujours à des règles précises de recherche, chaque meuble est entièrement réalisé à la main par des artisans, soucieux du respect des règles de l’ébénisterie d’antan.', 'bill-hatterahl.webp'),
(4, 'Peneloppe solette', 4, 'Après l’obtention de son baccalauréat, Penélope part suivre des cours d’arts et de design au Japon avant de revenir en France où elle termine l’ESAD de Reims en 2008. \r\n\r\nC’est au cours de ces années d’études que naît sa passion pour la lumière. Elle développe un intérêt pour le rapport entre les utilisateurs et les objets et signe de nombreuses créations.\r\n\r\n Depuis le designer très prolifique enchaîne les projets en auto-édition. Elle est très prolifique en 2016 et 2017, elle signe entre autres une étagère, un vase en céramique, des accessoires de bureau, un tapis ou encore une applique.', 'peneloppe-solette.webp');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reels`
--
ALTER TABLE `reels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reels`
--
ALTER TABLE `reels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `social_network`
--
ALTER TABLE `social_network`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reels`
--
ALTER TABLE `reels`
  ADD CONSTRAINT `reels_ibfk_1` FOREIGN KEY (`author`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `reels_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`role`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
