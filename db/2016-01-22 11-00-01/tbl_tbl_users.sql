/*
SQLyog Job Agent Version 8.18 Copyright(c) Webyog Softworks Pvt. Ltd. All Rights Reserved.


MySQL - 5.0.51b-community-nt-log : Database - dwdm_db
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
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_desc` varchar(50) NOT NULL,
  `email` varchar(50) default NULL,
  `telephone` varchar(20) default NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`),
  KEY `username` (`username`),
  KEY `first_name` (`user_desc`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¼Ùéãªé§Ò¹';

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`password`,`user_desc`,`email`,`telephone`,`update_by`,`update_time`) values (2,'catuser','cHdjYXR1c2Vy','CAT DW/DM User','piyapong.k@cattelecom.com','-','Administrator','2014-08-15 12:35:03'),(7,'admin','MTIzNDU2','Administrator','piyapong.k@cattelecom.com','02-1047334','Administrator','2014-09-10 14:59:58'),(10,'00354293','MTIzNDU2','นายปิยะพงษ์ แก้วน่าน','piyapong.k@cattelecom.com','02-1047334','Administrator','2015-12-03 09:13:38'),(11,'00348364','MDk4NzY1','น.ส.วรรณนภา อ่ำพิจิตร',NULL,'02-1047332','Administrator','2015-09-21 10:39:06'),(12,'00336101','c29tdHVpOTk5','น.ส.พรรณี ชมสมุท',NULL,'02-1047333','Administrator','2015-09-21 10:39:14'),(13,'00364445','MTIzNDU2','น.ส.ภัทริกา แก้วใจ',NULL,'02-1047334','Administrator','2015-09-21 10:38:59'),(14,'00331135','MTIzNDU2','นายธรรมรัฐ วัชรานันทกุล',NULL,'02-1047333','Administrator','2015-09-21 10:39:16'),(15,'00369521','MTIzNDU2','นายพิสิฐ คูวิจิตรจารุ',NULL,'02-1047333','Administrator','2015-09-21 10:39:18'),(16,'00370251','MDAzNzAyNTE=','นายณัฐวัฒน์ แสงสีทอง',NULL,'02-1047336','Administrator','2015-09-21 10:39:21'),(17,'00354633','MTIzNDU2','นางธนาทิพย์ แม้นสมุทร',NULL,'02-1047336','Administrator','2015-09-21 10:39:24'),(18,'demo','MTIzNDU2','Demo User',NULL,NULL,'Administrator','2014-09-05 11:52:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
