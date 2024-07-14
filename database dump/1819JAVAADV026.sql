-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2019 at 09:54 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1819JAVAADV026`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bestelling`
--

CREATE TABLE `Bestelling` (
  `id` int(25) NOT NULL,
  `user` varchar(25) NOT NULL,
  `factuuradres` text NOT NULL,
  `leveradres` text NOT NULL,
  `levermethode` varchar(25) NOT NULL,
  `betaalmethode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bestelling`
--

INSERT INTO `Bestelling` (`id`, `user`, `factuuradres`, `leveradres`, `levermethode`, `betaalmethode`) VALUES
(69, 'manon', 'Roosstraat 123 Roosendael', 'Roosstraat 123 Roosendael', 'Afhalen', 'Paypal'),
(70, 'manon', 'Konohasenpaistraat 11 Brussel', 'Yokatastraat 99 Antwerpen', 'PostNL', 'Bancontact'),
(71, 'ali', 'Kerkstraat 11 Buggenhout', 'Waifustraat 11 Tokyo', 'PostNL', 'Bancontact');

-- --------------------------------------------------------

--
-- Table structure for table `Bestel_item`
--

CREATE TABLE `Bestel_item` (
  `id` int(25) NOT NULL,
  `bestelling_id` int(25) NOT NULL,
  `item_id` int(25) NOT NULL,
  `aantal` int(25) NOT NULL,
  `totaalprijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bestel_item`
--

INSERT INTO `Bestel_item` (`id`, `bestelling_id`, `item_id`, `aantal`, `totaalprijs`) VALUES
(67, 69, 7, 1, 35),
(68, 69, 29, 1, 18),
(69, 70, 9, 1, 20),
(70, 70, 13, 4, 400),
(71, 70, 29, 1, 18),
(72, 71, 34, 1, 103);

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `item_id` int(25) NOT NULL,
  `sterren` int(5) NOT NULL,
  `commentaar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`id`, `user_id`, `item_id`, `sterren`, `commentaar`) VALUES
(1, 26, 5, 5, 'hehe xd'),
(3, 26, 8, 3, 'l9'),
(4, 26, 7, 5, 'asdfasdasd'),
(5, 26, 8, 5, 'NIB'),
(6, 26, 8, 5, 'best skin ever!'),
(7, 26, 9, 5, 'kei nice skin ik voel me net rat irl L9 broski'),
(8, 33, 9, 1, 'this skin sucks !!!!!!!'),
(9, 26, 34, 5, 'prachtig'),
(10, 26, 4, 1, 'beste platinum boost ooit!'),
(11, 26, 1, 5, 'qwfqwf'),
(12, 39, 1, 5, 'perfect bronze boost voor de prijs, aangeraden!'),
(13, 39, 2, 3, 'prachtig'),
(14, 39, 5, 5, 'eindelijk niet meer hardstuck in league of legends '),
(15, 39, 5, 1, 'mijn account werd gebanned voor boosting wtf'),
(16, 39, 7, 5, 'gewoonweg de beste'),
(17, 39, 8, 1, 'geen woorden'),
(18, 39, 42, 3, 'is werkelijk groot, anime for life'),
(19, 39, 29, 3, 'nice skin, nu kan ik het cosplayen !');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(25) NOT NULL,
  `beschrijving` text,
  `img` varchar(100) NOT NULL,
  `uitgelicht` tinyint(1) NOT NULL,
  `categorie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`id`, `name`, `price`, `beschrijving`, `img`, `uitgelicht`, `categorie`) VALUES
(1, 'Bronze', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'bronze.png', 1, 'boost'),
(2, 'Silver', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'silver.png', 0, 'boost'),
(3, 'Gold', 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'gold.png', 0, 'boost'),
(4, 'Platinum', 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'platinum.png', 0, 'boost'),
(5, 'Diamond', 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'diamond.png', 1, 'boost'),
(6, 'Master', 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'master.png', 0, 'boost'),
(7, 'Challenger', 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'challenger.png', 1, 'boost'),
(8, 'cmonbruh', 80, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'cmonbruh.jpg', 1, 'skin'),
(9, 'RAT IRL', 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', 'turbosmurf.jpg', 1, 'skin'),
(10, '1380', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', '10dollar.jpg', 1, 'riotpoints'),
(11, '3500', 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', '25dollar.jpg', 0, 'riotpoints'),
(12, '7200', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', '50dollar.jpg', 0, 'riotpoints'),
(13, '15000', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada facilisis turpis in ultrices. Ut vehicula ante tortor, non pharetra justo feugiat sit amet. Duis rutrum urna imperdiet, luctus justo sed, volutpat ex. Integer vestibulum vestibulum nibh, a aliquam augue. Cras vestibulum mi ac aliquet rutrum. Vestibulum vulputate felis eget sem dapibus, ac mattis ex sagittis. Praesent est lectus, auctor vel vulputate at, dignissim id libero. Donec tincidunt quis diam nec convallis. Pellentesque venenatis urna nisi, iaculis cursus nunc faucibus ut. Integer vitae sagittis enim, et vehicula ipsum. Suspendisse porttitor libero diam, eu placerat sem viverra vitae.', '100dollar.jpg', 1, 'riotpoints'),
(29, 'bunny riven', 18, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'bunny_riven.jpg', 1, 'skin'),
(30, 'egirl sona', 34, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'egirl_sona.jpg', 0, 'skin'),
(31, 'ilyas trihard', 2, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'ilyas_trihard.jpg', 0, 'skin'),
(32, 'kappa pride taric', 69, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'kappapride_taric.jpg', 1, 'skin'),
(33, 'marathonrunner nunu', 58, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'marathonrunner_nunu.jpg', 1, 'skin'),
(34, 'psycho shaco', 103, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'psycho_shaco.jpg', 1, 'skin'),
(35, 'singledigit jungler', 15, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'singledigitiq_jungler.jpg', 0, 'skin'),
(36, 'unranked', 7, 'Cras aliquet orci in imperdiet pretium. Mauris sollicitudin sapien eget libero tempus, nec cursus mauris pharetra. Nam pellentesque, eros vitae pulvinar tincidunt, nisi metus lobortis ante, elementum molestie quam eros nec mi. Vestibulum finibus tellus sapien, eu sollicitudin neque blandit sed. Cras a pretium velit. Curabitur sagittis blandit dolor, non luctus sem pretium vitae. Nullam elit leo, malesuada a porttitor sed, volutpat non metus. Praesent placerat ante lectus, eu porta sapien semper ut. Integer turpis tellus, porta sed urna vitae, accumsan luctus augue. Nam eu mattis tortor, ac blandit nibh. Phasellus et luctus justo. Fusce orci dolor, sollicitudin eget mauris ut, ultricies scelerisque quam.', 'unranked.png', 0, 'boost'),
(42, 'Anime pop male XL', 99, 'hardcoded_beschrijving_temporary', 'wcbwm8qemc931.png', 1, 'anime');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `wachtwoord`) VALUES
(26, 'ali', '$2y$10$lrSLOJiTKbXxTMrNeryFBO5uu36hIXDWvpJMgGhg5xz0c57mjXZKa'),
(39, 'manon', '$2y$10$LGBbz/HYsqbg8y0rquQdP.ijX4y1UhzjYYKk9BpUCVCWv145heuha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bestelling`
--
ALTER TABLE `Bestelling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Bestel_item`
--
ALTER TABLE `Bestel_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bestelling`
--
ALTER TABLE `Bestelling`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `Bestel_item`
--
ALTER TABLE `Bestel_item`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
