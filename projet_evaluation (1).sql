-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mai 2023 à 10:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `action_description` text DEFAULT NULL,
  `action_date` date NOT NULL,
  `professeur_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id_action`, `action_name`, `action_description`, `action_date`, `professeur_id`, `subject_id`, `survey_id`) VALUES
(1, 'act1', 'je vais consacré plus de séances pour la pratique', '2023-04-20', 1, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_Fname` varchar(255) NOT NULL,
  `admin_Lname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_Fname`, `admin_Lname`, `admin_email`, `admin_password`) VALUES
(1, 'Samar', 'MOUCHAWRAB', 's.mouchawrab@mundiapolis.ma', '0000'),
(2, 'Nouhaila', 'Danouni', 'n.danouni@mundiapolis.ma', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `branch`
--

CREATE TABLE `branch` (
  `id_branch` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(9) NOT NULL,
  `levels_nbr` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `branch`
--

INSERT INTO `branch` (`id_branch`, `branch_name`, `branch_code`, `levels_nbr`, `faculty_id`) VALUES
(1, 'MASTER MANAGEMENT DES RESSOURCES HUMAINES (BAC+5)', '', 5, 1),
(2, 'MASTER COMPTABILITÉ, CONTRÔLE ET AUDIT – CCA (BAC+5)', '', 5, 1),
(3, 'MASTER MARKETING STRATÉGIQUE ET MARKETING DIGITAL (BAC+5)', '', 5, 1),
(4, 'MASTER FINANCE (BAC+5)', '', 5, 1),
(5, 'MASTER EN SUPPLY CHAIN MANAGEMENT (BAC+5)', '', 5, 1),
(6, 'LICENCE EN COMMUNICATION ET MARKETING DIGITAL (BAC+3)', '', 3, 1),
(7, 'LICENCE EN COMMERCE ET DÉVELOPPEMENT DES AFFAIRES (BAC +3)', '', 3, 1),
(8, 'LICENCE EN COMPTABILITÉ ET FINANCE (BAC+3)', '', 3, 1),
(9, 'LICENCE EN MANAGEMENT ET GESTION DES ENTREPRISES (BAC+3)', '', 3, 1),
(10, 'DOCTORAT EN SCIENCES, TECHNOLOGIE, INGÉNIERIE ET DÉVELOPPEMENT DURABLE', '', 3, 2),
(11, 'GÉNIE DES SYSTÈMES AÉRONAUTIQUES (BAC+5)', '', 5, 2),
(12, 'GÉNIE INFORMATIQUE (BAC+5)', '', 5, 2),
(13, 'GÉNIE INDUSTRIEL (BAC+5)', '', 5, 2),
(14, 'MASTER EN DATA SCIENCE ET INTELLIGENCE ARTIFICIELLE (BAC+5)', '', 5, 2),
(15, 'LICENCE EN INFORMATIQUE APPLIQUÉE (BAC+3)', '', 3, 2),
(16, 'LICENCE EN GÉNIE DE LA LOGISTIQUE AÉRONAUTIQUE (BAC+3)', '', 3, 2),
(17, 'MASTER EN DROIT DES AFFAIRES EN ALTERNANCE UNIVERSITÉ-ENTREPRISE (BAC+5)', '', 5, 3),
(18, 'MASTER RELATIONS INTERNATIONALES ET DIPLOMATIE (BAC+5)', '', 5, 3),
(19, 'LICENCE RELATIONS INTERNATIONALES ET SCIENCES POLITIQUES (BAC+3)', '', 3, 3),
(20, 'LICENCE DROIT DES ENTREPRISES (BAC+3)', '', 3, 3),
(21, 'MASTER EN PSYCHOLOGIE CLINIQUE ET PSYCHOTHÉRAPIE (BAC+5)', '', 5, 4),
(22, 'MASTER EN KINÉSITHÉRAPIE DU SPORT (BAC+5)', '', 5, 4),
(23, 'LICENCE EN PODOLOGIE (BAC+3)', '', 3, 4),
(24, 'LICENCE EN PSYCHOMOTRICITÉ (BAC+3)', '', 3, 4),
(25, 'LICENCE EN ORTHOPHONIE (BAC+3)', '', 3, 4),
(26, 'LICENCE EN PSYCHOLOGIE GÉNÉRALE (BAC+3)', '', 3, 4),
(27, 'LICENCE EN KINÉSITHÉRAPIE (BAC+3)', '', 3, 4),
(28, 'LICENCE EN SCIENCES INFIRMIÈRES (BAC+3) SPÉCIALITÉ INFIRMIER POLYVALENT', '', 3, 4),
(29, 'LICENCE EN SCIENCES INFIRMIÈRES (BAC+3) SPÉCIALITÉ SOINS INTENSIFS ET SOINS D’URGENCES', '', 3, 4),
(30, 'LICENCE EN SCIENCES INFIRMIÈRES (BAC+3) SPÉCIALITÉ ANESTHÉSIE ET RÉANIMATION', '', 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id_class`, `class_name`, `level_id`) VALUES
(1, '1ACI AERO G1', 41),
(2, '2ACI AERO G1', 42),
(3, '1ACI INFO G1', 46),
(4, '2ACI INFO G1', 47),
(5, '1ACI INDUS G1', 51),
(6, '2ACI INDUS G1', 51);

-- --------------------------------------------------------

--
-- Structure de la table `faculty`
--

CREATE TABLE `faculty` (
  `id_faculty` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `faculty`
--

INSERT INTO `faculty` (`id_faculty`, `faculty_name`) VALUES
(1, 'Business School'),
(2, 'Ingénierie'),
(3, 'Gouvernance'),
(4, 'Santé');

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level_number` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `level`
--

INSERT INTO `level` (`id_level`, `level_number`, `level_name`, `branch_id`) VALUES
(1, 1, '', 1),
(2, 2, '', 1),
(3, 3, '', 1),
(4, 4, '', 1),
(5, 5, '', 1),
(6, 1, '', 2),
(7, 2, '', 2),
(8, 3, '', 2),
(9, 4, '', 2),
(10, 5, '', 2),
(11, 1, '', 3),
(12, 2, '', 3),
(13, 3, '', 3),
(14, 4, '', 3),
(15, 5, '', 3),
(16, 1, '', 4),
(17, 2, '', 4),
(18, 3, '', 4),
(19, 4, '', 4),
(20, 5, '', 4),
(21, 1, '', 5),
(22, 2, '', 5),
(23, 3, '', 5),
(24, 4, '', 5),
(25, 5, '', 5),
(26, 1, '', 6),
(27, 2, '', 6),
(28, 3, '', 6),
(29, 1, '', 7),
(30, 2, '', 7),
(31, 3, '', 7),
(32, 1, '', 8),
(33, 2, '', 8),
(34, 3, '', 8),
(35, 1, '', 9),
(36, 2, '', 9),
(37, 3, '', 9),
(38, 1, '', 10),
(39, 2, '', 10),
(40, 3, '', 10),
(41, 1, '', 11),
(42, 2, '', 11),
(43, 3, '', 11),
(46, 1, '', 12),
(47, 2, '', 12),
(48, 3, '', 12),
(51, 1, '', 13),
(52, 2, '', 13),
(53, 3, '', 13),
(56, 1, '', 14),
(57, 2, '', 14),
(58, 3, '', 14),
(59, 4, '', 14),
(60, 5, '', 14),
(61, 1, '', 15),
(62, 2, '', 15),
(63, 3, '', 15),
(64, 1, '', 16),
(65, 2, '', 16),
(66, 3, '', 16),
(67, 1, '', 17),
(68, 2, '', 17),
(69, 3, '', 17),
(70, 4, '', 17),
(71, 5, '', 17),
(72, 1, '', 18),
(73, 2, '', 18),
(74, 3, '', 18),
(75, 4, '', 18),
(76, 5, '', 18),
(77, 1, '', 19),
(78, 2, '', 19),
(79, 3, '', 19),
(80, 1, '', 20),
(81, 2, '', 20),
(82, 3, '', 20),
(83, 1, '', 21),
(84, 2, '', 21),
(85, 3, '', 21),
(86, 4, '', 21),
(87, 5, '', 21),
(88, 1, '', 22),
(89, 2, '', 22),
(90, 3, '', 22),
(91, 4, '', 22),
(92, 5, '', 22),
(93, 1, '', 23),
(94, 2, '', 23),
(95, 3, '', 23),
(96, 1, '', 24),
(97, 2, '', 24),
(98, 3, '', 24),
(99, 1, '', 25),
(100, 2, '', 25),
(101, 3, '', 25);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_professeur` int(11) NOT NULL,
  `professor_Fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `professor_Lname` varchar(255) NOT NULL,
  `professor_email` varchar(255) NOT NULL,
  `professor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `professor_Fname`, `professor_Lname`, `professor_email`, `professor_password`) VALUES
(1, 'Samar', 'MOUCHAWRAB', 's.mouchawrab@mundiapolis.ma', '0000'),
(2, 'Abdelilah', 'KAHLAOUI', 'a.kahlaoui@mundiapolis.ma', '0000'),
(3, 'Amana', 'ABDENNASSER', 'a.amana@mundiapolis.ma', '0000'),
(4, 'Hachem', 'El Yousfi Alaoui', 'h.elyousfi@um5r.ac.ma', '0000'),
(5, 'Saad', 'Khoudali', 's.khoudali@gmail.com', '0000'),
(6, 'Mohamed', 'Benmenana', 'm.benmenana@mundiapolis.ma', '0000'),
(7, 'Achraf', 'Benba', 'achraf.benba@um5s.net.ma', '0000'),
(8, 'Habib', 'Ayad', 'ayad.habib@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question_phrase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question_phrase`) VALUES
(1, 'Le cours est riche sur le plan théories et concepts enseignés'),
(2, 'Le cours donne une place importante aux exercices, études de cas et applications pratiques'),
(3, 'Le cours s’appuie sur des lectures et ressources complémentaires à préparer à domicile'),
(4, 'Le cours a été animé d’une manière pédagogique, claire et structurée'),
(5, 'Le cours constitue une valeur ajoutée dans mon parcours d’étudiant'),


-- --------------------------------------------------------

--
-- Structure de la table `reponse_note`
--

CREATE TABLE `reponse_note` (
  `id_reponse_note` int(11) NOT NULL,
  `reponse_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse_note`
--

INSERT INTO `reponse_note` (`id_reponse_note`, `reponse_note`) VALUES
(1, 'Pas du tout d_accord	'),
(2, 'Pas d_accord'),
(3, 'Moyennement d_accord	'),
(4, 'D_accord           '),
(5, 'Entièrement d_accord');

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id_response` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `survey_question_id` int(11) NOT NULL,
  `response_note` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `responsed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id_response`, `student_id`, `survey_question_id`, `response_note`, `comment`, `responsed_at`) VALUES
(1, 1, 1, 5, 'rien', '2023-04-18 11:40:57'),
(2, 1, 2, 4, 'rien', '2023-04-18 11:41:57'),
(3, 1, 3, 4, 'rien', '2023-04-18 11:42:30'),
(4, 1, 4, 5, 'rien', '2023-04-18 11:42:53'),
(5, 1, 5, 5, 'rien', '2023-04-18 11:42:57'),
(6, 36, 6, 4, 'None', '2023-04-19 13:55:52'),
(7, 36, 7, 5, 'None', '2023-04-19 13:57:52'),
(8, 36, 8, 3, 'None', '2023-04-19 13:58:42'),
(9, 36, 9, 4, 'None', '2023-04-19 13:59:43'),
(10, 36, 10, 5, 'None', '2023-04-19 14:03:43');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `semestre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `semestre_name`) VALUES
(1, 'Automne'),
(2, 'Printemps');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `student_Fname` varchar(255) NOT NULL,
  `student_Lname` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_password` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id_student`, `student_Fname`, `student_Lname`, `student_email`, `student_password`, `class_id`) VALUES
(1, 'nouhaila', 'danouni', 'n.danouni@mundiapolis.ma', 1234, 3),
(26, 'aya', 'malki', 'a.malki@mundiapolis.ma', 1234, 3),
(27, 'mehdi', 'elmir', 'm.elmir@mundiapolis.ma', 1234, 3),
(28, 'kawtar', 'mounir', 'k.mounir@mundiapolis.ma', 1234, 3),
(29, 'nisrine', 'aomari', 'n.aomari@mundiapolis.ma', 1234, 3),
(30, 'yosra', 'moumtaz', 'y.moumtaz@mundiapolis.ma', 1234, 3),
(31, 'saad', 'haliba', 's.haliba@mundiapolis.ma', 1234, 3),
(32, 'meriem', 'elhadraoui', 'm.elhadraoui@mundiapolis.ma', 1234, 3),
(33, 'zakaria', 'zitouni', 'z.zitouni@mundiapolis.ma', 1234, 3),
(34, 'ichraq', 'essadeq', 'i.essadeq@mundiapolis.ma', 1234, 3),
(35, 'aya', 'hamza', 'a.hamza@mundiapolis.ma', 12345, 5),
(36, 'manal', 'hadani', 'm.hadani@mundiapolis.ma', 12345, 3);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `professeur_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `subject_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject_name`, `professeur_id`, `level_id`, `semestre_id`, `subject_year`) VALUES
(1, 'Administration des réseau et des systèmes', 4, 46, 2, '2023'),
(2, 'Développement mobile', 8, 46, 2, '2023'),
(3, 'Sécurité logicielle et du réseau', 5, 46, 2, '2023'),
(4, 'Systèmes distribués et systèmes temps réel', 7, 46, 2, '2023'),
(5, 'Développement avec python', 2, 46, 2, '2023'),
(6, 'Génie logiciel', 1, 46, 2, '2023'),
(7, 'Anglais 2', 6, 46, 2, '2023');

-- --------------------------------------------------------

--
-- Structure de la table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `survey_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `survey_statut` varchar(50) NOT NULL DEFAULT 'Prête',
  `Report` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `survey`
--

INSERT INTO `survey` (`id_survey`, `survey_name`, `level_id`, `semestre_id`, `survey_created_at`, `survey_statut`, `Report`) VALUES
(1, 46, 2, '2023-04-15 12:30:00', 'En cours', ''),
(2, 51, 2, '2023-04-19 15:00:00', 'Finit', ''),
(3, 6, 2, '2023-05-12 12:00:00', 'Finit', '');

-- --------------------------------------------------------

--
-- Structure de la table `surveyquestion`
--

CREATE TABLE `surveyquestion` (
  `id_survey_question` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `surveyquestion`
--

INSERT INTO `surveyquestion` (`id_survey_question`, `survey_id`, `question_id`, `subject_id`) VALUES
(1, 1, 1, 6),
(2, 1, 2, 6),
(3, 1, 3, 6),
(4, 1, 4, 6),
(5, 1, 5, 6),
(6, 2, 1, 7),
(7, 2, 2, 7),
(8, 2, 3, 7),
(9, 2, 4, 7),
(10, 2, 5, 7),
(11, 1, 1, 2),
(12, 1, 2, 2),
(13, 1, 3, 2),
(14, 1, 4, 2),
(15, 1, 5, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `professeur_id` (`professeur_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id_branch`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `level_id` (`level_id`);

--
-- Index pour la table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id_faculty`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_professeur`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `reponse_note`
--
ALTER TABLE `reponse_note`
  ADD PRIMARY KEY (`id_reponse_note`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `survey_question_id` (`survey_question_id`),
  ADD KEY `response_note` (`response_note`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `class_id` (`class_id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `professeur_id` (`professeur_id`),
  ADD KEY `semestre_id` (`semestre_id`);

--
-- Index pour la table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `semestre_id` (`semestre_id`);

--
-- Index pour la table `surveyquestion`
--
ALTER TABLE `surveyquestion`
  ADD PRIMARY KEY (`id_survey_question`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `branch`
--
ALTER TABLE `branch`
  MODIFY `id_branch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id_faculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT pour la table `reponse_note`
--
ALTER TABLE `reponse_note`
  MODIFY `id_reponse_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
  MODIFY `id_response` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `surveyquestion`
--
ALTER TABLE `surveyquestion`
  MODIFY `id_survey_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id_professeur`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id_subject`),
  ADD CONSTRAINT `action_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id_survey`);

--
-- Contraintes pour la table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id_faculty`);

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`);

--
-- Contraintes pour la table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id_branch`);

--
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id_student`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`survey_question_id`) REFERENCES `surveyquestion` (`id_survey_question`),
  ADD CONSTRAINT `response_ibfk_3` FOREIGN KEY (`response_note`) REFERENCES `reponse_note` (`id_reponse_note`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id_class`);

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id_professeur`),
  ADD CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id_semestre`);

--
-- Contraintes pour la table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id_semestre`);

--
-- Contraintes pour la table `surveyquestion`
--
ALTER TABLE `surveyquestion`
  ADD CONSTRAINT `surveyquestion_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `surveyquestion_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id_subject`),
  ADD CONSTRAINT `surveyquestion_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id_survey`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
