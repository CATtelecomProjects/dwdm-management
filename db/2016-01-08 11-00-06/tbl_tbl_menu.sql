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

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` tinyint(5) NOT NULL auto_increment,
  `menu_name_th` varchar(70) NOT NULL,
  `menu_name_en` varchar(70) default NULL,
  `menu_file` varchar(50) NOT NULL,
  `menu_param` varchar(100) default NULL,
  `menu_order` tinyint(4) default NULL,
  `mgroup_id` tinyint(4) default NULL,
  `icon_id` tinyint(4) default NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`menu_id`),
  KEY `Ref44105` (`icon_id`),
  KEY `Ref554` (`mgroup_id`),
  KEY `icon_id` (`icon_id`),
  CONSTRAINT `FK_tbl_menu` FOREIGN KEY (`icon_id`) REFERENCES `tbl_icons` (`icon_id`),
  CONSTRAINT `FK_tbl_menu_fk` FOREIGN KEY (`mgroup_id`) REFERENCES `tbl_menu_group` (`mgroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§àÁ¹Ù';

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_name_th`,`menu_name_en`,`menu_file`,`menu_param`,`menu_order`,`mgroup_id`,`icon_id`,`update_by`,`update_time`) values (1,'จัดการเว็บไซต์','Website Management','config',NULL,1,1,2,'Administrator','2014-07-29 10:59:56'),(3,'เปลี่ยนรหัสผ่าน','Change Password','profile',NULL,1,3,4,'Administrator','2014-07-28 12:22:47'),(7,'เกี่ยวกับโปรแกรม','About Programs','contents','&name=about',1,8,12,'Administrator','2014-07-23 10:21:22'),(10,'ผู้ใช้งานระบบ','User Management','users',NULL,10,1,18,'Administrator','2014-07-31 14:03:52'),(11,'กลุ่มผู้ใช้งาน','User Group Management','user_group',NULL,9,1,16,'Administrator','2014-07-31 14:03:41'),(13,'กลุ่มเมนูระบบ','Menu Group Management','menu_group',NULL,5,1,10,'Administrator','2014-07-31 13:58:52'),(14,'เมนูระบบ','Menu Management','menu',NULL,6,1,10,'Administrator','2014-07-31 13:59:17'),(16,'คู่มือการใช้งาน','User Manual','contents','&name=manual',2,8,7,'Administrator','2014-07-23 10:41:43'),(17,'จัดการสิทธิ์การใช้งาน','Users Authorization','menu_auth',NULL,12,1,11,'Administrator','2014-09-16 08:55:19'),(18,'จัดการหมวดหมู่องค์ความรู้','Knowledge Category','knowledge',NULL,1,9,10,'Administrator','2014-08-08 10:38:48'),(19,'จัดการสิทธิ์กลุ่มองค์ความรู้','Knowledge Authorization','knowledge_auth',NULL,2,9,11,'Administrator','2014-08-08 10:38:56'),(20,'บันทึก/แก้ไข องค์ความรู้','Manage Knowledge','knowledge_manage',NULL,3,9,3,'Administrator','2014-08-08 10:41:18'),(22,'แสดงรายการองค์ความรู้','Knowledge Viewer','knowledge_view',NULL,4,9,9,'Administrator','2014-08-08 10:41:25'),(23,'จัดการประกาศหน้า Portal','DWDM Portal Splash','dwdm_portlet',NULL,1,10,26,'นายปิยะพงษ์ แก้วน่าน','2014-09-09 09:10:05'),(25,'จัดการเนื้อหาเว็บไซต์','Content Management','web_contents',NULL,2,1,17,'Administrator','2014-07-31 13:51:16'),(26,'จัดการโมดูล','modules','modules',NULL,4,1,10,'Administrator','2014-07-31 13:54:13'),(28,'สถิติการใช้งานระบบ Back-Office','Back-Office Web Statistics','web_stats',NULL,1,11,5,'นายปิยะพงษ์ แก้วน่าน','2015-11-24 08:52:10'),(29,'-','-','-',NULL,8,1,3,'Administrator','2014-07-31 14:03:29'),(30,'-','-','-',NULL,3,1,3,'Administrator','2014-07-31 13:58:26'),(31,'-','-','-','-',11,1,3,'Administrator','2014-07-31 14:04:17'),(32,'-','-','-',NULL,2,10,3,'Administrator','2014-08-08 10:41:40'),(33,'รายงานสรุปปัญหา/ติดตามงาน DW/DM','DW/DM Problem Report','dwdm_problems',NULL,4,10,15,'นายปิยะพงษ์ แก้วน่าน','2014-10-02 15:33:51'),(34,'รายการตรวจสอบระบบ DW/DM','DW/DM System Check','dwdm_checklist',NULL,6,10,3,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:17:47'),(35,'จัดการหมวดหมู่','Category','dwdm_cate',NULL,3,10,10,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 10:18:48'),(36,'-','-','-',NULL,5,10,3,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:18:00'),(37,'-','-','-',NULL,7,10,3,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:02'),(38,'สถิติการใช้งานระบบ DW/DM (รายเดือน)','DW/DM Statistics (Monthly)','dwdm_monthly_reports_stats',NULL,8,10,5,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
