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

/*Table structure for table `tbl_dwdm_category` */

DROP TABLE IF EXISTS `tbl_dwdm_category`;

CREATE TABLE `tbl_dwdm_category` (
  `cate_id` int(5) NOT NULL auto_increment,
  `cate_name` varchar(100) NOT NULL,
  `active` varchar(1) NOT NULL default 'Y',
  `menu_order` int(2) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_category` */

insert  into `tbl_dwdm_category`(`cate_id`,`cate_name`,`active`,`menu_order`,`update_by`,`update_time`) values (1,'MA Hardware','Y',1,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 13:01:59'),(2,'MA Software','Y',2,'Administrator','2014-09-23 16:18:59'),(3,'Moduels CM','Y',3,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:25:29'),(4,'Moduels FI','Y',4,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:25:35'),(5,'Moduels NUA','Y',5,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:25:42'),(6,'Moduels HKR','Y',6,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:25:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
