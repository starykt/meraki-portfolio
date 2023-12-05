-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 05-Dez-2023 às 12:22
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
(9, NULL, 9, 'Best Pumpkin - Halloween', '2023-12-04', 'imagePath-9.png'),
(10, 2, 10, 'Melhor Personagem Natalino - 3D Model', '2023-12-04', 'imagePath-10.png'),
(11, NULL, 11, 'MENU DESTAQUE - UM BELO ÍNICIO', '2023-12-04', 'imagePath-11.png'),
(12, 16, 12, 'PIXEL PERFEITO', '2023-12-04', 'imagePath-12.png'),
(13, 14, 13, 'ARMA DE GALA - SKIN DESIGN', '2023-12-04', 'imagePath-13.png'),
(14, 16, 14, 'MELHOR ROTEIRO - GAME BRASIL', '2023-12-04', 'imagePath-14.png');

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
(9, 2, 'In this challenge, you have to post a model 3D of a scare pumpkin for halloween. Good luck guuuuys...', 'Best Pumpkin - Halloween', '2000', 'banner-9.jpg', '2023-12-05 00:00:00'),
(10, 2, 'Crie personagens 3D únicos inspirados no Natal, expressando originalidade e capturando a essência festiva em suas modelagens.', 'Melhor Personagem Natalino - 3D Model', '2000', 'banner-10.jpg', '2023-12-03 00:00:00'),
(11, 2, 'No desafio \"Menu Destaque\", deve-se dedicar sua criatividade para conceber um menu principal envolvente e funcional, cuidadosamente projetado para imergir os jogadores na experiência.  Seu design inovador deve refletir não apenas a estética, mas também a praticidade, tornando-o um concorrente forte ', 'MENU DESTAQUE - UM BELO ÍNICIO', '2000', 'banner-11.jpg', '2023-12-05 00:00:00'),
(12, 2, 'Crie uma PixelArt com tema livre!', 'PIXEL PERFEITO', '2000', 'banner-12.png', '2023-12-03 00:00:00'),
(13, 2, 'Crie a sua skin para uma arma de algum jogo de sua preferência.', 'ARMA DE GALA - SKIN DESIGN', '2000', 'banner-13.JPG', '2023-12-03 00:00:00'),
(14, 2, 'Crie um roteiro de um jogo com o tema: \"Brasil\".\r\nLimite de 3 personagens por roteiro.', 'MELHOR ROTEIRO - GAME BRASIL', '2000', 'banner-14.jpg', '2023-12-03 00:00:00');

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
(1, 3, 1, 'Iniciei na pandemia modelagem com Blender <3 top', '2023-12-02 18:22:49'),
(2, 4, 1, 'omg good luck', '2023-12-02 18:25:32'),
(3, 4, 4, 'that looks awesome <3', '2023-12-02 18:25:51'),
(4, 1, 5, 'MUITO BOMM', '2023-12-02 18:31:22'),
(5, 5, 7, 'ficaram assustadoramente adoráveis', '2023-12-02 18:39:47'),
(6, 5, 1, 'pra frente sempre', '2023-12-02 18:40:05'),
(7, 6, 4, 'seu projeto é inspirador', '2023-12-02 18:42:00'),
(8, 1, 10, 'meu deus isso está lindo', '2023-12-02 18:45:46'),
(9, 2, 4, 'uauu', '2023-12-03 11:30:30'),
(10, 2, 10, 'eu amei!!', '2023-12-03 20:34:35'),
(12, 16, 5, 'adoreiii', '2023-12-04 13:49:01'),
(13, 16, 18, 'que bacanaa', '2023-12-04 13:49:14'),
(14, 16, 28, 'sigo o criador em todas as plataformas!!', '2023-12-04 13:49:53'),
(15, 16, 15, 'O MELHOR JOGOOO', '2023-12-04 13:50:16'),
(16, 2, 15, 'Tenho 500h jogadas e conclui a perfeição 😍', '2023-12-04 13:51:04'),
(17, 2, 28, 'Que bacana, não conhecia!', '2023-12-04 13:51:32'),
(18, 2, 21, 'Nostalgia pura!!', '2023-12-04 13:52:02'),
(19, 2, 17, 'Uau, parabens pela dedicação', '2023-12-04 13:52:38'),
(20, 7, 28, 'adorei a essênciaaa', '2023-12-04 13:53:33'),
(21, 7, 18, 'ameii', '2023-12-04 13:54:09'),
(22, 7, 27, 'Acompanhei o RPG desde o inicio 🚀', '2023-12-04 13:54:54'),
(23, 7, 26, 'Eu amo a nostalgia que esse jogo me passa', '2023-12-04 13:56:15'),
(24, 7, 21, 'AMO!', '2023-12-04 13:56:33'),
(25, 7, 1, 'uauuu', '2023-12-04 13:57:26'),
(26, 7, 9, 'adoreiii', '2023-12-04 13:57:42'),
(27, 7, 17, 'Muito bom', '2023-12-04 13:58:17'),
(28, 2, 7, 'buuuu 🎃', '2023-12-04 15:57:52'),
(29, 9, 27, 'eu adorei, ajudei com um donate!', '2023-12-04 15:59:32'),
(30, 9, 10, 'gameMarker o melhor', '2023-12-04 16:00:37'),
(31, 13, 18, 'adorei seu trabalho, vou te chamar para conversar ', '2023-12-04 16:03:24'),
(32, 1, 31, 'que fofas, parabéns, boa sorte no desafio c:', '2023-12-04 18:11:04'),
(33, 1, 25, 'for realll', '2023-12-04 18:11:22'),
(34, 12, 33, 'nicee 🎮🕹️', '2023-12-04 18:20:48'),
(35, 16, 34, 'ficaram lindas, também gosto de Genshin 🎯', '2023-12-04 18:32:36'),
(36, 13, 35, 'está incrível, cheio de ação 🧙‍♀️🕸️', '2023-12-04 18:37:40'),
(37, 18, 18, 'adorei', '2023-12-05 00:22:31');

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
(3, 'ADS - FATEC', 2);

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
(1, 1, 'file-id1-1701466449-0.png'),
(2, 25, 'file-id25-1701695084-0.gif'),
(3, 35, 'file-id35-1701714980-0');

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
(2, 'BLENDER'),
(3, '3DSMAX'),
(4, 'MODELOS3D'),
(5, 'HISTÓRIA'),
(6, 'HALLOWEEN2022'),
(7, 'DEV'),
(8, 'FIGMA'),
(9, 'UNREAL'),
(10, 'INDIE'),
(11, 'NOVIDADE'),
(12, 'NOSTALGIA'),
(13, 'ATUALIZAÇÃO'),
(14, 'RPG'),
(15, 'GAMEMAKER'),
(24, 'HALLOWEN2023'),
(25, 'NATAL2023'),
(26, 'STARTGAME'),
(27, 'PIXEL2023'),
(28, 'ARMADESIGN'),
(29, 'MELHORROTEIRO');

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
(9, 24),
(10, 25),
(11, 26),
(12, 27),
(13, 28),
(14, 29);

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
(15, 4),
(27, 4),
(5, 5),
(9, 5),
(12, 5),
(24, 7),
(2, 9),
(9, 9),
(10, 10),
(11, 10),
(27, 10),
(10, 15),
(9, 16),
(12, 21),
(12, 26),
(11, 27),
(10, 28),
(11, 28),
(24, 31),
(25, 32),
(26, 33),
(28, 34),
(29, 35);

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
(1, 1, 'img-id1-1701466448-0.jpg'),
(8, 4, 'img-id4-1701541324-0.jpeg'),
(9, 4, 'img-id4-1701541324-1.png'),
(10, 4, 'img-id4-1701541324-2.jpg'),
(11, 5, 'img-id5-1701541504-0.jpg'),
(15, 7, 'img-id7-1701541963-0.jpeg'),
(16, 7, 'img-id7-1701541963-1.jpeg'),
(17, 7, 'img-id7-1701541963-2.jpeg'),
(19, 9, 'img-id9-1701542291-0.jpg'),
(20, 10, 'img-id10-1701542462-0.png'),
(21, 15, 'img-id15-1701692116-0.png'),
(22, 16, 'img-id16-1701692237-0.jpg'),
(23, 17, 'img-id17-1701692447-0.gif'),
(24, 18, 'img-id18-1701692735-0.jpg'),
(25, 18, 'img-id18-1701692735-1.jpg'),
(26, 18, 'img-id18-1701692735-2.jpg'),
(27, 20, 'img-id20-1701694406-0.jpg'),
(28, 21, 'img-id21-1701694716-0.gif'),
(29, 22, 'img-id22-1701694831-0.gif'),
(30, 26, 'img-id26-1701695240-0.gif'),
(31, 27, 'img-id27-1701695419-0.jpg'),
(32, 28, 'img-id28-1701695564-0.jpg'),
(35, 31, 'img-id31-1701713120-0.jpg'),
(36, 32, 'img-id32-1701713646-0.jpg'),
(37, 33, 'img-id33-1701713968-0.png'),
(38, 34, 'img-id34-1701714581-0.png');

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
(1, 3, 1),
(2, 4, 1),
(3, 4, 5),
(4, 4, 4),
(5, 1, 5),
(6, 1, 7),
(7, 1, 4),
(8, 5, 9),
(9, 5, 5),
(10, 5, 4),
(11, 6, 9),
(12, 6, 5),
(13, 1, 10),
(14, 1, 9),
(15, 1, 1),
(78, 2, 7),
(79, 2, 1),
(82, 2, 9),
(87, 2, 28),
(88, 2, 27),
(89, 2, 26),
(90, 2, 25),
(91, 2, 23),
(92, 2, 22),
(93, 2, 21),
(94, 2, 20),
(95, 2, 19),
(96, 2, 17),
(97, 2, 16),
(98, 2, 15),
(99, 2, 5),
(100, 1, 18),
(101, 1, 28),
(102, 1, 27),
(103, 1, 26),
(104, 1, 25),
(105, 1, 22),
(106, 1, 21),
(107, 1, 20),
(108, 1, 19),
(109, 1, 16),
(110, 1, 15),
(111, 7, 18),
(112, 7, 28),
(113, 7, 27),
(114, 7, 26),
(115, 7, 23),
(116, 7, 25),
(117, 7, 22),
(118, 7, 21),
(119, 7, 20),
(120, 7, 19),
(121, 7, 17),
(122, 7, 16),
(123, 7, 15),
(124, 7, 10),
(125, 7, 9),
(126, 7, 7),
(127, 7, 5),
(128, 7, 4),
(129, 7, 1),
(130, 12, 18),
(131, 12, 28),
(132, 12, 27),
(133, 12, 26),
(134, 12, 25),
(135, 12, 23),
(136, 12, 22),
(137, 12, 21),
(138, 12, 20),
(139, 12, 19),
(140, 12, 17),
(141, 12, 16),
(142, 12, 15),
(143, 12, 10),
(144, 12, 9),
(145, 12, 7),
(146, 12, 5),
(147, 12, 4),
(148, 12, 1),
(149, 3, 28),
(150, 3, 27),
(151, 3, 26),
(152, 3, 25),
(153, 3, 22),
(154, 3, 20),
(155, 3, 17),
(156, 3, 16),
(157, 3, 15),
(158, 3, 10),
(159, 3, 9),
(160, 3, 5),
(161, 3, 4),
(162, 5, 18),
(163, 5, 28),
(164, 5, 27),
(165, 5, 25),
(166, 5, 22),
(167, 5, 20),
(168, 5, 16),
(169, 5, 17),
(170, 5, 7),
(171, 8, 18),
(172, 8, 28),
(173, 8, 27),
(174, 8, 26),
(175, 8, 25),
(176, 8, 20),
(177, 8, 16),
(178, 8, 7),
(179, 8, 5),
(180, 8, 4),
(181, 8, 1),
(182, 11, 28),
(183, 11, 27),
(184, 11, 26),
(185, 11, 22),
(186, 11, 7),
(187, 11, 5),
(188, 11, 4),
(189, 11, 1),
(190, 13, 18),
(191, 13, 28),
(192, 13, 27),
(193, 13, 22),
(194, 13, 21),
(195, 13, 20),
(196, 13, 16),
(197, 13, 15),
(198, 13, 10),
(199, 13, 9),
(200, 13, 5),
(201, 13, 4),
(202, 16, 18),
(203, 16, 28),
(204, 16, 20),
(205, 16, 16),
(206, 16, 15),
(207, 16, 4),
(208, 16, 5),
(209, 9, 28),
(210, 9, 22),
(211, 9, 27),
(212, 9, 25),
(213, 9, 23),
(214, 9, 20),
(215, 9, 16),
(216, 9, 15),
(217, 9, 10),
(218, 9, 5),
(219, 9, 4),
(221, 1, 31),
(222, 2, 31),
(223, 3, 31),
(224, 3, 18),
(225, 8, 31),
(226, 2, 32),
(227, 8, 32),
(228, 8, 33),
(229, 12, 33),
(230, 12, 31),
(231, 12, 32),
(232, 14, 34),
(233, 14, 18),
(234, 16, 34),
(235, 16, 33),
(236, 16, 32),
(237, 16, 35),
(238, 13, 35),
(239, 13, 34),
(240, 2, 35),
(241, 2, 34),
(242, 2, 4),
(243, 18, 18);

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
(1, 13, 2, '2023-12-04 16:12:01', 'Olá! Vi seu projeto e adorei tudo sobre, pode me falar mais sobre?'),
(2, 2, 13, '2023-12-04 16:12:57', 'Claro, vai ser um prazer falar sobre!'),
(3, 2, 13, '2023-12-04 16:12:25', 'adoro compartilhar sobre <3\n'),
(10, 13, 2, '2023-12-04 16:12:40', 'opa, planeja publicar em alguma outra plataforma?'),
(11, 2, 13, '2023-12-04 16:12:03', 'ainda não tenho certeza'),
(13, 13, 2, '2023-12-04 16:12:07', 'hmmm, tem opção interessantes'),
(14, 2, 13, '2023-12-04 16:12:17', 'tipo?'),
(15, 13, 2, '2023-12-04 16:12:29', 'dá uma pesquisada'),
(16, 2, 9, '2023-12-04 16:12:28', 'oiii, adoro suas publicações'),
(17, 9, 2, '2023-12-04 16:12:17', 'aaa, obrigado <3'),
(18, 9, 2, '2023-12-04 16:12:36', 'fico feliz ;)'),
(19, 2, 16, '2023-12-04 18:12:58', 'Parabéns pelos seus novos prêmios ❤️'),
(20, 16, 2, '2023-12-04 18:12:28', 'Muito obrigada! ❤️'),
(21, 18, 2, '2023-12-05 00:12:19', 'oiiii'),
(22, 2, 18, '2023-12-05 00:12:30', 'oiiii');

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
(1, 1, 'It looks like people are saving your project!'),
(2, 1, 'Someone liked your new project!'),
(3, 1, 'People are commenting on your new project!'),
(4, 1, 'It looks like people are saving your project!'),
(5, 1, 'Someone liked your new project!'),
(6, 1, 'People are commenting on your new project!'),
(7, 4, 'Someone liked your new project!'),
(8, 4, 'It looks like people are saving your project!'),
(9, 3, 'Someone liked your new project!'),
(10, 3, 'People are commenting on your new project!'),
(11, 4, 'Someone liked your new project!'),
(12, 4, 'People are commenting on your new project!'),
(13, 1, 'It looks like people are saving your project!'),
(14, 1, 'Someone liked your new project!'),
(15, 3, 'It looks like people are saving your project!'),
(16, 3, 'Someone liked your new project!'),
(17, 5, 'Someone liked your new project!'),
(18, 1, 'People are commenting on your new project!'),
(19, 4, 'Someone liked your new project!'),
(20, 3, 'Someone liked your new project!'),
(21, 1, 'People are commenting on your new project!'),
(22, 5, 'Someone liked your new project!'),
(23, 1, 'It looks like people are saving your project!'),
(24, 4, 'Someone liked your new project!'),
(25, 3, 'It looks like people are saving your project!'),
(26, 3, 'People are commenting on your new project!'),
(27, 6, 'Someone liked your new project!'),
(28, 6, 'It looks like people are saving your project!'),
(29, 6, 'People are commenting on your new project!'),
(30, 5, 'Someone liked your new project!'),
(31, 1, 'It looks like people are saving your project!'),
(32, 1, 'It looks like people are saving your project!'),
(33, 3, 'People are commenting on your new project!'),
(34, 1, 'Someone liked your new project!'),
(35, 3, 'Someone liked your new project!'),
(36, 6, 'Someone liked your new project!'),
(37, 6, 'Someone liked your new project!'),
(38, 5, 'Someone liked your new project!'),
(39, 5, 'Someone liked your new project!'),
(40, 6, 'Someone liked your new project!'),
(41, 5, 'Someone liked your new project!'),
(42, 5, 'Someone liked your new project!'),
(43, 6, 'Someone liked your new project!'),
(44, 6, 'Someone liked your new project!'),
(45, 6, 'Someone liked your new project!'),
(46, 5, 'Someone liked your new project!'),
(47, 5, 'Someone liked your new project!'),
(48, 5, 'Someone liked your new project!'),
(49, 6, 'Someone liked your new project!'),
(50, 5, 'Someone liked your new project!'),
(51, 1, 'Someone liked your new project!'),
(52, 1, 'Someone liked your new project!'),
(53, 1, 'Someone liked your new project!'),
(54, 1, 'Someone liked your new project!'),
(55, 1, 'Someone liked your new project!'),
(56, 1, 'Someone liked your new project!'),
(57, 1, 'Someone liked your new project!'),
(58, 1, 'Someone liked your new project!'),
(59, 1, 'Someone liked your new project!'),
(60, 6, 'Someone liked your new project!'),
(61, 2, 'Someone liked your new project!'),
(62, 2, 'Someone liked your new project!'),
(63, 2, 'Someone liked your new project!'),
(64, 2, 'Someone liked your new project!'),
(65, 2, 'Someone liked your new project!'),
(66, 2, 'Someone liked your new project!'),
(67, 2, 'Someone liked your new project!'),
(68, 2, 'Someone liked your new project!'),
(69, 2, 'Someone liked your new project!'),
(70, 2, 'Someone liked your new project!'),
(71, 2, 'Someone liked your new project!'),
(72, 2, 'Someone liked your new project!'),
(73, 2, 'Someone liked your new project!'),
(74, 2, 'Someone liked your new project!'),
(75, 2, 'Someone liked your new project!'),
(76, 2, 'Someone liked your new project!'),
(77, 2, 'Someone liked your new project!'),
(78, 2, 'Someone liked your new project!'),
(79, 2, 'Someone liked your new project!'),
(80, 2, 'Someone liked your new project!'),
(81, 2, 'Someone liked your new project!'),
(82, 2, 'Someone liked your new project!'),
(83, 2, 'It looks like people are saving your project!'),
(84, 2, 'Someone liked your new project!'),
(85, 2, 'Someone liked your new project!'),
(86, 2, 'Someone liked your new project!'),
(87, 2, 'Someone liked your new project!'),
(88, 1, 'Someone liked your new project!'),
(89, 1, 'Someone liked your new project!'),
(90, 5, 'Someone liked your new project!'),
(91, 1, 'Someone liked your new project!'),
(92, 1, 'Someone liked your new project!'),
(93, 1, 'Someone liked your new project!'),
(94, 6, 'Someone liked your new project!'),
(95, 3, 'Someone liked your new project!'),
(96, 6, 'Someone liked your new project!'),
(97, 1, 'Someone liked your new project!'),
(98, 1, 'Someone liked your new project!'),
(99, 1, 'Someone liked your new project!'),
(100, 6, 'Someone liked your new project!'),
(101, 6, 'Someone liked your new project!'),
(102, 6, 'People are commenting on your new project!'),
(103, 5, 'Someone liked your new project!'),
(104, 2, 'Your project has been deleted as it does not comply with community guidelines.'),
(105, 3, 'Someone liked your new project!'),
(106, 3, 'Someone liked your new project!'),
(107, 2, 'People are commenting on your new project!'),
(108, 2, 'Someone liked your new project!'),
(109, 2, 'Someone liked your new project!'),
(110, 9, 'Someone liked your new project!'),
(111, 2, 'Someone liked your new project!'),
(112, 8, 'Someone liked your new project!'),
(113, 5, 'Someone liked your new project!'),
(114, 4, 'Someone liked your new project!'),
(115, 13, 'Someone liked your new project!'),
(116, 14, 'Someone liked your new project!'),
(117, 12, 'Someone liked your new project!'),
(118, 4, 'Someone liked your new project!'),
(119, 3, 'Someone liked your new project!'),
(120, 2, 'Someone liked your new project!'),
(121, 7, 'Someone liked your new project!'),
(122, 4, 'Someone liked your new project!'),
(123, 2, 'Someone liked your new project!'),
(124, 9, 'Someone liked your new project!'),
(125, 2, 'Someone liked your new project!'),
(126, 8, 'Someone liked your new project!'),
(127, 5, 'Someone liked your new project!'),
(128, 13, 'Someone liked your new project!'),
(129, 14, 'Someone liked your new project!'),
(130, 12, 'Someone liked your new project!'),
(131, 4, 'Someone liked your new project!'),
(132, 2, 'Someone liked your new project!'),
(133, 7, 'Someone liked your new project!'),
(134, 2, 'Someone liked your new project!'),
(135, 9, 'Someone liked your new project!'),
(136, 2, 'Someone liked your new project!'),
(137, 8, 'Someone liked your new project!'),
(138, 4, 'Someone liked your new project!'),
(139, 5, 'Someone liked your new project!'),
(140, 13, 'Someone liked your new project!'),
(141, 14, 'Someone liked your new project!'),
(142, 12, 'Someone liked your new project!'),
(143, 4, 'Someone liked your new project!'),
(144, 3, 'Someone liked your new project!'),
(145, 2, 'Someone liked your new project!'),
(146, 7, 'Someone liked your new project!'),
(147, 6, 'Someone liked your new project!'),
(148, 5, 'Someone liked your new project!'),
(149, 1, 'Someone liked your new project!'),
(150, 4, 'Someone liked your new project!'),
(151, 3, 'Someone liked your new project!'),
(152, 1, 'Someone liked your new project!'),
(153, 2, 'Someone liked your new project!'),
(154, 9, 'Someone liked your new project!'),
(155, 2, 'Someone liked your new project!'),
(156, 8, 'Someone liked your new project!'),
(157, 5, 'Someone liked your new project!'),
(158, 4, 'Someone liked your new project!'),
(159, 13, 'Someone liked your new project!'),
(160, 14, 'Someone liked your new project!'),
(161, 12, 'Someone liked your new project!'),
(162, 4, 'Someone liked your new project!'),
(163, 3, 'Someone liked your new project!'),
(164, 2, 'Someone liked your new project!'),
(165, 7, 'Someone liked your new project!'),
(166, 6, 'Someone liked your new project!'),
(167, 5, 'Someone liked your new project!'),
(168, 1, 'Someone liked your new project!'),
(169, 4, 'Someone liked your new project!'),
(170, 3, 'Someone liked your new project!'),
(171, 1, 'Someone liked your new project!'),
(172, 9, 'Someone liked your new project!'),
(173, 2, 'Someone liked your new project!'),
(174, 8, 'Someone liked your new project!'),
(175, 5, 'Someone liked your new project!'),
(176, 13, 'Someone liked your new project!'),
(177, 12, 'Someone liked your new project!'),
(178, 3, 'Someone liked your new project!'),
(179, 2, 'Someone liked your new project!'),
(180, 7, 'Someone liked your new project!'),
(181, 6, 'Someone liked your new project!'),
(182, 5, 'Someone liked your new project!'),
(183, 4, 'Someone liked your new project!'),
(184, 3, 'Someone liked your new project!'),
(185, 2, 'It looks like people are saving your project!'),
(186, 2, 'It looks like people are saving your project!'),
(187, 13, 'It looks like people are saving your project!'),
(188, 12, 'It looks like people are saving your project!'),
(189, 4, 'It looks like people are saving your project!'),
(190, 4, 'It looks like people are saving your project!'),
(191, 2, 'Someone liked your new project!'),
(192, 9, 'Someone liked your new project!'),
(193, 9, 'It looks like people are saving your project!'),
(194, 2, 'It looks like people are saving your project!'),
(195, 2, 'It looks like people are saving your project!'),
(196, 2, 'Someone liked your new project!'),
(197, 5, 'Someone liked your new project!'),
(198, 13, 'Someone liked your new project!'),
(199, 12, 'Someone liked your new project!'),
(200, 12, 'It looks like people are saving your project!'),
(201, 13, 'It looks like people are saving your project!'),
(202, 2, 'It looks like people are saving your project!'),
(203, 2, 'Someone liked your new project!'),
(204, 3, 'Someone liked your new project!'),
(205, 1, 'Someone liked your new project!'),
(206, 3, 'It looks like people are saving your project!'),
(207, 2, 'Someone liked your new project!'),
(208, 2, 'It looks like people are saving your project!'),
(209, 9, 'Someone liked your new project!'),
(210, 9, 'It looks like people are saving your project!'),
(211, 2, 'It looks like people are saving your project!'),
(212, 2, 'Someone liked your new project!'),
(213, 8, 'Someone liked your new project!'),
(214, 5, 'Someone liked your new project!'),
(215, 4, 'It looks like people are saving your project!'),
(216, 12, 'It looks like people are saving your project!'),
(217, 12, 'Someone liked your new project!'),
(218, 2, 'Someone liked your new project!'),
(219, 2, 'It looks like people are saving your project!'),
(220, 1, 'Someone liked your new project!'),
(221, 4, 'Someone liked your new project!'),
(222, 3, 'Someone liked your new project!'),
(223, 1, 'Someone liked your new project!'),
(224, 9, 'Someone liked your new project!'),
(225, 2, 'Someone liked your new project!'),
(226, 2, 'It looks like people are saving your project!'),
(227, 8, 'Someone liked your new project!'),
(228, 13, 'Someone liked your new project!'),
(229, 13, 'It looks like people are saving your project!'),
(230, 1, 'Someone liked your new project!'),
(231, 4, 'Someone liked your new project!'),
(232, 3, 'Someone liked your new project!'),
(233, 1, 'Someone liked your new project!'),
(234, 1, 'It looks like people are saving your project!'),
(235, 2, 'It looks like people are saving your project!'),
(236, 2, 'Someone liked your new project!'),
(237, 9, 'Someone liked your new project!'),
(238, 2, 'It looks like people are saving your project!'),
(239, 2, 'Someone liked your new project!'),
(240, 13, 'Someone liked your new project!'),
(241, 14, 'Someone liked your new project!'),
(242, 12, 'Someone liked your new project!'),
(243, 2, 'Someone liked your new project!'),
(244, 7, 'Someone liked your new project!'),
(245, 6, 'Someone liked your new project!'),
(246, 5, 'Someone liked your new project!'),
(247, 4, 'Someone liked your new project!'),
(248, 3, 'Someone liked your new project!'),
(249, 2, 'Someone liked your new project!'),
(250, 2, 'It looks like people are saving your project!'),
(251, 9, 'Someone liked your new project!'),
(252, 12, 'Someone liked your new project!'),
(253, 2, 'Someone liked your new project!'),
(254, 7, 'Someone liked your new project!'),
(255, 7, 'It looks like people are saving your project!'),
(256, 3, 'Someone liked your new project!'),
(257, 4, 'Someone liked your new project!'),
(258, 4, 'People are commenting on your new project!'),
(259, 2, 'People are commenting on your new project!'),
(260, 9, 'People are commenting on your new project!'),
(261, 7, 'People are commenting on your new project!'),
(262, 7, 'People are commenting on your new project!'),
(263, 9, 'People are commenting on your new project!'),
(264, 14, 'People are commenting on your new project!'),
(265, 5, 'It looks like people are saving your project!'),
(266, 3, 'People are commenting on your new project!'),
(267, 9, 'People are commenting on your new project!'),
(268, 2, 'People are commenting on your new project!'),
(269, 2, 'People are commenting on your new project!'),
(270, 8, 'People are commenting on your new project!'),
(271, 14, 'People are commenting on your new project!'),
(272, 7, 'It looks like people are saving your project!'),
(273, 1, 'People are commenting on your new project!'),
(274, 5, 'People are commenting on your new project!'),
(275, 3, 'People are commenting on your new project!'),
(276, 2, 'It looks like people are saving your project!'),
(277, 1, 'People are commenting on your new project!'),
(278, 9, 'Someone liked your new project!'),
(279, 13, 'Someone liked your new project!'),
(280, 9, 'It looks like people are saving your project!'),
(281, 2, 'Someone liked your new project!'),
(282, 2, 'It looks like people are saving your project!'),
(283, 2, 'People are commenting on your new project!'),
(284, 5, 'Someone liked your new project!'),
(285, 4, 'Someone liked your new project!'),
(286, 12, 'Someone liked your new project!'),
(287, 2, 'Someone liked your new project!'),
(288, 7, 'Someone liked your new project!'),
(289, 6, 'Someone liked your new project!'),
(290, 6, 'People are commenting on your new project!'),
(291, 4, 'Someone liked your new project!'),
(292, 3, 'Someone liked your new project!'),
(293, 2, 'People are commenting on your new project!'),
(294, 2, 'Someone liked your new project!'),
(295, 2, 'It looks like people are saving your project!'),
(296, 1, 'You just won a challenge! Check your profile for the new prize!'),
(297, 2, 'Someone liked your new project!'),
(298, 2, 'People are commenting on your new project!'),
(299, 8, 'It looks like people are saving your project!'),
(300, 2, 'Someone liked your new project!'),
(301, 5, 'People are commenting on your new project!'),
(302, 2, 'Someone liked your new project!'),
(303, 2, 'It looks like people are saving your project!'),
(304, 2, 'Someone liked your new project!'),
(305, 2, 'Someone liked your new project!'),
(306, 2, 'Someone liked your new project!'),
(307, 2, 'Someone liked your new project!'),
(308, 2, 'It looks like people are saving your project!'),
(309, 2, 'You just won a challenge! Check your profile for the new prize!'),
(310, 8, 'Someone liked your new project!'),
(311, 8, 'Someone liked your new project!'),
(312, 2, 'Someone liked your new project!'),
(313, 1, 'It looks like people are saving your project!'),
(314, 8, 'People are commenting on your new project!'),
(315, 1, 'You just won a challenge! Check your profile for the new prize!'),
(316, 8, 'You just won a challenge! Check your profile for the new prize!'),
(317, 2, 'Someone liked your new project!'),
(318, 3, 'You just won a challenge! Check your profile for the new prize!'),
(319, 1, 'You just won a challenge! Check your profile for the new prize!'),
(320, 2, 'You just won a challenge! Check your profile for the new prize!'),
(321, 8, 'You just won a challenge! Check your profile for the new prize!'),
(322, 3, 'You just won a challenge! Check your profile for the new prize!'),
(323, 14, 'Someone liked your new project!'),
(324, 2, 'Someone liked your new project!'),
(325, 14, 'You just won a challenge! Check your profile for the new prize!'),
(326, 14, 'Someone liked your new project!'),
(327, 14, 'People are commenting on your new project!'),
(328, 14, 'Someone liked your new project!'),
(329, 2, 'Someone liked your new project!'),
(330, 2, 'It looks like people are saving your project!'),
(331, 1, 'You just won a challenge! Check your profile for the new prize!'),
(332, 2, 'You just won a challenge! Check your profile for the new prize!'),
(333, 14, 'You just won a challenge! Check your profile for the new prize!'),
(334, 3, 'You just won a challenge! Check your profile for the new prize!'),
(335, 14, 'You just won a challenge! Check your profile for the new prize!'),
(336, 16, 'Someone liked your new project!'),
(337, 16, 'Someone liked your new project!'),
(338, 16, 'People are commenting on your new project!'),
(339, 14, 'Someone liked your new project!'),
(340, 14, 'It looks like people are saving your project!'),
(341, 1, 'You just won a challenge! Check your profile for the new prize!'),
(342, 2, 'You just won a challenge! Check your profile for the new prize!'),
(343, 14, 'You just won a challenge! Check your profile for the new prize!'),
(344, 3, 'You just won a challenge! Check your profile for the new prize!'),
(345, 14, 'You just won a challenge! Check your profile for the new prize!'),
(346, 16, 'You just won a challenge! Check your profile for the new prize!'),
(347, 6, 'It looks like people are saving your project!'),
(348, 1, 'You just won a challenge! Check your profile for the new prize!'),
(349, 2, 'You just won a challenge! Check your profile for the new prize!'),
(350, 14, 'You just won a challenge! Check your profile for the new prize!'),
(351, 3, 'You just won a challenge! Check your profile for the new prize!'),
(352, 14, 'You just won a challenge! Check your profile for the new prize!'),
(353, 16, 'You just won a challenge! Check your profile for the new prize!'),
(354, 1, 'You just won a challenge! Check your profile for the new prize!'),
(355, 2, 'You just won a challenge! Check your profile for the new prize!'),
(356, 16, 'Someone liked your new project!'),
(357, 16, 'You just won a challenge! Check your profile for the new prize!'),
(358, 14, 'Someone liked your new project!'),
(359, 14, 'You just won a challenge! Check your profile for the new prize!'),
(360, 3, 'Someone liked your new project!'),
(361, 16, 'You just won a challenge! Check your profile for the new prize!'),
(362, 2, 'Someone liked your new project!'),
(363, 2, 'People are commenting on your new project!'),
(364, 17, 'Your project has been deleted as it does not comply with community guidelines.');

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
(1, 1, 'Designs e Modelagem 3D - Blender', 'Estive pensando sobre modelagens e decidi me aprofundar no conceito da ferramenta Blender. E que absurdo de vídeo-aulas encontrei no Youtube que me auxiliaram na criação de alguns modelos incríveis. Com vocês, minha semana de estudo :)', '2023-12-01 21:34:08'),
(4, 16, 'PIXELQUEST ADVENTURES', 'Descubra a magia de \"PixelQuest Adventures\", o novo jogo 2D que combina gráficos nostálgicos, jogabilidade envolvente e uma trilha sonora vibrante. Explore mundos encantados, desvende enigmas e mergulhe na emoção dos 8-bits agora! ', '2023-12-02 18:22:04'),
(5, 4, 'NOVO TUTORIAL - UNREAL', 'Desperte sua criatividade e construa mundos incríveis com o Unreal Engine, a plataforma definitiva para criar jogos extraordinários. Desenvolva experiências imersivas, dê vida às suas ideias e mergulhe na magia da criação de jogos com Unreal! ', '2023-12-02 18:25:04'),
(7, 1, 'Halloween - 2023', 'Mergulhei de cabeça na modelagem de Halloween e, sério, é a coisa mais divertida! Criando monstros e fantasmas com mais estilo do que medo. Vai ser um Halloween épico com essas criações assustadoramente incríveis! ', '2023-12-02 18:32:43'),
(9, 5, 'Blender + Unreal', 'Publiquei um vídeo sobre o meu estudo na integração da Unreal com Blender, segue lá @kaka_models', '2023-12-02 18:38:11'),
(10, 6, 'GameMarker is My Passion', 'Pessoal, eu tô super animado para contar que acabei de experimentar um jogo incrível feito no GameMaker! Gráficos top, jogabilidade viciante... é tipo uma montanha-russa de diversão em 2D! Pega esse controle aí e vem comigo nessa jornada épica. Sério, é sensacional! 🚀🕹️', '2023-12-02 18:41:02'),
(15, 7, 'Eu amo jogos indies <3', '🌾🚜 Super empolgado com Stardew Valley! Cultivando minha fazenda, interagindo com personagens adoráveis e explorando o encantador mundo pixelado. 🎮❤️ Uma jornada viciante que me faz perder a noção do tempo! ', '2023-12-04 12:15:16'),
(16, 2, 'Novidades da unreal', 'A Unreal Engine é uma verdadeira revolução no mundo dos desenvolvedores de jogos e experiências interativas. Com gráficos impressionantes e uma flexibilidade incrível, ela permite criar ambientes virtuais realistas e cativantes. Seja para jogos, simulações ou realidade virtual, a Unreal Engine eleva a qualidade e a imersão, abrindo portas para a criação de experiências visualmente deslumbrantes. U', '2023-12-04 12:17:17'),
(17, 3, 'Estou aprendendo a fazer animações.', 'Aprendi recentemente a criar animações, estou muito feliz caminhando por essa grande área! ', '2023-12-04 12:20:47'),
(18, 2, 'Project and Satisfying Colorful Results! 💪✨ ', 'I started this personal project 20 years ago. Feeling like I now have a satisfying washed colors rendering that should allow me to produce more! Never give up and keep working on your personal stuff folks, even if that\'s just 5mn per day! 💪', '2023-12-05 12:25:35'),
(19, 4, 'PortfolioDay', 's that #PortfolioDay again? Hi, I\'m Charlene, a concept artist who\'s been working in the video game industry for 13 years! Instead of showing what I made in my previous jobs, I\'m gonna highlight some concepts I\'ve made for \"Raizh\", a personal world building project of mine!', '2023-12-04 12:50:57'),
(20, 12, 'Hearthstone', 'Here\'s the new Hearthstone expansion board: I had so much fun working on it! #ForgedInTheBarrens Check out the step by step here: https://artstation.com/artwork/oARDGk', '2023-12-04 12:53:26'),
(21, 14, 'Evolving Dreams', 'Embarked on a personal journey two decades ago. Today, achieved a gratifying milestone in vibrant colors. Persistence pays off—dedicate even 5 minutes a day to your passion! 💪🎨', '2023-12-04 12:58:36'),
(22, 13, 'Code Chronicles', 'A 20-year saga in the making. Finally cracked the code for a project close to my heart. Consistency is key, even if it\'s just a few minutes daily! 💻✨', '2023-12-04 13:00:31'),
(23, 4, 'Music', ' Two decades of composing melodies and refining sounds. Reached a harmonious breakthrough with a project that echoes my soul. Remember, small daily steps lead to big musical leaps! 🎵🚀', '2023-12-04 13:02:35'),
(25, 5, 'Music Zelda', ' The music of The Legend of Zelda series is iconic and has become an integral part of the franchise\'s identity. Composed primarily by Koji Kondo, the music enhances the immersive experience of the games and has garnered widespread recognition.', '2023-12-04 13:04:44'),
(26, 8, 'Mario', ' A mere mention of Mario sends a wave of nostalgia rushing through the corridors of gaming history. From the pixelated adventures of the original Super Mario Bros. to the captivating landscapes of Super Mario 64, each jump, coin collected, and princess rescued is etched in the hearts of gamers worldwide.', '2023-12-04 13:07:20'),
(27, 2, 'OH MY GODD', 'O RPG ordem paranormal do youtuber cellbit arrecadou mais de 4 milhões de reais, é um marco na nossa historia de jogos 😲🚀', '2023-12-04 13:10:19'),
(28, 9, 'Um jogo baseado no Brasil', 'Muito feliz em compartilhar um pouco sobre o jogo indie kanbulin, que se baseia no mapa do serrado Brasileiro 🤧😲🚀', '2023-12-04 13:12:44'),
(31, 2, 'Competição de Halloween🎃', 'Minha abóbora toda meiga e doce 👻🍬 ', '2023-12-04 18:05:20'),
(32, 2, 'Ho-oh, feliz natal!!', 'Modelagem papai noel.', '2023-12-04 18:14:06'),
(33, 14, 'Menu - O melhor', 'Dêem like para fortalecer :)', '2023-12-04 18:19:28'),
(34, 14, 'SKIN - FÃ MADE', 'Amo demais o jogo Genshin Impact, e pensando nisso resolvi participar criando uma skin focada nele para participar de um desafio. Me apoiem dando like :)', '2023-12-04 18:29:41'),
(35, 16, 'Roteiro Brasileiro - Competição 😋', 'Sobre roteiros eu me garanto 🌞. Leiam e me dêem feedback', '2023-12-04 18:36:20');

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
(2, 1, 3),
(3, 5, 4),
(4, 7, 1),
(5, 4, 1),
(6, 7, 6),
(7, 4, 6),
(9, 7, 2),
(10, 1, 2),
(12, 18, 3),
(13, 27, 3),
(14, 22, 3),
(15, 20, 3),
(16, 19, 3),
(17, 5, 3),
(18, 28, 5),
(19, 18, 5),
(20, 27, 5),
(21, 20, 5),
(22, 22, 5),
(23, 16, 5),
(24, 4, 5),
(25, 18, 8),
(26, 28, 8),
(27, 27, 8),
(28, 23, 8),
(29, 20, 8),
(30, 16, 8),
(31, 27, 11),
(32, 22, 11),
(33, 1, 11),
(34, 18, 13),
(35, 27, 13),
(36, 18, 16),
(37, 15, 16),
(38, 9, 2),
(39, 15, 7),
(40, 16, 7),
(41, 28, 9),
(42, 27, 9),
(43, 18, 2),
(44, 26, 1),
(45, 31, 3),
(46, 32, 8),
(47, 7, 12),
(48, 31, 16),
(49, 34, 13),
(50, 10, 13);

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
(1, 'icon-id1.png', '3DSMAX', '#7fc5de'),
(2, 'icon-id2.png', 'BLENDER', '#eb7700'),
(3, 'icon-id3.png', 'UNREAL', '#3a3a3a'),
(4, 'icon-id4.png', 'FIGMA', '#a15bff'),
(5, 'icon-id5.png', 'PHOTOSHOP', '#001833'),
(6, 'icon-id6.png', 'VSCODE', '#2390d5'),
(7, 'icon-id7.png', 'UNITY', '#4d4d4d'),
(8, 'icon-id8.png', 'C++', '#0080cd'),
(9, 'icon-id9.png', 'GODOT', '#479cbf'),
(10, 'icon-id10.png', 'AFTER EFFECTS', '#1f0040'),
(11, 'icon-id11.png', 'ILLUSTRATOR', '#330000'),
(12, 'icon-id12.png', 'GAMEMAKER', '#000000');

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
(1, 3891, 'gabrela', 'gabrielamoreno@gmail.com', '$2y$10$t3NC9tkKfu1clk5NXVd2/.AZMbPKWAFV1KA3xCtLwrNC1mmXkgoY.', 'sonic2.jpg', 16, 1010, NULL, 1, '2023-12-01 21:25:37', NULL, NULL),
(2, 3296, 'nick', 'nicolealvesraimundo@gmail.com', '$2y$10$pdbblDgC2zzpbFE0u698PuW2wpYfTzMMx10laEFPkk8nqQaRdagd6', 'avatar-id2.jpg', 15, 1475, 'I love games', 1, '2023-12-01 21:26:04', 'Itapevi, Sp', NULL),
(3, 2714, 'rodolfo', 'rodolfo@gmail.com', '$2y$10$2./5EZIVrI6wGhdzCCw.9.YGvYlPve7eUqchxFTLci.rB/6zCgT/y', 'undertale.jpg', 19, 520, NULL, 0, '2023-12-02 18:16:01', NULL, NULL),
(4, 2063, 'crazyModel', 'crazymodel@gmail.com', '$2y$10$Au1wprPzbvnJo/c3w6XNYOLaQ/69EDGm..BuNCNg4U6L3t35fOtXK', 'pacman.jpg', 15, 380, NULL, 0, '2023-12-02 18:24:00', NULL, NULL),
(5, 4782, 'kaka', 'kaka@gmail.com', '$2y$10$aER0Sdj7.ee1EKEHgtEg3OxocCQN1TFooceDiTwOEfoRi/O3F.aUa', 'cuphead.jpg', 10, 315, NULL, 0, '2023-12-02 18:34:54', NULL, NULL),
(6, 1392, 'yhui', 'yhui@gmail.com', '$2y$10$phzEdUIY5HN3TcAn/9NdtOK8SWAi62SjmzE2WP47pW9kyFwnmFm8i', 'pikachu.jpg', 1, 170, NULL, 0, '2023-12-02 18:40:28', NULL, NULL),
(7, 5377, 'Luis', 'luis@gmail.com', '$2y$10$qHHCVMUZfAkD4MKlgSfNdO8.OMsXySDw2DhSR05LsIsIrYr1OzhZe', 'pikachu.jpg', 2, 125, NULL, 0, '2023-12-04 03:35:47', NULL, NULL),
(8, 6506, 'rosa_lya', 'rosangela@gmail.com', '$2y$10$e2iOIvtnGPUkDb0870sFZex3DpPopDC8NaIJaT0p/N7cYo8.Wx90a', 'cat.jpg', 8, 735, NULL, 0, '2023-12-04 03:36:16', NULL, NULL),
(9, 4060, 'Evandro', 'evandro@gmail.com', '$2y$10$Vp.PgFR6HuWC8.SPBfQELOrcOx6UNS2Dfnf9WSPLwqFEHwg1Ja6tO', 'amongus.jpg', 2, 90, NULL, 0, '2023-12-04 03:36:45', NULL, NULL),
(10, 8021, 'leidy', 'leidy@gmail.com', '$2y$10$bjUEuRUNsfzGn596bI2lzO1ZZnMSNsYbByRA2Z27ex4bdGxOSyDvq', 'psyduck.jpg', 1, 0, NULL, 0, '2023-12-04 03:37:08', NULL, NULL),
(11, 9701, 'Liandry', 'liandry@gmail.com', '$2y$10$9lWTE63d5WJIh/4zePtO0uY4yIzziW0mASDHbwrLP21oRtTzix/jS', 'thewitcher.jpg', 1, 40, NULL, 0, '2023-12-04 03:37:32', NULL, NULL),
(12, 2924, 'July', 'juliana@gmail.com', '$2y$10$9h3/MkSsc70rt.qCfqMFseJJKAr.4qK.7lqG2qIJWRXR/SWRL2jOO', 'avatar-id12.jpg', 2, 80, '', 0, '2023-12-04 03:38:24', '', NULL),
(13, 6741, 'Elly', 'eliana@gmail.com', '$2y$10$dwHyMzWrCofDxSwZ0weBeOr3Mitm.RVyHkV72Rgv9wXViQIS33WVW', 'zelda.jpg', 2, 40, NULL, 0, '2023-12-04 03:39:14', NULL, NULL),
(14, 2180, 'Paulo', 'paulo1@gmail.com', '$2y$10$5egmzJFqiyiwHsK2WJ6sHOBTrXlQjmXa1nodkkR5kft.c4uihhh1G', 'avatar-id14.jpg', 17, 1000, 'Professor na Fatec Presidente Prudente', 0, '2023-12-04 03:39:57', 'Presidente Prudente, SP', NULL),
(15, 9053, 'Elaine', 'elaine@gmail.com', '$2y$10$jr6ItnFOlCpIXWKxZz8qLOSeRjM5yNMMOZD/DT9EjemazR4ZqEqxy', 'avatar-id15.png', 1, 0, 'Professora na Fatec Presidente Prudente', 0, '2023-12-04 03:40:14', 'Presidente Prudente, SP', NULL),
(16, 9820, 'Carol', 'carol@gmail.com', '$2y$10$9kfzAmttr6XhFxdRGEMkdu27IvbmuZLID.3VCXn4nuyd1KA1V2ucW', 'avatar-id16.jpg', 12, 475, 'Professora na Fatec Presidente Prudente e Teach Leader Multimidia Educacional. ', 0, '2023-12-04 03:40:32', 'Presidente Prudente, SP', NULL),
(17, 4312, 'David', 'david@gmail.com', '$2y$10$D94GNk.sh0e3XMf.rG0ghuiQIz2opb4fWPiQgGbnYj0RJG4jpa9HG', 'cat.jpg', 1, 0, NULL, 0, '2023-12-04 22:21:58', NULL, 'banned'),
(18, 3303, 'barbara', 'barbara@gmail.com', '$2y$10$GVP4cY0IG19nuWrn0dcXre3/WpldD0.dIxLiZhOFTSpas3OkrZSfK', 'avatar-id18.png', 1, 15, 'Oii bem vindo, sou desenvolvedora', 0, '2023-12-05 00:21:42', 'Itapevi, Sp', NULL);

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
(14, 1),
(16, 1),
(18, 1),
(14, 3),
(16, 4),
(16, 5),
(2, 6),
(14, 6),
(15, 6),
(2, 7),
(15, 7),
(15, 8);

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
(1, 9),
(2, 10),
(16, 14),
(14, 13),
(16, 12);

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
  MODIFY `idAward` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `Challenges`
--
ALTER TABLE `Challenges`
  MODIFY `idChallenge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `Educations`
--
ALTER TABLE `Educations`
  MODIFY `idEducation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `idFavorite` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Files`
--
ALTER TABLE `Files`
  MODIFY `idFiles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Hashtags`
--
ALTER TABLE `Hashtags`
  MODIFY `idHashtag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `Images`
--
ALTER TABLE `Images`
  MODIFY `idImage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idLike` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de tabela `Messages`
--
ALTER TABLE `Messages`
  MODIFY `idMessage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `idNotification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT de tabela `Projects`
--
ALTER TABLE `Projects`
  MODIFY `idProject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `Report`
--
ALTER TABLE `Report`
  MODIFY `idReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  MODIFY `idSave` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `Tokens`
--
ALTER TABLE `Tokens`
  MODIFY `idToken` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Tools`
--
ALTER TABLE `Tools`
  MODIFY `idTool` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
