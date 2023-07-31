-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jul-2023 às 00:49
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `challenges`
--

CREATE TABLE `challenges` (
  `idChallenge` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `goal` text NOT NULL,
  `name` varchar(75) NOT NULL,
  `reward` double NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `educations`
--

CREATE TABLE `educations` (
  `idEducation` int(11) NOT NULL,
  `formation` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tools`
--

CREATE TABLE `tools` (
  `idTool` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `caption` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `xp` double NOT NULL,
  `resume` text DEFAULT NULL,
  `admin` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUser`, `tag`, `nickname`, `email`, `password`, `avatar`, `level`, `xp`, `resume`, `admin`, `createdAt`, `location`) VALUES
(2, 0, 'nick', 'nicolealvesraimundo@gmail.com', '$2y$10$2mO2K/dfjzOUILokOBTqLON7dforUKF2d8vCmV43ed3t8jxt915GK', NULL, 1, 0, NULL, 0, '2023-07-25 02:05:47', NULL),
(3, 6745, 'gabs', 'gabizinha@gmail.com', '$2y$10$yH4Zcwl7Yg9eVVxOAEcWgOgsZ9eFg7FeZyswSIRALn.H/mKb.Qt5e', NULL, 1, 0, NULL, 0, '2023-07-25 02:08:49', NULL),
(4, 3665, 'nick', 'nick@gmail.com', '$2y$10$CPRPUFQ5VeEQZ/zuioMxQujhKdCIH7C892gfiIoY2LIfNm6l34qiK', NULL, 1, 0, NULL, 0, '2023-07-28 00:15:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_tools`
--

CREATE TABLE `users_tools` (
  `idUser` int(11) NOT NULL,
  `idTool` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`idChallenge`);

--
-- Índices para tabela `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`idEducation`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Índices para tabela `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`idTool`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices para tabela `users_tools`
--
ALTER TABLE `users_tools`
  ADD PRIMARY KEY (`idUser`,`idTool`),
  ADD KEY `fk_Users_has_Tools_Tools1_idx` (`idTool`),
  ADD KEY `fk_Users_has_Tools_Users_idx` (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `challenges`
--
ALTER TABLE `challenges`
  MODIFY `idChallenge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `educations`
--
ALTER TABLE `educations`
  MODIFY `idEducation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tools`
--
ALTER TABLE `tools`
  MODIFY `idTool` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users_tools`
--
ALTER TABLE `users_tools`
  ADD CONSTRAINT `fk_Users_has_Tools_Tools1` FOREIGN KEY (`idTool`) REFERENCES `tools` (`idTool`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Tools_Users` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
