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

/*Table structure for table `tbl_dwdm_checklist` */

DROP TABLE IF EXISTS `tbl_dwdm_checklist`;

CREATE TABLE `tbl_dwdm_checklist` (
  `check_id` int(11) NOT NULL auto_increment,
  `user_assign` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `check_status` varchar(1) NOT NULL default 'P' COMMENT 'P=Pending,A=Approve,K=Keying,S=Send',
  `remarks` varchar(255) default NULL,
  `unlock_desc` text,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`check_id`),
  KEY `NewIndex1` (`user_assign`,`check_status`),
  CONSTRAINT `FK_tbl_dwdm_checklist` FOREIGN KEY (`user_assign`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_checklist` */

insert  into `tbl_dwdm_checklist`(`check_id`,`user_assign`,`date_start`,`date_finish`,`check_status`,`remarks`,`unlock_desc`,`update_by`,`update_time`) values (1,14,'2014-05-26','2014-05-30','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-09-03 10:37:09'),(2,16,'2014-06-02','2014-06-06','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 10:44:18'),(3,17,'2014-06-09','2014-06-13','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:12:16'),(4,15,'2014-06-16','2014-06-20','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:12:41'),(5,13,'2014-06-23','2014-06-27','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:12:52'),(6,10,'2014-06-30','2014-07-04','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 20:55:33'),(7,12,'2014-07-07','2014-07-11','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:13:19'),(8,14,'2014-07-14','2014-07-18','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:13:33'),(9,16,'2014-07-21','2014-07-25','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:13:41'),(10,17,'2014-07-28','2014-08-01','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:13:50'),(11,15,'2014-08-04','2014-08-08','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:13:58'),(12,13,'2014-08-11','2014-08-15','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-08-21 14:14:07'),(13,10,'2014-08-18','2014-08-22','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-09-10 15:09:11'),(14,12,'2014-08-25','2014-08-29','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-09-11 09:48:17'),(15,14,'2014-09-01','2014-09-05','A','',NULL,'นายปิยะพงษ์ แก้วน่าน','2014-09-11 09:48:30'),(16,16,'2014-09-08','2014-09-12','A','',NULL,'Administrator','2014-09-22 09:44:20'),(17,17,'2014-09-15','2014-09-19','A','',NULL,'Administrator','2014-09-22 09:44:54'),(18,15,'2014-09-22','2014-09-26','A','',NULL,'Administrator','2014-10-14 14:10:05'),(19,13,'2014-09-29','2014-10-03','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-10-14 13:53:21'),(20,10,'2014-10-06','2014-10-10','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-10-14 13:54:12'),(21,12,'2014-10-13','2014-10-17','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-10-27 11:39:34'),(22,14,'2014-10-20','2014-10-24','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-11-05 13:36:29'),(23,16,'2014-10-27','2014-10-31','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-11-05 13:36:45'),(24,17,'2014-11-03','2014-11-07','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-12-02 10:38:26'),(25,15,'2014-11-10','2014-11-14','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-11-17 10:45:17'),(26,13,'2014-11-17','2014-11-21','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-12-02 10:38:42'),(27,10,'2014-11-24','2014-11-28','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-12-02 10:38:52'),(28,12,'2014-12-01','2014-12-05','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-12-19 09:12:31'),(29,14,'2014-12-08','2014-12-12','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2014-12-19 09:12:53'),(31,16,'2014-12-15','2014-12-19','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-01-05 09:15:35'),(32,17,'2014-12-22','2014-12-26','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-01-05 09:15:49'),(33,15,'2014-12-29','2015-01-02','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-01-05 09:16:03'),(34,16,'2015-01-05','2015-01-09','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-01-19 14:22:29'),(35,12,'2015-01-12','2015-01-16','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-01-19 14:22:07'),(36,15,'2015-01-19','2015-01-23','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-02-16 08:55:59'),(37,10,'2015-01-26','2015-01-30','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-02-16 08:56:17'),(38,14,'2015-02-02','2015-02-06','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-02-16 08:56:32'),(39,17,'2015-02-09','2015-02-13','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-02-16 08:57:25'),(40,13,'2015-02-16','2015-02-20','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-02-23 09:31:37'),(41,16,'2015-02-23','2015-02-27','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-03-02 10:01:57'),(42,12,'2015-03-02','2015-03-06','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:18:20'),(43,15,'2015-03-09','2015-03-13','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:18:56'),(44,10,'2015-03-16','2015-03-20','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:19:06'),(45,14,'2015-03-23','2015-03-27','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:19:15'),(46,17,'2015-03-30','2015-04-03','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:19:45'),(47,13,'2015-04-06','2015-04-10','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-04-10 09:20:23'),(48,16,'2015-04-13','2015-04-17','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-12 08:41:58'),(49,12,'2015-04-20','2015-04-24','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-12 08:42:08'),(50,15,'2015-04-27','2015-05-01','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-12 08:41:36'),(51,10,'2015-05-04','2015-05-08','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-12 08:41:24'),(52,14,'2015-05-11','2015-05-15','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-19 15:06:05'),(53,17,'2015-05-18','2015-05-22','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-05-28 09:02:00'),(54,13,'2015-05-25','2015-05-29','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-07-02 09:19:45'),(55,16,'2015-06-01','2015-06-05','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-07-02 09:19:54'),(56,12,'2015-06-08','2015-06-12','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-07-02 09:20:17'),(57,15,'2015-06-15','2015-06-19','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-07-02 09:19:30'),(58,10,'2015-06-22','2015-06-26','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-07-02 09:19:11'),(59,14,'2015-06-29','2015-07-03','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:11:33'),(60,17,'2015-07-06','2015-07-10','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:11:23'),(61,13,'2015-07-13','2015-07-17','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:11:09'),(62,16,'2015-07-20','2015-07-24','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:10:57'),(63,12,'2015-07-27','2015-07-31','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:10:48'),(64,15,'2015-08-03','2015-08-07','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:10:36'),(65,10,'2015-08-10','2015-08-14','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:10:17'),(66,14,'2015-08-17','2015-08-21','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:54:42'),(67,17,'2015-08-24','2015-08-28','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:54:53'),(68,13,'2015-08-31','2015-09-04','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:55:02'),(69,16,'2015-09-07','2015-09-11','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:55:14'),(70,12,'2015-09-14','2015-09-18','A','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:54:20'),(71,15,'2015-09-21','2015-09-25','S','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-25 09:18:16'),(72,10,'2015-09-28','2015-10-02','S','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-10-05 08:50:32'),(73,14,'2015-10-05','2015-10-09','K','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-10-05 10:16:20'),(74,17,'2015-10-12','2015-10-16','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:12:01'),(75,13,'2015-10-19','2015-10-23','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:12:06'),(76,16,'2015-10-26','2015-10-30','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-08-20 10:12:14'),(77,12,'2015-11-02','2015-11-06','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:55:41'),(78,15,'2015-11-09','2015-11-13','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:55:52'),(79,10,'2015-11-16','2015-11-20','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:56:05'),(80,14,'2015-11-23','2015-11-27','P','',NULL,'น.ส.วรรณนภา อ่ำพิจิตร','2015-09-24 08:56:17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
