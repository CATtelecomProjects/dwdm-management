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

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_desc` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `username` (`username`),
  KEY `first_name` (`user_desc`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¼Ùéãªé§Ò¹';

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`password`,`user_desc`,`email`,`telephone`,`update_by`,`update_time`) values (2,'catuser','cHdjYXR1c2Vy','CAT DW/DM User','piyapong.k@cattelecom.com','-','Administrator','2016-03-22 10:47:30'),(7,'admin','YWRtaW4xMjM0','Administrator','piyapong.k@cattelecom.com','02-1047334','Administrator','2016-03-22 12:21:13'),(10,'00354293','MTIzNDU2','นายปิยะพงษ์ แก้วน่าน','piyapong.k@cattelecom.com','02-1047334','Administrator','2016-09-15 10:36:08'),(11,'00348364','MDk4NzY1','น.ส.วรรณนภา อ่ำพิจิตร',NULL,'02-1047332','Administrator','2016-03-22 10:48:06'),(12,'00336101','c29tdHVpOTk5','น.ส.พรรณี ชมสมุท',NULL,'02-1047333','นายปิยะพงษ์ แก้วน่าน','2016-04-07 12:56:45'),(13,'00364445','MTIzNDU2','น.ส.ภัทริกา แก้วใจ',NULL,'02-1047334','Administrator','2016-03-22 10:47:57'),(14,'00331135','MTIzNDU2','นายธรรมรัฐ วัชรานันทกุล',NULL,'02-1047333','Administrator','2016-03-22 10:48:13'),(15,'00369521','MTIzNDU2','นายพิสิฐ คูวิจิตรจารุ',NULL,'02-1047333','Administrator','2016-03-22 10:48:20'),(16,'00370251','MDAzNzAyNTE=','นายณัฐวัฒน์ แสงสีทอง',NULL,'02-1047336','Administrator','2016-03-22 10:48:28'),(17,'00354633','MTIzNDU2','นางธนาทิพย์ แม้นสมุทร',NULL,'02-1047336','Administrator','2016-03-22 10:48:35'),(18,'demo','MTIzNDU2','Demo User',NULL,NULL,'Administrator','2014-09-05 11:52:14'),(19,'guest','MTIzNDU2','พนักงาน CAT',NULL,NULL,'Administrator','2016-08-23 10:46:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
