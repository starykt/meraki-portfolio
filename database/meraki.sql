-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 04-Dez-2023 às 12:48
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
(6, NULL, 6, 'aaaaaa', '2023-12-04', 'imagePath-6.jpg');

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
(6, 2, 'conseguir fazer modelagens do mario', 'Nicole', '200XP', 'banner-6.jpg', '2023-12-28 00:00:00');

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
(10, 2, 10, 'eu amei!!', '2023-12-03 20:34:35');

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
(1, 1, 'file-id1-1701466449-0.png');

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
(6, 'HALLOWEEN2023'),
(7, 'DEV'),
(8, 'FIGMA'),
(9, 'UNREAL'),
(10, 'INDIE'),
(11, 'NOVIDADE'),
(12, 'NOSTALGIA'),
(13, 'ATUALIZAÇÃO'),
(14, 'RPG'),
(15, 'GAMEMAKER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Hashtags_Challenges`
--

CREATE TABLE `Hashtags_Challenges` (
  `idChallenge` int NOT NULL,
  `idHashtag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(10, 4),
(15, 4),
(5, 5),
(9, 5),
(12, 5),
(2, 9),
(9, 9),
(10, 10),
(11, 10),
(10, 15),
(9, 16);

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
(26, 18, 'img-id18-1701692735-2.jpg');

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
(81, 2, 10),
(82, 2, 9);

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
(109, 2, 'Someone liked your new project!');

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
(4, 3, 'PIXELQUEST ADVENTURES', 'Descubra a magia de \"PixelQuest Adventures\", o novo jogo 2D que combina gráficos nostálgicos, jogabilidade envolvente e uma trilha sonora vibrante. Explore mundos encantados, desvende enigmas e mergulhe na emoção dos 8-bits agora! ', '2023-12-02 18:22:04'),
(5, 4, 'NOVO TUTORIAL - UNREAL', 'Desperte sua criatividade e construa mundos incríveis com o Unreal Engine, a plataforma definitiva para criar jogos extraordinários. Desenvolva experiências imersivas, dê vida às suas ideias e mergulhe na magia da criação de jogos com Unreal! ', '2023-12-02 18:25:04'),
(7, 1, 'Halloween - 2023', 'Mergulhei de cabeça na modelagem de Halloween e, sério, é a coisa mais divertida! Criando monstros e fantasmas com mais estilo do que medo. Vai ser um Halloween épico com essas criações assustadoramente incríveis! ', '2023-12-02 18:32:43'),
(9, 5, 'Blender + Unreal', 'Publiquei um vídeo sobre o meu estudo na integração da Unreal com Blender, segue lá @kaka_models', '2023-12-02 18:38:11'),
(10, 6, 'GameMarker is My Passion', 'Pessoal, eu tô super animado para contar que acabei de experimentar um jogo incrível feito no GameMaker! Gráficos top, jogabilidade viciante... é tipo uma montanha-russa de diversão em 2D! Pega esse controle aí e vem comigo nessa jornada épica. Sério, é sensacional! 🚀🕹️', '2023-12-02 18:41:02'),
(15, 2, 'Eu amo jogos indies <3', '🌾🚜 Super empolgado com Stardew Valley! Cultivando minha fazenda, interagindo com personagens adoráveis e explorando o encantador mundo pixelado. 🎮❤️ Uma jornada viciante que me faz perder a noção do tempo! ', '2023-12-04 12:15:16'),
(16, 2, 'Novidades da unreal', 'A Unreal Engine é uma verdadeira revolução no mundo dos desenvolvedores de jogos e experiências interativas. Com gráficos impressionantes e uma flexibilidade incrível, ela permite criar ambientes virtuais realistas e cativantes. Seja para jogos, simulações ou realidade virtual, a Unreal Engine eleva a qualidade e a imersão, abrindo portas para a criação de experiências visualmente deslumbrantes. U', '2023-12-04 12:17:17'),
(17, 2, 'Estou aprendendo a fazer animações.', 'Aprendi recentemente a criar animações, estou muito feliz caminhando por essa grande área! ', '2023-12-04 12:20:47'),
(18, 2, 'Project and Satisfying Colorful Results! 💪✨ ', 'I started this personal project 20 years ago. Feeling like I now have a satisfying washed colors rendering that should allow me to produce more! Never give up and keep working on your personal stuff folks, even if that\'s just 5mn per day! 💪', '2023-12-04 12:25:35');

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
(1, 2, 1, 'muito ruim qualidade totalmente horrorosa traste', 0);

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
(10, 1, 2);

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
(1, 3891, 'gabrela', 'gabrielamoreno@gmail.com', '$2y$10$t3NC9tkKfu1clk5NXVd2/.AZMbPKWAFV1KA3xCtLwrNC1mmXkgoY.', 'sonic2.jpg', 2, 70, NULL, 1, '2023-12-01 21:25:37', NULL, NULL),
(2, 3296, 'nick', 'nicolealvesraimundo@gmail.com', '$2y$10$S/OSTzre6N8YbLgA5o090eaSkg4utYz4eI8pHrKLmlh5x0lEymcBO', 'avatar-id2.jpg', 2, -15, 'I love games', 1, '2023-12-01 21:26:04', 'Itapevi, Sp', NULL),
(3, 2714, 'rodolfo', 'rodolfo@gmail.com', '$2y$10$2./5EZIVrI6wGhdzCCw.9.YGvYlPve7eUqchxFTLci.rB/6zCgT/y', 'undertale.jpg', 13, 155, NULL, 0, '2023-12-02 18:16:01', NULL, NULL),
(4, 2063, 'crazyModel', 'crazymodel@gmail.com', '$2y$10$Au1wprPzbvnJo/c3w6XNYOLaQ/69EDGm..BuNCNg4U6L3t35fOtXK', 'pacman.jpg', 15, 135, NULL, 0, '2023-12-02 18:24:00', NULL, NULL),
(5, 4782, 'kaka', 'kaka@gmail.com', '$2y$10$aER0Sdj7.ee1EKEHgtEg3OxocCQN1TFooceDiTwOEfoRi/O3F.aUa', 'cuphead.jpg', 10, 100, NULL, 0, '2023-12-02 18:34:54', NULL, NULL),
(6, 1392, 'yhui', 'yhui@gmail.com', '$2y$10$phzEdUIY5HN3TcAn/9NdtOK8SWAi62SjmzE2WP47pW9kyFwnmFm8i', 'pikachu.jpg', 1, 95, NULL, 0, '2023-12-02 18:40:28', NULL, NULL),
(7, 5377, 'Luis', 'luis@gmail.com', '$2y$10$qHHCVMUZfAkD4MKlgSfNdO8.OMsXySDw2DhSR05LsIsIrYr1OzhZe', 'pikachu.jpg', 1, 0, NULL, 0, '2023-12-04 03:35:47', NULL, NULL),
(8, 6506, 'rosa_lya', 'rosangela@gmail.com', '$2y$10$e2iOIvtnGPUkDb0870sFZex3DpPopDC8NaIJaT0p/N7cYo8.Wx90a', 'cat.jpg', 1, 0, NULL, 0, '2023-12-04 03:36:16', NULL, NULL),
(9, 4060, 'Evandro', 'evandro@gmail.com', '$2y$10$Vp.PgFR6HuWC8.SPBfQELOrcOx6UNS2Dfnf9WSPLwqFEHwg1Ja6tO', 'amongus.jpg', 1, 0, NULL, 0, '2023-12-04 03:36:45', NULL, NULL),
(10, 8021, 'leidy', 'leidy@gmail.com', '$2y$10$bjUEuRUNsfzGn596bI2lzO1ZZnMSNsYbByRA2Z27ex4bdGxOSyDvq', 'psyduck.jpg', 1, 0, NULL, 0, '2023-12-04 03:37:08', NULL, NULL),
(11, 9701, 'Liandry', 'liandry@gmail.com', '$2y$10$9lWTE63d5WJIh/4zePtO0uY4yIzziW0mASDHbwrLP21oRtTzix/jS', 'thewitcher.jpg', 1, 0, NULL, 0, '2023-12-04 03:37:32', NULL, NULL),
(12, 2924, 'July', 'juliana@gmail.com', '$2y$10$9h3/MkSsc70rt.qCfqMFseJJKAr.4qK.7lqG2qIJWRXR/SWRL2jOO', 'pacman.jpg', 1, 0, NULL, 0, '2023-12-04 03:38:24', NULL, NULL),
(13, 6741, 'Elly', 'eliana@gmail.com', '$2y$10$dwHyMzWrCofDxSwZ0weBeOr3Mitm.RVyHkV72Rgv9wXViQIS33WVW', 'zelda.jpg', 1, 0, NULL, 0, '2023-12-04 03:39:14', NULL, NULL),
(14, 2180, 'Paulo', 'paulo1@gmail.com', '$2y$10$5egmzJFqiyiwHsK2WJ6sHOBTrXlQjmXa1nodkkR5kft.c4uihhh1G', 'avatar-id14.jpg', 1, 0, 'Professor na Fatec Presidente Prudente', 0, '2023-12-04 03:39:57', 'Presidente Prudente, SP', NULL),
(15, 9053, 'Elaine', 'elaine@gmail.com', '$2y$10$jr6ItnFOlCpIXWKxZz8qLOSeRjM5yNMMOZD/DT9EjemazR4ZqEqxy', 'avatar-id15.png', 1, 0, 'Professora na Fatec Presidente Prudente', 0, '2023-12-04 03:40:14', 'Presidente Prudente, SP', NULL),
(16, 9820, 'Carol', 'carol@gmail.com', '$2y$10$9kfzAmttr6XhFxdRGEMkdu27IvbmuZLID.3VCXn4nuyd1KA1V2ucW', 'avatar-id16.jpg', 1, 0, 'Professora na Fatec Presidente Prudente e Teach Leader Multimidia Educacional. ', 0, '2023-12-04 03:40:32', 'Presidente Prudente, SP', NULL);

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
  MODIFY `idAward` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Challenges`
--
ALTER TABLE `Challenges`
  MODIFY `idChallenge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `Educations`
--
ALTER TABLE `Educations`
  MODIFY `idEducation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `idFavorite` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Files`
--
ALTER TABLE `Files`
  MODIFY `idFiles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Hashtags`
--
ALTER TABLE `Hashtags`
  MODIFY `idHashtag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `Images`
--
ALTER TABLE `Images`
  MODIFY `idImage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idLike` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `Messages`
--
ALTER TABLE `Messages`
  MODIFY `idMessage` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `idNotification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `Projects`
--
ALTER TABLE `Projects`
  MODIFY `idProject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `Report`
--
ALTER TABLE `Report`
  MODIFY `idReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  MODIFY `idSave` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `Tokens`
--
ALTER TABLE `Tokens`
  MODIFY `idToken` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Tools`
--
ALTER TABLE `Tools`
  MODIFY `idTool` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
