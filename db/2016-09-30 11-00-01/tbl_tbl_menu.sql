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

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `menu_name_th` varchar(70) NOT NULL,
  `menu_name_en` varchar(70) DEFAULT NULL,
  `menu_desc` text,
  `menu_file` varchar(50) NOT NULL,
  `menu_param` varchar(100) DEFAULT NULL,
  `menu_order` tinyint(4) DEFAULT NULL,
  `mgroup_id` tinyint(4) DEFAULT NULL,
  `icon_id` tinyint(4) DEFAULT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`),
  KEY `Ref44105` (`icon_id`),
  KEY `Ref554` (`mgroup_id`),
  KEY `icon_id` (`icon_id`),
  CONSTRAINT `FK_tbl_menu` FOREIGN KEY (`icon_id`) REFERENCES `tbl_icons` (`icon_id`),
  CONSTRAINT `FK_tbl_menu_fk` FOREIGN KEY (`mgroup_id`) REFERENCES `tbl_menu_group` (`mgroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§àÁ¹Ù';

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_name_th`,`menu_name_en`,`menu_desc`,`menu_file`,`menu_param`,`menu_order`,`mgroup_id`,`icon_id`,`update_by`,`update_time`) values (1,'จัดการเว็บไซต์','Website Management','จัดการหน้าหลักของเว็บไซต์ เช่น ชื่อเว็บไซต์, เปลี่ยนธีม ฯ','config',NULL,1,1,2,'Administrator','2016-04-07 13:22:35'),(3,'เปลี่ยนรหัสผ่าน','Change Password','จัดการเปลี่ยนรหัสผ่านในการเข้าใช้งานระบบ','profile',NULL,1,3,4,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 15:01:56'),(7,'เกี่ยวกับโปรแกรม','About Programs','รายละเอียดต่างๆ เกี่ยวกับโปรแกรม','contents','&name=about',1,8,12,'Administrator','2016-04-07 14:53:07'),(10,'ผู้ใช้งานระบบ','User Management','จัดการผู้ใช้งานระบบ เพิ่ม, ลบ, แก้ไข ,กำหนดสิทธิ์ต่างๆ','users',NULL,10,1,18,'Administrator','2016-04-07 14:19:18'),(11,'กลุ่มผู้ใช้งาน','User Group Management','จัดการกลุ่มผู้ใช้งานระบบ','user_group',NULL,9,1,16,'Administrator','2016-04-07 14:19:35'),(13,'กลุ่มเมนูระบบ','Menu Group Management','จัดการกลุ่มเมนูระบบ','menu_group',NULL,5,1,10,'Administrator','2016-04-07 14:20:12'),(14,'เมนูระบบ','Menu Management','จัดการเมนูการใช้งานระบบ','menu',NULL,6,1,10,'Administrator','2016-04-07 14:20:23'),(16,'คู่มือการใช้งาน','User Manual','คู่มือการใช้งานระบบ','contents','&name=manual',2,8,7,'Administrator','2016-04-07 14:20:34'),(17,'จัดการสิทธิ์การใช้งาน','Users Authorization','จัดการสิทธิ์เข้าใช้งานระบบ ตามกลุ่มผู้ใช้งาน','menu_auth',NULL,12,1,11,'Administrator','2016-04-07 14:20:57'),(18,'จัดการหมวดหมู่องค์ความรู้','Knowledge Category','จัดการหมวดหมู่องค์ความรู้ เพิ่่ม, ลบ, แก้ไข','knowledge',NULL,1,9,10,'Administrator','2016-04-07 14:23:12'),(19,'จัดการสิทธิ์กลุ่มองค์ความรู้','Knowledge Authorization','จัดการสิทธิ์กลุ่มองค์ความรู้ โดยกำหนดตามกลุ่มผู้ใช้งานระบบ','knowledge_auth',NULL,2,9,11,'Administrator','2016-04-07 14:24:20'),(20,'บันทึก/แก้ไข องค์ความรู้','Manage Knowledge','บันทึก/แก้ไข เพื่อเก็บเป็นองค์ความรู้ต่างๆ ตามหมวดหมู่ เพื่อให้ง่ายต่อการสืบค้นและสามารถนำความรู้ที่ได้ดังกล่าว ไปแก้ปัญหาที่เกิดขึ้นได้อย่างรวดเร็วและถูกต้อง','knowledge_manage',NULL,3,9,3,'Administrator','2016-04-07 14:25:49'),(22,'แสดงรายการองค์ความรู้','Knowledge Viewer','สามารถค้นหาองค์ความรู้ต่างๆ ตามหมวดหมู่ เพื่อให้ง่ายต่อการสืบค้นและสามารถนำความรู้ที่ได้ดังกล่าว ไปแก้ปัญหาที่เกิดขึ้นได้อย่างรวดเร็วและถูกต้อง','knowledge_view',NULL,4,9,9,'Administrator','2016-04-07 14:51:36'),(23,'จัดการประกาศหน้า Portal','DWDM Portal Splash','จัดการประกาศหน้า Portal ทำการบันทึกข้อมูลเนื้อหาที่ต้องการประกาศแจ้งข่าวให้ทางผู้ใช้งานระบบ DWDM ทราบ โดยจะนำ URL ไปเพิ่มใน Portlet ของ SAS Web Portal','dwdm_portlet',NULL,1,10,26,'นายปิยะพงษ์ แก้วน่าน','2016-04-18 10:17:05'),(25,'จัดการเนื้อหาเว็บไซต์','Content Management','จัดการเนื้อหาเว็บไซต์ เช่น เนื้อหาแบบกำหนดเอง หน้าจอคู่มือผู้ใช้งาน  , เกี่ยวกับโปรแกรม','web_contents',NULL,2,1,17,'Administrator','2016-04-07 14:22:16'),(26,'จัดการโมดูล','modules','จัดการโมดูลหลักของเว็บไซต์ โดยสามารถเพิ่ม, ลบ, แก้ไข โมดูลใหม่ๆ ในเว็บไซต์ เพื่อให้ง่ายต่อการเรียกใช้งานและแก้ไขโปรแกรม','modules',NULL,4,1,10,'Administrator','2016-04-07 14:28:56'),(28,'สถิติการใช้งานระบบ Back-Office','Back-Office Web Statistics','สถิติการใช้งานระบบ Back-Office สามารถเรียกดูสถิติการใช้งานต่างๆ ของเว็บไซต์ได้ เช่น สถิติตามรายวัน, สถิติตามตามผู้ใช้งาน, สถิติตามการใช้งานโปรแกรม เป็นต้น','web_stats',NULL,1,11,5,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 14:52:44'),(29,'-','-',NULL,'-',NULL,8,1,3,'Administrator','2014-07-31 14:03:29'),(30,'-','-',NULL,'-',NULL,3,1,3,'Administrator','2014-07-31 13:58:26'),(31,'-','-',NULL,'-','-',11,1,3,'Administrator','2014-07-31 14:04:17'),(32,'-','-',NULL,'-',NULL,2,10,3,'Administrator','2014-08-08 10:41:40'),(33,'รายงานสรุปปัญหา/ติดตามงาน DW/DM','DW/DM Problem Report','รายงานสรุปปัญหา/ติดตามงาน ปัญหาต่างๆ ของระบบ DW/DM','dwdm_problems',NULL,4,10,15,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 14:49:45'),(34,'รายการตรวจสอบระบบ DW/DM','DW/DM System Check','รายการตรวจสอบระบบ DW/DM เป็นโปรแกรมในการตรวจสอบการใช้งานทางด้าน Software ต่างๆ ของระบบฯ เช่น การทำงานของ Web Portal , Web Report, SAS Data Integration\r\nส่วนทางด้วย Hardware จะเป็นการตรวจสอบพื้นที่การใช้งานของ Server CATEDI1,CATEBI1 ใน Path ต่างๆที่สำคัญในการทำงานของระบบ','dwdm_checklist',NULL,6,10,3,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 14:33:17'),(35,'จัดการหมวดหมู่การติดตามงาน DW/DM','Category Problem Report','จัดการหมวดหมู่การติดตามงาน DW/DM','dwdm_cate',NULL,3,10,10,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 14:36:20'),(36,'-','-',NULL,'-',NULL,5,10,3,'นายปิยะพงษ์ แก้วน่าน','2014-09-24 11:18:00'),(37,'-','-',NULL,'-',NULL,7,10,3,'นายปิยะพงษ์ แก้วน่าน','2015-11-23 14:19:02'),(38,'สถิติการใช้งานระบบ DW/DM (รายเดือน)','DW/DM Statistics (Monthly)','สถิติการใช้งานระบบ DW/DM (รายเดือน) แสดงจำนวนการเข้าใช้งานระบบฯ ผ่านทาง Web, Tools SAS','dwdm_monthly_reports_stats',NULL,8,10,30,'นายปิยะพงษ์ แก้วน่าน','2016-04-07 14:50:20'),(39,'-','-',NULL,'-',NULL,5,12,3,'นายปิยะพงษ์ แก้วน่าน','2016-02-19 12:14:40'),(40,'จัดการโมดูล (SM)','Modules (SM)','จัดการโมดูลต่างๆ ของระบบ DW/DM เช่น NUA,CM,FI,HKR','dwdm_sm_module',NULL,2,12,17,'Administrator','2016-05-27 13:42:54'),(41,'จัดการโมดูลย่อย (SM)','Sub-Module (SM)','จัดการ เพิ่ม , ลบ , แก้ไข โมดูลย่อยต่างๆ','dwdm_sm_sub_module',NULL,3,12,17,'Administrator','2016-05-27 13:43:00'),(42,'จัดการกลุ่มรายงาน (SM)','Report Group (SM)','จัดการเพิ่ม, ลบ , แก้ไข กลุ่มรายงาน','dwdm_sm_report_group',NULL,4,12,10,'Administrator','2016-05-27 13:43:16'),(43,'จัดการรายงาน (SM)','Reports (SM)','จัดการ เพิ่ม, ลบ, แก้ไข รายงานต่างๆ ที่มีอยู่ในระบบตามโมดูล','dwdm_sm_report',NULL,6,12,10,'Administrator','2016-05-27 13:43:34'),(44,'กำหนดสิทธิ์ตามกลุ่มรายงาน (SM)','Mapping Report Group Authorize (SM)','กำหนดสิทธิ์การใช้งานโดยแยกตามกลุ่มรายงาน','dwdm_sm_mapping_report',NULL,8,12,11,'Administrator','2016-08-26 15:10:45'),(45,'กำหนดสิทธิ์ตามผู้ใช้งาน (SM)','Mapping User Authorize (SM)','กำหนดสิทธิ์การใช้งานโดยแยกตามสิทธิ์การใช้งานของ User รายบุคคล','dwdm_sm_mapping_user',NULL,9,12,11,'Administrator','2016-08-26 15:11:00'),(46,'กำหนดสิทธิ์ตามตำแหน่งงาน (SM)','Mapping Position Autorize (SM)','กำหนดสิทธิ์การใช้งานโดยแยกตามสิทธิ์การใช้งานของ User โดยเก็บสิทธิ์การใช้งานเริ่มจาก ผส. จนถึง กจญ. (การกำหนดสิทธิ์แบบอัตโนมัติจะเริ่มจาก ชฝ. ขึ้นไป)','dwdm_sm_mapping_position',NULL,10,12,11,'Administrator','2016-08-26 15:11:09'),(48,'ตรวจสอบสิทธิ์ใช้งาน (SM)','User Authorize View (SM)','สามาถค้นหา การกำหนดสิทธิ์ของ User ในระบบ DW/DM โดยสามารถค้นหาตาม รหัสพนักงาน, ชื่อ-สกุล , ชื่อหน่วยงาน, ชื่อย่อหน่วยงาน','dwdm_sm_search',NULL,13,12,4,'Administrator','2016-09-28 14:06:57'),(49,'Security Matrix Dashboard (SM)','Security Matrix Dashboard (SM)','แสดงรายละเอียด สถิติต่างๆ ในรูปแบบ Dashboard','dwdm_sm_dashboard',NULL,1,12,29,'Administrator','2016-09-28 10:20:53'),(50,'ค้นหารายงาน (SM)','Search Report (SM)','ค้นหารายงานที่มีอยู่ในระบบ DW/DM ','dwdm_sm_search_report',NULL,15,12,21,'Administrator','2016-09-28 14:05:34'),(51,'-','-',NULL,'-',NULL,11,12,3,'Administrator','2016-08-26 15:11:15'),(52,'จัดการไฟล์ที่เข้าระบบ DW/DM (SM)','Source File DW/DM (SM)','จัดการไฟล์ที่เข้าระบบ DW/DM เช่น โมดูล,เจ้าหน้าที่ดูแลระบบ,ความถี่ในการส่ง,เจ้าของไฟล์ต้นทาง','dwdm_sm_source_files',NULL,7,12,10,'Administrator','2016-08-26 15:10:13'),(53,'นิยามคำศัพท์ในระบบ (SM)','DW/DM Terminology (SM)','นิยามคำศัพท์ในระบบ DW/DM ','dwdm_sm_terminology',NULL,14,12,7,'Administrator','2016-09-29 09:05:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
