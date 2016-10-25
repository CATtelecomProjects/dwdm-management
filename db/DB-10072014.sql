/*
SQLyog Enterprise - MySQL GUI v8.18 
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

/*Table structure for table `tbl_configs` */

DROP TABLE IF EXISTS `tbl_configs`;

CREATE TABLE `tbl_configs` (
  `website_name` varchar(255) NOT NULL,
  `website_theme` varchar(100) default NULL,
  `website_language` varchar(2) default 'th',
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`website_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Configurations Table';

/*Data for the table `tbl_configs` */

insert  into `tbl_configs`(`website_name`,`website_theme`,`website_language`,`update_by`,`update_time`) values ('DW/DM  Back-Office Management','3','th','Administrator','2014-07-10 11:11:53');

/*Table structure for table `tbl_dwdm_portlet` */

DROP TABLE IF EXISTS `tbl_dwdm_portlet`;

CREATE TABLE `tbl_dwdm_portlet` (
  `id` int(5) NOT NULL auto_increment,
  `portlet` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_portlet` */

insert  into `tbl_dwdm_portlet`(`id`,`portlet`,`description`,`update_by`,`update_time`) values (1,'CM','<b>Test CM</b><p></p>','CM Admin','2014-07-10 13:06:30'),(2,'FI','Test FI','','2014-07-10 11:55:16'),(3,'HKR','Test HKR','','2014-07-04 11:30:48'),(4,'NUA','<img src=\"http://bis.cattelecom.com/images/login.png\" align=\"left\"><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Arial, sans-serif; line-height: 14.300000190734863px; font-size: 11px;\">Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</span><p></p><p style=\"color: rgb(0, 0, 0); font-family: Tahoma, Arial; font-size: 12px; margin-left: 30px;\"></p>','Administrator','2014-07-04 11:30:59');

/*Table structure for table `tbl_file_attach` */

DROP TABLE IF EXISTS `tbl_file_attach`;

CREATE TABLE `tbl_file_attach` (
  `id` int(11) NOT NULL auto_increment,
  `file_name` varchar(255) NOT NULL,
  `knowledge_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_file_attach` */

/*Table structure for table `tbl_icons` */

DROP TABLE IF EXISTS `tbl_icons`;

CREATE TABLE `tbl_icons` (
  `icon_id` tinyint(4) NOT NULL auto_increment,
  `icon_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§äÍ¤Í¹';

/*Data for the table `tbl_icons` */

insert  into `tbl_icons`(`icon_id`,`icon_name`) values (1,'icon-home.png'),(2,'icon-config.png'),(3,'icon-keyin.gif'),(4,'icon-profile.gif'),(5,'icon-report.png'),(6,'icon-logout.png'),(7,'icon-manual.png'),(8,'icon-company.png'),(9,'icon-db.png'),(10,'icon-menu.gif'),(11,'icon-permission.png'),(12,'icon-aboutus.gif'),(13,'icon-form.png'),(14,'icon-department.png'),(15,'icon-approved.gif'),(16,'icon-group.png'),(17,'icon-process.gif'),(18,'icon-user.png'),(19,'icons-calendar.gif'),(20,'icon-printer.png'),(21,'icon-view.png'),(22,'icon-download.gif'),(23,'icon-upload.gif');

/*Table structure for table `tbl_knowledge` */

DROP TABLE IF EXISTS `tbl_knowledge`;

CREATE TABLE `tbl_knowledge` (
  `id` int(11) NOT NULL auto_increment,
  `cate_id` int(5) NOT NULL,
  `issue_title` varchar(255) NOT NULL,
  `issue_desc` longtext NOT NULL,
  `publish` varchar(1) NOT NULL default 'Y',
  `views` int(5) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `update_by` varchar(80) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `issue_title` (`issue_title`),
  KEY `cate_id` (`cate_id`),
  CONSTRAINT `FK_tbl_knowledge` FOREIGN KEY (`cate_id`) REFERENCES `tbl_knowledge_cate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge` */

insert  into `tbl_knowledge`(`id`,`cate_id`,`issue_title`,`issue_desc`,`publish`,`views`,`update_time`,`update_by`) values (5,1,'เข้าระบบไม่ได้','เปลี่ยนรหัสผ่านที่ระบบ EIM\r\nhttp://eim.cattelecom.com','N',0,'2014-07-07 16:09:38','Administrator'),(6,3,'เปิด Report แล้วเปิด Popup ไม่ได้','ให้เปิด Availability View','Y',0,'2014-07-07 16:09:09','Administrator'),(7,5,'Test EEEE','eeessS','Y',0,'2014-07-10 12:49:09','Administrator'),(8,2,'เปิดใช้งานผ่าน IE ไม่ได้','ใช้ IE 10 ขึ้นไป','Y',0,'2014-07-08 11:27:31','Adminstrator'),(18,2,'Test 55','TTTTppp','Y',0,'2014-07-10 09:42:42','Adminstrator');

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

insert  into `tbl_knowledge_auth`(`group_id`,`knowledge_cate_id`,`update_by`,`update_time`) values (1,1,'Administrator','2014-07-10 13:06:00'),(1,2,'Administrator','2014-07-10 13:06:00'),(1,3,'Administrator','2014-07-10 13:06:00'),(1,4,'Administrator','2014-07-10 13:06:00'),(1,5,'Administrator','2014-07-10 13:06:00'),(1,6,'Administrator','2014-07-10 13:06:00'),(2,1,'Administrator','2014-07-10 11:24:29'),(2,2,'Administrator','2014-07-10 11:24:29'),(2,3,'Administrator','2014-07-10 11:24:30'),(2,5,'Administrator','2014-07-10 11:24:30'),(2,6,'Administrator','2014-07-10 11:24:30'),(3,1,'Administrator','2014-07-10 11:24:30'),(3,2,'Administrator','2014-07-10 11:24:31'),(3,3,'Administrator','2014-07-10 11:24:31'),(3,5,'Administrator','2014-07-10 11:24:31'),(3,6,'Administrator','2014-07-10 11:24:32');

/*Table structure for table `tbl_knowledge_cate` */

DROP TABLE IF EXISTS `tbl_knowledge_cate`;

CREATE TABLE `tbl_knowledge_cate` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` varchar(1) NOT NULL default 'Y',
  `menu_order` int(2) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_cate` */

insert  into `tbl_knowledge_cate`(`id`,`name`,`description`,`active`,`menu_order`,`update_by`,`update_time`) values (1,'SAS Applications Issue','หมวดเกี่ยวกับการใช้งาน SAS Data Integration , SAS OLAP Server ,SAS Information Maps ,SAS E-Giude ,SAS MS Add-In','Y',3,'Administrator','2014-07-10 12:56:57'),(2,'General Issue','หมวดทั่วไป เช่น ปัญหาทั่วไปเกี่ยวกับการใช้งานต่างๆในระบบ DW/DM','Y',1,'Administrator','2014-07-10 12:56:40'),(3,'SAS Web Application Issue','หมวดเกี่ยวกับการใช้งาน SAS Web Portal , SAS Web Report Studio        ','Y',2,'Administrator','2014-07-10 12:57:09'),(4,'Server Issue','หมวดเกี่ยวกับ Server เช่น ปัญหาเกี่ยวกับด้าน  Hardware , Software        ','Y',5,'Administrator','2014-07-10 12:57:27'),(5,'Authentication Issue','หมวดเกี่ยวกับสิทธิ์การเข้าใช้งาน เช่น ปัญหาการเข้าใช้งานโปรแกรมต่างๆ                 ','Y',4,'Administrator','2014-07-10 13:06:56'),(6,'Other Issue','หมวดอื่นๆ        ','Y',6,'Administrator','2014-07-10 12:57:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_files` */

insert  into `tbl_knowledge_files`(`file_id`,`kn_id`,`file_name`,`update_by`,`update_time`) values (40,18,'2-20140709-information.jpg','Adminstrator','2014-07-09 16:01:38'),(41,18,'2-20140709-S__7077942.jpg','Adminstrator','2014-07-09 16:04:47'),(42,18,'2-20140709-IMG_20140709_095409.jpg','Adminstrator','2014-07-09 16:05:35'),(44,18,'2-20140710-table_export.csv','Adminstrator','2014-07-10 09:34:38');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` tinyint(4) NOT NULL auto_increment,
  `menu_name_th` varchar(70) NOT NULL,
  `menu_name_en` varchar(70) default NULL,
  `menu_file` varchar(50) NOT NULL,
  `menu_order` tinyint(4) default NULL,
  `mgroup_id` tinyint(4) default NULL,
  `icon_id` tinyint(4) default NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`menu_id`),
  KEY `Ref44105` (`icon_id`),
  KEY `Ref554` (`mgroup_id`),
  KEY `icon_id` (`icon_id`),
  CONSTRAINT `FK_tbl_menu` FOREIGN KEY (`icon_id`) REFERENCES `tbl_icons` (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§àÁ¹Ù';

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_name_th`,`menu_name_en`,`menu_file`,`menu_order`,`mgroup_id`,`icon_id`,`update_by`,`update_time`) values (1,'จัดการเว็บไซต์','Website Management','config',1,1,2,'Administrator','2014-07-10 11:14:46'),(3,'เปลี่ยนรหัสผ่าน','Change Password','profile',1,3,4,'Administrator','2014-07-10 11:13:53'),(7,'เกี่ยวกับโปรแกรม','About Programs','about',1,8,12,'Administrator','2014-07-10 11:13:53'),(10,'ผู้ใช้งานระบบ','User Management','users',6,1,18,'Administrator','2014-07-10 11:13:54'),(11,'กลุ่มผู้ใช้งาน','User Group Management','user_group',5,1,16,'Administrator','2014-07-10 11:13:54'),(13,'กลุ่มเมนูระบบ','Menu Group Management','menu_group',2,1,10,'Administrator','2014-07-10 11:13:55'),(14,'เมนูระบบ','Menu Management','menu',3,1,10,'Administrator','2014-07-10 11:13:55'),(16,'คู่มือการใช้งาน','User Manual','manual',2,8,7,'Administrator','2014-07-10 11:13:55'),(17,'สิทธิ์เมนูใช้งาน','Menu Authorization','menu_auth',4,1,11,'Administrator','2014-07-10 11:13:56'),(18,'จัดการหมวดหมู่','Knowledge Category','knowledge',1,9,10,'Administrator','2014-07-10 11:13:56'),(19,'สิทธิ์กลุ่มองค์ความรู้','Knowledge Authorization','knowledge_auth',2,9,11,'Administrator','2014-07-10 11:13:56'),(20,'บันทึก/แก้ไข องค์ความรู้','Manage Knowledge','manage_knowledge',3,9,3,'Administrator','2014-07-10 11:13:57'),(22,'รายการองค์ความรู้','Knowledge Viewer','knowledge_view',5,9,9,'Administrator','2014-07-10 11:39:28'),(23,'จัดการประกาศหน้า Portal','DWDM Portal Splash','dwdm_portlet',1,10,13,'Administrator','2014-07-10 11:13:58');

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

insert  into `tbl_menu_auth`(`group_id`,`menu_id`,`update_by`,`update_time`) values (1,1,'Adminstrator','2014-07-10 09:45:55'),(1,3,'Adminstrator','2014-07-10 09:45:55'),(1,7,'Adminstrator','2014-07-10 09:45:55'),(1,10,'Adminstrator','2014-07-10 09:45:55'),(1,11,'Adminstrator','2014-07-10 09:45:55'),(1,13,'Adminstrator','2014-07-10 09:45:55'),(1,14,'Adminstrator','2014-07-10 09:45:55'),(1,16,'Adminstrator','2014-07-10 09:45:55'),(1,17,'Adminstrator','2014-07-10 09:45:55'),(1,18,'Adminstrator','2014-07-10 09:45:55'),(1,19,'Adminstrator','2014-07-10 09:45:55'),(1,20,'Adminstrator','2014-07-10 09:45:55'),(1,22,'Adminstrator','2014-07-10 09:45:55'),(1,23,'Adminstrator','2014-07-10 09:45:55'),(2,7,'Adminstrator','2014-07-08 10:21:20'),(2,16,'Adminstrator','2014-07-08 10:21:20'),(2,22,'Adminstrator','2014-07-08 10:21:21'),(3,7,'Adminstrator','2014-07-08 11:09:46'),(3,16,'Adminstrator','2014-07-08 11:09:46'),(3,20,'Adminstrator','2014-07-08 11:09:46'),(3,23,'Adminstrator','2014-07-08 11:09:46');

/*Table structure for table `tbl_menu_group` */

DROP TABLE IF EXISTS `tbl_menu_group`;

CREATE TABLE `tbl_menu_group` (
  `mgroup_id` tinyint(4) NOT NULL auto_increment,
  `menu_group_th` varchar(50) NOT NULL,
  `menu_group_en` varchar(50) default NULL,
  `menu_path` varchar(50) NOT NULL,
  `menu_order` tinyint(4) default NULL,
  `icon_id` tinyint(4) default '3',
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`mgroup_id`),
  KEY `Ref44106` (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁàÁ¹Ù';

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`mgroup_id`,`menu_group_th`,`menu_group_en`,`menu_path`,`menu_order`,`icon_id`,`update_by`,`update_time`) values (1,'ผู้ดูแลระบบ','Administrator','Admin',1,2,'','2014-07-10 11:13:10'),(3,'ข้อมูลส่วนตัว','Profiles','Master',2,4,'Administrator','2014-07-10 11:13:05'),(8,'คู่มือการใช้งาน','User Manual','Manual',7,7,'Administrator','2014-07-10 11:13:03'),(9,'การบริหารจัดองค์ความรู้','Knowledge Management','Main',3,9,'Administrator','2014-07-10 11:38:09'),(10,'DW/DM','DW/DM','DWDM',4,13,'Administrator','2014-07-10 09:55:31');

/*Table structure for table `tbl_user_auth` */

DROP TABLE IF EXISTS `tbl_user_auth`;

CREATE TABLE `tbl_user_auth` (
  `user_id` int(11) NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`group_id`,`user_id`),
  KEY `Ref831` (`group_id`),
  KEY `Ref2032` (`user_id`),
  CONSTRAINT `FK_tbl_user_auth` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_user_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§ÊÔ·¸Ôì¼Ùéãªé§Ò¹ÃÐºº';

/*Data for the table `tbl_user_auth` */

insert  into `tbl_user_auth`(`user_id`,`group_id`,`update_by`,`update_time`) values (7,1,'Adminstrator','2014-07-08 11:17:59'),(10,1,'Adminstrator','2014-07-08 11:18:44'),(2,3,'Adminstrator','2014-07-08 11:17:35');

/*Table structure for table `tbl_user_group` */

DROP TABLE IF EXISTS `tbl_user_group`;

CREATE TABLE `tbl_user_group` (
  `group_id` tinyint(4) NOT NULL auto_increment,
  `group_name` varchar(50) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁ¼Ùéãªé§Ò¹';

/*Data for the table `tbl_user_group` */

insert  into `tbl_user_group`(`group_id`,`group_name`,`update_by`,`update_time`) values (1,'Administrator Groups','Adminstrator','2014-07-08 10:23:39'),(2,'Viewer Users Group','Adminstrator','2014-07-08 10:23:36'),(3,'Operation Group','Adminstrator','2014-07-08 10:23:36');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `telephone` varchar(20) default NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`),
  KEY `username` (`username`),
  KEY `first_name` (`first_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¼Ùéãªé§Ò¹';

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`password`,`first_name`,`last_name`,`email`,`telephone`,`update_by`,`update_time`) values (2,'catadmin','MTIzNDU2','CAT DW/DM Team','-','piyapong.k@cattelecom.com','-','Adminstrator','2014-07-08 11:16:37'),(7,'admin','MTIzNDU2','Administrator','Administrator','piyapong.k@cattelecom.com','02-9999999','Adminstrator','2014-07-08 11:17:59'),(10,'piyapong','OTk5OTk5','นายปิยะพงษ์ แก้วน่าน',NULL,NULL,NULL,'Adminstrator','2014-07-08 11:18:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
