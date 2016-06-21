-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2016 at 04:06 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cemex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `Admin_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `User_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Admin_Id`),
  UNIQUE KEY `admins_admin_name_unique` (`Admin_Name`),
  UNIQUE KEY `admins_user_name_unique` (`User_Name`),
  UNIQUE KEY `admins_mail_unique` (`Mail`),
  UNIQUE KEY `admins_password_unique` (`Password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `Awards_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Total_Amount` int(10) unsigned NOT NULL,
  `Cost` decimal(8,2) unsigned NOT NULL,
  `Status` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Awards_Id`),
  UNIQUE KEY `awards_name_unique` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `award_competition`
--

CREATE TABLE IF NOT EXISTS `award_competition` (
  `Total_Amount` int(10) unsigned NOT NULL,
  `competition_id` int(10) unsigned NOT NULL,
  `award_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`award_id`,`competition_id`,`Total_Amount`),
  KEY `award_competition_competition_id_foreign` (`competition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `award_present`
--

CREATE TABLE IF NOT EXISTS `award_present` (
  `prese_id` int(10) unsigned NOT NULL,
  `award_id` int(10) unsigned NOT NULL,
  `Amount` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`award_id`,`prese_id`,`Amount`),
  KEY `award_present_prese_id_foreign` (`prese_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE IF NOT EXISTS `competitions` (
  `Competitions_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Government` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Period` int(10) unsigned NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  PRIMARY KEY (`Competitions_Id`),
  UNIQUE KEY `competitions_competitions_id_unique` (`Competitions_Id`),
  UNIQUE KEY `competitions_code_unique` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE IF NOT EXISTS `contractors` (
  `Contractor_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Goverment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Has_Facebook` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Facebook_Account` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Computer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tele1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Tele2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Job` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pormoter_Id` int(10) unsigned NOT NULL,
  `Religion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Home_Phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Fame` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Contractor_Id`),
  UNIQUE KEY `contractors_tele1_unique` (`Tele1`),
  UNIQUE KEY `contractors_code_unique` (`Code`),
  UNIQUE KEY `contractors_tele2_unique` (`Tele2`),
  UNIQUE KEY `contractors_home_phone_unique` (`Home_Phone`),
  KEY `contractors_pormoter_id_foreign` (`Pormoter_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`Contractor_Id`, `Name`, `Goverment`, `City`, `Address`, `Education`, `Has_Facebook`, `Facebook_Account`, `Computer`, `Email`, `Birthday`, `Tele1`, `Tele2`, `Job`, `Class`, `Phone_Type`, `Nickname`, `Pormoter_Id`, `Religion`, `Home_Phone`, `Code`, `Fame`, `created_at`, `updated_at`) VALUES
(1, 'عبد الرازق عيسى', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980343', NULL, 'contractor', '1', 'yes', 'contractor', 1, 'Muslim', NULL, 'Cont57274700bd983', NULL, '2016-05-02 10:24:32', '2016-05-02 10:24:32'),
(2, 'يسرى محمد الصغير ', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1157467462', NULL, 'contractor', '2', 'yes', 'contractor', 1, 'Muslim', NULL, 'Cont57274700ce27d', NULL, '2016-05-02 10:24:32', '2016-05-02 10:24:32'),
(3, 'انور عباس', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980345', NULL, 'contractor', '4', 'yes', 'contractor', 2, 'Muslim', NULL, 'Cont57274700de802', NULL, '2016-05-02 10:24:32', '2016-05-02 10:24:32'),
(4, 'انور فؤاد عبدالواحد عبدالله(جديد)', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980347', NULL, 'contractor', '5', 'yes', 'contractor', 2, 'Muslim', NULL, 'Cont5727470100156', NULL, '2016-05-02 10:24:32', '2016-05-02 10:24:32'),
(5, 'حجاج رجب', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980341', NULL, 'contractor', '6', 'yes', 'contractor', 3, 'Muslim', NULL, 'Cont5727470110627', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(6, 'حماده حسين عبد اللطيف', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980342', NULL, 'contractor', '7', 'yes', 'contractor', 3, 'Muslim', NULL, 'Cont5727470120add', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(7, 'رمضان علي احمد', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1022980344', NULL, 'contractor', '8', 'yes', 'contractor', 5, 'Muslim', NULL, 'Cont5727470133c76', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(8, 'شلبى عزيز', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1157467469', NULL, 'contractor', '9', 'yes', 'contractor', 5, 'Muslim', NULL, 'Cont5727470143ec1', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(9, 'شوقى شنودة ', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1157467461', NULL, 'contractor', '10', 'yes', 'contractor', 6, 'Muslim', NULL, 'Cont5727470157004', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(10, 'طلعت ضاحي ', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1157467463', NULL, 'contractor', '11', 'yes', 'contractor', 6, 'Muslim', NULL, 'Cont572747016f634', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33'),
(11, 'طلعت عدلي خليل', 'Assiut', 'Assiut', 'contractor', 'Low', NULL, NULL, 'yes', NULL, NULL, '1157467466', NULL, 'contractor', '12', 'yes', 'contractor', 6, 'Muslim', NULL, 'Cont57274701cb962', NULL, '2016-05-02 10:24:33', '2016-05-02 10:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_18_081999_create_promoters_table', 1),
('2016_01_18_082000_create_contractors_table', 1),
('2016_01_18_134110_create_reviews_table', 1),
('2016_01_18_134506_create_visits_table', 1),
('2016_01_18_195439_create_awards_table', 1),
('2016_01_18_195440_create_competitions_table', 1),
('2016_01_18_195441_create_presents_table', 1),
('2016_01_18_200047_create_competitions_awards_table', 1),
('2016_01_18_200137_create_presents_awards_table', 1),
('2016_01_18_200355_create_presents_contractors_table', 1),
('2016_01_20_102058_create_test_table', 1),
('2016_01_27_120612_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presents`
--

CREATE TABLE IF NOT EXISTS `presents` (
  `Presents_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contractor_id` int(10) unsigned NOT NULL,
  `Ranking` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Delivery_Date` date NOT NULL,
  `competition_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Presents_Id`),
  KEY `presents_competition_id_foreign` (`competition_id`),
  KEY `presents_contractor_id_foreign` (`contractor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `presents_contractors`
--

CREATE TABLE IF NOT EXISTS `presents_contractors` (
  `Present_Id` int(10) unsigned NOT NULL,
  `Contractor_Id` int(10) unsigned NOT NULL,
  `Ranking` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Present_Id`,`Contractor_Id`,`Ranking`),
  KEY `presents_contractors_contractor_id_foreign` (`Contractor_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promoters`
--

CREATE TABLE IF NOT EXISTS `promoters` (
  `Pormoter_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pormoter_Name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `TelephonNo` int(11) NOT NULL,
  `Government` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Facebook_Account` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Instegram_Account` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Experince` int(11) DEFAULT NULL,
  `Start_Date` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pormoter_Id`),
  UNIQUE KEY `promoters_user_name_unique` (`User_Name`),
  UNIQUE KEY `promoters_password_unique` (`Password`),
  UNIQUE KEY `promoters_code_unique` (`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `promoters`
--

INSERT INTO `promoters` (`Pormoter_Id`, `Pormoter_Name`, `TelephonNo`, `Government`, `City`, `Email`, `Facebook_Account`, `Instegram_Account`, `User_Name`, `Password`, `Code`, `Experince`, `Start_Date`, `Salary`, `created_at`, `updated_at`) VALUES
(1, 'اسلام علاء الدين', 1022980343, 'اسيوط', 'اسيوط', NULL, 'اسلام علاء الدين', 'اسلام علاء الدين', 'اسلام علاء الدين', '123', 'Pro572745a0e0be9', 1, '2013-03-01', 200, '2016-05-02 10:18:40', '2016-05-02 10:18:40'),
(2, 'محمد ابوالعلا', 1157467462, 'المنيا', 'اسيوط', NULL, 'محمد ابوالعلا', 'محمد ابوالعلا', 'محمد ابوالعلا', '456', 'Pro572745a0ef772', 2, '2013-03-01', 100, '2016-05-02 12:22:59', '2016-05-02 10:18:40'),
(3, 'محمود عبد الرؤف', 1022980348, 'سوهاج', 'اسيوط', NULL, 'محمود عبد الرؤف', 'محمود عبد الرؤف', 'محمود عبد الرؤف', '789', 'Pro572745a103724', 1, '2015-03-01', 50, '2016-05-02 12:23:05', '2016-05-02 10:18:41'),
(4, 'محمد هشام محمد ', 1157467469, 'المنيا', 'اسيوط', NULL, 'محمد هشام محمد ', 'محمد هشام محمد ', 'محمد هشام محمد ', '1011', 'Pro572745a10b85c', 3, '2015-03-01', 74, '2016-05-02 12:23:10', '2016-05-02 10:18:41'),
(5, 'احمد امجد', 1022980341, 'سوهاج', 'اسيوط', NULL, 'احمد امجد', 'احمد امجد', 'احمد امجد', '1213', 'Pro572745a113a75', 5, '2015-03-01', 90, '2016-05-02 12:23:16', '2016-05-02 10:18:41'),
(6, 'محمود كرم التوني', 1022980342, 'اسيوط', 'اسيوط', NULL, 'محمود كرم التوني', 'محمود كرم التوني', 'محمود كرم التوني', '1415', 'Pro572745a11bd7b', 4, '2014-03-01', 150, '2016-05-02 10:18:41', '2016-05-02 10:18:41'),
(7, 'عبدالله اليمنى', 1022980345, 'اسيوط', 'اسيوط', NULL, 'عبدالله اليمنى', 'عبدالله اليمنى', 'عبدالله اليمنى', '1819', 'Pro572745a123fe9', 9, '2015-03-01', 200, '2016-05-02 10:18:41', '2016-05-02 10:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `Review_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Long` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lat` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Project_NO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Portland_Cement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Resisted_Cement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Eng_Cement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Saed_Cement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fanar_Cement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Workers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cement_Consuption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cement_Bricks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Steel_Consumption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Has_Wood` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Wood_Meters` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Wood_Consumption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Has_Mixers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `No_Of_Mixers` int(11) DEFAULT NULL,
  `Capital` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Credit_Debit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Has_Sub_Contractor` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sub_Contractor1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sub_Contractor2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seller1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seller2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seller3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seller4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Call_Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Area` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cont_Type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Contractor_Id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Review_Id`),
  KEY `reviews_contractor_id_foreign` (`Contractor_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Review_Id`, `Long`, `Lat`, `Project_NO`, `Portland_Cement`, `Resisted_Cement`, `Eng_Cement`, `Saed_Cement`, `Fanar_Cement`, `Workers`, `Cement_Consuption`, `Cement_Bricks`, `Steel_Consumption`, `Has_Wood`, `Wood_Meters`, `Wood_Consumption`, `Has_Mixers`, `No_Of_Mixers`, `Capital`, `Credit_Debit`, `Has_Sub_Contractor`, `Sub_Contractor1`, `Sub_Contractor2`, `Seller1`, `Seller2`, `Seller3`, `Seller4`, `Status`, `Call_Status`, `Area`, `Cont_Type`, `created_at`, `updated_at`, `Contractor_Id`) VALUES
(1, '', '', '1', '2', '2', '2', '2', '2', '1', '1', '1', '', 'yes', '1', '', 'نعم', 1, '1', 'كاش', 'نعم', 'احمد محمد احمد', 'احمد محمد', 'عبد الرازق عيسى', 'عبد الرازق عيسى', 'عبد الرازق عيسى', 'عبد الرازق عيسى', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:35:19', '2016-05-02 10:35:19', 1),
(2, '30.111', '29.111', '2', '3', '3', '3', '3', '3', '2', '2', '2', '2', 'yes', '2', NULL, 'yes', 2, '2', '2', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'يسرى محمد الصغير ', 'يسرى محمد الصغير ', 'يسرى محمد الصغير ', 'يسرى محمد الصغير ', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:37:03', '2016-05-02 10:24:32', 2),
(3, '32.111', '31.111', '4', '5', '5', '5', '5', '5', '4', '4', '4', '4', 'yes', '4', NULL, 'yes', 4, '4', '4', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'انور عباس', 'انور عباس', 'انور عباس', 'انور عباس', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:59', '2016-05-02 10:24:32', 3),
(4, '33.111', '32.111', '5', '6', '6', '6', '6', '6', '5', '5', '5', '5', 'yes', '5', NULL, 'yes', 5, '5', '5', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'انور فؤاد عبدالواحد عبدالله(جديد)', 'انور فؤاد عبدالواحد عبدالله(جديد)', 'انور فؤاد عبدالواحد عبدالله(جديد)', 'انور فؤاد عبدالواحد عبدالله(جديد)', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:37:00', '2016-05-02 10:24:33', 4),
(5, '34.111', '33.111', '6', '7', '7', '7', '7', '7', '6', '6', '6', '6', 'yes', '6', NULL, 'yes', 6, '6', '6', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'حجاج رجب', 'حجاج رجب', 'حجاج رجب', 'حجاج رجب', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:37:02', '2016-05-02 10:24:33', 5),
(6, '35.111', '34.111', '7', '8', '8', '8', '8', '8', '7', '7', '7', '7', 'yes', '7', NULL, 'yes', 7, '7', '7', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'حماده حسين عبد اللطيف', 'حماده حسين عبد اللطيف', 'حماده حسين عبد اللطيف', 'حماده حسين عبد اللطيف', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:56', '2016-05-02 10:24:33', 6),
(7, '36.111', '35.111', '8', '9', '9', '9', '9', '9', '8', '8', '8', '8', 'yes', '8', NULL, 'yes', 8, '8', '8', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'رمضان علي احمد', 'رمضان علي احمد', 'رمضان علي احمد', 'رمضان علي احمد', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:51', '2016-05-02 10:24:33', 7),
(8, '37.111', '36.111', '9', '10', '10', '10', '10', '10', '9', '9', '9', '9', 'yes', '9', NULL, 'yes', 9, '9', '9', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'شلبى عزيز', 'شلبى عزيز', 'شلبى عزيز', 'شلبى عزيز', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:52', '2016-05-02 10:24:33', 8),
(9, '38.111', '37.111', '10', '11', '11', '11', '11', '11', '10', '10', '10', '10', 'yes', '10', NULL, 'yes', 10, '10', '10', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'شوقى شنودة ', 'شوقى شنودة ', 'شوقى شنودة ', 'شوقى شنودة ', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:54', '2016-05-02 10:24:33', 9),
(10, '39.111', '38.111', '11', '12', '12', '12', '12', '12', '11', '11', '11', '11', 'yes', '11', NULL, 'yes', 11, '11', '11', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'طلعت ضاحي ', 'طلعت ضاحي ', 'طلعت ضاحي ', 'طلعت ضاحي ', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:55', '2016-05-02 10:24:33', 10),
(11, '40.111', '39.111', '12', '13', '13', '13', '13', '13', '12', '12', '12', '12', 'yes', '12', NULL, 'yes', 12, '12', '12', 'yes', 'احمد محمد احمد', 'احمد محمد احمد', 'طلعت عدلي خليل', 'طلعت عدلي خليل', 'طلعت عدلي خليل', 'طلعت عدلي خليل', 'Reviewed', 'Reviewed', 'UP', 'contractor', '2016-05-02 12:36:49', '2016-05-02 10:24:33', 11);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `Visits_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Government` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Month` int(11) NOT NULL,
  `Adress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GPS` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Backcheck` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Comments` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Project_Type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Project_Current_State` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cement_Type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cement_Quantity` int(11) DEFAULT NULL,
  `Visit_Reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Call_Reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date_Visit_Call` date NOT NULL,
  `Points` int(11) DEFAULT NULL,
  `OrderNo` int(11) DEFAULT NULL,
  `CV_Comments` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seller_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Project_Type_Comments` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pormoter_Id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Contractor_Id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Visits_id`),
  KEY `visits_pormoter_id_foreign` (`Pormoter_Id`),
  KEY `visits_contractor_id_foreign` (`Contractor_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `award_competition`
--
ALTER TABLE `award_competition`
  ADD CONSTRAINT `award_competition_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`Awards_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `award_competition_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`Competitions_Id`) ON DELETE CASCADE;

--
-- Constraints for table `award_present`
--
ALTER TABLE `award_present`
  ADD CONSTRAINT `award_present_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`Awards_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `award_present_prese_id_foreign` FOREIGN KEY (`prese_id`) REFERENCES `presents` (`Presents_Id`) ON DELETE CASCADE;

--
-- Constraints for table `contractors`
--
ALTER TABLE `contractors`
  ADD CONSTRAINT `contractors_pormoter_id_foreign` FOREIGN KEY (`Pormoter_Id`) REFERENCES `promoters` (`Pormoter_Id`) ON DELETE CASCADE;

--
-- Constraints for table `presents`
--
ALTER TABLE `presents`
  ADD CONSTRAINT `presents_contractor_id_foreign` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`Contractor_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presents_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`Competitions_Id`) ON DELETE CASCADE;

--
-- Constraints for table `presents_contractors`
--
ALTER TABLE `presents_contractors`
  ADD CONSTRAINT `presents_contractors_contractor_id_foreign` FOREIGN KEY (`Contractor_Id`) REFERENCES `contractors` (`Contractor_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presents_contractors_present_id_foreign` FOREIGN KEY (`Present_Id`) REFERENCES `presents` (`Presents_Id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_contractor_id_foreign` FOREIGN KEY (`Contractor_Id`) REFERENCES `contractors` (`Contractor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_contractor_id_foreign` FOREIGN KEY (`Contractor_Id`) REFERENCES `contractors` (`Contractor_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_pormoter_id_foreign` FOREIGN KEY (`Pormoter_Id`) REFERENCES `promoters` (`Pormoter_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
