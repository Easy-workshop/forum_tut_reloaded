-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Décembre 2017 à 17:14
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forumtutplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(9, 'sociÃ©tÃ©', 'DÃ©bats d''actualitÃ©s,sociÃ©tÃ©,faits divers... Chacun, dans le respect de l''autre, peut ici, laisser libre court Ã  ses rÃ©flexions sur le monde qui l''entoure.'),
(10, 'Mariage', '\r\nIl vous a demandÃ© en mariage (oui on sait, c''Ã©tait le plus beau moment de votre vie) et vous avez dit "OUI" ! Mais maintenant, c''est la course Ã  la montre : robe, cÃ©rÃ©monie, cartons d''invitations, buffet, banquet, cocktails, musiques... Vous ne sav');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(7, 'et oui les lions ont...', '2017-11-11 20:43:59', 7, 1),
(8, 'sd,k,s sodk oskdos sokdos oskdoskd', '2017-11-11 20:44:48', 8, 1),
(9, 'alo world alo world alo world alo world', '2017-11-13 18:51:16', 9, 2),
(10, 'skks sk,sd k,sd ks,dsd  texts', '2017-11-13 18:54:25', 10, 2),
(12, 'Morocco AA ;)', '2017-11-13 21:14:56', 7, 2),
(13, 'aller aller les lions', '2017-11-13 21:20:14', 7, 3),
(14, 'wwxqdd', '2017-11-13 21:27:00', 10, 3),
(15, 'yy yy yy   yyy', '2017-11-13 21:29:37', 10, 1),
(16, 'Aidez moi SVP j''ai quitter la maison de mon mari y''a 20jrs et je compte divorcer je peux plus continuer avec mon mari c''est impossible et hors de question j''ai 22ans 6mois de mariage !!! SVP QUE FAIRE ????\r\nJe suis enceinte de 5semaines je viens de le dÃ©couvrir ! J peux pas le dire Ã  ma famille pask ils me demanderont de reprendre avec lui mais moi je veux plus de lui Sad Smiley\r\nAiiiidez moi svp\r\n', '2017-11-13 21:31:22', 11, 1),
(17, 'Your reply has not been saved, please try again later', '2017-11-13 21:37:21', 11, 3),
(18, 'Slm a tous voici mon histoir cela fait 8ans de mariage et beau enfants je pensais etre heureuse etre avec un homme bien et qui m aime jusqua ya qurlque mois ses potes lui envoi bcp de photo ou video limite porno j taper une crise mais ne ma pa ecouter ensuite il sest mis a frequenter une de ses salariÃ©e 2mois a peu prÃ© cette pute moffrais des cadeau fesais comme si de rien n etait entre eux me disait ta de la chance tu doit pas tennuier avec lui naife que je suis je nest rien vue venir . mais derriere elle lui mettai la pression pour me quitter elle avais pris en photo lors dune nuit entre eux pour le menacer bref elle voulais quil me quitte ou quelle le depouille prudhomme pleinte ... elle mavais meme appeler j lai donc quitter mais lui a tt fait pr etre un homme model ma suplier pleurÃ© que cetait une erreur ... ayant penser au enfants en bas age j fini par rentre chez moi mais ma vie n est plus la meme je resent de la heine envers lui j lai meme insulter giflÃ© truc qui m etait inpensable ya quelque mois je nest plus de respect pour lui jaimerais savoir si qurlqun connais un bon therapeute de couple musulman ou des temoignage des gens qui on vecu cette epreuve en sachant que je lest est vue en plein action et ne sest pas gener pour menvoyer leur conversation il a couper tt contact avec elle mais elle revien tjr a la charge soit en esayant davoir son num ou en fesant des lettre recommader des pleintes mais ne lache jamais laffaire je suis choque quil soit tomber aussi bas avec une allumeuse pareil qui na aucune valeur elle se laisser toucher par tt les collegues quand je disais a mon mari que sa ne fesais pas serieux dans la boite il ma dit quil va lui en parler mais jamais jaurais penser que lui aussi ete dans le lot sa a fait boom dans la famille tt le monde etait choque je me sent humilier en meme pas 2 mois elle a reusit a le metre dans son lit il a bou pleurÃ© supplier sa n effaceras jamais ce quil ma fait je suis au bord de la depression je me voi pas non plus sans lui si vous connaissez un bon therapeute sur paris je ss preneuse merci', '2017-11-13 21:40:30', 12, 2),
(19, 'Lerreur est humaine, il regrette', '2017-11-13 21:44:00', 12, 3);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(7, 'victoire du maroc', '2017-11-11 20:43:59', 9, 1),
(8, 'Ramadani et ses invitÃ©s', '2017-11-11 20:44:48', 9, 1),
(9, 'alo world', '2017-11-13 18:51:16', 9, 2),
(10, 'Elle ne veut plus le voir', '2017-11-13 18:54:24', 10, 2),
(11, 'Je divorce et j''ai dÃ©couvert que je suis enceinte ', '2017-11-13 21:31:22', 10, 1),
(12, 'Degouter des hommes', '2017-11-13 21:40:30', 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'yyy', '186154712b2d5f6791d85b9a0987b98fa231779c', 'yyy@yy.com', '2017-11-10 21:41:46', 0),
(2, 'xxx', 'b60d121b438a380c343d5ec3c2037564b82ffef3', 'xxx@xxx.xxx', '2017-11-13 18:38:58', 0),
(3, 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@aa.com', '2017-11-13 21:19:29', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
