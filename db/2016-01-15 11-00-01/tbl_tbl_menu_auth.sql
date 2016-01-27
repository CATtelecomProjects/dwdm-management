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

/*Table structure for table `tbl_menu_auth` */

DROP TABLE IF EXISTS `tbl_menu_auth`;

CREATE TABLE `tbl_menu_auth` (
  `group_id` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`group_id`,`menu_id`),
  KEY `Ref337` (`menu_id`),
  KEY `Ref838` (`group_id`),
  CONSTRAINT `FK_tbl_menu_auth` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_menu_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§ÊÔ·¸Ôì¡ÒÃà¢éÒ¶Ö§àÁ¹Ù';

/*Data for the table `tbl_menu_auth` */

insert  into `tbl_menu_auth`(`group_id`,`menu_id`,`update_by`,`update_time`) values (1,1,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,3,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,7,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,10,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,11,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,13,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,14,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,16,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,17,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,18,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,19,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,20,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,22,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,23,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,25,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,26,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,28,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,29,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,30,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,31,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,32,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,33,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,34,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,35,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,36,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,37,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(1,38,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:49'),(2,7,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,16,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,22,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,28,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,34,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,37,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(2,38,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:20:22'),(3,3,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,7,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,16,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,20,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,22,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,23,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,28,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,32,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,33,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,34,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,36,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(3,38,'นายปิยะพงษ์ แก้วน่าน','2015-12-02 21:00:57'),(4,3,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,7,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,16,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,20,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,22,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,28,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,33,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,34,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,37,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00'),(4,38,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:21:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;