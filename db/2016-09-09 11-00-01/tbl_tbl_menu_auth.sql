/*
SQLyog Job Agent Version 8.18 Copyright(c) Webyog Softworks Pvt. Ltd. All Rights Reserved.


MySQL - 5.5.5-10.1.10-MariaDB : Database - dwdm_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dwdm_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dwdm_db`;

/*Table structure for table `tbl_menu_auth` */

DROP TABLE IF EXISTS `tbl_menu_auth`;

CREATE TABLE `tbl_menu_auth` (
  `group_id` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`,`menu_id`),
  KEY `Ref337` (`menu_id`),
  KEY `Ref838` (`group_id`),
  CONSTRAINT `FK_tbl_menu_auth` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_menu_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§ÊÔ·¸Ôì¡ÒÃà¢éÒ¶Ö§àÁ¹Ù';

/*Data for the table `tbl_menu_auth` */

insert  into `tbl_menu_auth`(`group_id`,`menu_id`,`update_by`,`update_time`) values (1,1,'Administrator','2016-08-26 15:12:00'),(1,3,'Administrator','2016-08-26 15:12:00'),(1,7,'Administrator','2016-08-26 15:12:00'),(1,10,'Administrator','2016-08-26 15:12:00'),(1,11,'Administrator','2016-08-26 15:12:00'),(1,13,'Administrator','2016-08-26 15:12:00'),(1,14,'Administrator','2016-08-26 15:12:00'),(1,16,'Administrator','2016-08-26 15:12:00'),(1,17,'Administrator','2016-08-26 15:12:00'),(1,18,'Administrator','2016-08-26 15:12:00'),(1,19,'Administrator','2016-08-26 15:12:00'),(1,20,'Administrator','2016-08-26 15:12:00'),(1,22,'Administrator','2016-08-26 15:12:00'),(1,23,'Administrator','2016-08-26 15:12:00'),(1,25,'Administrator','2016-08-26 15:12:00'),(1,26,'Administrator','2016-08-26 15:12:00'),(1,28,'Administrator','2016-08-26 15:12:00'),(1,29,'Administrator','2016-08-26 15:12:00'),(1,30,'Administrator','2016-08-26 15:12:00'),(1,31,'Administrator','2016-08-26 15:12:00'),(1,32,'Administrator','2016-08-26 15:12:00'),(1,33,'Administrator','2016-08-26 15:12:00'),(1,34,'Administrator','2016-08-26 15:12:00'),(1,35,'Administrator','2016-08-26 15:12:00'),(1,36,'Administrator','2016-08-26 15:12:00'),(1,37,'Administrator','2016-08-26 15:12:00'),(1,38,'Administrator','2016-08-26 15:12:00'),(1,39,'Administrator','2016-08-26 15:12:00'),(1,40,'Administrator','2016-08-26 15:12:00'),(1,41,'Administrator','2016-08-26 15:12:00'),(1,42,'Administrator','2016-08-26 15:12:00'),(1,43,'Administrator','2016-08-26 15:12:00'),(1,44,'Administrator','2016-08-26 15:12:00'),(1,45,'Administrator','2016-08-26 15:12:00'),(1,46,'Administrator','2016-08-26 15:12:00'),(1,48,'Administrator','2016-08-26 15:12:00'),(1,49,'Administrator','2016-08-26 15:12:00'),(1,50,'Administrator','2016-08-26 15:12:00'),(1,51,'Administrator','2016-08-26 15:12:00'),(1,52,'Administrator','2016-08-26 15:12:00'),(2,7,'Administrator','2016-08-26 09:46:18'),(2,16,'Administrator','2016-08-26 09:46:18'),(2,22,'Administrator','2016-08-26 09:46:18'),(2,28,'Administrator','2016-08-26 09:46:18'),(2,34,'Administrator','2016-08-26 09:46:18'),(2,49,'Administrator','2016-08-26 09:46:18'),(2,50,'Administrator','2016-08-26 09:46:18'),(3,3,'Administrator','2016-08-29 14:28:10'),(3,7,'Administrator','2016-08-29 14:28:10'),(3,16,'Administrator','2016-08-29 14:28:10'),(3,20,'Administrator','2016-08-29 14:28:10'),(3,22,'Administrator','2016-08-29 14:28:10'),(3,23,'Administrator','2016-08-29 14:28:10'),(3,28,'Administrator','2016-08-29 14:28:10'),(3,32,'Administrator','2016-08-29 14:28:10'),(3,33,'Administrator','2016-08-29 14:28:10'),(3,34,'Administrator','2016-08-29 14:28:10'),(3,36,'Administrator','2016-08-29 14:28:10'),(3,38,'Administrator','2016-08-29 14:28:10'),(3,39,'Administrator','2016-08-29 14:28:10'),(3,41,'Administrator','2016-08-29 14:28:10'),(3,43,'Administrator','2016-08-29 14:28:10'),(3,48,'Administrator','2016-08-29 14:28:10'),(3,49,'Administrator','2016-08-29 14:28:10'),(3,50,'Administrator','2016-08-29 14:28:10'),(3,51,'Administrator','2016-08-29 14:28:10'),(3,52,'Administrator','2016-08-29 14:28:10'),(4,3,'Administrator','2016-08-29 14:28:20'),(4,7,'Administrator','2016-08-29 14:28:21'),(4,16,'Administrator','2016-08-29 14:28:21'),(4,20,'Administrator','2016-08-29 14:28:21'),(4,22,'Administrator','2016-08-29 14:28:21'),(4,28,'Administrator','2016-08-29 14:28:21'),(4,33,'Administrator','2016-08-29 14:28:21'),(4,34,'Administrator','2016-08-29 14:28:21'),(4,37,'Administrator','2016-08-29 14:28:21'),(4,38,'Administrator','2016-08-29 14:28:21'),(4,39,'Administrator','2016-08-29 14:28:21'),(4,40,'Administrator','2016-08-29 14:28:21'),(4,41,'Administrator','2016-08-29 14:28:21'),(4,42,'Administrator','2016-08-29 14:28:21'),(4,43,'Administrator','2016-08-29 14:28:21'),(4,44,'Administrator','2016-08-29 14:28:21'),(4,45,'Administrator','2016-08-29 14:28:21'),(4,46,'Administrator','2016-08-29 14:28:21'),(4,48,'Administrator','2016-08-29 14:28:21'),(4,49,'Administrator','2016-08-29 14:28:20'),(4,50,'Administrator','2016-08-29 14:28:21'),(4,51,'Administrator','2016-08-29 14:28:21'),(4,52,'Administrator','2016-08-29 14:28:21'),(5,39,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(5,41,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(5,43,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(5,44,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(5,45,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(5,46,'นายปิยะพงษ์ แก้วน่าน','2016-03-11 09:03:41'),(6,50,'Administrator','2016-08-26 09:48:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
