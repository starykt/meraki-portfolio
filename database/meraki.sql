-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 08-Nov-2023 às 19:35
-- Versão do servidor: 8.2.0
-- versão do PHP: 8.2.11

-- -----------------------------------------------------
-- Schema meraki
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `meraki` DEFAULT CHARACTER SET utf8 ;
USE `meraki` ;


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
-- Estrutura da tabela `Challenges`
--

CREATE TABLE `Challenges` (
  `idChallenge` int NOT NULL,
  `idUser` int NOT NULL,
  `goal` text NOT NULL,
  `name` varchar(75) NOT NULL,
  `reward` double NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(5, 3, 4, 'eitaaaaaaaaaa', '2023-11-02 20:52:05'),
(6, 3, 3, 'amoooooooooooooo', '2023-11-08 19:04:30');

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
(3, 'teste3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Hashtags_Challenges`
--

CREATE TABLE `Hashtags_Challenges` (
  `Challenges_idChallenge` int NOT NULL,
  `Hashtags_idHashtag` int NOT NULL
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
(2, 3),
(3, 3),
(2, 4),
(3, 4),
(2, 5),
(2, 6),
(3, 8),
(2, 11),
(3, 11),
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
(5, 1, 4),
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
(29, 3, 3);

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
(4, 1, 'a', 'a', '2023-11-08 15:24:55'),
(5, 7, 'teste', 'a', '2023-11-08 15:25:47'),
(6, 1, 'aaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-11-07 22:15:03'),
(8, 3, 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-11-08 15:34:51'),
(11, 2, 'aaaaa', 'aaaaa', '2023-11-02 19:25:16'),
(13, 2, 'aaaaa', 'aaaaa', '2023-11-07 00:35:11'),
(14, 1, 'teste', 'aaaaaa', '2023-11-03 01:17:58');

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
(1, 2, 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0);

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
(10, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tools`
--

CREATE TABLE `Tools` (
  `idTool` int NOT NULL,
  `icon` varchar(255) NOT NULL,
  `caption` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Tools`
--

INSERT INTO `Tools` (`idTool`, `icon`, `caption`) VALUES
(2, 'icon-id2.jpg', 'eita como é ');

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
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`idUser`, `tag`, `nickname`, `email`, `password`, `avatar`, `level`, `xp`, `resume`, `admin`, `createdAt`, `location`) VALUES
(1, 3182, 'nick', 'nicolealvesraimundo@gmail.com', '$2y$10$olQTF4mSKWX6.sEx8hOWy.BgAq.DTZLlJiIZ8T/f5rZfwetcx1Ij.', 'avatar-id1.jpg', 1, 0, 'alibabaaaaabaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2023-08-26 11:48:25', 'Itapevi, Sp'),
(2, 6149, 'amor', 'amor@gmail.com', '$2y$10$ptSxKR8Ld8SQiWUahYOE/OCWWhAUFtS94wRsh5iaQPmiciA/vHg4u', 'cat.jpg', 1, 0, NULL, 1, '2023-10-30 23:02:58', NULL),
(3, 1240, 'luis', 'luis@gmail.com', '$2y$10$7/P0zds4rLb9SIqb1uXNcOX9srVUyvHVhNy/aH5itMQ22MGVYxxPe', 'avatar-id3.jpg', 1, 0, '', 1, '2023-11-02 20:51:28', ''),
(5, 1303, 'teste', 'teste@gmail.com', '$2y$10$HQWesWLoaOz84gfHeiC4iOPuMx5KK0HcpBPmAeB6wWU3Y0kTNjBzO', 'cat.jpg', 1, 0, 'kkkkkkkkkkk', 1, '2023-11-03 01:34:14', 'bbkkkkkkkkkkkk'),
(7, 4120, 'teste', 'Lety@gmail.com', '$2y$10$4cijvcz5FpViNEi5l4eu7OBlZhNm0DjkCfu99euZOlOfpe4v1wQRG', 'cat.jpg', 1, 0, NULL, 1, '2023-11-06 14:03:55', NULL),
(11, 9506, 'teste', 'nick@gmail.com', '$2y$10$0MZUPUV3JkxVV8cnFTETluH1c3RL6gY5hVOaFHDliBvrEp7ud1k0y', 'cat.jpg', 1, 0, NULL, 1, '2023-11-06 14:14:32', NULL),
(12, 3180, 'aaaaaaaaaaaaaa', 'aaaaaaaaa@fghvjj', '$2y$10$lnXq0Yooji6INBEq3pD0Me4WQcWSUu0QigkI/gyiLlWbFVC2cU4gO', 'cat.jpg', 1, 0, NULL, 1, '2023-11-06 14:20:12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users_Tools`
--

CREATE TABLE `Users_Tools` (
  `idUser` int NOT NULL,
  `idTool` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Winners`
--

CREATE TABLE `Winners` (
  `idChallenge` int NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

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
  ADD PRIMARY KEY (`Challenges_idChallenge`,`Hashtags_idHashtag`),
  ADD KEY `fk_Challenges_has_Hashtags_Hashtags1_idx` (`Hashtags_idHashtag`),
  ADD KEY `fk_Challenges_has_Hashtags_Challenges1_idx` (`Challenges_idChallenge`);

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
  ADD PRIMARY KEY (`idChallenge`,`idUser`),
  ADD KEY `fk_Challenges_has_Competitors_Competitors1_idx` (`idUser`),
  ADD KEY `fk_Challenges_has_Competitors_Challenges1_idx` (`idChallenge`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Challenges`
--
ALTER TABLE `Challenges`
  MODIFY `idChallenge` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Educations`
--
ALTER TABLE `Educations`
  MODIFY `idEducation` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `idFavorite` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Files`
--
ALTER TABLE `Files`
  MODIFY `idFiles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `Hashtags`
--
ALTER TABLE `Hashtags`
  MODIFY `idHashtag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Images`
--
ALTER TABLE `Images`
  MODIFY `idImage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idLike` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `Projects`
--
ALTER TABLE `Projects`
  MODIFY `idProject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `Report`
--
ALTER TABLE `Report`
  MODIFY `idReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  MODIFY `idSave` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `Tools`
--
ALTER TABLE `Tools`
  MODIFY `idTool` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `idProject1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`),
  ADD CONSTRAINT `idUser0` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

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
  ADD CONSTRAINT `fk_Challenges_has_Hashtags_Challenges1` FOREIGN KEY (`Challenges_idChallenge`) REFERENCES `Challenges` (`idChallenge`),
  ADD CONSTRAINT `fk_Challenges_has_Hashtags_Hashtags1` FOREIGN KEY (`Hashtags_idHashtag`) REFERENCES `Hashtags` (`idHashtag`);

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
  ADD CONSTRAINT `fk_Likes_Projects` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`),
  ADD CONSTRAINT `fk_Likes_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `fk_Projects_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `Report_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Report_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `Save_Projects`
--
ALTER TABLE `Save_Projects`
  ADD CONSTRAINT `Save_Projects_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `Projects` (`idProject`),
  ADD CONSTRAINT `Save_Projects_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `Users_Tools`
--
ALTER TABLE `Users_Tools`
  ADD CONSTRAINT `fk_Users_has_Tools_Tools1` FOREIGN KEY (`idTool`) REFERENCES `Tools` (`idTool`),
  ADD CONSTRAINT `fk_Users_has_Tools_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

--
-- Limitadores para a tabela `Winners`
--
ALTER TABLE `Winners`
  ADD CONSTRAINT `fk_Challenges_has_Competitors_Challenges1` FOREIGN KEY (`idChallenge`) REFERENCES `Challenges` (`idChallenge`),
  ADD CONSTRAINT `fk_Challenges_has_Competitors_Competitors1` FOREIGN KEY (`idUser`) REFERENCES `Competitors` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
