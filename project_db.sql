-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byethost32.com
-- Generation Time: Jan 15, 2021 at 08:23 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b32_27664463_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` bigint(10) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNum` int(11) NOT NULL,
  `Gender` char(6) NOT NULL,
  `Password` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Email`, `PhoneNum`, `Gender`, `Password`) VALUES
(1000000001, 'Freddy ', 'Wong', '123abc@gmail.com', 123456789, 'Male', '123qwe'),
(1000000002, 'Wong ', 'Rou Yi', 'wong123@gmail.com', 198765432, 'Femlae', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhoneNum` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(6) NOT NULL,
  `Gender` char(6) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `PhoneNum`, `Email`, `Password`, `Gender`, `Address`) VALUES
(2000000001, 'Vong ', 'Kian Sheng', '0109876543', 'vong1234@gmail.com', '4rF%tg', 'Male', 'fsefwsfgsefsefsfc'),
(2000000002, 'Hii ii', 'Ming Jung', '0112345678', 'mj5678@gmail.com', '7uJ*ik', 'Male', 'fdsfsdfsdfsdfdfsf'),
(2000000003, 'Voon', 'Yu Siang', '0134567890', 'voonabc@hotmail.com', '8iK(ol', 'Male', 'fsdfsdfsdfsdfsd'),
(2000000004, 'Wong', 'Rou Yi iiiiii', '0198765432', 'wong890@gmail.com', '9oL)p;', 'Female', 'fsfsdfjthjgjfhj'),
(2000000024, 'Alice', 'Baba', '0123456789', 'abc@gmail.com', '6yH*ik', 'Female', 'huerfghuierghuiertghuip'),
(2000000007, 'Abu', 'Bibi', '018573645', 'abu@gmail.com', '4rJ*ik', 'Male', 'gjhgjfgjfgjfgjfgjfgjfg'),
(2000000022, 'Test', 'Wong', '0198762345', '123@gmail.com', '1qA@ws', 'male', 'rumah tepi jalan raya, ada pagar merah'),
(2000000014, 'Rannie', 'Wong', '0138437926', 'rouyi0211@gmail.com', 'Ro*909', 'female', 'S/L 5, Lorong 1, Taman Li Hua'),
(2000000015, 'Freddy', 'Wong', '0123456789', 'freddy123@gmail.com', '1qA@ws', 'male', ' Depan rumah saya ada jalan raya dan 2 ekor anjing, 93000, Kuching, Sarawak.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CustomerID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Amount`, `Date`, `Address`) VALUES
(00008, 2000000003, 402, '2021-01-13', ''),
(10000, 2000000003, 209, '2021-01-14', ''),
(60000, 2000000003, 209, '2021-01-14', ''),
(60003, 2000000003, 209, '2021-01-15', ''),
(60004, 2000000014, 193, '2021-01-15', 'S/L 5, Lorong 1, Taman Li Hua'),
(60005, 2000000014, 193, '2021-01-15', 'S/L 5, Lorong 1, Taman Li Hua'),
(60006, 2000000014, 209, '2021-01-15', 'S/L 5, Lorong 1, Taman Li Hua');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `ProductID` bigint(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `OrderID` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `Total` double NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`ProductID`, `OrderID`, `Total`, `Quantity`, `Date`) VALUES
(0000000004, 00000, 193, 1, '2021-01-15'),
(0000000008, 00000, 208, 1, '2021-01-15'),
(0000000004, 00000, 193, 1, '2021-01-15'),
(0000000002, 00000, 219, 1, '2021-01-15'),
(0000000004, 00000, 193, 1, '2021-01-15'),
(0000000003, 00000, 209, 1, '2021-01-15'),
(0000000004, 60004, 193, 1, '2021-01-15'),
(0000000004, 60005, 193, 1, '2021-01-15'),
(0000000003, 60006, 209, 1, '2021-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `OrderID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CustomerID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `Amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `OrderID`, `CustomerID`, `Amount`) VALUES
(4000000013, 00000, 2000000015, 208),
(4000000014, 00000, 2000000014, 193),
(4000000015, 00000, 2000000015, 219),
(4000000016, 00000, 2000000014, 193),
(4000000017, 00000, 2000000014, 209),
(4000000018, 60004, 2000000014, 193),
(4000000019, 60005, 2000000014, 193),
(4000000020, 60006, 2000000014, 209);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Image` text CHARACTER SET latin1,
  `ProductDesc` text NOT NULL,
  `ProductAmount` double NOT NULL,
  `Supplier` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Image`, `ProductDesc`, `ProductAmount`, `Supplier`) VALUES
(0000000001, 'Animal Crossing', 'image/animalcrossing.jpg', 'Animal Crossing is a social simulation video game series developed and published by Nintendo and created by Katsuya Eguchi and Hisashi Nogami. In Animal Crossing, the player character is a human who lives in a village inhabited by various anthropomorphic animals, carrying out various activities such as fishing, bug catching, and fossil hunting. The series is notable for its open-ended gameplay and extensive use of the video game console\'s internal clock and calendar to simulate real passage of time.', 209, 'otakuya'),
(0000000002, 'The Legend of Zelda: Breathe of the World', 'image/zelda.jpg', 'The Legend of Zelda: Breath of the Wild is a 2017 action-adventure game developed and published by Nintendo for the Nintendo Switch and Wii U consoles. Breath of the Wild is part of the Legend of Zelda franchise and is set at the end of the Zelda timeline; the player controls Link, who awakens from a hundred-year slumber to defeat Calamity Ganon and save the kingdom of Hyrule.', 219, 'otakuya'),
(0000000003, 'Arms', 'image/arms.jpg', 'Arms is a fighting game developed and published by Nintendo for the Nintendo Switch, which released on June 16, 2017. The game differentiates itself from standard fighting games with its unconventional fighting system where every playable character fights with long range attacks and up to four players can choose a fighter and battle using a variety of extendable, customizable arms to knock out opponents in a three-dimensional arena. The game had sold over two million copies by July 2018, making it one of the best-selling games on the Switch.', 209, 'otakuya'),
(0000000004, 'Mario Kart 8 Deluxe', 'image/mariokart.jpg', 'Mario Kart 8 Deluxe is a racing game for the Nintendo Switch, and the first Mario game overall for the console. It is a port in the Mario Kart series, being a port of Mario Kart 8 from the Wii U. It has additional features such as several new characters and features more options for Battle Mode. First teased in the Switch\'s announcement video on October 20, 2016, the game was formally announced as part of the Nintendo Switch presentation on January 13, 2017.', 193, 'otakuya'),
(0000000005, 'Super Mario 3D All Stars', 'image/supermario3d.jpg', 'Super Mario 3D All-Stars is a 2020 compilation of 3D platform action-adventure games for the Nintendo Switch. It commemorates the 35th anniversary of Nintendo\'s Super Mario franchise, with high-definition ports of Super Mario 64 (1996), Super Mario Sunshine (2002), and Super Mario Galaxy (2007).', 199, 'otakuya'),
(0000000006, 'Luigi\'s Mansion 3', 'image/luigi.jpg', 'Luigi\'s Mansion 3 is an action-adventure game developed by Next Level Games and published by Nintendo for the Nintendo Switch. It is the third entry in the Luigi\'s Mansion series following Luigi\'s Mansion: Dark Moon and was released on October 31, 2019. The game sees players taking on the role of Luigi who must explore a haunted hotel, incorporating different themes on each floor, and rescue his friends from the ghosts that inhabit it, after the group is tricked into visiting it for a vacation by an old foe.', 197, 'otakuya'),
(0000000007, 'Moving Out', 'image/movingout.jpg', 'Players in Moving Out take on the role of movers, moving marked furniture and appliances (such as couches, refrigerators, and microwaves) from a house to a moving truck under a time limit. Along the way, obstacles (such as rakes, fires, ice, and even ghosts) may be encountered. Some heavy objects require two people to move, while other objects are fragile and may be easily broken. Objects may be thrown. Players are ranked on a bronze, silver and gold scale, based on how quickly all of the objects are packed into the moving truck. The levels also have optional objectives, such as breaking all of the house\'s windows or packing an unmarked object. Additional bonus levels may also be unlocked.', 99, 'otakuya'),
(0000000008, 'Kirby Star Allies', 'image/kirby.jpg', 'Kirby Star Allies is a 2018 platform video game developed by HAL Laboratory and published by Nintendo. The eleventh mainline installment in the Kirby series, the player controls Kirby in his quest to prevent a priest named Hyness from reviving a dark force to destroy the universe. Kirby must complete each level by jumping, inhaling enemies, and using his array of abilities to progress.', 208, 'otakuya');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `CustomerID` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `Rating` int(1) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `ReviewDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `CustomerID`, `Rating`, `Comment`, `ReviewDate`) VALUES
(5000000001, 2000000005, 5, 'Very Good. Will buy from your store again.', '2021-01-13'),
(5000000002, 2000000014, 3, 'Good Service!', '2021-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Customer_IDD` (`CustomerID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD KEY `Product_ID` (`ProductID`),
  ADD KEY `Order_IDD` (`OrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `Customer_ID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000003;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` bigint(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000026;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60007;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` bigint(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000000021;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` bigint(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` bigint(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000000003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
