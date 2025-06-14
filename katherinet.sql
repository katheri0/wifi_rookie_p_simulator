


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bouquet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bouquet`;

CREATE TABLE `bouquet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` varchar(250) NOT NULL,
  `daysM` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `bouquet` WRITE;
/*!40000 ALTER TABLE `bouquet` DISABLE KEYS */;

INSERT INTO `bouquet` (`daysM`, `id`, `price`) VALUES
	(' 2 ميجا200 , ايام ', 1, '100 ريال '),
	(' 3 ميجا600 , ايام ', 2, '200 ريال '),
	(' 4 ميجا900 , ايام ', 3, '300 ريال '),
	(' 6 ميجا1500 , ايام ', 4, '500 ريال ');

/*!40000 ALTER TABLE `bouquet` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table lognet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lognet`;

CREATE TABLE `lognet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `dayM` int NOT NULL,
  `type` varchar(250) NOT NULL,
  `created_ar` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `lognet` WRITE;
/*!40000 ALTER TABLE `lognet` DISABLE KEYS */;

INSERT INTO `lognet` (`dayM`, `id`, `name`, `password`, `price`, `type`) VALUES
	(200, 13, 'for', '12432', '100', 'inactive'),
	(1500, 17, 'fatma', '3343', '500', 'inactive'),
	(900, 28, 'k', '44235', '300', 'inactive');

/*!40000 ALTER TABLE `lognet` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table spoints
# ------------------------------------------------------------

DROP TABLE IF EXISTS `spoints`;

CREATE TABLE `spoints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameofspoint` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `spoints` WRITE;
/*!40000 ALTER TABLE `spoints` DISABLE KEYS */;

INSERT INTO `spoints` (`id`, `nameofspoint`) VALUES
	(1, 'بقالة يوسف'),
	(2, 'سوبر ماركت'),
	(3, 'بقالة الكثيري '),
	(4, 'بقالة صباح الخير '),
	(5, 'بقالة مكة ');

/*!40000 ALTER TABLE `spoints` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


