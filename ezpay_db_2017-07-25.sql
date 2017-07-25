# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: ezpay_db
# Generation Time: 2017-07-25 13:25:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `days_per_week` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_employee_number_unique` (`employee_number`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `employee_number`, `department`, `position`, `date_started`, `address`, `birthday`, `marital_status`, `status`, `bank_info`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `salary`, `dependents`, `hrs_per_day`, `days_per_week`)
VALUES
	(1,'Nar Cuenca',1111,'Administrative Department','Admin','2017-07-21','root','2017-07-21','0','0',12345667,'admin','nar@admin.com','$2y$10$G.Y1vOy8W3jpT7qPWUfy.O/a7ebw/5lhYPjW7dsbuvJBfKiax6DyO','ujtGGt8q1XzcIScHmjOsKaGwqqNxPRKOmNT5S0W5vL8NTFYumZefwxGFW453','2017-07-21 00:20:13','2017-07-23 19:10:26',50000,0,8,5),
	(87,'ruby',2233,'Administrative Department','Admin','2017-01-03','root user','1990-02-13','0','0',9788923,'regular','ruby@admin.com','$2y$10$3XKXnyswPQk0JrSkhaOSDu4/45BrpNGj6Tl7p9ougBgwPmI5tmlie','73hORCxY64hwBePlfCaGsIDg4B3YDyinY1iPQFsTHwFjEdKDbheYoJ7Fc11E','2017-07-22 04:11:39','2017-07-24 23:25:38',50000,0,0,5),
	(88,'Anastacio Mann',8055,'Schroeder-Johnston','Telephone Operator','2008-10-27','5386 Earnestine GreensSchoenborough, HI 33603-8068','1976-02-27','1','3',11020985,'regular','jason.wilderman@flatley.net','$2y$10$ObYlIwaAdfCdZr2mzs0.XemXdCHkWrweRgm5ehQwFZoGWiTPw6Yhe',NULL,NULL,'2017-07-24 21:39:29',24500,2,10,4),
	(89,'Joanny Lakin',3683,'Rippin, Waters and Bauch','Tractor-Trailer Truck Driver','1997-03-04','8890 Damien Views\nNorth Laishafort, KS 23722-8055','1982-03-19','1','0',15502140,'regular','kling.selmer@kovacek.biz','$2y$10$d8vBSvCWgDZV2UngI0iXzu4MG6ucxJ/BQu92NrQ72G63q//cEdoAm',NULL,NULL,NULL,0,0,0,0),
	(90,'Keaton Crona',7518,'Yost-Brown','Interaction Designer','1979-06-28','66704 Gutkowski Flats\nSouth Nehamouth, DE 15150-7744','1984-01-08','1','3',46532631,'regular','nina21@harber.com','$2y$10$zut7BUGto/xJ0xyJXcOsS.6HQIVMHombcbOvJ0UO.YKLqbLX8fKNm',NULL,NULL,NULL,0,0,0,0),
	(91,'Susan Gleason',7321,'Bauch-Kihn','Machine Feeder','1984-06-02','44669 Heller Fall\nRansomborough, AK 23783-5621','1984-07-04','1','0',94873159,'regular','margret51@reichert.com','$2y$10$ACZIKCzVjS4DUE0tOM/0TeMG6rbVjK/Io7T92radEIfJk7v/.bIc.',NULL,NULL,NULL,0,0,0,0),
	(92,'Vito Zulauf',4168,'Oberbrunner-Murray','Barber','1997-12-27','363 O\'Reilly Squares\nNorth Darlenefort, NE 44815','1970-06-23','0','1',1045523,'regular','hazel.haley@gmail.com','$2y$10$8e9SSPYSxcNjAO.95DasfeBso.ZpEUeVYGmwfVPhJ8b4UK0MFHLDS',NULL,NULL,NULL,0,0,0,0),
	(93,'Jaime Goodwin',8926,'Jakubowski Group','Stevedore','1986-12-13','443 Schiller Pike Suite 664\nNicoport, KY 34452-5364','1974-09-24','0','2',90927762,'regular','larkin.alanis@bailey.com','$2y$10$K9mGG9hWc2r1vknZ/0pLxeP//4ECVRLQaaAiQyThOoMG0/L5sK6dO',NULL,NULL,NULL,0,0,0,0),
	(94,'Angus Gerlach',4859,'Jast, Orn and Kirlin','Control Valve Installer','2013-06-28','212 Kody Gateway\nMylesland, CT 25739-2726','1984-08-22','1','2',62559559,'regular','greenholt.wava@kautzer.com','$2y$10$4yUjnHPqFW77eUP8IC580.OQ3qpPlg.7ofK4Cl8Vnd5D.pcA3YEke',NULL,NULL,NULL,0,0,0,0),
	(95,'Annette Lakin',2610,'Jacobs-Lueilwitz','Etcher','1979-04-14','1386 Gutkowski Harbor\nPfannerstillhaven, VA 19830-1457','1977-04-21','1','1',98351938,'regular','pasquale.bartell@gorczany.com','$2y$10$.s.6aEF87fJMGbs.QWi.Getvt.mTEKXoIjiqHBfENtGJ/S9PhgjT.',NULL,NULL,NULL,0,0,0,0),
	(96,'Prof. Audie Spinka',2583,'White-Kunde','Education Teacher','1994-12-26','87682 Herman Union\nNorth Leonora, FL 04841','1981-03-17','0','1',4157777,'regular','jmarks@gmail.com','$2y$10$B8IX59wQuK/BrekByOehsuAAUU7U0mfFxmpYpqB9TEyea4uNlR02C',NULL,NULL,NULL,0,0,0,0),
	(97,'Joaquin Lehner II',6236,'McLaughlin-Witting','Pharmaceutical Sales Representative','2006-06-07','3465 Becker Plains\nLake Jaden, ND 51969-8911','1981-07-29','0','2',65043536,'regular','khowe@hotmail.com','$2y$10$fFKyTXv1Od5pAbDO.n54cuIxVgLWF8dQuKAMFI1MHWR1FX.tia20K',NULL,NULL,NULL,0,0,0,0),
	(98,'Mrs. Letha Goldner',2875,'Bahringer-O\'Conner','Computer Hardware Engineer','2017-06-01','3574 Ozella Cove\nCallieland, OR 11533','1981-07-19','0','1',61705601,'regular','slemke@jacobson.com','$2y$10$IKkb.kiu3Po/3wC5CWArGOsO0EOF/OAmnqcsob6dmVUq/RS8IsvDm',NULL,NULL,NULL,0,0,0,0),
	(99,'Yesenia Goodwin',5185,'Pfannerstill, Sawayn and Hammes','CSI','2002-07-04','99667 Daniella Rue\nNew Rupertside, NY 25119','1984-03-24','1','1',68860439,'regular','kuhlman.jairo@krajcik.com','$2y$10$8nszGhZwWog0nqlmsf55n.y5fGFg7wWKOtQfHL1mIkZe53WXpxV4q',NULL,NULL,NULL,0,0,0,0),
	(100,'Precious Mayer Sr.',6536,'Green-Yundt','Environmental Science Teacher','1981-02-05','4024 Blanda Coves Suite 120\nWest Dewitthaven, MN 81864','1979-05-21','1','0',75732790,'regular','madeline.parisian@gmail.com','$2y$10$zvyw3U2hw4oavJcmyd60Q.tuwWXgDMB2urfxxKviaoDf6QA7eSCeK',NULL,NULL,NULL,0,0,0,0),
	(101,'Amos Hermiston',8389,'Pollich-Connelly','Oil Service Unit Operator','1972-09-28','211 Sporer Viaduct\nLake Alvinaton, ID 00411','1982-11-23','0','1',11654366,'regular','nauer@mills.info','$2y$10$brrQGDkpmnujZWpsB0YNLegs4XbVISL4aEKpwpXqxc2ykKnS4NaMm',NULL,NULL,NULL,0,0,0,0),
	(102,'Prof. Marion Lesch',1583,'Bergstrom, Lakin and Zemlak','Electrical Parts Reconditioner','2003-05-09','964 Elijah Haven Suite 509\nGulgowskiland, AZ 15918','1985-04-15','1','3',40443177,'regular','larkin.evangeline@gmail.com','$2y$10$H1s4PZwxCCAuWWjMH7i0NezAtSy9CJJ3azn9RUCdHXsvmYNrGtqu2',NULL,NULL,NULL,0,0,0,0),
	(103,'Jedidiah Wiza',3449,'Feil-Skiles','Geological Sample Test Technician','1993-10-12','85537 Vandervort Fall Suite 430\nFritschview, TX 56883-8725','1970-05-29','0','0',365192,'regular','sdurgan@howe.org','$2y$10$NsRAaNRzbB.vFgBEOT.BO.YEks4U5KlvSNtR4nIDiLu8RYcSRASRG',NULL,NULL,NULL,0,0,0,0),
	(104,'Narciso Will',5718,'Becker, Brakus and Anderson','Deburring Machine Operator','1982-01-16','421 Annamae Valley\nMabelbury, IA 07859-3085','1975-08-31','0','0',25911815,'regular','zion.weber@yahoo.com','$2y$10$AIwtdkQLGf8.FWWpX0rtXugQAJdM2Djc/6jdbjKLcZvTe54JJ1sIy',NULL,NULL,NULL,0,0,0,0),
	(105,'Dr. Norberto Hintz DDS',4056,'Moore Ltd','Internist','2016-06-07','2525 Schroeder Lakes\nNorth Hannah, VT 84931-6070','1987-11-11','0','3',81536391,'regular','jazmin90@hotmail.com','$2y$10$bVoXCwRdW9xA6dC88otZPe0uXuNAqhvf1kj8c0djUgVF.qygKZO1m',NULL,NULL,NULL,0,0,0,0),
	(106,'Carolyne Nienow IV',7248,'Emmerich, Wiegand and Heller','Network Systems Analyst','2007-05-26','42426 Batz Trace\nEast Andy, OR 65523','1972-05-15','1','2',89419911,'regular','morissette.ashtyn@mann.com','$2y$10$eCJjmqsQPpwHK48dcBPX3.mAd5yT6tR/lGL49i60Kx/z/hthXyBTi',NULL,NULL,NULL,0,0,0,0),
	(107,'Marjorie Dickinson II',8380,'Krajcik and Sons','Sales and Related Workers','1982-10-08','5024 VonRueden Via\nWaltonhaven, KS 17791','1978-12-23','0','3',76872411,'regular','jaime38@adams.com','$2y$10$kJ7Ltl0ZRDQ.yU4dQekcouZqOkC7RRpDX2uhlsN/PS.JOfuAuz6De',NULL,NULL,NULL,0,0,0,0),
	(108,'Alivia Emard V',5004,'Douglas and Sons','Automotive Mechanic','2011-07-16','51496 Rippin Cliff\nNorth Jana, ID 68844-5009','1970-04-02','0','3',12458848,'regular','jessica96@hotmail.com','$2y$10$Gp/3Y3imdzX8uj6VQlXDaOb.GM2no0zBcVYlvVNpqR5OPO2SIAKQq',NULL,NULL,NULL,0,0,0,0),
	(109,'Douglas Bins',7003,'Marquardt, Ondricka and Walter','Molding Machine Operator','2016-04-05','37819 Wolff Mill\nVidatown, HI 37270-1536','1974-01-19','0','0',45264584,'regular','parisian.morgan@thiel.com','$2y$10$6Fc7RV4FhnpbntNP44qWTuVi.MDog4hRtTWaFhR6EPZiBfritUthG',NULL,NULL,NULL,0,0,0,0),
	(110,'Dr. Rose Marks V',8075,'Powlowski, Pacocha and Reinger','Metal Fabricator','1982-05-25','587 Gulgowski Rapid\nSouth Rebecaborough, GA 25393','1975-10-10','0','1',88398055,'regular','christiansen.rusty@gmail.com','$2y$10$Gsdu1NlalnvGosCV.6XTYusSKwwhIPw/GwzZxYckMiGAf6Ta6cVUS',NULL,NULL,NULL,0,0,0,0),
	(111,'Hunter Larson',7144,'Boehm-Jacobi','Horticultural Worker','2015-05-21','851 Maiya Rest\nPort Brentfort, NV 46228','1989-07-11','1','2',96070570,'regular','shane.zulauf@haley.net','$2y$10$RtA4GFvH.2KR6Guigo.S.Ogh.GB1hpZCAVCj/72kdcHRRqd/EYhRa',NULL,NULL,NULL,0,0,0,0),
	(112,'Miss Joelle Johnston PhD',3251,'Kemmer-Tremblay','Refinery Operator','1993-11-20','974 Yundt Throughway\nNorth Jesus, RI 36608','1976-04-29','0','1',59848833,'regular','leland72@yahoo.com','$2y$10$u6pJauqn6B1x.dGfk1GRc.tFsJWSznT3jX1oauqhou7lVqme1WzCO',NULL,NULL,NULL,0,0,0,0),
	(113,'Eldon Boyer',4874,'Johnston-Lemke','Cutting Machine Operator','2016-02-12','7872 Russel Trafficway Suite 663\nEast Santiago, LA 24523','1985-12-13','1','3',51246163,'regular','keara.cormier@yahoo.com','$2y$10$u/aow6/3OLPXgjEwf0GNLuH8IWVOVGQof.uOh7qVcnLvIBAe9/c0u',NULL,NULL,NULL,0,0,0,0),
	(114,'Penelope Steuber',2713,'Herzog LLC','Physics Teacher','2009-06-07','604 Laila Loaf\nShieldsstad, FL 76964','1982-10-22','0','3',75294740,'regular','perry33@mayer.com','$2y$10$7c74nOn7Hg4NVdGzK8fGiuabn/rz.rXepUgsKLc9mQ93QxU4OxU.i',NULL,NULL,NULL,0,0,0,0),
	(115,'Cleora Leffler DDS',7620,'Satterfield and Sons','Electronic Engineering Technician','1991-07-11','7122 Esmeralda Crescent\nNew Cliffordchester, ND 98501','1977-02-05','0','1',96284359,'regular','alejandrin.romaguera@hotmail.com','$2y$10$ZhGnhV.0uSameove7OCw2.nyZZ8KEhDbERgVfF34cjqITFpyof2ei',NULL,NULL,NULL,0,0,0,0),
	(116,'Jacklyn Wiegand',2118,'Ebert LLC','Hand Trimmer','1972-07-23','321 Smith Bypass\nRyanton, DC 16995','1973-08-19','0','2',75492388,'regular','raynor.asia@hotmail.com','$2y$10$S3gqhLDSZOcWfp02Q3XxVuNTznx0zeoEXJZn.TJ/f74ebMmpFWTQW',NULL,NULL,NULL,0,0,0,0),
	(117,'Ernesto Altenwerth',6088,'Ernser, Barton and Leuschke','Typesetting Machine Operator','1986-11-09','307 Magali Point\nEast Rex, MI 44563','1980-10-21','0','1',73022422,'regular','oohara@yahoo.com','$2y$10$4gcgSL3cERj/78aUyHVj4OUH8ALEOpqWl47mGne4lkYf1BCg4jbdi',NULL,NULL,NULL,0,0,0,0),
	(118,'Sam Barbosa',4563,'Human Resources','HR Manager','2017-07-25','Somewhere','2002-06-06','1','0',654984,'regular','sam@barbosa.com','$2y$10$wsjP6UpDYI.FfjxE4j5QKez0TwrYT0iqm0VI.PntEGJBvrnb3AVeu',NULL,'2017-07-24 21:13:15','2017-07-24 21:13:15',35000,3,8,5);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
