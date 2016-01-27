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

/*Table structure for table `tbl_knowledge_files` */

DROP TABLE IF EXISTS `tbl_knowledge_files`;

CREATE TABLE `tbl_knowledge_files` (
  `file_id` int(11) NOT NULL auto_increment,
  `kn_id` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`file_id`),
  KEY `FK_tbl_knowledge_files` (`kn_id`),
  KEY `file_name` (`file_name`),
  CONSTRAINT `FK_tbl_knowledge_files` FOREIGN KEY (`kn_id`) REFERENCES `tbl_knowledge` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_files` */

insert  into `tbl_knowledge_files`(`file_id`,`kn_id`,`file_name`,`update_by`,`update_time`) values (46,8,'2-20140716-IMG_20140709_095409.jpg','Administrator','2014-07-16 13:56:47'),(47,8,'2-20140716-S__7077942.jpg','Administrator','2014-07-16 13:56:52'),(48,8,'2-20140716-information.jpg','Administrator','2014-07-16 13:58:53'),(52,10,'2-20140808-information.jpg','นายปิยะพงษ์ แก้วน่าน','2014-08-08 10:34:19'),(53,6,'3-20140910-chart.png','Administrator','2014-09-10 14:20:06'),(54,12,'1-20141027-AddinOption.png','นายปิยะพงษ์ แก้วน่าน','2014-10-27 15:22:01'),(55,12,'1-20141027-CustomizeRibbon.jpg','นายปิยะพงษ์ แก้วน่าน','2014-10-27 15:22:04'),(56,12,'1-20141027-error1.png','นายปิยะพงษ์ แก้วน่าน','2014-10-27 15:22:07'),(57,12,'1-20141027-error2.png','นายปิยะพงษ์ แก้วน่าน','2014-10-27 15:22:11'),(58,14,'1-20150703-Hemedinger_298-2012.pdf','นายปิยะพงษ์ แก้วน่าน','2015-07-03 09:22:32'),(59,14,'1-20150703-olap_mdx_9317.pdf','นายปิยะพงษ์ แก้วน่าน','2015-07-03 09:22:38');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
