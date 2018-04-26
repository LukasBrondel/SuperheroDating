-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 08:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superherodating`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) NOT NULL,
  `text` text NOT NULL,
  `superhero_from` varchar(254) NOT NULL,
  `superhero_to` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `superhero_from`, `superhero_to`) VALUES
(8, 'Hi Harley :)', 'bruce_wayne@hotmail.com', 'hquinn@gmail.com'),
(9, 'Damn you\'re old', 'bruce_wayne@hotmail.com', 'thunderftw@gmail.com'),
(10, 'sup jean', 'bruce_wayne@hotmail.com', 'jgrey@gmail.com'),
(11, 'how are you?', 'bruce_wayne@hotmail.com', 'jgrey@gmail.com'),
(12, 'nice claws', 'bruce_wayne@hotmail.com', 'wolverine@gmail.com'),
(13, 'Sup man', 'bruce_wayne@hotmail.com', 'w_winston@gmail.com'),
(17, 'hi\r\n', 'bruce_wayne@hotmail.com', 'bruce_wayne@hotmail.com'),
(18, 'Whats up man', 'bruce_wayne@hotmail.com', 'bruce_wayne@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `superheroes`
--

CREATE TABLE `superheroes` (
  `email` varchar(254) NOT NULL,
  `realName` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `placeOfBirth` varchar(128) NOT NULL,
  `currentLocation` varchar(128) NOT NULL,
  `age` int(4) NOT NULL,
  `superpower` varchar(256) NOT NULL,
  `profilePicture` varchar(256) NOT NULL,
  `bio` text NOT NULL,
  `gender` char(1) NOT NULL,
  `amountOfLikes` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superheroes`
--

INSERT INTO `superheroes` (`email`, `realName`, `alias`, `placeOfBirth`, `currentLocation`, `age`, `superpower`, `profilePicture`, `bio`, `gender`, `amountOfLikes`) VALUES
('bruce_wayne@hotmail.com', 'Bruce Wayne', 'Batman', 'Gotham City', 'Gotham City', 39, 'Genius intellect, physical prowess, martial arts abilities, detective skills, science and technology, vast wealth, intimidation, and indomitable will.', 'https://www.superherodb.com/pictures2/portraits/10/100/639.jpg', 'Hi im batman', 'M', 9),
('clark-da-man@gmail.com', 'Clark Joseph Kent (Kal-El)', 'Superman', 'Krypton', 'Metropolis', 39, 'Super strength, super speed, flight, invulnerability, x-ray and heat vision, super hearing.', 'https://www.superherodb.com/pictures2/portraits/10/100/791.jpg', 'Reporter for the Daily Planet, constantly ripping off my shirt. Looking for a smart, driven lady who can keep a secret.', 'M', 8),
('hquinn@gmail.com', 'Harleen Francis Quinzel', 'Harley Quinn', 'Unknown', 'Gotham', 26, 'Toxic immunity, gymnastics and genius level intellect.', 'https://www.superherodb.com/pictures2/portraits/10/100/701.jpg', 'Why can\'t a girl be nice to a guy without the mook trying to murder her?', 'F', 4),
('i-love-cats@hotmail.com', 'Selina Kyle', 'Catwoman', 'Gotham', 'Gotham', 24, 'Mistress of Disguises, Stealth, Expert Combatant', 'https://www.superherodb.com/pictures2/portraits/10/100/659.jpg', 'Cat lady in the streets, cat burgler in the sheets.', 'F', 0),
('jgrey@gmail.com', 'Jean Grey-Summers', 'Jean Grey', 'Unknown', 'New York', 28, 'Telepathic and telekinetic powers', 'https://www.superherodb.com/pictures2/portraits/10/100/814.jpg', 'I know what you\'re thinking. Literally.', 'F', 1),
('thunderftw@gmail.com', 'Thor Odinson', 'Thor', 'Asgard', 'New York', 4197, 'Can summon the elements of the storm (lightning; rain; wind; snow) and controls Mjolnir.', 'https://www.superherodb.com/pictures2/portraits/10/100/140.jpg', 'I seek a maiden in the streets and a wench in the sheets. What say you, will thou let me put the hammer down?', 'M', 3),
('wolverine@gmail.com', 'James Howlett', 'Wolverine', 'Alberta, Canada', 'Los Angeles, USA', 56, 'Animal-keen senses, enhanced physical capabilities, powerful regenerative ability known as a healing factor, and three retractable claws in each hand. ', 'https://www.superherodb.com/pictures2/portraits/10/100/161.jpg', 'Despite what you\'ve heard... Adamantium ISN\'T the hardest thing on my body.', 'M', 2),
('w_winston@gmail.com', 'Wade Winston Wilson', 'Deadpool', 'Canada', 'Canada', 30, 'Accelerated healing factor, superior fighting skills, immune to diseases', 'https://www.superherodb.com/pictures2/portraits/10/100/835.jpg', 'Semi-professional bad guy \"un-aliver\", chimichanga connoisseur, and frequent patron of Sister Margaret\'s School for Wayward Girls.', 'M', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_from` (`superhero_from`),
  ADD KEY `superhero_to` (`superhero_to`);

--
-- Indexes for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`email`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
