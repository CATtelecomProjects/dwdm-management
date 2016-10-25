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

/*Table structure for table `tbl_module_auth` */

DROP TABLE IF EXISTS `tbl_module_auth`;

CREATE TABLE `tbl_module_auth` (
  `user_id` int(11) NOT NULL,
  `module_name` varchar(10) NOT NULL COMMENT 'Mapping Module to User',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Update Time',
  PRIMARY KEY (`module_name`,`user_id`),
  KEY `FK_tbl_module_auth` (`user_id`),
  CONSTRAINT `FK_tbl_module_auth` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_module_auth2` FOREIGN KEY (`module_name`) REFERENCES `tbl_sm_module` (`module_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_module_auth` */

insert  into `tbl_module_auth`(`user_id`,`module_name`,`update_time`) values (7,'CM','2016-03-22 12:21:13'),(10,'CM','2016-09-08 09:05:56'),(11,'CM','2016-03-22 10:48:06'),(13,'CM','2016-03-22 10:47:57'),(17,'CM','2016-03-22 10:48:35'),(7,'FI','2016-03-22 12:21:13'),(10,'FI','2016-09-08 09:05:56'),(11,'FI','2016-03-22 10:48:06'),(15,'FI','2016-03-22 10:48:20'),(16,'FI','2016-03-22 10:48:28'),(7,'HKR','2016-03-22 12:21:13'),(10,'HKR','2016-09-08 09:05:56'),(11,'HKR','2016-03-22 10:48:06'),(12,'HKR','2016-04-07 12:56:45'),(15,'HKR','2016-03-22 10:48:20'),(7,'NUA','2016-03-22 12:21:13'),(10,'NUA','2016-09-08 09:05:56'),(11,'NUA','2016-03-22 10:48:06'),(14,'NUA','2016-03-22 10:48:13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
