-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 27-Nov-2023 às 18:28
-- Versão do servidor: 8.0.21
-- versão do PHP: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meraki`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Awards`
--

CREATE TABLE `Awards` (
  `idAward` int NOT NULL,
  `idUser` int DEFAULT NULL,
  `idChallenge` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Awards`
--

INSERT INTO `Awards` (`idAward`, `idUser`, `idChallenge`, `description`, `date`, `imagePath`) VALUES
(66, 1, 94, 'testeup22', '2023-11-15', 'imagePath-66.jpg'),
(67, NULL, 95, 'Prêmio por ser o melhor mais top Mario', '2023-11-14', 'imagePath-67.jpg'),
(68, NULL, 96, 'testeup', '2023-11-17', 'imagePath-68.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Challenges`
--

CREATE TABLE `Challenges` (
  `idChallenge` int NOT NULL,
  `idUser` int NOT NULL,
  `goal` text NOT NULL,
  `name` varchar(75) NOT NULL,
  `reward` varchar(255) NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Challenges`
--

INSERT INTO `Challenges` (`idChallenge`, `idUser`, `goal`, `name`, `reward`, `banner`, `deadline`) VALUES
(94, 1, ' modelagem222', 'Mario22', '200', 'banner-94.jpg', '2023-11-23 12:30:06'),
(95, 1, 'conseguir fazer modelagens do mario', 'Mario models', '200', 'banner-95.jpg', '2023-11-09 12:30:01'),
(96, 1, 'conseguir fazer modelagens do mario', 'Nicole', '20000', 'banner-96.jpg', '2023-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Comments`
--

CREATE TABLE `Comments` (
  `idComment` int NOT NULL,
  `idUser` int NOT NULL,
  `idProject` int NOT NULL,
  `text` text NOT NULL,
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Comments`
--

INSERT INTO `Comments` (`idComment`, `idUser`, `idProject`, `text`, `dateCreate`) VALUES
(6, 3, 3, 'amoooooooooooooo', '2023-11-08 19:04:30'),
(7, 3, 13, 'eae', '2023-11-09 18:01:04'),
(14, 3, 16, 'teste', '2023-11-15 02:48:47'),
(15, 3, 16, 'teste', '2023-11-15 02:49:07'),
(16, 3, 16, 'teste', '2023-11-15 02:51:46'),
(17, 1, 26, 'topp', '2023-11-21 21:05:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Competitors`
--

CREATE TABLE `Competitors` (
  `idChallenge` int NOT NULL,
  `idUser` int NOT NULL,
  `position` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Educations`
--

CREATE TABLE `Educations` (
  `idEducation` int NOT NULL,
  `formation` varchar(200) NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Educations`
--

INSERT INTO `Educations` (`idEducation`, `formation`, `idUser`) VALUES
(13, 'coisa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Favorites`
--

CREATE TABLE `Favorites` (
  `idFavorite` int NOT NULL,
  `idUser` int NOT NULL,
  `idProject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Files`
--

CREATE TABLE `Files` (
  `idFiles` int NOT NULL,
  `idProject` int NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Files`
--

INSERT INTO `Files` (`idFiles`, `idProject`, `file`) VALUES
(15, 11, 'file-id11-1698953116-0.pdf'),
(16, 3, 'file-id3-1699295600-0.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Hashtags`
--

CREATE TABLE `Hashtags` (
  `idHashtag` int NOT NULL,
  `hashtag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Hashtags`
--

INSERT INTO `Hashtags` (`idHashtag`, `hashtag`) VALUES
(1, 'teste'),
(2, 'teste2'),
(3, 'teste3'),
(4, 'teste'),
(5, 'abcdef'),
(6, 'aaaaaaaaaaaaaaaaaa'),
(7, 'endermanup222'),
(8, 'DesafioMario'),
(9, 'iupi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Hashtags_Challenges`
--

CREATE TABLE `Hashtags_Challenges` (
  `idChallenge` int NOT NULL,
  `idHashtag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Hashtags_Challenges`
--

INSERT INTO `Hashtags_Challenges` (`idChallenge`, `idHashtag`) VALUES
(94, 7),
(95, 8),
(96, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Hashtags_Projects`
--

CREATE TABLE `Hashtags_Projects` (
  `idHashtag` int NOT NULL,
  `idProject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Hashtags_Projects`
--

INSERT INTO `Hashtags_Projects` (`idHashtag`, `idProject`) VALUES
(3, 3),
(7, 3),
(3, 4),
(6, 4),
(7, 4),
(4, 5),
(7, 6),
(7, 8),
(2, 11),
(7, 11),
(2, 13),
(2, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Images`
--

CREATE TABLE `Images` (
  `idImage` int NOT NULL,
  `idProject` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Images`
--

INSERT INTO `Images` (`idImage`, `idProject`, `image`) VALUES
(6, 6, 'img-id6-0.jpg'),
(9, 8, 'img-id8-1.jpg'),
(10, 8, 'img-id8-2.png'),
(11, 8, 'img-id8-3.png'),
(18, 3, 'img-id3-1698595005-0.jpg'),
(25, 11, 'img-id11-1698953116-0.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Likes`
--

CREATE TABLE `Likes` (
  `idLike` int NOT NULL,
  `idUser` int NOT NULL,
  `idProject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Likes`
--

INSERT INTO `Likes` (`idLike`, `idUser`, `idProject`) VALUES
(4, 1, 3),
(7, 2, 4),
(13, 2, 3),
(17, 1, 5),
(18, 1, 14),
(20, 1, 11),
(21, 2, 11),
(22, 2, 13),
(23, 3, 13),
(24, 5, 13),
(25, 1, 13),
(26, 1, 6),
(27, 3, 5),
(28, 3, 6),
(29, 3, 3),
(31, 11, 13),
(32, 1, 13),
(33, 1, 8),
(34, 12, 8),
(35, 1, 4),
(41, 3, 14),
(42, 3, 4),
(43, 3, 11),
(44, 3, 8),
(45, 3, 15),
(51, 3, 16),
(52, 12, 3),
(53, 1, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Messages`
--

CREATE TABLE `Messages` (
  `idMessage` int NOT NULL,
  `senderId` int DEFAULT NULL,
  `receiverId` int DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Messages`
--

INSERT INTO `Messages` (`idMessage`, `senderId`, `receiverId`, `sent_at`, `message`) VALUES
(1, 1, 3, '2023-11-15 12:19:19', 'Olá, bom dia'),
(2, 3, 1, '2023-11-15 12:19:19', 'Oi, tudo certo?'),
(3, 1, 3, '2023-11-15 15:11:10', 'Teste'),
(4, 1, 3, '2023-11-15 15:11:20', 'Teste'),
(6, 1, 3, '2023-11-15 15:11:00', 'Olá luis, como está?'),
(7, 1, 3, '2023-11-15 16:11:27', 'Eae, tudo certo?'),
(8, 3, 1, '2023-11-15 16:11:18', 'Oi nicole, tudo otimo e vc?'),
(9, 1, 3, '2023-11-15 16:11:19', 'Tudo certo tbm'),
(10, 3, 1, '2023-11-15 16:11:29', 'Que bom :D'),
(11, 1, 3, '2023-11-15 16:11:51', 'Teste'),
(12, 3, 1, '2023-11-15 16:11:54', 'Teste 2'),
(13, 1, 3, '2023-11-15 16:11:26', 'Teste'),
(14, 3, 1, '2023-11-15 16:11:35', 'Teste 2'),
(15, 1, 3, '2023-11-15 16:11:38', 'Teste 3'),
(16, 3, 1, '2023-11-15 16:11:51', 'Abc'),
(17, 1, 3, '2023-11-15 16:11:54', 'Def'),
(18, 1, 3, '2023-11-15 16:11:08', 'abcd'),
(19, 1, 3, '2023-11-15 16:11:15', 'Bom dia'),
(20, 1, 3, '2023-11-15 16:11:43', 'Bom dia /2'),
(21, 3, 1, '2023-11-15 16:11:49', 'Bom dia'),
(22, 1, 3, '2023-11-15 16:11:54', 'Abcdefg'),
(23, 3, 1, '2023-11-15 16:11:03', 'hijklmnopq'),
(24, 3, 1, '2023-11-15 16:11:14', 'Atbsadasd'),
(25, 1, 3, '2023-11-15 16:11:17', 'xddd'),
(26, 3, 1, '2023-11-15 16:11:22', 'xdddd'),
(27, 3, 1, '2023-11-15 16:11:35', 'oiii'),
(28, 3, 3, '2023-11-15 16:11:39', 'oiiii'),
(29, 3, 1, '2023-11-15 16:11:49', 'oii'),
(30, 3, 3, '2023-11-15 16:11:53', 'oiii'),
(31, 1, 3, '2023-11-15 16:11:58', 'oii\n'),
(32, 1, 1, '2023-11-15 16:11:05', 'oi'),
(33, 1, 3, '2023-11-15 16:11:15', 'oi'),
(34, 1, 1, '2023-11-15 16:11:19', 'oi'),
(35, 1, 1, '2023-11-15 16:11:19', 'oi'),
(36, 1, 1, '2023-11-15 16:11:23', 'oi'),
(37, 1, 1, '2023-11-15 16:11:42', 'oi'),
(38, 1, 1, '2023-11-15 16:11:02', 'oi'),
(39, 1, 1, '2023-11-15 16:11:10', 'Teste'),
(40, 3, 1, '2023-11-15 16:11:09', 'Teste'),
(41, 3, 1, '2023-11-15 16:11:16', 'Teste'),
(42, 3, 1, '2023-11-15 16:11:26', 'z\\a'),
(43, 1, 3, '2023-11-15 16:11:33', 'Oi Luis'),
(44, 3, 1, '2023-11-15 17:11:20', 'Tudo certo?'),
(45, 1, 3, '2023-11-15 17:11:27', 'Tudo sim, e vc?'),
(46, 3, 1, '2023-11-15 17:11:30', 'adsadsad'),
(47, 3, 2, '2023-11-15 17:11:13', 'Teste 2'),
(48, 1, 2, '2023-11-15 17:11:14', 'Teste'),
(49, 3, 1, '2023-11-15 17:11:02', 'eai'),
(50, 1, 3, '2023-11-15 17:11:08', 'qual vai ser'),
(51, 3, 1, '2023-11-15 17:11:37', 'oiiiiii'),
(52, 1, 3, '2023-11-15 17:11:47', 'oiiii'),
(53, 1, 3, '2023-11-18 01:11:11', 'EA'),
(54, 3, 1, '2023-11-18 11:11:13', 'oiii'),
(55, 1, 1, '2023-11-18 11:11:38', 'oiiii'),
(56, 3, 1, '2023-11-18 11:11:36', 'oiiiiiiiiiii'),
(57, 1, 3, '2023-11-18 11:11:57', 'aaaaaaaaaa'),
(58, 3, 1, '2023-11-18 11:11:07', 'aaaaaaaaaaaaaaaaa'),
(59, 3, 1, '2023-11-18 11:11:20', 'aaaaaaaa'),
(60, 1, 3, '2023-11-18 11:11:28', 'aaaaaaaaaaaaaa'),
(61, 3, 1, '2023-11-18 11:11:38', 'anjbdsajbsda'),
(62, 1, 7, '2023-11-18 11:11:22', 'oiii teste'),
(63, 1, 3, '2023-11-19 20:11:17', 'rapaz ta certo isso'),
(64, 1, 3, '2023-11-19 20:11:54', 'oiiiiiiiiiiiii');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Notifications`
--

CREATE TABLE `Notifications` (
  `idNotification` int NOT NULL,
  `idUser` int NOT NULL,
  `notification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Notifications`
--

INSERT INTO `Notifications` (`idNotification`, `idUser`, `notification`) VALUES
(1, 2, 'Your project has been deleted as it does not comply with community guidelines.'),
(2, 1, 'You just won a challenge! Check your profile for the new prize!'),
(3, 1, 'Someone liked your new project!'),
(4, 1, 'It looks like people are saving your project!'),
(5, 1, 'People are commenting on your new project!'),
(6, 1, 'It looks like people are saving your project!'),
(7, 3, 'It looks like people are saving your project!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Projects`
--

CREATE TABLE `Projects` (
  `idProject` int NOT NULL,
  `idUser` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `created_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Projects`
--

INSERT INTO `Projects` (`idProject`, `idUser`, `title`, `description`, `created_At`) VALUES
(3, 1, 'hm', 'hmmmmmmmmmmmmmmmmmm', '2023-11-06 16:55:28'),
(4, 1, 'a', 'a', '2023-11-14 21:44:28'),
(5, 7, 'teste', 'a', '2023-11-08 15:25:47'),
(6, 1, 'aaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-11-07 22:15:03'),
(8, 3, 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-11-08 15:34:51'),
(11, 2, 'aaaaa', 'aaaaa', '2023-11-02 19:25:16'),
(13, 2, 'aaaaa', 'aaaaa', '2023-11-07 00:35:11'),
(14, 1, 'teste', 'aaaaaa', '2023-11-03 01:17:58'),
(15, 7, 'teste', 'teste', '2023-11-15 02:20:22'),
(16, 12, 'teste', 'teste', '2023-11-15 02:21:21'),
(23, 2, 'SSSSSSSSS', 'SSSSSSSSSSSSSSSSSSSSSS', '2023-11-21 20:37:47'),
(24, 2, 'SSSSSSSSS', 'SSSSSSSSSSSSSSSSSSSSSS', '2023-11-21 20:37:47'),
(25, 2, 'SSSSSSSSS', 'SSSSSSSSSSSSSSSSSSSSSS', '2023-11-21 20:37:47'),
(26, 1, 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaa', '2023-11-21 21:04:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Report`
--

CREATE TABLE `Report` (
  `idReport` int NOT NULL,
  `idUser` int NOT NULL,
  `idProject` int NOT NULL,
  `report` text NOT NULL,
  `action` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Report`
--

INSERT INTO `Report` (`idReport`, `idUser`, `idProject`, `report`, `action`) VALUES
(1, 2, 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0),
(8, 2, 23, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA', 0),
(9, 2, 24, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Save_Projects`
--

CREATE TABLE `Save_Projects` (
  `idSave` int NOT NULL,
  `idProject` int DEFAULT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Save_Projects`
--

INSERT INTO `Save_Projects` (`idSave`, `idProject`, `idUser`) VALUES
(4, 6, 1),
(5, 3, 1),
(6, 13, 1),
(7, 3, 3),
(9, 6, 3),
(10, 8, 3),
(11, 13, 11),
(15, 26, 1),
(16, 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tokens`
--

CREATE TABLE `Tokens` (
  `idToken` int NOT NULL,
  `idUser` int DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Tokens`
--

INSERT INTO `Tokens` (`idToken`, `idUser`, `token`, `createdAt`) VALUES
(18, 13, 'b316d4dad86aabebb731e2fd229e48e7110ad5f00da9f1db6a4a8f82f9d37266', '2023-11-27 02:21:16'),
(25, 1, '41af921f61247debe112d023375b82f4bb3644bc2170740769032e381db60da5', '2023-11-27 18:24:55'),
(26, 1, 'a6c5534d8156d2188badfd0ee1c751a10d8e5c0c12b24a940e3bf93cf3f325f7', '2023-11-27 18:25:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tools`
--

CREATE TABLE `Tools` (
  `idTool` int NOT NULL,
  `icon` varchar(255) NOT NULL,
  `caption` varchar(150) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Tools`
--

INSERT INTO `Tools` (`idTool`, `icon`, `caption`, `color`) VALUES
(2, 'icon-id2.jpg', 'eita como é ', 'blue'),
(4, 'icon-id4.jpg', 'cat', '#0e9fdd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users`
--

CREATE TABLE `Users` (
  `idUser` int NOT NULL,
  `tag` int NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` int NOT NULL,
  `xp` double NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `admin` tinyint NOT NULL,
  `createdAt` datetime NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`idUser`, `tag`, `nickname`, `email`, `password`, `avatar`, `level`, `xp`, `resume`, `admin`, `createdAt`, `location`, `status`) VALUES
(1, 3182, 'nick', 'nicolealvesraimundo@gmail.com', '$2y$10$ToTnvIFwy1uJ0xXAzZkeYe3kDpxoLbzbz.zcvJfqdd21Nxd5UwCEe', 'avatar-id1.jpg', 100, 3660, 'beibebeibe do biruleibe', 1, '2023-08-26 11:48:25', 'Itapevi, Sp', NULL),
(2, 6149, 'amor', 'amor@gmail.com', '$2y$10$ptSxKR8Ld8SQiWUahYOE/OCWWhAUFtS94wRsh5iaQPmiciA/vHg4u', 'cat.jpg', 87, 0, NULL, 1, '2023-10-30 23:02:58', NULL, NULL),
(3, 1240, 'luis', 'luis@gmail.com', '$2y$10$7/P0zds4rLb9SIqb1uXNcOX9srVUyvHVhNy/aH5itMQ22MGVYxxPe', 'avatar-id3.jpg', 3, 20, 'meu resuminho', 1, '2023-11-02 20:51:28', '', NULL),
(5, 1303, 'teste', 'teste@gmail.com', '$2y$10$HQWesWLoaOz84gfHeiC4iOPuMx5KK0HcpBPmAeB6wWU3Y0kTNjBzO', 'cat.jpg', 4, 25, 'kkkkkkkkkkk', 1, '2023-11-03 01:34:14', 'bbkkkkkkkkkkkk', NULL),
(7, 4120, 'teste3', 'Lety@gmail.com', '$2y$10$4cijvcz5FpViNEi5l4eu7OBlZhNm0DjkCfu99euZOlOfpe4v1wQRG', 'cat.jpg', 3, 10, NULL, 1, '2023-11-06 14:03:55', NULL, NULL),
(11, 9506, 'teste2', 'nick@gmail.com', '$2y$10$0MZUPUV3JkxVV8cnFTETluH1c3RL6gY5hVOaFHDliBvrEp7ud1k0y', 'cat.jpg', 5, 0, NULL, 0, '2023-11-06 14:14:32', NULL, NULL),
(12, 3180, 'aaaaaaaaaaaaaa', 'aaaaaaaaa@fghvjj', '$2y$10$lnXq0Yooji6INBEq3pD0Me4WQcWSUu0QigkI/gyiLlWbFVC2cU4gO', 'cat.jpg', 20, 0, NULL, 1, '2023-11-06 14:20:12', NULL, 'banned'),
(13, 4307, 'nicks', 'nicks@gmail.com', '$2y$10$c4TGBJlggu/C/bR04f7xt.zHckiwU8etgzc4AUAY7hSplC0aJ.JKm', 'cat.jpg', 1, 0, NULL, 1, '2023-11-20 23:20:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users_Tools`
--

CREATE TABLE `Users_Tools` (
  `idUser` int NOT NULL,
  `idTool` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Users_Tools`
--

INSERT INTO `Users_Tools` (`idUser`, `idTool`) VALUES
(1, 2),
(1, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Winners`
--

CREATE TABLE `Winners` (
  `idUser` int NOT NULL,
  `idChallenge` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Winners`
--

INSERT INTO `Winners` (`idUser`, `idChallenge`) VALUES
(1, 94);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Awards`
--
ALTER TABLE `Awards`
  ADD PRIMARY KEY (`idAward`),
  ADD KEY `Awards_ibfk_1` (`idUser`),
  ADD KEY `Awards_ibfk_2` (`idChallenge`);

--
-- Índices para tabela `Challenges`
--
ALTER TABLE `Challenges`
  ADD PRIMARY KEY (`idChallenge`);

--
-- Índices para tabela `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idUser_idx` (`idUser`),
  ADD KEY `idProject_idx` (`idProject`);

--
-- Índices para tabela `Competitors`
--
ALTER TABLE `Competitors`
  ADD PRIMARY KEY (`idChallenge`,`idUser`),
  ADD KEY `fk_Challenges_has_Users_Users1_idx` (`idUser`),
  ADD KEY `fk_Challenges_has_Users_Challenges1_idx` (`idChallenge`);

--
-- Índices para tabela `Educations`
--
ALTER TABLE `Educations`
  ADD PRIMARY KEY (`idEducation`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Índices para tabela `Favorites`
--
ALTER TABLE `Favorites`
  ADD PRIMARY KEY (`idFavorite`),
  ADD KEY `idUser_idx` (`idUser`),
  ADD KEY `idProject_idx` (`idProject`);

--
-- Índices para tabela `Files`
--
ALTER TABLE `Files`
  ADD PRIMARY KEY (`idFiles`,`idProject`),
  ADD KEY `idProject_idx` (`idProject`);

--
-- Índices para tabela `Hashtags`
--
ALTER TABLE `Hashtags`
  ADD PRIMARY KEY (`idHashtag`);

--
-- Índices para tabela `Hashtags_Challenges`
--
ALTER TABLE `Hashtags_Challenges`
  ADD PRIMARY KEY (`idChallenge`,`idHashtag`),
  ADD KEY `fk_Challenges_has_Hashtags_Hashtags1_idx` (`idHashtag`),
  ADD KEY `fk_Challenges_has_Hashtags_Challenges1_idx` (`idChallenge`);

--
-- Índices para tabela `Hashtags_Projects`
--
ALTER TABLE `Hashtags_Projects`
  ADD PRIMARY KEY (`idHashtag`,`idProject`),
  ADD KEY `fk_Hashtags_has_Projects_Projects1_idx` (`idProject`),
  ADD KEY `fk_Hashtags_has_Projects_Hashtags1_idx` (`idHashtag`);

--
-- Índices para tabela `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`idImage`,`idProject`),
  ADD KEY `idProject_idx` (`idProject`);

--
-- Índices para tabela `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUser_idx` (`idUser`),
  ADD KEY `idProject_idx` (`idProject`);

--
-- Índices para tabela `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `sender` (`senderId`),
  ADD KEY `receiver` (`receiverId`);

--
-- Índices para tabela `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`idNotification`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`idProject`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Índices para tabela `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`idReport`),
  ADD KEY `idProject` (`idProject`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  ADD PRIMARY KEY (`idSave`),
  ADD KEY `idProject` (`idProject`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `Tokens`
--
ALTER TABLE `Tokens`
  ADD PRIMARY KEY (`idToken`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `Tools`
--
ALTER TABLE `Tools`
  ADD PRIMARY KEY (`idTool`);

--
-- Índices para tabela `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices para tabela `Users_Tools`
--
ALTER TABLE `Users_Tools`
  ADD PRIMARY KEY (`idUser`,`idTool`),
  ADD KEY `fk_Users_has_Tools_Tools1_idx` (`idTool`),
  ADD KEY `fk_Users_has_Tools_Users_idx` (`idUser`);

--
-- Índices para tabela `Winners`
--
ALTER TABLE `Winners`
  ADD KEY `Winners_ibfk_1` (`idChallenge`),
  ADD KEY `Winners_ibfk_2` (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Awards`
--
ALTER TABLE `Awards`
  MODIFY `idAward` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `Challenges`
--
ALTER TABLE `Challenges`
  MODIFY `idChallenge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de tabela `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `Educations`
--
ALTER TABLE `Educations`
  MODIFY `idEducation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `idFavorite` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Files`
--
ALTER TABLE `Files`
  MODIFY `idFiles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `Hashtags`
--
ALTER TABLE `Hashtags`
  MODIFY `idHashtag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Images`
--
ALTER TABLE `Images`
  MODIFY `idImage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idLike` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `Messages`
--
ALTER TABLE `Messages`
  MODIFY `idMessage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `idNotification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `Projects`
--
ALTER TABLE `Projects`
  MODIFY `idProject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `Report`
--
ALTER TABLE `Report`
  MODIFY `idReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  MODIFY `idSave` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `Tokens`
--
ALTER TABLE `Tokens`
  MODIFY `idToken` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `Tools`
--
ALTER TABLE `Tools`
  MODIFY `idTool` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Awards`
--
ALTER TABLE `Awards`
  ADD CONSTRAINT `Awards_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Awards_ibfk_2` FOREIGN KEY (`idChallenge`) REFERENCES `Challenges` (`idChallenge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `idProject1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUser0` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Competitors`
--
ALTER TABLE `Competitors`
  ADD CONSTRAINT `fk_Challenges_has_Users_Challenges1` FOREIGN KEY (`idChallenge`) REFERENCES `Challenges` (`idChallenge`),
  ADD CONSTRAINT `fk_Challenges_has_Users_Users1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Educations`
--
ALTER TABLE `Educations`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `idProject2` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`),
  ADD CONSTRAINT `idUser1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Files`
--
ALTER TABLE `Files`
  ADD CONSTRAINT `idProject0` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Hashtags_Challenges`
--
ALTER TABLE `Hashtags_Challenges`
  ADD CONSTRAINT `fk_Challenges_has_Hashtags_Challenges1` FOREIGN KEY (`idChallenge`) REFERENCES `Challenges` (`idChallenge`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Challenges_has_Hashtags_Hashtags1` FOREIGN KEY (`idHashtag`) REFERENCES `Hashtags` (`idHashtag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Hashtags_Projects`
--
ALTER TABLE `Hashtags_Projects`
  ADD CONSTRAINT `fk_Hashtags_has_Projects_Hashtags1` FOREIGN KEY (`idHashtag`) REFERENCES `Hashtags` (`idHashtag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Hashtags_has_Projects_Projects1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `idProject` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `fk_Likes_Projects` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Likes_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`senderId`) REFERENCES `Users` (`idUser`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receiverId`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Notifications`
--
ALTER TABLE `Notifications`
  ADD CONSTRAINT `Notifications_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `fk_Projects_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `Report_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Report_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  ADD CONSTRAINT `Save_Projects_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Save_Projects_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Tokens`
--
ALTER TABLE `Tokens`
  ADD CONSTRAINT `Tokens_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Users_Tools`
--
ALTER TABLE `Users_Tools`
  ADD CONSTRAINT `fk_Users_has_Tools_Tools1` FOREIGN KEY (`idTool`) REFERENCES `Tools` (`idTool`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Users_has_Tools_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Winners`
--
ALTER TABLE `Winners`
  ADD CONSTRAINT `Winners_ibfk_1` FOREIGN KEY (`idChallenge`) REFERENCES `Challenges` (`idChallenge`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Winners_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
