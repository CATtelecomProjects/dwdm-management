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

/*Table structure for table `tbl_sm_admin_code` */

DROP TABLE IF EXISTS `tbl_sm_admin_code`;

CREATE TABLE `tbl_sm_admin_code` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Admin ID',
  `admin_code` varchar(5) NOT NULL COMMENT 'Admin Code',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Update Time',
  PRIMARY KEY (`admin_id`),
  KEY `FK_tbl_sm_admin_code` (`admin_code`),
  CONSTRAINT `FK_tbl_sm_admin_code` FOREIGN KEY (`admin_code`) REFERENCES `tbl_sm_emp` (`emp_admin_code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sm_admin_code` */

insert  into `tbl_sm_admin_code`(`admin_id`,`admin_code`,`update_time`) values (1,'ก','2016-02-15 15:28:19'),(2,'ง','2016-02-15 15:28:27'),(3,'ฐ','2016-02-15 15:28:31'),(4,'ต','2016-02-15 15:28:34'),(5,'ฉ','2016-02-15 15:28:37'),(6,'ค','2016-02-15 15:28:43'),(7,'ช','2016-02-15 15:28:46'),(8,'ฌ','2016-02-15 15:28:53'),(9,'ภ','2016-03-02 14:10:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
