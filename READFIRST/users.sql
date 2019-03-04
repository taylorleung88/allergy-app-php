-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 02:04 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `userId` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`userId`, `recipe_id`, `recipe_name`, `userEmail`) VALUES
(1, 1, 'Chocolate Chip Cookies', ''),
(2, 1, 'Chocolate Chip Cookies', ''),
(2, 2, '', ''),
(0, 2, '', 'taylorl3193@gmail.com'),
(0, 1, '', 'taylorl3193@gmail.com'),
(0, 1, 'Chocolate Chip Cookies', 'taylorl3193@gmail.com'),
(0, 1, 'Chocolate Chip Cookies', 'taylorl3193@gmail.com'),
(0, 1, 'Chocolate Chip Cookies', 'taylorl3193@gmail.com'),
(0, 8, 'Egg Frittata', ''),
(0, 8, 'Egg Frittata', ''),
(0, 8, 'Egg Frittata', 'taylorl3193@gmail.com'),
(7, 12, 'Herbed Quinoa', 'happy@wit.edu');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `recipe_description` varchar(255) NOT NULL,
  `recipe_image` varchar(255) NOT NULL,
  `recipe_url` varchar(255) NOT NULL,
  `meal` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `nuts` int(11) NOT NULL DEFAULT '0',
  `seafood` int(11) NOT NULL DEFAULT '0',
  `soy` int(11) NOT NULL DEFAULT '0',
  `gluten` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `userEmail`, `recipe_name`, `recipe_description`, `recipe_image`, `recipe_url`, `meal`, `cost`, `nuts`, `seafood`, `soy`, `gluten`) VALUES
(1, '', 'Chocolate Chip Cookies', 'This recipe satisfies everyone\'s love for cookies! Enjoy a sweet bite after dinner!', 'choc-chip-cookies.jpg', 'chocolate-chip-cookies.php', 'dessert', 4, 0, 0, 0, 1),
(3, '', 'Gluten Free Chicken Nuggets', 'Who does not love a good chicken nugget? This recipe is not only, good, but gluten free!', 'gf-chicken-nuggets.jpg', 'gf-chicken-nuggets.php', 'dinner', 6, 1, 0, 1, 0),
(4, '', 'Chocolate Brownies', 'Who doesn\'t love indulging once in awhile? This recipe for chocolate brownies are rich and chewy!', 'brownies.jpg', 'chocolate-brownies.php', 'dessert', 6, 0, 0, 0, 1),
(5, '', 'Gluten-Free Chocolate Brownies', 'Gluten allergies do not have to be a burden. You can still indulge in the richness of a good chocolate brownie!', 'gf-brownies.jpg', 'gf-brownies.php', 'dessert', 9, 0, 0, 0, 0),
(6, '', 'Apple Pie', 'The perfect fall dessert is apple pie. This recipe is perfect, it balances out the tartness of the apple with a hint of sugar!', 'apple-pie.jpg', 'apple-pie.php', 'dessert', 5, 0, 0, 0, 1),
(7, '', 'Pecan Pie', 'Nothing is more classic and true to your grandmas roots than a good old Pecan Pie. This recipe is from The Pioneer Woman and needed very little tweaking. (you know how much food bloggers like to tweak!) But after making quite a few different recipes this', 'pecan-pie.jpg', 'pecan-pie.php', 'dessert', 8, 1, 0, 0, 1),
(8, '', 'Egg Frittata', 'Looking for a hearty breakfast? The egg frittata is the perfect choice! Easy to make and filling!', 'egg-frittata.jpg', 'egg-frittata.php', 'breakfast', 1, 0, 0, 0, 0),
(9, '', 'Pasta Alfredo', 'Who doesn\'t love cheese? This recipe will satisfy every cheese lover\'s tastebuds!', 'alfredo.jpg', 'alfredo.php', 'dinner', 6, 0, 0, 0, 1),
(10, '', 'Fish Sticks', 'Serving kids seafood can be difficult. This recipe for fish sticks will disguise the taste!', 'fish-sticks.jpg', 'fish-sticks.php', 'dinner', 6, 0, 1, 0, 0),
(11, '', 'Vegetable Noodle Soup', 'Got a cold? This soup will cure all your weariness. Enjoy a cup of this soup.', 'vegetable-soup.jpeg', 'vegetable-soup.php', 'lunch', 4, 0, 0, 0, 1),
(12, '', 'Herbed Quinoa', 'Lunch does not have to be a heavy meal. Quickly prepare this herbed quinoa recipe ahead of time or day of!', 'quinoa.jpeg', 'quinoa.php', 'lunch', 4, 0, 0, 0, 0),
(13, '', 'Black Bean and Corn Salad', 'Lunch could not have gotten any easier. This recipe can be prepared in a couple minutes!', 'bean-salad.jpeg', 'bean-salad.php', 'lunch', 2, 0, 0, 0, 0),
(14, '', 'Pancakes', 'Need a sweet treat in the morning? Add a little syrup to this recipe for the perfect bite!', 'pancakes.jpg', 'pancakes.php', 'breakfast', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `nuts` int(11) NOT NULL DEFAULT '0',
  `seafood` int(11) NOT NULL DEFAULT '0',
  `soy` int(11) NOT NULL DEFAULT '0',
  `gluten` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userId`, `userEmail`, `userPass`, `firstName`, `lastName`, `nuts`, `seafood`, `soy`, `gluten`) VALUES
(2, 'taylorl3193@gmail.com', 'abc', 'Taylor', 'Leung', 0, 0, 1, 0),
(3, 'fred@wit.edu', 'abc', 'Fred', 'Berns', 1, 0, 0, 0),
(5, 'patrice@wit.edu', 'abc', 'Patrice', 'Bergeron', 0, 0, 1, 0),
(6, 'phil@wit.edu', 'abc', 'Phil', 'Happy', 0, 0, 0, 0),
(7, 'happy@wit.edu', 'abc', 'Happy', 'News', 0, 0, 0, 0),
(8, 'harry@wit.edu', 'abc', 'Harry', 'Blob', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
