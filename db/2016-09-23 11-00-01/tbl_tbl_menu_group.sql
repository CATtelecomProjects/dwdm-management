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

/*Table structure for table `tbl_menu_group` */

DROP TABLE IF EXISTS `tbl_menu_group`;

CREATE TABLE `tbl_menu_group` (
  `mgroup_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `menu_group_th` varchar(50) NOT NULL,
  `menu_group_en` varchar(50) DEFAULT NULL,
  `modules_id` int(5) NOT NULL,
  `menu_order` tinyint(4) DEFAULT NULL,
  `icon_id` tinyint(4) DEFAULT '3',
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mgroup_id`),
  KEY `Ref44106` (`icon_id`),
  KEY `FK_tbl_menu_group_module` (`modules_id`),
  CONSTRAINT `FK_tbl_menu_group` FOREIGN KEY (`icon_id`) REFERENCES `tbl_icons` (`icon_id`),
  CONSTRAINT `FK_tbl_menu_group_module` FOREIGN KEY (`modules_id`) REFERENCES `tbl_modules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁàÁ¹Ù';

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`mgroup_id`,`menu_group_th`,`menu_group_en`,`modules_id`,`menu_order`,`icon_id`,`update_by`,`update_time`) values (1,'ผู้ดูแลระบบ','Administrator',1,2,2,'Administrator','2014-09-10 14:07:45'),(3,'ข้อมูลส่วนตัว','Profiles',2,1,4,'นายปิยะพงษ์ แก้วน่าน','2014-09-10 16:06:37'),(8,'คู่มือ','User Manual',3,7,7,'นายปิยะพงษ์ แก้วน่าน','2016-03-01 09:17:33'),(9,'องค์ความรู้','Knowledge',4,5,9,'นายปิยะพงษ์ แก้วน่าน','2016-03-02 16:10:15'),(10,'โปรแกรม DW/DM','DW/DM Applications',5,4,14,'นายปิยะพงษ์ แก้วน่าน','2016-02-19 12:17:03'),(11,'รายงาน','Reports',6,6,5,'Adminstrator','2016-02-19 12:10:02'),(12,'Security Matrix','Security Matrix',8,3,11,'นายปิยะพงษ์ แก้วน่าน','2016-02-19 12:17:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
