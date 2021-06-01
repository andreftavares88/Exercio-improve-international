-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28-Jul-2020 às 09:29
-- Versão do servidor: 5.7.31-log
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `improve_test_1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tarefa_1`
--

CREATE TABLE `Tarefa_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `prefix` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT '',
  `newsletter` int(1) DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tarefa_2`
--

CREATE TABLE `Tarefa_2` (
  `id` int(11) UNSIGNED NOT NULL,
  `module_name` varchar(45) DEFAULT '',
  `date` date DEFAULT NULL,
  `location` varchar(45) DEFAULT '',
  `content` varchar(45) DEFAULT '',
  `speaker` varchar(45) DEFAULT '',
  `speaker_qual` varchar(45) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Tarefa_2`
--

INSERT INTO `Tarefa_2` (`id`, `module_name`, `date`, `location`, `content`, `speaker`, `speaker_qual`) VALUES
(1, 'Oncologia', '2020-01-01', 'Online', 'Content_A', 'Speaker A', 'Qual_A'),
(2, 'Urologia', '2020-05-01', 'Hotel_A', 'Content_B', 'Speaker B', 'Qual_B'),
(3, 'Técnicas de diagnóstico', '2021-06-01', 'Hotel_B', 'Content_C', 'Speaker C', 'Qual_C'),
(4, 'Gastroenterologia', '2019-07-01', 'Hotel_C', 'Content_D', 'Speaker D', 'Qual_D'),
(5, 'Imunologia', '2021-03-01', 'Hotel_D', 'Content_F', 'Speaker F', 'Qual_F'),
(6, 'Endocrinologia', '2020-10-01', 'Hotel_F', 'Content_G', 'Speaker G', 'Qual_G');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tarefa_3`
--

CREATE TABLE `Tarefa_3` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `prefix` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT '',
  `newsletter` int(1) DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Tarefa_3`
--

INSERT INTO `Tarefa_3` (`id`, `name`, `email`, `prefix`, `phoneNumber`, `newsletter`, `date`, `time`) VALUES
(1, 'Name_1', 'email_1@a.com', '1', '11', 1, '2020-01-01', '01:00:00'),
(2, 'Name_2', 'email_2@a.com', '2', '22', 0, '2020-01-02', '02:00:00'),
(3, 'Name_3', 'email_3@a.com', '3', '33', 1, '2020-01-03', '03:00:00'),
(4, 'Name_4', 'email_4@a.com', '4', '44', 1, '2020-01-04', '04:00:00'),
(5, 'Name_5', 'email_5@a.com', '5', '55', 0, '2020-01-05', '05:00:00'),
(6, 'Name_6', 'email_6@a.com', '6', '66', 1, '2020-01-06', '06:00:00'),
(7, 'Name_7', 'email_7@a.com', '7', '77', 0, '2020-01-07', '07:00:00'),
(8, 'Name_8', 'email_8@a.com', '8', '88', 1, '2020-01-08', '08:00:00'),
(9, 'Name_9', 'email_9@a.com', '9', '99', 1, '2020-01-09', '09:00:00'),
(10, 'Name_10', 'email_10@a.com', '10', '100', 1, '2020-01-10', '10:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Tarefa_1`
--
ALTER TABLE `Tarefa_1`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Tarefa_2`
--
ALTER TABLE `Tarefa_2`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Tarefa_3`
--
ALTER TABLE `Tarefa_3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Tarefa_1`
--
ALTER TABLE `Tarefa_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Tarefa_2`
--
ALTER TABLE `Tarefa_2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Tarefa_3`
--
ALTER TABLE `Tarefa_3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
