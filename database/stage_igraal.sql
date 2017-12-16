-- Host: localhost:3306
-- Generation Time: Dec 16, 2017 at 03:31 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `igraal_stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `marchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `cashback` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `marchant_id`, `user_id`, `date`, `cashback`) VALUES
(1, 1, 2, '2017-12-01 09:00:00', '10.53'),
(2, 1, 2, '2017-12-01 09:00:00', '10.53'),
(3, 2, 1, '2017-12-03 08:50:00', '8.30'),
(4, 3, 3, '2017-11-01 08:00:19', '0.13'),
(5, 4, 1, '2017-10-01 04:00:10', '3.10'),
(6, 1, 2, '2017-07-01 06:00:20', '0.42'),
(7, 2, 3, '2017-09-01 05:00:32', '0.78'),
(8, 3, 1, '2017-12-01 01:00:00', '4.93'),
(9, 4, 1, '2017-03-01 03:00:00', '2.12'),
(10, 1, 3, '2017-05-01 08:00:00', '3.61'),
(11, 2, 1, '2017-02-01 11:26:46', '8.93'),
(12, 1, 2, '2017-01-01 14:40:07', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `marchant`
--

CREATE TABLE `marchant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marchant`
--

INSERT INTO `marchant` (`id`, `name`) VALUES
(1, 'Zalando'),
(2, 'Fnac'),
(3, 'Castorama'),
(4, 'Darty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Elodie'),
(2, 'Eric'),
(3, 'Pascal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1C6501586E7D752E` (`marchant_id`),
  ADD KEY `IDX_1C650158A76ED395` (`user_id`);

--
-- Indexes for table `marchant`
--
ALTER TABLE `marchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `marchant`
--
ALTER TABLE `marchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `FK_1C6501586E7D752E` FOREIGN KEY (`marchant_id`) REFERENCES `marchant` (`id`),
  ADD CONSTRAINT `FK_1C650158A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
