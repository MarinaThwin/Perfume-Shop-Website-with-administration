-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 03:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cass`
--

-- --------------------------------------------------------

--
-- Table structure for table `carosel`
--

CREATE TABLE `carosel` (
  `caroid` int(11) NOT NULL,
  `caroname` varchar(255) NOT NULL,
  `carophoto` varchar(255) NOT NULL,
  `carolabel` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carosel`
--

INSERT INTO `carosel` (`caroid`, `caroname`, `carophoto`, `carolabel`) VALUES
(1, 'Dior', 'dior.jpg', 'DIORIVIERA - LIMITED EDITION'),
(2, 'COCO MADEMOISELLE', 'chanel.jpg', 'Every Time with Chanel'),
(3, 'David Beckham', 'david beckham.webp', 'A scent like holidays by the coast, sea breeze, lemon trees and a breath of fresh air.'),
(4, 'NEROLI PORTOFINO', 'Tom.webp', 'TomFord Sginature');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL,
  `catphoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `catphoto`) VALUES
(5, 'Dior', 'dior2.jpg'),
(6, 'Chanel', 'chanel.jpg'),
(7, 'TomFord', 'Tom.webp'),
(8, 'David Beckham', 'david beckham.webp'),
(9, 'Parfums de Marly', 'Parfums de Marly.webp');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `conid` int(11) NOT NULL,
  `conemail` varchar(100) NOT NULL,
  `context` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`conid`, `conemail`, `context`, `status`) VALUES
(1, '0', 'ikughfhtrsxciyuhjnkm\r\n;jlhmnscfgbkjkl', 1),
(2, 'zaw@gmail.com', 'ikughfhtrsxciyuhjnkm\r\n;jlhmnscfgbkjkl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productqty` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `productqty`, `amount`) VALUES
(0, 7, 1, 52000),
(0, 5, 1, 55000),
(0, 5, 1, 55000),
(0, 5, 2, 110000),
(0, 15, 1, 2147483647),
(4, 11, 1, 450000),
(4, 10, 1, 500000),
(5, 15, 1, 888000),
(5, 13, 1, 1500000),
(6, 13, 1, 1500000),
(6, 15, 1, 888000),
(7, 11, 1, 450000),
(8, 15, 1, 888000),
(9, 11, 1, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `deliveryname` varchar(30) NOT NULL,
  `deliveryphone` varchar(20) NOT NULL,
  `deliveryaddress` varchar(225) NOT NULL,
  `orderdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `senddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `deliveryname`, `deliveryphone`, `deliveryaddress`, `orderdate`, `status`, `senddate`) VALUES
(1, 1, 'zaw', '09123456789', 'north okkalapa', '2024-06-13', 0, '0000-00-00'),
(2, 1, 'zaw', '09123456789', 'north okkalapa', '2024-06-13', 0, '0000-00-00'),
(3, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00'),
(4, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00'),
(5, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00'),
(6, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00'),
(7, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00'),
(8, 0, 'zaw', '09123456789', 'north okkalapa', '2024-06-20', 1, '2024-06-20'),
(9, 0, 'kyaw', '09123456789', 'north okkalapa', '2024-06-20', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productinfo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `categoryid`, `price`, `qty`, `photo`, `productinfo`) VALUES
(1, 'COCO MADEMOISELLE', 6, 500000, 30, 'chanel1.webp', 'Vibrant orange immediately awakens the senses. A clear and sensual heart reveals a transparent accord of jasmine and May rose. The scent finally unfurls with refined accents of patchouli and vetiver.'),
(2, 'CHANCE EAU FRAÎCHE', 6, 600000, 300, 'chanel2.webp', 'The zesty freshness of citron, the softness of jasmine and the vibrant presence of teak wood intertwine with spirit and vitality.'),
(3, 'GABRIELLE CHANEL ESSENCE', 6, 880000, 20, 'chanel3.webp', 'Composed by In-House Perfumer Creator Olivier Polge, this deep and enveloping scent evokes the true essence of Gabrielle Chanel. The fragrance is an imaginary bloom, faceted with jasmine, ylang-ylang, orange blossom and the most captivating flower of all: Grasse tuberose. Solar and radiant with a warm trail, it is the scent of a woman who follows her own path.'),
(4, 'N°5 L’EAU', 6, 560000, 1000, 'chanel4.webp', 'Less abstract than its forebears, N°5 L’EAU radiates citrus like sun-drenched honey. Top notes of lemon, mandarin and orange are propelled by aldehydes, followed by a profusion of flowers. Rose melds with airy jasmine and a touch of ylang-ylang, more modern than ever. Behind this floral whirlwind, vetiver and cedar impart a novel dynamism, softened by white musk notes. Never has N°5 been so fresh.'),
(5, 'NEROLI PORTOFINO PARFUM', 7, 550000, 400, 'Tom.webp', 'Neroli Portofino Parfum captures an amplified dimension of bold citrus. A double concentration of neroli accord is heightened with the fresh vibrancy of Italian blood orange, opulent white florals and a sensual ambermusk.'),
(6, 'OUD WOOD PARFUM', 7, 450000, 1000, 'tom1.avif', 'OUD WOOD PARFUM reveals astounding facets of the iconic oud ingredient. Natural essences of invigorating cardamom and patchouli bow to a rich blend of prized woods warmed by seductive vanilla, tonka bean facets and glowing amber resins.'),
(7, 'Mona', 0, 52000, 1200, 'cw11.jpg', ''),
(8, ' LOST CHERRY EAU DE PARFUM', 7, 450000, 1000, 'tom2.webp', 'Lost Cherry mingles black cherry with cherry liqueur accords and a touch of bitter almond, bursting forth in waves of sweet and tart. Opulent floral notes of rose and jasmine sambac blend with an unexpected mélange of sandalwood, vetiver, and cedarwood.'),
(9, 'BEAU DE JOUR EAU DE PARFUM', 7, 450000, 1000, 'tom3.avif', 'Beau de Jour fragrance presents the most classic expression of the TOM FORD experience. Lavender pulses with commanding power, as floral green geranium creates a perfect contrast to the leather-like oakmoss. The sensual musky warmth of patchouli and amber further elevate the masculine intensity.'),
(10, 'OUD ISPAHAN', 5, 500000, 37, 'dior1.jpg', 'Oud Ispahan eau de parfum outlines the seductively close contact of an oud wood note and a sensual, plump Damascus rose.'),
(11, 'DIORIVIERA - LIMITED EDITION', 5, 450000, 36, 'dior.jpg', 'The joyful silhouette of this unisex eau de parfum incarnates the Dior dolce vita, celebrating the vibrant art of living embraced by the House of Dior and the South of France alike.  Its floral, fruity scent leaves a trail of solar, summery motifs with a blend of rose and green fig notes.  The limited edition is available in the 125 ml and 250 ml bottles of Dioriviera Eau de Parfum.'),
(12, 'GRIS DIOR', 5, 799999, 20, 'dior2.jpg', 'Gris Dior eau de parfum is an olfactory enigma that forms an indivisible whole, a reflection of its namesake color. Like chypre-rosy pleats, Gris Dior unfolds its different floral and woody facets in turn.'),
(13, 'INFINITE AQUA', 8, 1500000, 18, 'david beckham.webp', 'Infinite Aqua was inspired by a drive along the Pacific Coast highway, the sheer expansiveness of the ocean, and the exhilarating feel of salty sea air on the skin.'),
(14, 'AROMATIC GREENS', 8, 120000, 300, 'david beckham1.webp', 'Aromatic Greens is a woody-green fragrance that encapsulates the serenity of a hike amongst nature’s vibrant beauty.'),
(15, 'MELIORA', 9, 888000, 17, 'Parfums de Marly1.webp', 'Meliora is a delicate cocktail of fruit and flowers that have an enchanting romanticism. Dreamy rose, jasmine tea and ylang-ylang release a clean floralcy that stirs and enchants the mind amidst an opening of fruity berries and lemon essence. The freshness of the blooms found at the heart are further enhanced through a flourish of sweet vanilla, musk and cedarwood essence at the base.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, 'zaw', 'b630d83d537c0c2e726fe3af7773f446', 'zaw@gmail.com', '09123456789', 'north okkalapa', 'user'),
(2, 'kyaw', '202cb962ac59075b964b07152d234b70', 'kyaw@gmail.com', '', 'east dagon', 'user'),
(3, 'thwin', 'dc960c46c38bd16e953d97cdeefdbc68', '', '', '', 'admin'),
(4, 'Myo Myo', '698d51a19d8a121ce581499d7b701668', 'myo@gmail.com', '09123456789', 'fdeewrctvybuhnmk', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carosel`
--
ALTER TABLE `carosel`
  ADD PRIMARY KEY (`caroid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carosel`
--
ALTER TABLE `carosel`
  MODIFY `caroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
