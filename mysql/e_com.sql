-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 06:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(7, 'Luly Angga Ramadhan', 'lulyangga44@gmail.com', '12345', 'luly.jpg', '', 'Indonesia', 'WEB DEVELOPER', 'I AM LULY ANGGA RAMADHAN');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(100) NOT NULL,
  `box_icon` varchar(100) NOT NULL,
  `box_title` varchar(255) NOT NULL,
  `box_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_icon`, `box_title`, `box_desc`) VALUES
(4, 'fa fa-trash', 'BEST IN MARKET', 'offer'),
(6, 'fa fa-shipping-fast fa-5', 'FAST SERVICE', 'raw'),
(7, 'fa fa-user', 'EDIT YOURSELF', 'edit'),
(8, 'fa fa-trash', 'DELETE EVERYTHING', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(13, 'Sparepart', 'Sparepart motor'),
(15, 'Lainnya', 'Alat-Alat Kebutuhan Motor');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(30, 'abyan', 'abi@gmail.com', 'abyan4561', 'indonesia ', 'semarang', '0808888888', 'kebon jeruk', 'abyan.jpg', '::1'),
(38, 'ifan', 'ifan@gmail.com', '123', 'ifan', 'ifan', 'ifan', 'ifan', 'ifan.jpeg', '::1'),
(41, 'agus', 'agus@gmail.com', '123456', 'Indonesia', 'Semarang', '08976544123', 'Jl. Imam Bonjol', 'luly.jpeg', '::1'),
(42, 'faris', 'faris@gmail.com', '12345', 'Indonesia', 'Jakarta', '08976544123', 'jl. kota madya', 'abyan2.jpeg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(96, 42, 75, 90450, 1831378263, 1, 'JNE', '2024-12-28 12:00:55', 'unpaid'),
(97, 42, 54, 262305, 1950269037, 1, 'JNE', '2024-12-28 12:04:14', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL,
  `proof_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`, `proof_image`) VALUES
(39, 1929694578, 1407000, 'BRI', 12321321, '2024-12-28', 'aerox.png'),
(42, 1950269037, 262305, 'BRI', 344343, '2024-12-28', 'cover.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`, `stok`) VALUES
(39, 66, 15, '2024-12-28 04:43:33', 'Aki ACCU Motor NMAX', 'aki.png', 'aki.png', 'aki.png', 600000, 'aki accu motor nmax Lithium ION Sodium Battery GTZ 7S Elito Battery', 'aki', 1),
(40, 72, 13, '2024-12-28 03:55:51', 'Fuel Pump Benelli Evo ', 'fulpum.png', 'fulpum.png', 'fulpum.png', 645000, 'Fuel Pump Assy Motor Benelli Evo 200 Sparepart Original Rotak Fuel PumpFuel Pump Assy Motor Benelli Evo 200 Sparepart Original Rotak Fuel Pump', 'fuel pump', 6),
(45, 72, 13, '2024-12-28 03:55:57', 'Gigi Sentrik Geser ', 'gigi.png', 'gigi.png', 'gigi.png', 156000, 'Gigi Sentrik Geser PCX 150, VARIO 125,150 34T PRO 1 Racing /Alat Motor/Sparepart Motor/Variasi Motor/Modifikasi Motor/Motor Racing', 'Gigi Sentrik Geser ', 8),
(46, 72, 13, '2024-12-28 03:56:03', 'Kampas Rem CF Moto', 'kampasrem.png', 'kampasrem.png', 'kampasrem.png', 1682000, 'Kampas Rem Depan Motor CF MOTO 450MT Original Sparepart Front Brake Pads Sparepart Asli', 'kampas rem', 8),
(47, 72, 13, '2024-12-28 03:56:09', 'ORI KOMSTIR RACE', 'komstir.png', 'komstir.png', 'komstir.png', 55000, 'ORI KOMSTIR COMSTIR RACE BALL KIT BOLA KEMUDI SET YAMAHA NMAX N MAX 150 44DW005400 44D-W0054-00 PROMO COD MURAH BJM SPAREPART MOTOR', 'ORI KOMSTIR COMSTIR RACE', 4),
(49, 72, 13, '2024-12-28 03:56:14', 'BAK CVT VARIO', 'bakblock.png', 'bakblock.png', 'bakblock.png', 375000, 'SPAREPART MOTOR BAK BOX BLOCK COVER TUTUP CVT VARIO 125 KZR ORIGINAL Wishlist 1 • Diskusi (1)', 'bak block cvt vario', 2),
(50, 67, 13, '2024-12-28 03:56:19', 'SHOCKBREAKER MOSCOW', 'delser.png', 'delser.png', 'delser.png', 280000, '[READY] [ DELSER MOTOR ] SHOCK BELAKANG SINGLE MATIC TABUNG ATAS MODEL EVO 310MM 330MM SHOCKBREAKER MOTOR BEAT VARIO MIO DLL SOK SKOK SKOP SHOK SHOKBREAKER SHOKBREKER METIC SHOCK BREAKER - 330MM HITAM 05[READY] [ DELSER MOTOR ] SHOCK BELAKANG SINGLE MATIC TABUNG ATAS MODEL EVO 310MM 330MM SHOCKBREAKER MOTOR BEAT VARIO MIO DLL SOK SKOK SKOP SHOK SHOKBREAKER SHOKBREKER METIC SHOCK BREAKER - 330MM HITAM 05', 'SHOCKBREAKER MOTOR MOSCOW', 7),
(51, 67, 13, '2024-12-28 03:56:24', 'MONOSHOCK XRIDE', 'monoshock.png', 'monoshock.png', 'monoshock.png', 377500, 'monoshock / shock belakang xride original yamaha merah, hitam, putih - Hitammonoshock / shock belakang xride original yamaha merah, hitam, putih - Hitam', 'MONOSHOCK/ SHOCK XRIDE', 5),
(52, 67, 13, '2024-12-28 03:56:31', 'SHOCK MATIC ASPIRA', 'aspira.png', 'aspira.png', 'aspira.png', 143000, 'Shock Breaker Aspira Motor Beat FI, Scoopy FI H2-52400-K25-1700', 'SHOCK MATIC ASPIRA', 4),
(53, 67, 13, '2024-12-28 03:56:37', 'SHOCKBREAKER INDOPART', 'blkanag.png', 'blkanag.png', 'blkanag.png', 132000, 'shock breaker belakang indopart buat motor Yamaha Mio Mio soul vino', 'shock breaker belakang indopart buat motor Yamaha Mio Mio soul vinoshock breaker belakang indopart buat motor Yamaha Mio Mio soul vino', 6),
(54, 67, 13, '2024-12-28 12:04:14', 'SHOCKBREAKER KYB', 'blkangs.png', 'blkangs.png', 'blkangs.png', 261000, 'Shock Breaker Belakang KYB OS Motor All Matic KYOS-OZ71100 - Hitam', 'Shock Breaker Belakang KYB OS Motor All MaticShock Breaker Belakang KYB OS Motor All Matic', 3),
(55, 67, 13, '2024-12-28 03:56:47', 'SHOCKBREAKER YSS', 'yss.png', 'yss.png', 'yss.png', 376800, 'Shock Breaker YSS New Pro ZR 300 mm untuk Motor Matic Yamaha Mio Aerox - Putih', 'SHOCKBREAKER YSS', 3),
(56, 71, 15, '2024-12-28 03:57:06', 'OLI MATIC MOTUL ', 'motul.png', 'motul.png', 'motul.png', 132000, 'Oli Mesin Motor Matic *MOTUL SCOOTER EXPERT LE 4T 10W40 (0.8L)* Original', 'Oli Mesin Motor Matic ', 4),
(57, 71, 15, '2024-12-28 03:57:13', 'Oli Motor AHM', 'ahm.png', 'ahm.png', 'ahm.png', 60000, 'Oli Motor Honda AHM Oil MPX2 – SLMB 0.8 L REP MaticOli Motor Honda AHM Oil MPX2 – SLMB 0.8 L REP Matic', 'Oli Motor Honda AHM', 6),
(58, 71, 15, '2024-12-28 03:57:19', 'OLI MOTOR AUDILUBE 1L', 'oli2.png', 'oli2.png', 'oli2.png', 41000, 'OLI MOTOR AUDILUBE 1LITER', 'OLI MOTOR AUDILUBE 1LITER', 3),
(59, 71, 15, '2024-12-28 03:57:25', 'OLI SHELL HELIX ULTRA', 'shell.png', 'shell.png', 'shell.png', 115000, 'hell Helix Ultra 5W30 Full Synthetic kemasan 1L', 'hell Helix Ultra 5W30 Full Synthetic kemasan 1L', 4),
(60, 71, 15, '2024-12-28 03:57:32', 'OLI MOTOR PETROASIA', 'petro.jpg', 'petro.jpg', 'petro.jpg', 32000, 'Petroasia Iconic Matic SAE 20W-40/API-SF 0,8L / Oli Motor Murah', 'OLI MOTOR PETROASIA 0,8L', 5),
(61, 69, 13, '2024-12-28 03:57:39', 'KOPLING RCB E2', 'koplingrcb.png', 'koplingrcb.png', 'koplingrcb.png', 215000, 'SPAREPART MOTOR MASTER KOPLING RCB E2 LH UNIVERSAL', 'KOPLING RCB E2 LH UNIVERSAL', 4),
(62, 69, 13, '2024-12-28 03:57:47', 'DISC BRAKE SCARLET', 'scarlet.png', 'scarlet.png', 'scarlet.png', 119100, 'SCARLET RACING Piringan Disc Brake Depan 0028 uk 300 mm Bebek - Thunder 125', 'DISC BRAKE  DEPAN SCARLET', 6),
(63, 68, 13, '2024-12-28 03:57:52', 'BAN MATIC KENDA', 'kenda.png', 'kenda.png', 'kenda.png', 224000, '(TUBELESS) Kenda K677 90 80 14 Ban Luar Motor Matic', 'BAN MATIC KENDA', 7),
(64, 72, 13, '2024-12-28 03:58:00', 'SEAL SIL SHOCK HONDA', 'orisieal.png', 'orisieal.png', 'orisieal.png', 36700, 'ORI SEAL SIL SHOCK SOK DEPAN HONDA VARIO 1 SET ATAU 2 PCS 26x37x10,5 51490GN5305 51490-GN5-305 PROMO COD MURAH BJM SPAREPART MOTOR			', 'ORI SEAL SIL SHOCK SOK DEPAN HONDA VARIO ', 6),
(65, 68, 13, '2024-12-28 03:58:07', 'BAN MOTOR XEON', 'XEON.png', 'XEON.png', 'XEON.png', 610000, 'BAN MOTOR XEON FINO SOUL GT X RIDE SPIN NEX ADDRES MAXXIS ORI SEPASANG', 'BAN MOTOR XEON FINO SOUL', 4),
(66, 68, 13, '2024-12-28 03:58:12', 'BAN IRC GP21', 'irc.png', 'irc.png', 'irc.png', 305000, 'IRC GP21 GP22 Ban Motor Ori KLX CRF WR Trail Ring 19/16 Ring 21/18 - GP22 90/100-16', 'IRC GP21 GP22 Ban Motor Or', 3),
(67, 68, 13, '2024-12-28 03:58:19', 'BAN KENDA K488', 'skwave.png', 'skwave.png', 'skwave.png', 225000, 'KENDA K488 80 90 16 Ban luar Tubeless Motor Nouvo Skywave hayate ORI', 'KENDA K488 80 90 16 Ban luar', 6),
(68, 68, 13, '2024-12-28 03:58:31', 'BAN IRC AEROX 155', 'aerox.png', 'aerox.png', 'aerox.png', 317500, 'Paket Ban Motor AEROX 155 ( 110 80 14 , IRC 140 70 14 ) IRC Tubeless ORI Untuk Ban Depan Dan Belakang Free Pentil - 110/80 14', 'Paket Ban Motor AEROX 155 ( 110 80 14 , IRC 140 70 14 ) IRC Tubeless ORI Untuk Ban Depan Dan Belakang Free Pentil - 110/80 14', 4),
(69, 68, 13, '2024-12-28 03:58:41', 'BAN PIRELLI 120', 'pireli.png', 'pireli.png', 'pireli.png', 762000, 'Pirelli 120 70 15 Diablo Rosso Scooter SC Ban motor x-max xmax TL ORI', 'Pirelli 120 70 15', 4),
(70, 70, 15, '2024-12-28 03:58:54', 'DRACO KARPET MOTOR', 'draco.png', 'draco.png', 'draco.png', 80000, 'DRACCO Karpet motor VARIO 160 premium tebal 18 mm awet aksesoris motor - Hitam', 'DRACCO Karpet motor VARIO 160 premium tebal 18 mm awet aksesoris motor - Hitam', 3),
(71, 70, 15, '2024-12-28 03:58:48', 'GARNISH WS NMAX', 'garnish.png', 'garnish.png', 'garnish.png', 25000, 'GARNISH WINDSHIELD VISOR NMAX OLD NMAX NEW GARNIS AKSESORIS MOTOR NMAX - NMAX NEW 1', 'GARNISH WINDSHIELD', 2),
(72, 70, 15, '2024-12-28 03:59:01', 'COVER MOTOR APRILIA', 'cover.png', 'cover.png', 'cover.png', 195000, 'Sarung Motor Cover Motor Aprilia SR GT - Hitam, STANDAR', 'Sarung Motor Cover Motor Aprilia SR GT - Hitam, STANDAR', 7),
(73, 70, 13, '2024-12-28 03:59:08', 'SPION STANDAR BEAT', 'spion.png', 'spion.png', 'spion.png', 17000, 'Spion Standar Motor Beat - Mini, honda', 'Spion Standar Motor Beat - Mini, honda', 8),
(74, 70, 13, '2024-12-28 03:59:14', 'STANDARD SAMPING UNV', 'standard.png', 'standard.png', 'standard.png', 35500, 'TERMURAH STANDARD SAMPING VARIASI AKSESORIS MOTOR JAGANG SAMPING RING 14 PLUS PER STANDAR SAMPING RING 14 CROME HONDA YAMAHA BEAT MIO SCOOPY VARIO DLL - R14 IMPORT CROM', 'TERMURAH STANDARD SAMPING VARIASI AKSESORIS MOTOR JAGANG SAMPING RING 14 PLUS PER STANDAR SAMPING RING 14 CROME HONDA YAMAHA BEAT MIO SCOOPY VARIO DLL - R14 IMPORT CROM', 3),
(75, 70, 13, '2024-12-28 12:00:55', 'WINDSHIELD TDR NMAX', 'TDR.png', 'TDR.png', 'TDR.png', 90000, 'Windshield all new Nmax | TDR V2 V5 V6 V7 STANDAR THAILAND | NMAX NEW - THAILAND CLEAR', 'Windshield all new Nmax TDR ', 4),
(76, 66, 13, '2024-12-28 03:59:31', 'AKI GTZ 5S', 'gtz.png', 'gtz.png', 'gtz.png', 95000, 'Aki motor Beat, Vario, Mio Autocraft Gel GTZ-5S', 'Aki motor Beat, Vario, Mio Autocraft Gel GTZ-5S', 3),
(77, 66, 13, '2024-12-28 03:59:36', 'AKI YTX9 BS', 'YTX9.png', 'YTX9.png', 'YTX9.png', 380000, 'Aki Motor Kawasaki Ninja 250 CC YTX9-BS Aki Kering MF', 'Aki Motor Kawasaki Ninja 250 CC YTX9-BS Aki Kering MF', 2),
(78, 66, 13, '2024-12-28 03:59:42', 'AKI BOSCH RBT-6A', 'bosch.png', 'bosch.png', 'bosch.png', 180000, 'Aki Motor Mio Sporty, Mio Smile, Mio Karbu, Supra Lama Bosch RBT-6A', 'Aki Motor Mio Sporty, Mio Smile, Mio Karbu, Supra Lama Bosch RBT-6A', 4),
(79, 66, 15, '2024-12-28 11:55:12', 'AKI YAMAHA YTX9A', 'R1.png', 'R1.png', 'R1.png', 700000, 'aki motor Yamaha R1 YTX9A Lithium Nano Battery', 'aki motor Yamaha R1 YTX9A Lithium Nano Battery', 4),
(80, 66, 13, '2024-12-28 03:59:55', 'AKI MOTOR STZ4L-BS', 'STZ.png', 'STZ.png', 'STZ.png', 112000, 'SMT Aki Kering Motor STZ4L-BS 12 Volt 4 Ah Sepeda Motor SMT Power STZ5S', 'SMT Aki Kering Motor STZ4L-BS 12 Volt 4 Ah Sepeda Motor SMT Power STZ5S', 3),
(83, 71, 15, '2024-12-28 04:00:01', 'mpx', 'mpx.jpg', 'mpx.jpg', 'mpx.jpg', 80000, 'oli bebek mpx', 'mpx', 5),
(84, 71, 15, '2024-12-28 04:00:07', 'HP', 'hp.jpg', 'hp.jpg', 'hp.jpg', 80000, 'Top 1 HP 20W-50 adalah oli mesin mobil yang memberikan perlindungan lebih untuk mesin yang konvensional. Dengan kekentalan lebih, oli ini merupakan salah satu oli terbaik untuk mobil kecil, sedang, mobil tua, dan mesin berperforma rendah.\r\n', 'hp', 6),
(85, 66, 15, '2024-12-28 04:00:12', 'aki  gs astra', 'gs.jpg', 'gs.jpg', 'gs.jpg', 1000000, 'AKI GS ASTRA PREMIUM N50Z (12V 60Ah) Aplikasi mobil untuk: NISSAN Terrano, PEUGEOT 504 / 505, KIJANG GRAND (1997-2003), HYUNDAY ELANTRA/NEGGELA, FORD ESCAPE SUDAH TERMASUK ACCU ZUUR', 'gs ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_img`) VALUES
(66, 'AKI', 'aki motor', 0),
(67, 'Shockbreaker', 'Peredam Kejut Motor', 0),
(68, 'Ban', 'Ban Motor', 0),
(69, 'Ekslusif Merchandise', 'Produk Motor Unik', 0),
(70, 'Aksesoris', 'Aksesoris Motor', 0),
(71, 'Oli', 'Pelumas Mesin', 0),
(72, 'Part Motor', 'Part Motor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `slider_name`, `slider_image`, `slider_url`) VALUES
(23, '', 'banner2.png', ''),
(24, '', 'banner3.png', ''),
(25, '', 'banner6.png', ''),
(26, '', 'banner7.png', ''),
(27, '', 'banner8.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
