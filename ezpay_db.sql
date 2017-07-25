-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2017 at 10:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezpay_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonusesandots`
--

CREATE TABLE `bonusesandots` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premium` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonusesandots`
--

INSERT INTO `bonusesandots` (`id`, `type`, `premium`, `created_at`, `updated_at`) VALUES
(1, 'rd', '1.30', NULL, NULL),
(2, 'spec_holiday', '1.30', NULL, NULL),
(3, 'spec_holiday+rd', '1.50', NULL, NULL),
(4, 'reg_holiday', '2.00', NULL, NULL),
(5, 'reg_holiday+rd', '2.60', NULL, NULL),
(6, 'ot_ord', '1.25', NULL, NULL),
(7, 'ot_rd', '1.69', NULL, NULL),
(8, 'ot_spec_holiday', '1.69', NULL, NULL),
(9, 'ot_spec_holiday+rd', '1.95', NULL, NULL),
(10, 'ot_reg_holiday', '2.60', NULL, NULL),
(11, 'ot_reg_holiday+rd', '3.38', NULL, NULL),
(12, 'night_diff', '0.10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2017_07_21_055319_create_messages_table', 1),
(8, '2017_07_21_055327_create_payments_table', 1),
(9, '2017_07_23_120023_add_users_table_salary', 2),
(12, '2017_07_24_044753_create_sss_table', 3),
(13, '2017_07_24_044837_create_philhealth_table', 3),
(14, '2017_07_24_054408_add_sss_column', 4),
(15, '2017_07_24_054419_add_philhealth_column', 4),
(16, '2017_07_25_011643_update_ss_min', 5),
(17, '2017_07_25_011728_update_phil_min', 5),
(18, '2017_07_25_045125_create_bonus_tables', 6),
(19, '2017_07_25_050630_add_new_col_users', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `philhealth_contribs`
--

CREATE TABLE `philhealth_contribs` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_limit` decimal(8,2) NOT NULL,
  `monthly_contribution` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `max_limit` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `philhealth_contribs`
--

INSERT INTO `philhealth_contribs` (`id`, `min_limit`, `monthly_contribution`, `created_at`, `updated_at`, `max_limit`) VALUES
(1, '0.00', '100.00', NULL, NULL, '8999.99'),
(2, '9000.00', '112.50', NULL, NULL, '9999.99'),
(3, '10000.00', '125.00', NULL, NULL, '10999.99'),
(4, '11000.00', '137.50', NULL, NULL, '11999.99'),
(5, '12000.00', '150.00', NULL, NULL, '12999.99'),
(6, '13000.00', '162.50', NULL, NULL, '13999.99'),
(7, '14000.00', '175.00', NULL, NULL, '14999.99'),
(8, '15000.00', '187.50', NULL, NULL, '15999.99'),
(9, '16000.00', '200.00', NULL, NULL, '16999.99'),
(10, '17000.00', '212.50', NULL, NULL, '17999.99'),
(11, '18000.00', '225.00', NULL, NULL, '18999.99'),
(12, '19000.00', '237.50', NULL, NULL, '19999.99'),
(13, '20000.00', '250.00', NULL, NULL, '20999.99'),
(14, '21000.00', '262.50', NULL, NULL, '21999.99'),
(15, '22000.00', '275.00', NULL, NULL, '22999.99'),
(16, '23000.00', '287.50', NULL, NULL, '23999.99'),
(17, '24000.00', '300.00', NULL, NULL, '24999.99'),
(18, '25000.00', '312.50', NULL, NULL, '25999.99'),
(19, '26000.00', '325.00', NULL, NULL, '26999.99'),
(20, '27000.00', '337.50', NULL, NULL, '27999.99'),
(21, '28000.00', '350.00', NULL, NULL, '28999.99'),
(22, '29000.00', '362.50', NULL, NULL, '29999.99'),
(23, '30000.00', '375.00', NULL, NULL, '30999.99'),
(24, '31000.00', '387.50', NULL, NULL, '31999.99'),
(25, '32000.00', '400.00', NULL, NULL, '32999.99'),
(26, '33000.00', '412.50', NULL, NULL, '33999.99'),
(27, '34000.00', '425.00', NULL, NULL, '34999.99'),
(28, '35000.00', '437.50', NULL, NULL, '999999.00');

-- --------------------------------------------------------

--
-- Table structure for table `sss_contribs`
--

CREATE TABLE `sss_contribs` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_limit` decimal(8,2) NOT NULL,
  `monthly_contribution` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `max_limit` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sss_contribs`
--

INSERT INTO `sss_contribs` (`id`, `min_limit`, `monthly_contribution`, `created_at`, `updated_at`, `max_limit`) VALUES
(1, '1000.00', '36.30', NULL, NULL, '1249.99'),
(2, '1250.00', '54.50', NULL, NULL, '1749.99'),
(3, '1750.00', '72.70', NULL, NULL, '2249.99'),
(4, '2250.00', '90.80', NULL, NULL, '2749.99'),
(5, '2750.00', '109.00', NULL, NULL, '3249.99'),
(6, '3250.00', '127.20', NULL, NULL, '3749.99'),
(7, '3750.00', '145.30', NULL, NULL, '4249.99'),
(8, '4250.00', '163.50', NULL, NULL, '4749.99'),
(9, '4750.00', '181.70', NULL, NULL, '5249.99'),
(10, '5250.00', '199.80', NULL, NULL, '5749.99'),
(11, '5750.00', '218.00', NULL, NULL, '6249.99'),
(12, '6250.00', '236.20', NULL, NULL, '6749.99'),
(13, '6750.00', '254.30', NULL, NULL, '7249.99'),
(14, '7250.00', '272.50', NULL, NULL, '7749.99'),
(15, '7750.00', '290.70', NULL, NULL, '8249.99'),
(16, '8250.00', '308.80', NULL, NULL, '8749.99'),
(17, '8750.00', '327.00', NULL, NULL, '9249.99'),
(18, '9250.00', '345.20', NULL, NULL, '9749.99'),
(19, '9750.00', '363.30', NULL, NULL, '10249.99'),
(20, '10250.00', '381.50', NULL, NULL, '10749.99'),
(21, '10750.00', '399.70', NULL, NULL, '11249.99'),
(22, '11250.00', '417.80', NULL, NULL, '11749.99'),
(23, '11750.00', '436.00', NULL, NULL, '12249.99'),
(24, '12250.00', '454.20', NULL, NULL, '12749.99'),
(25, '12750.00', '472.30', NULL, NULL, '13249.99'),
(26, '13250.00', '490.50', NULL, NULL, '13749.99'),
(27, '13750.00', '508.70', NULL, NULL, '14249.99'),
(28, '14250.00', '526.80', NULL, NULL, '14749.99'),
(29, '14750.00', '545.00', NULL, NULL, '15249.99'),
(30, '15250.00', '563.20', NULL, NULL, '15749.99'),
(31, '15750.00', '581.30', NULL, NULL, '999999.99');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` int(11) NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_started` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_info` int(11) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `dependents` int(11) NOT NULL,
  `hrs_per_day` int(11) NOT NULL,
  `days_per_week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `employee_number`, `department`, `position`, `date_started`, `address`, `birthday`, `marital_status`, `status`, `bank_info`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `salary`, `dependents`, `hrs_per_day`, `days_per_week`) VALUES
(1, 'Nar Cuenca', 1111, 'Administrative Department', 'Admin', '2017-07-21', 'root', '2017-07-21', '0', '0', 12345667, 'admin', 'nar@admin.com', '$2y$10$G.Y1vOy8W3jpT7qPWUfy.O/a7ebw/5lhYPjW7dsbuvJBfKiax6DyO', 'ujtGGt8q1XzcIScHmjOsKaGwqqNxPRKOmNT5S0W5vL8NTFYumZefwxGFW453', '2017-07-21 00:20:13', '2017-07-23 19:10:26', 50000, 0, 0, 5),
(87, 'ruby', 2233, 'Administrative Department', 'Admin', '2017-01-03', 'root user', '1990-02-13', '0', '0', 9788923, 'regular', 'ruby@admin.com', '$2y$10$3XKXnyswPQk0JrSkhaOSDu4/45BrpNGj6Tl7p9ougBgwPmI5tmlie', '73hORCxY64hwBePlfCaGsIDg4B3YDyinY1iPQFsTHwFjEdKDbheYoJ7Fc11E', '2017-07-22 04:11:39', '2017-07-24 23:25:38', 50000, 0, 0, 5),
(88, 'Anastacio Mann', 8055, 'Schroeder-Johnston', 'Telephone Operator', '2008-10-27', '5386 Earnestine GreensSchoenborough, HI 33603-8068', '1976-02-27', '1', '3', 11020985, 'regular', 'jason.wilderman@flatley.net', '$2y$10$ObYlIwaAdfCdZr2mzs0.XemXdCHkWrweRgm5ehQwFZoGWiTPw6Yhe', NULL, NULL, '2017-07-24 21:39:29', 24500, 2, 10, 4),
(89, 'Joanny Lakin', 3683, 'Rippin, Waters and Bauch', 'Tractor-Trailer Truck Driver', '1997-03-04', '8890 Damien Views\nNorth Laishafort, KS 23722-8055', '1982-03-19', '1', '0', 15502140, 'regular', 'kling.selmer@kovacek.biz', '$2y$10$d8vBSvCWgDZV2UngI0iXzu4MG6ucxJ/BQu92NrQ72G63q//cEdoAm', NULL, NULL, NULL, 0, 0, 0, 0),
(90, 'Keaton Crona', 7518, 'Yost-Brown', 'Interaction Designer', '1979-06-28', '66704 Gutkowski Flats\nSouth Nehamouth, DE 15150-7744', '1984-01-08', '1', '3', 46532631, 'regular', 'nina21@harber.com', '$2y$10$zut7BUGto/xJ0xyJXcOsS.6HQIVMHombcbOvJ0UO.YKLqbLX8fKNm', NULL, NULL, NULL, 0, 0, 0, 0),
(91, 'Susan Gleason', 7321, 'Bauch-Kihn', 'Machine Feeder', '1984-06-02', '44669 Heller Fall\nRansomborough, AK 23783-5621', '1984-07-04', '1', '0', 94873159, 'regular', 'margret51@reichert.com', '$2y$10$ACZIKCzVjS4DUE0tOM/0TeMG6rbVjK/Io7T92radEIfJk7v/.bIc.', NULL, NULL, NULL, 0, 0, 0, 0),
(92, 'Vito Zulauf', 4168, 'Oberbrunner-Murray', 'Barber', '1997-12-27', '363 O\'Reilly Squares\nNorth Darlenefort, NE 44815', '1970-06-23', '0', '1', 1045523, 'regular', 'hazel.haley@gmail.com', '$2y$10$8e9SSPYSxcNjAO.95DasfeBso.ZpEUeVYGmwfVPhJ8b4UK0MFHLDS', NULL, NULL, NULL, 0, 0, 0, 0),
(93, 'Jaime Goodwin', 8926, 'Jakubowski Group', 'Stevedore', '1986-12-13', '443 Schiller Pike Suite 664\nNicoport, KY 34452-5364', '1974-09-24', '0', '2', 90927762, 'regular', 'larkin.alanis@bailey.com', '$2y$10$K9mGG9hWc2r1vknZ/0pLxeP//4ECVRLQaaAiQyThOoMG0/L5sK6dO', NULL, NULL, NULL, 0, 0, 0, 0),
(94, 'Angus Gerlach', 4859, 'Jast, Orn and Kirlin', 'Control Valve Installer', '2013-06-28', '212 Kody Gateway\nMylesland, CT 25739-2726', '1984-08-22', '1', '2', 62559559, 'regular', 'greenholt.wava@kautzer.com', '$2y$10$4yUjnHPqFW77eUP8IC580.OQ3qpPlg.7ofK4Cl8Vnd5D.pcA3YEke', NULL, NULL, NULL, 0, 0, 0, 0),
(95, 'Annette Lakin', 2610, 'Jacobs-Lueilwitz', 'Etcher', '1979-04-14', '1386 Gutkowski Harbor\nPfannerstillhaven, VA 19830-1457', '1977-04-21', '1', '1', 98351938, 'regular', 'pasquale.bartell@gorczany.com', '$2y$10$.s.6aEF87fJMGbs.QWi.Getvt.mTEKXoIjiqHBfENtGJ/S9PhgjT.', NULL, NULL, NULL, 0, 0, 0, 0),
(96, 'Prof. Audie Spinka', 2583, 'White-Kunde', 'Education Teacher', '1994-12-26', '87682 Herman Union\nNorth Leonora, FL 04841', '1981-03-17', '0', '1', 4157777, 'regular', 'jmarks@gmail.com', '$2y$10$B8IX59wQuK/BrekByOehsuAAUU7U0mfFxmpYpqB9TEyea4uNlR02C', NULL, NULL, NULL, 0, 0, 0, 0),
(97, 'Joaquin Lehner II', 6236, 'McLaughlin-Witting', 'Pharmaceutical Sales Representative', '2006-06-07', '3465 Becker Plains\nLake Jaden, ND 51969-8911', '1981-07-29', '0', '2', 65043536, 'regular', 'khowe@hotmail.com', '$2y$10$fFKyTXv1Od5pAbDO.n54cuIxVgLWF8dQuKAMFI1MHWR1FX.tia20K', NULL, NULL, NULL, 0, 0, 0, 0),
(98, 'Mrs. Letha Goldner', 2875, 'Bahringer-O\'Conner', 'Computer Hardware Engineer', '2017-06-01', '3574 Ozella Cove\nCallieland, OR 11533', '1981-07-19', '0', '1', 61705601, 'regular', 'slemke@jacobson.com', '$2y$10$IKkb.kiu3Po/3wC5CWArGOsO0EOF/OAmnqcsob6dmVUq/RS8IsvDm', NULL, NULL, NULL, 0, 0, 0, 0),
(99, 'Yesenia Goodwin', 5185, 'Pfannerstill, Sawayn and Hammes', 'CSI', '2002-07-04', '99667 Daniella Rue\nNew Rupertside, NY 25119', '1984-03-24', '1', '1', 68860439, 'regular', 'kuhlman.jairo@krajcik.com', '$2y$10$8nszGhZwWog0nqlmsf55n.y5fGFg7wWKOtQfHL1mIkZe53WXpxV4q', NULL, NULL, NULL, 0, 0, 0, 0),
(100, 'Precious Mayer Sr.', 6536, 'Green-Yundt', 'Environmental Science Teacher', '1981-02-05', '4024 Blanda Coves Suite 120\nWest Dewitthaven, MN 81864', '1979-05-21', '1', '0', 75732790, 'regular', 'madeline.parisian@gmail.com', '$2y$10$zvyw3U2hw4oavJcmyd60Q.tuwWXgDMB2urfxxKviaoDf6QA7eSCeK', NULL, NULL, NULL, 0, 0, 0, 0),
(101, 'Amos Hermiston', 8389, 'Pollich-Connelly', 'Oil Service Unit Operator', '1972-09-28', '211 Sporer Viaduct\nLake Alvinaton, ID 00411', '1982-11-23', '0', '1', 11654366, 'regular', 'nauer@mills.info', '$2y$10$brrQGDkpmnujZWpsB0YNLegs4XbVISL4aEKpwpXqxc2ykKnS4NaMm', NULL, NULL, NULL, 0, 0, 0, 0),
(102, 'Prof. Marion Lesch', 1583, 'Bergstrom, Lakin and Zemlak', 'Electrical Parts Reconditioner', '2003-05-09', '964 Elijah Haven Suite 509\nGulgowskiland, AZ 15918', '1985-04-15', '1', '3', 40443177, 'regular', 'larkin.evangeline@gmail.com', '$2y$10$H1s4PZwxCCAuWWjMH7i0NezAtSy9CJJ3azn9RUCdHXsvmYNrGtqu2', NULL, NULL, NULL, 0, 0, 0, 0),
(103, 'Jedidiah Wiza', 3449, 'Feil-Skiles', 'Geological Sample Test Technician', '1993-10-12', '85537 Vandervort Fall Suite 430\nFritschview, TX 56883-8725', '1970-05-29', '0', '0', 365192, 'regular', 'sdurgan@howe.org', '$2y$10$NsRAaNRzbB.vFgBEOT.BO.YEks4U5KlvSNtR4nIDiLu8RYcSRASRG', NULL, NULL, NULL, 0, 0, 0, 0),
(104, 'Narciso Will', 5718, 'Becker, Brakus and Anderson', 'Deburring Machine Operator', '1982-01-16', '421 Annamae Valley\nMabelbury, IA 07859-3085', '1975-08-31', '0', '0', 25911815, 'regular', 'zion.weber@yahoo.com', '$2y$10$AIwtdkQLGf8.FWWpX0rtXugQAJdM2Djc/6jdbjKLcZvTe54JJ1sIy', NULL, NULL, NULL, 0, 0, 0, 0),
(105, 'Dr. Norberto Hintz DDS', 4056, 'Moore Ltd', 'Internist', '2016-06-07', '2525 Schroeder Lakes\nNorth Hannah, VT 84931-6070', '1987-11-11', '0', '3', 81536391, 'regular', 'jazmin90@hotmail.com', '$2y$10$bVoXCwRdW9xA6dC88otZPe0uXuNAqhvf1kj8c0djUgVF.qygKZO1m', NULL, NULL, NULL, 0, 0, 0, 0),
(106, 'Carolyne Nienow IV', 7248, 'Emmerich, Wiegand and Heller', 'Network Systems Analyst', '2007-05-26', '42426 Batz Trace\nEast Andy, OR 65523', '1972-05-15', '1', '2', 89419911, 'regular', 'morissette.ashtyn@mann.com', '$2y$10$eCJjmqsQPpwHK48dcBPX3.mAd5yT6tR/lGL49i60Kx/z/hthXyBTi', NULL, NULL, NULL, 0, 0, 0, 0),
(107, 'Marjorie Dickinson II', 8380, 'Krajcik and Sons', 'Sales and Related Workers', '1982-10-08', '5024 VonRueden Via\nWaltonhaven, KS 17791', '1978-12-23', '0', '3', 76872411, 'regular', 'jaime38@adams.com', '$2y$10$kJ7Ltl0ZRDQ.yU4dQekcouZqOkC7RRpDX2uhlsN/PS.JOfuAuz6De', NULL, NULL, NULL, 0, 0, 0, 0),
(108, 'Alivia Emard V', 5004, 'Douglas and Sons', 'Automotive Mechanic', '2011-07-16', '51496 Rippin Cliff\nNorth Jana, ID 68844-5009', '1970-04-02', '0', '3', 12458848, 'regular', 'jessica96@hotmail.com', '$2y$10$Gp/3Y3imdzX8uj6VQlXDaOb.GM2no0zBcVYlvVNpqR5OPO2SIAKQq', NULL, NULL, NULL, 0, 0, 0, 0),
(109, 'Douglas Bins', 7003, 'Marquardt, Ondricka and Walter', 'Molding Machine Operator', '2016-04-05', '37819 Wolff Mill\nVidatown, HI 37270-1536', '1974-01-19', '0', '0', 45264584, 'regular', 'parisian.morgan@thiel.com', '$2y$10$6Fc7RV4FhnpbntNP44qWTuVi.MDog4hRtTWaFhR6EPZiBfritUthG', NULL, NULL, NULL, 0, 0, 0, 0),
(110, 'Dr. Rose Marks V', 8075, 'Powlowski, Pacocha and Reinger', 'Metal Fabricator', '1982-05-25', '587 Gulgowski Rapid\nSouth Rebecaborough, GA 25393', '1975-10-10', '0', '1', 88398055, 'regular', 'christiansen.rusty@gmail.com', '$2y$10$Gsdu1NlalnvGosCV.6XTYusSKwwhIPw/GwzZxYckMiGAf6Ta6cVUS', NULL, NULL, NULL, 0, 0, 0, 0),
(111, 'Hunter Larson', 7144, 'Boehm-Jacobi', 'Horticultural Worker', '2015-05-21', '851 Maiya Rest\nPort Brentfort, NV 46228', '1989-07-11', '1', '2', 96070570, 'regular', 'shane.zulauf@haley.net', '$2y$10$RtA4GFvH.2KR6Guigo.S.Ogh.GB1hpZCAVCj/72kdcHRRqd/EYhRa', NULL, NULL, NULL, 0, 0, 0, 0),
(112, 'Miss Joelle Johnston PhD', 3251, 'Kemmer-Tremblay', 'Refinery Operator', '1993-11-20', '974 Yundt Throughway\nNorth Jesus, RI 36608', '1976-04-29', '0', '1', 59848833, 'regular', 'leland72@yahoo.com', '$2y$10$u6pJauqn6B1x.dGfk1GRc.tFsJWSznT3jX1oauqhou7lVqme1WzCO', NULL, NULL, NULL, 0, 0, 0, 0),
(113, 'Eldon Boyer', 4874, 'Johnston-Lemke', 'Cutting Machine Operator', '2016-02-12', '7872 Russel Trafficway Suite 663\nEast Santiago, LA 24523', '1985-12-13', '1', '3', 51246163, 'regular', 'keara.cormier@yahoo.com', '$2y$10$u/aow6/3OLPXgjEwf0GNLuH8IWVOVGQof.uOh7qVcnLvIBAe9/c0u', NULL, NULL, NULL, 0, 0, 0, 0),
(114, 'Penelope Steuber', 2713, 'Herzog LLC', 'Physics Teacher', '2009-06-07', '604 Laila Loaf\nShieldsstad, FL 76964', '1982-10-22', '0', '3', 75294740, 'regular', 'perry33@mayer.com', '$2y$10$7c74nOn7Hg4NVdGzK8fGiuabn/rz.rXepUgsKLc9mQ93QxU4OxU.i', NULL, NULL, NULL, 0, 0, 0, 0),
(115, 'Cleora Leffler DDS', 7620, 'Satterfield and Sons', 'Electronic Engineering Technician', '1991-07-11', '7122 Esmeralda Crescent\nNew Cliffordchester, ND 98501', '1977-02-05', '0', '1', 96284359, 'regular', 'alejandrin.romaguera@hotmail.com', '$2y$10$ZhGnhV.0uSameove7OCw2.nyZZ8KEhDbERgVfF34cjqITFpyof2ei', NULL, NULL, NULL, 0, 0, 0, 0),
(116, 'Jacklyn Wiegand', 2118, 'Ebert LLC', 'Hand Trimmer', '1972-07-23', '321 Smith Bypass\nRyanton, DC 16995', '1973-08-19', '0', '2', 75492388, 'regular', 'raynor.asia@hotmail.com', '$2y$10$S3gqhLDSZOcWfp02Q3XxVuNTznx0zeoEXJZn.TJ/f74ebMmpFWTQW', NULL, NULL, NULL, 0, 0, 0, 0),
(117, 'Ernesto Altenwerth', 6088, 'Ernser, Barton and Leuschke', 'Typesetting Machine Operator', '1986-11-09', '307 Magali Point\nEast Rex, MI 44563', '1980-10-21', '0', '1', 73022422, 'regular', 'oohara@yahoo.com', '$2y$10$4gcgSL3cERj/78aUyHVj4OUH8ALEOpqWl47mGne4lkYf1BCg4jbdi', NULL, NULL, NULL, 0, 0, 0, 0),
(118, 'Sam Barbosa', 4563, 'Human Resources', 'HR Manager', '2017-07-25', 'Somewhere', '2002-06-06', '1', '0', 654984, 'regular', 'sam@barbosa.com', '$2y$10$wsjP6UpDYI.FfjxE4j5QKez0TwrYT0iqm0VI.PntEGJBvrnb3AVeu', NULL, '2017-07-24 21:13:15', '2017-07-24 21:13:15', 35000, 3, 8, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonusesandots`
--
ALTER TABLE `bonusesandots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `philhealth_contribs`
--
ALTER TABLE `philhealth_contribs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss_contribs`
--
ALTER TABLE `sss_contribs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_employee_number_unique` (`employee_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonusesandots`
--
ALTER TABLE `bonusesandots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `philhealth_contribs`
--
ALTER TABLE `philhealth_contribs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sss_contribs`
--
ALTER TABLE `sss_contribs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
