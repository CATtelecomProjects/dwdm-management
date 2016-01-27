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

/*Table structure for table `tbl_knowledge_auth` */

DROP TABLE IF EXISTS `tbl_knowledge_auth`;

CREATE TABLE `tbl_knowledge_auth` (
  `group_id` tinyint(4) NOT NULL,
  `knowledge_cate_id` int(11) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`group_id`,`knowledge_cate_id`),
  KEY `FK_tbl_knowledge_auth` (`knowledge_cate_id`),
  CONSTRAINT `FK_tbl_knowledge_auth` FOREIGN KEY (`knowledge_cate_id`) REFERENCES `tbl_knowledge_cate` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_knowledge_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_auth` */

insert  into `tbl_knowledge_auth`(`group_id`,`knowledge_cate_id`,`update_by`,`update_time`) values (1,1,'Administrator','2014-08-05 09:31:56'),(1,2,'Administrator','2014-08-05 09:31:56'),(1,3,'Administrator','2014-08-05 09:31:56'),(1,4,'Administrator','2014-08-05 09:31:56'),(1,5,'Administrator','2014-08-05 09:31:56'),(1,6,'Administrator','2014-08-05 09:31:56'),(2,1,'Administrator','2014-07-10 11:24:29'),(2,2,'Administrator','2014-07-10 11:24:29'),(2,3,'Administrator','2014-07-10 11:24:30'),(2,5,'Administrator','2014-07-10 11:24:30'),(2,6,'Administrator','2014-07-10 11:24:30'),(3,1,'นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:33:52'),(3,2,'นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:33:52'),(3,3,'นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:33:52'),(3,5,'นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:33:52'),(3,6,'นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:33:52'),(4,1,'Administrator','2014-09-10 14:15:10'),(4,2,'Administrator','2014-09-10 14:15:10'),(4,3,'Administrator','2014-09-10 14:15:10'),(4,4,'Administrator','2014-09-10 14:15:10'),(4,5,'Administrator','2014-09-10 14:15:10'),(4,6,'Administrator','2014-09-10 14:15:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
