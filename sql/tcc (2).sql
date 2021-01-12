-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Out-2018 às 15:52
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `measures`
--

CREATE TABLE `measures` (
  `code_measures` int(11) NOT NULL,
  `weightMeasures` varchar(7) NOT NULL,
  `heightMeasures` varchar(7) NOT NULL,
  `chest` varchar(7) NOT NULL,
  `neck` varchar(7) NOT NULL,
  `rightArm` varchar(7) NOT NULL,
  `leftArm` varchar(7) NOT NULL,
  `waist` varchar(7) NOT NULL,
  `abdomen` varchar(7) NOT NULL,
  `quadriceps` varchar(7) NOT NULL,
  `rightThigh` varchar(7) NOT NULL,
  `leftThigh` varchar(7) NOT NULL,
  `rightCalf` varchar(7) NOT NULL,
  `leftCalf` varchar(7) NOT NULL,
  `code_user` int(11) DEFAULT NULL,
  `rightForearm` varchar(7) NOT NULL,
  `leftForearm` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `measures`
--

INSERT INTO `measures` (`code_measures`, `weightMeasures`, `heightMeasures`, `chest`, `neck`, `rightArm`, `leftArm`, `waist`, `abdomen`, `quadriceps`, `rightThigh`, `leftThigh`, `rightCalf`, `leftCalf`, `code_user`, `rightForearm`, `leftForearm`) VALUES
(3, '312', '312', '312', '312', '313', '312', '312', '312', '312', '312', '312', '312', '312', 2, '312', '312'),
(4, '321', '4132', '1231', '23', '3432', '132', '23', '31', '2345', '43', '654', '4', '52', 6, '323', '323');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_trainer`
--

CREATE TABLE `personal_trainer` (
  `code_trainer` int(11) NOT NULL,
  `name_trainer` varchar(100) NOT NULL,
  `email_trainer` varchar(100) DEFAULT NULL,
  `rg_trainer` varchar(13) NOT NULL,
  `cpf_trainer` varchar(15) NOT NULL,
  `phone_trainer` varchar(13) NOT NULL,
  `city_trainer` varchar(50) NOT NULL,
  `neighborhood_trainer` varchar(50) NOT NULL,
  `user_trainer` varchar(100) NOT NULL,
  `password_trainer` varchar(50) NOT NULL,
  `education_trainer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `personal_trainer`
--

INSERT INTO `personal_trainer` (`code_trainer`, `name_trainer`, `email_trainer`, `rg_trainer`, `cpf_trainer`, `phone_trainer`, `city_trainer`, `neighborhood_trainer`, `user_trainer`, `password_trainer`, `education_trainer`) VALUES
(1, 'Ronnie Cool', 'ronnie@gmail.com', '23.244.43210', '124.344.342-98', '12 9986-0987', 'Nova York', 'Brooklin', 'kaio', '202cb962ac59075b964b07152d234b70', 'Formando em Eudacaï¿½ï¿½o Fï¿½sica em Sï¿½o Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `code_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(50) NOT NULL,
  `age_user` int(2) NOT NULL,
  `descriptionHealth_user` text,
  `goal_user` varchar(20) NOT NULL,
  `city_user` varchar(50) NOT NULL,
  `neighborhood_user` varchar(50) NOT NULL,
  `state_user` varchar(50) NOT NULL,
  `phone_user` varchar(13) NOT NULL,
  `rg_user` varchar(13) NOT NULL,
  `cpf_user` varchar(15) NOT NULL,
  `level_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`code_user`, `name_user`, `email_user`, `password_user`, `age_user`, `descriptionHealth_user`, `goal_user`, `city_user`, `neighborhood_user`, `state_user`, `phone_user`, `rg_user`, `cpf_user`, `level_user`) VALUES
(1, 'Pedro Henrique', 'pedrohenrique@gmail.com', '202cb962ac59075b964b07152d234b70', 27, 'Não tem', 'Hipertrofia', 'SJC', 'Jardim Paulista', 'SP', '12 98379039', '35.723.261-6', '566.127.010-05', 'Iniciante'),
(2, 'Eliane Higa', 'eliane.higa@gmail.com', '202cb962ac59075b964b07152d234b70', 50, 'Nada', 'Emagrecer', 'SJC', 'Rua SÃ£o Carlos', 'SP', '(12)8392-8290', '38.292.002-02', '283.929.022-29', 'beginner'),
(3, 'Renato', 'renatoka14@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 16, 'aa', 'Emagrecer', 'Sjc', 'SÃ£o Carlos ', 'SP', '(12)3984-9894', '90.138.591-83', '408.913.841-98', 'beginner'),
(5, 'Renato', 'Renato.h@gmail.com', '123', 16, 'NÃ£o tem ', 'Hipertrofia', 'SÃ£o JosÃ© dos Campos', 'Jardim Paulistano', 'SP', '(12)3198-2389', '12.874.187-24', '841.974.918-47', 'Iniciante'),
(6, 'Renato Higa', 'renato_higuti@exemplo.com', 'md5(123', 16, 'Nullo', 'Outro', 'SÃ£o JosÃ© dos Campos', 'Jardim dos PÃ£es ', 'SP', '(12)1214-1284', '38.728.952-35', '235.728.975-82', 'Iniciante'),
(7, 'Ren', 'ren@gmail.com', '202cb962ac59075b964b07152d234b70', 16, 'Nenhuma', 'Emagrecer', 'SÃ£o JosÃ© dos Campos', 'sijaogj', 'SP', '(12)3124-1241', '21.786.126-8', '187.647.162-82', 'Iniciante'),
(8, 'Gabriel Fernandes Giraud', 'giraud.palmeiras@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 17, 'Asma', 'Emagrecer', 'SJC', 'Rua dos Girauds', 'SP', '(12)3567-8655', '23.445.566-54', '223.445.556-66', 'Mediano'),
(9, 'JoÃ£o Gabriel de Souza Oliveira', 'joao@gmail.com.br', '202cb962ac59075b964b07152d234b70', 17, 'Quebrou o braÃ§o 2 vezes', 'Hipertrofia', 'SJC', 'Rua Jose cobra', 'SP', '(12)3636-3636', '75.422.442-42', '105.242.425-55', 'Avancado'),
(10, 'Leticia Costa Leite', 'leticiacostaleite@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 17, 'nada', 'Hipertrofia', 'sÃ£o josÃ© dos campos', 'Edward SimÃµes 135', 'SP', '(12)3923-6879', '38.391.177-1', '382.273.518-32', 'Mediano'),
(11, 'JoÃ£o Gabriel', 'joao.gabriel@gmail.com', '202cb962ac59075b964b07152d234b70', 17, 'Nenhuma', 'Hipertrofia', 'SÃ£o JosÃ© dos Campos', 'Jardim das Flores ', 'SP', '(12)2412-4114', '14.241.241-41', '281.758.915-71', 'Avancado'),
(12, 'aaaaaa', '', 'd41d8cd98f00b204e9800998ecf8427e', 11, '', 'Hipertrofia', '1', '1', '', '(1', '1', '1', 'Avancado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`code_measures`),
  ADD KEY `code_user` (`code_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measures`
--
ALTER TABLE `measures`
  MODIFY `code_measures` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `code_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `measures`
--
ALTER TABLE `measures`
  ADD CONSTRAINT `measures_ibfk_1` FOREIGN KEY (`code_user`) REFERENCES `user` (`code_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
