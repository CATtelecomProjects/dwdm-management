/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.6.16 : Database - dwdm_db
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
  `website_theme` varchar(100) DEFAULT NULL,
  `website_language` varchar(2) DEFAULT 'th',
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`website_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Configurations Table';

/*Data for the table `tbl_configs` */

insert  into `tbl_configs`(`website_name`,`website_theme`,`website_language`,`update_by`,`update_time`) values ('DW/DM  Back-Office Management','3','th','Administrator','2014-08-01 10:32:47');

/*Table structure for table `tbl_contents` */

DROP TABLE IF EXISTS `tbl_contents`;

CREATE TABLE `tbl_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_name` varchar(50) NOT NULL,
  `content_desc` longtext NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`content_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contents` */

insert  into `tbl_contents`(`id`,`content_name`,`content_desc`,`update_by`,`update_time`) values (1,'manual','<ul><li><a href=\"http://www.google.co.th\">User Manual 1</a></li><li><a href=\"http://www.google.co.th\">User Manual 2</a></li><li><a href=\"http://www.google.co.th\">User Manual 3</a></li></ul><p></p><p></p>','Administrator','2014-07-31 09:59:21'),(2,'about','<b>โปรแกรมนี้พัฒนาเพื่อใช้งาน Support การทำงานของระบบ Data Warehouse/Data Mining</b><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p></p><ol><li>Knowledge Management<br></li><li><span style=\"color: rgb(0, 0, 0);\">โปรแกรมบันทึกข้อความประกาศใน Portlet ของ Web Portal</span><br></li></ol><p></p></blockquote><p></p><p></p><p></p><p></p>','Administrator','2014-07-31 11:42:45');

/*Table structure for table `tbl_dwdm_portlet` */

DROP TABLE IF EXISTS `tbl_dwdm_portlet`;

CREATE TABLE `tbl_dwdm_portlet` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `portlet` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`portlet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_portlet` */

insert  into `tbl_dwdm_portlet`(`id`,`portlet`,`description`,`update_by`,`update_time`) values (1,'CM','<b>Test CM</b><p></p>','CM Admin','2014-07-29 16:13:14'),(2,'FI','Test FI','','2014-07-10 11:55:16'),(3,'HKR','Test HKR','','2014-07-04 11:30:48'),(4,'NUA','<img src=\"http://bis.cattelecom.com/images/login.png\" align=\"left\"><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Arial, sans-serif; line-height: 14.300000190734863px; font-size: 11px;\">Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</span><p></p><p style=\"color: rgb(0, 0, 0); font-family: Tahoma, Arial; font-size: 12px; margin-left: 30px;\"></p>','Administrator','2014-07-04 11:30:59');

/*Table structure for table `tbl_icons` */

DROP TABLE IF EXISTS `tbl_icons`;

CREATE TABLE `tbl_icons` (
  `icon_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `icon_name` varchar(50) NOT NULL,
  PRIMARY KEY (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§äÍ¤Í¹';

/*Data for the table `tbl_icons` */

insert  into `tbl_icons`(`icon_id`,`icon_name`) values (1,'icon-home.png'),(2,'icon-config.png'),(3,'icon-keyin.gif'),(4,'icon-profile.gif'),(5,'icon-report.png'),(6,'icon-logout.png'),(7,'icon-manual.png'),(8,'icon-company.png'),(9,'icon-db.png'),(10,'icon-menu.gif'),(11,'icon-permission.png'),(12,'icon-aboutus.gif'),(13,'icon-form.png'),(14,'icon-department.png'),(15,'icon-approved.gif'),(16,'icon-group.png'),(17,'icon-process.gif'),(18,'icon-user.png'),(19,'icons-calendar.gif'),(20,'icon-printer.png'),(21,'icon-view.png'),(22,'icon-download.gif'),(23,'icon-upload.gif'),(24,'icon-courses.png'),(25,'icon-map.png'),(26,'icon-comments.png'),(27,'icon-speaker.png');

/*Table structure for table `tbl_knowledge` */

DROP TABLE IF EXISTS `tbl_knowledge`;

CREATE TABLE `tbl_knowledge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(5) NOT NULL,
  `issue_title` varchar(500) NOT NULL,
  `issue_desc` longtext NOT NULL,
  `publish` varchar(1) NOT NULL DEFAULT 'Y',
  `views` int(5) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_title` (`issue_title`(255)),
  KEY `cate_id` (`cate_id`),
  CONSTRAINT `FK_tbl_knowledge` FOREIGN KEY (`cate_id`) REFERENCES `tbl_knowledge_cate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge` */

insert  into `tbl_knowledge`(`id`,`cate_id`,`issue_title`,`issue_desc`,`publish`,`views`,`update_time`,`update_by`) values (5,1,'เข้าระบบไม่ได้','เปลี่ยนรหัสผ่านที่ระบบ EIM\r\nhttp://eim.cattelecom.com','Y',0,'2014-07-16 14:21:02','Administrator'),(6,3,'เปิด Report แล้วเปิด Popup ไม่ได้','ให้เปิด Availability View','Y',0,'2014-07-16 14:21:02','Administrator'),(8,2,'เปิดใช้งานผ่าน IE ไม่ได้','<b>ใช้ IE 10 ขึ้นไป</b>','Y',0,'2014-07-31 10:12:02','Administrator'),(9,1,'Installation Note 44788: The error \"System.Xml.XmlException: Root element is missing\" might occur when Microsoft Office is invoked','<h2 style=\"font-size: 1.2em; margin-top: 1em; margin-bottom: 0.5em; color: rgb(75, 75, 75); font-family: Arial, Helvetica, Verdana, sans-serif; line-height: 16.899999618530273px;\">Installation Note <i>44788: </i>The error \"System.Xml.XmlException: Root element is missing\" might occur when Microsoft Office is invoked</h2><table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\"font-size: small; line-height: 1.25em; font-family: Arial, Helvetica, Verdana, sans-serif; padding: 5px 0px;\"><tbody style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><tr style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"Details\" src=\"http://support.sas.com/images/samples/details_sel.gif\" id=\"tabnav_details\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"About\" src=\"http://support.sas.com/images/samples/about.gif\" id=\"tabnav_about\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"Rate It\" src=\"http://support.sas.com/images/samples/rateit.gif\" id=\"tabnav_rateit\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td width=\"100%\" height=\"3\" valign=\"bottom\"><img width=\"100%\" alt=\"\" height=\"3\" src=\"http://support.sas.com/images/samples/gray1.gif\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></td></tr></tbody></table><p id=\"tab_details\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: small; line-height: 16.899999618530273px; padding: 10px 0px 0px 30px;\">The following error message might be displayed when you invoke Microsoft Office with SAS Add-In for Microsoft Office installed.<p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><img src=\"http://support.sas.com/kb/44/addl/fusion_44788_1_rootelement1.jpg\" alt=\"image label\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\">Clicking the <b>Details</b> button shows additional information, as shown below.</p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><img src=\"http://support.sas.com/kb/44/addl/fusion_44788_3_rootelement3.jpg\" alt=\"image label\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\">The error might occur because of a corrupt AMOOptions.xml file. In that case, renaming the AMOOptions.xml file should correct the problem.</p><ol><li style=\"line-height: 20px;\">Close Microsoft Office.</li><li style=\"line-height: 20px;\">Browse to the following location depending on your operating system and rename the AMOOptions.xml file to AMOOptions_old.xml.<ul style=\"margin: 0px 0px 20px; padding: 0px 0px 0px 25px;\"><li>Windows XP path to AMOOptions.xml: <br><span style=\"font-family: monospace;\"><b>C:\\Documents and Settings\\<userid>\\Application Data\\SAS\\Add-InForMicrosoftOffice\\4.3</b></span></li><li>Windows 7 path to AMOOptions.xml: <br><span style=\"font-family: monospace;\"><b>C:\\Users\\<userid>\\AppData\\Roaming\\SAS\\Add-InForMicrosoftOffice\\4.3</b></span></li></ul></li></ol><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><b>Note:</b> The paths shown above use the default Windows profile path for the respective operating system. Your Windows profile path might be different. If your profile path is other than the default, open <b>My Computer</b> and enter <b>%appdata%</b> in the address bar to determine what your Windows profile path is. <br><br></p><h4 style=\"margin-top: 1em; margin-bottom: 0px; padding: 0px 0px 1px; border: 0px; font-size: 1em; line-height: 1.25em; font-family: inherit; color: rgb(0, 0, 0);\">Operating System and Release Information</h4><table cellpadding=\"5\" border=\"1\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; padding: 5px 0px;\"><tbody style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><tr class=\"product_header\" style=\"font-weight: bold; font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center; background-color: rgb(204, 204, 204);\"><td rowspan=\"2\">Product Family</td><td rowspan=\"2\">Product</td><td rowspan=\"2\">System</td><td colspan=\"2\" style=\"background-color: rgb(236, 236, 236);\">Product Release</td><td colspan=\"2\" style=\"background-color: rgb(236, 236, 236);\">SAS Release</td></tr><tr class=\"product_header\" style=\"font-weight: bold; font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center; background-color: rgb(204, 204, 204);\"><td>Reported</td><td>Fixed*</td><td>Reported</td><td>Fixed*</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td valign=\"top\" rowspan=\"9\">SAS System</td><td valign=\"top\" rowspan=\"9\">SAS Add-in for Microsoft Office</td><td>Microsoft® Windows® for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Datacenter Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Enterprise Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Standard Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2008 for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows XP Professional</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Windows Vista</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Windows Vista for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr></tbody></table><span class=\"status\" style=\"color: rgb(0, 0, 0); font-weight: bold;\"><b>*</b></span><span class=\"newstext\" style=\"font-size: 10px; line-height: normal; color: rgb(0, 0, 0); margin-top: 0px; padding-top: 0px;\"> For software releases that are not yet generally available, the Fixed Release is the software release in which the problem is planned to be fixed.</span></p>','Y',0,'2014-07-16 14:23:41','Administrator');

/*Table structure for table `tbl_knowledge_auth` */

DROP TABLE IF EXISTS `tbl_knowledge_auth`;

CREATE TABLE `tbl_knowledge_auth` (
  `group_id` tinyint(4) NOT NULL,
  `knowledge_cate_id` int(11) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`,`knowledge_cate_id`),
  KEY `FK_tbl_knowledge_auth` (`knowledge_cate_id`),
  CONSTRAINT `FK_tbl_knowledge_auth` FOREIGN KEY (`knowledge_cate_id`) REFERENCES `tbl_knowledge_cate` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_knowledge_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_auth` */

insert  into `tbl_knowledge_auth`(`group_id`,`knowledge_cate_id`,`update_by`,`update_time`) values (1,1,'Administrator','2014-07-10 13:06:00'),(1,2,'Administrator','2014-07-10 13:06:00'),(1,3,'Administrator','2014-07-10 13:06:00'),(1,4,'Administrator','2014-07-10 13:06:00'),(1,5,'Administrator','2014-07-10 13:06:00'),(1,6,'Administrator','2014-07-10 13:06:00'),(2,1,'Administrator','2014-07-10 11:24:29'),(2,2,'Administrator','2014-07-10 11:24:29'),(2,3,'Administrator','2014-07-10 11:24:30'),(2,5,'Administrator','2014-07-10 11:24:30'),(2,6,'Administrator','2014-07-10 11:24:30'),(3,1,'Administrator','2014-07-10 11:24:30'),(3,2,'Administrator','2014-07-10 11:24:31'),(3,3,'Administrator','2014-07-10 11:24:31'),(3,5,'Administrator','2014-07-10 11:24:31'),(3,6,'Administrator','2014-07-10 11:24:32');

/*Table structure for table `tbl_knowledge_cate` */

DROP TABLE IF EXISTS `tbl_knowledge_cate`;

CREATE TABLE `tbl_knowledge_cate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `menu_order` int(2) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_cate` */

insert  into `tbl_knowledge_cate`(`id`,`name`,`description`,`active`,`menu_order`,`update_by`,`update_time`) values (1,'SAS Applications Issue','หมวดเกี่ยวกับการใช้งาน SAS Data Integration , SAS OLAP Server ,SAS Information Maps ,SAS E-Giude ,SAS MS Add-In','Y',3,'Administrator','2014-07-10 12:56:57'),(2,'General Issue','หมวดทั่วไป เช่น ปัญหาทั่วไปเกี่ยวกับการใช้งานต่างๆในระบบ DW/DM','Y',1,'Administrator','2014-07-29 11:36:01'),(3,'SAS Web Application Issue','หมวดเกี่ยวกับการใช้งาน SAS Web Portal , SAS Web Report Studio        ','Y',2,'Administrator','2014-07-10 12:57:09'),(4,'Server Issue','หมวดเกี่ยวกับ Server เช่น ปัญหาเกี่ยวกับด้าน  Hardware , Software        ','Y',5,'Administrator','2014-07-10 12:57:27'),(5,'Authentication Issue','หมวดเกี่ยวกับสิทธิ์การเข้าใช้งาน เช่น ปัญหาการเข้าใช้งานโปรแกรมต่างๆ                 ','Y',4,'Administrator','2014-07-10 13:06:56'),(6,'Other Issue','หมวดอื่นๆ        ','Y',6,'Administrator','2014-07-10 12:57:32');

/*Table structure for table `tbl_knowledge_files` */

DROP TABLE IF EXISTS `tbl_knowledge_files`;

CREATE TABLE `tbl_knowledge_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `kn_id` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`),
  KEY `FK_tbl_knowledge_files` (`kn_id`),
  KEY `file_name` (`file_name`),
  CONSTRAINT `FK_tbl_knowledge_files` FOREIGN KEY (`kn_id`) REFERENCES `tbl_knowledge` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_files` */

insert  into `tbl_knowledge_files`(`file_id`,`kn_id`,`file_name`,`update_by`,`update_time`) values (46,8,'2-20140716-IMG_20140709_095409.jpg','Administrator','2014-07-16 13:56:47'),(47,8,'2-20140716-S__7077942.jpg','Administrator','2014-07-16 13:56:52'),(48,8,'2-20140716-information.jpg','Administrator','2014-07-16 13:58:53'),(49,9,'1-20140716-ORG.csv','Administrator','2014-07-16 14:20:52'),(50,9,'1-20140716-EMP.csv','Administrator','2014-07-16 14:20:55'),(51,9,'1-20140716-2014-06-11 122036.JPG','Administrator','2014-07-16 14:21:02');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `menu_name_th` varchar(70) NOT NULL,
  `menu_name_en` varchar(70) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§àÁ¹Ù';

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_name_th`,`menu_name_en`,`menu_file`,`menu_param`,`menu_order`,`mgroup_id`,`icon_id`,`update_by`,`update_time`) values (1,'จัดการเว็บไซต์','Website Management','config',NULL,1,1,2,'Administrator','2014-07-29 10:59:56'),(3,'เปลี่ยนรหัสผ่าน','Change Password','profile',NULL,1,3,4,'Administrator','2014-07-28 12:22:47'),(7,'เกี่ยวกับโปรแกรม','About Programs','contents','&name=about',1,8,12,'Administrator','2014-07-23 10:21:22'),(10,'ผู้ใช้งานระบบ','User Management','users',NULL,10,1,18,'Administrator','2014-07-31 14:03:52'),(11,'กลุ่มผู้ใช้งาน','User Group Management','user_group',NULL,9,1,16,'Administrator','2014-07-31 14:03:41'),(13,'กลุ่มเมนูระบบ','Menu Group Management','menu_group',NULL,5,1,10,'Administrator','2014-07-31 13:58:52'),(14,'เมนูระบบ','Menu Management','menu',NULL,6,1,10,'Administrator','2014-07-31 13:59:17'),(16,'คู่มือการใช้งาน','User Manual','contents','&name=manual',2,8,7,'Administrator','2014-07-23 10:41:43'),(17,'สิทธิ์เมนูใช้งาน','Menu Authorization','menu_auth',NULL,7,1,11,'Administrator','2014-07-31 14:03:21'),(18,'จัดการหมวดหมู่','Knowledge Category','knowledge',NULL,1,9,10,'Administrator','2014-07-10 11:13:56'),(19,'สิทธิ์กลุ่มองค์ความรู้','Knowledge Authorization','knowledge_auth',NULL,2,9,11,'Administrator','2014-07-10 11:13:56'),(20,'บันทึก/แก้ไข องค์ความรู้','Manage Knowledge','knowledge_manage',NULL,3,9,3,'Administrator','2014-07-31 10:10:48'),(22,'แสดงรายการองค์ความรู้','Knowledge Viewer','knowledge_view',NULL,5,9,9,'Administrator','2014-07-16 12:35:30'),(23,'จัดการประกาศหน้า Portal','DWDM Portal Splash','dwdm_portlet',NULL,1,10,13,'Administrator','2014-07-10 11:13:58'),(25,'จัดการเนื้อหาเว็บไซต์','Content Management','web_contents',NULL,2,1,17,'Administrator','2014-07-31 13:51:16'),(26,'จัดการโมดูล','modules','modules',NULL,4,1,10,'Administrator','2014-07-31 13:54:13'),(28,'สถิติการใช้งาน','Web Statistics','web_stats',NULL,12,1,5,'Administrator','2014-07-31 14:04:04'),(29,'-','-','-',NULL,8,1,3,'Administrator','2014-07-31 14:03:29'),(30,'-','-','-',NULL,3,1,3,'Administrator','2014-07-31 13:58:26'),(31,'-','-','-','-',11,1,3,'Administrator','2014-07-31 14:04:17');

/*Table structure for table `tbl_menu_auth` */

DROP TABLE IF EXISTS `tbl_menu_auth`;

CREATE TABLE `tbl_menu_auth` (
  `group_id` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`,`menu_id`),
  KEY `Ref337` (`menu_id`),
  KEY `Ref838` (`group_id`),
  CONSTRAINT `FK_tbl_menu_auth` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_menu_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§ÊÔ·¸Ôì¡ÒÃà¢éÒ¶Ö§àÁ¹Ù';

/*Data for the table `tbl_menu_auth` */

insert  into `tbl_menu_auth`(`group_id`,`menu_id`,`update_by`,`update_time`) values (1,1,'Administrator','2014-07-31 14:04:49'),(1,3,'Administrator','2014-07-31 14:04:49'),(1,7,'Administrator','2014-07-31 14:04:49'),(1,10,'Administrator','2014-07-31 14:04:49'),(1,11,'Administrator','2014-07-31 14:04:49'),(1,13,'Administrator','2014-07-31 14:04:49'),(1,14,'Administrator','2014-07-31 14:04:49'),(1,16,'Administrator','2014-07-31 14:04:49'),(1,17,'Administrator','2014-07-31 14:04:49'),(1,18,'Administrator','2014-07-31 14:04:49'),(1,19,'Administrator','2014-07-31 14:04:49'),(1,20,'Administrator','2014-07-31 14:04:49'),(1,22,'Administrator','2014-07-31 14:04:49'),(1,23,'Administrator','2014-07-31 14:04:49'),(1,25,'Administrator','2014-07-31 14:04:49'),(1,26,'Administrator','2014-07-31 14:04:49'),(1,28,'Administrator','2014-07-31 14:04:49'),(1,29,'Administrator','2014-07-31 14:04:49'),(1,30,'Administrator','2014-07-31 14:04:49'),(1,31,'Administrator','2014-07-31 14:04:49'),(2,7,'Adminstrator','2014-07-08 10:21:20'),(2,16,'Adminstrator','2014-07-08 10:21:20'),(2,22,'Adminstrator','2014-07-08 10:21:21'),(3,7,'Administrator','2014-07-16 14:35:47'),(3,16,'Administrator','2014-07-16 14:35:47'),(3,20,'Administrator','2014-07-16 14:35:47'),(3,22,'Administrator','2014-07-16 14:35:47'),(3,23,'Administrator','2014-07-16 14:35:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁàÁ¹Ù';

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`mgroup_id`,`menu_group_th`,`menu_group_en`,`modules_id`,`menu_order`,`icon_id`,`update_by`,`update_time`) values (1,'ผู้ดูแลระบบ','Administrator',1,1,2,'Administrator','2014-07-29 11:09:32'),(3,'ข้อมูลส่วนตัว','Profiles',2,2,4,'Administrator','2014-07-23 11:30:13'),(8,'คู่มือการใช้งาน','User Manual',3,7,7,'Administrator','2014-07-23 11:30:14'),(9,'บริหารจัดองค์ความรู้','Knowledge Management',4,3,9,'Administrator','2014-07-23 11:30:14'),(10,'DW/DM Apps','DW/DM Apps',5,4,13,'Administrator','2014-07-31 14:17:59');

/*Table structure for table `tbl_modules` */

DROP TABLE IF EXISTS `tbl_modules`;

CREATE TABLE `tbl_modules` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_desc` varchar(100) DEFAULT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`module_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_modules` */

insert  into `tbl_modules`(`id`,`module_name`,`module_desc`,`update_by`,`update_time`) values (1,'Admin','Module : Admin','Administrator','2014-07-29 10:40:37'),(2,'Master','Module : Master','Administrator','2014-07-23 13:52:32'),(3,'Contents','Module : Contents','Administrator','2014-07-23 13:52:20'),(4,'Knowledges','Module : Knowledges','Administrator','2014-07-23 13:52:04'),(5,'DWDM','Module : DW/DM','Administrator','2014-07-23 13:50:07');

/*Table structure for table `tbl_stats_events` */

DROP TABLE IF EXISTS `tbl_stats_events`;

CREATE TABLE `tbl_stats_events` (
  `session_id` varchar(64) NOT NULL,
  `menu_id` tinyint(5) NOT NULL,
  `event_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`,`menu_id`,`event_datetime`),
  KEY `NewIndex1` (`menu_id`),
  CONSTRAINT `FK_tbl_stats_menu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_stats_events` FOREIGN KEY (`session_id`) REFERENCES `tbl_stats_login` (`session_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_stats_events` */

insert  into `tbl_stats_events`(`session_id`,`menu_id`,`event_datetime`) values ('firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY41',1,'2014-07-24 10:24:26'),('firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY4o',1,'2014-07-25 10:12:39'),('firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY4o',1,'2014-07-25 10:24:14'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 12:22:57'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 12:30:15'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 12:30:45'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 12:30:54'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 12:31:04'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 13:04:10'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 13:05:58'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 13:39:08'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 14:03:47'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-28 15:42:28'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-31 12:53:06'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',1,'2014-07-31 12:53:46'),('fuPgXMjI0eLIXabMti8QDKFAjybUxSX56ofq8qrSn7DMbs6ClibQlu6gLWBuzqFG',1,'2014-07-25 10:27:19'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-07-31 15:25:42'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 10:32:08'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 10:32:31'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 10:32:43'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 14:14:32'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 15:47:55'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',1,'2014-08-01 16:01:31'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',3,'2014-07-28 12:22:53'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',3,'2014-07-31 09:45:05'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',3,'2014-08-01 15:49:21'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 09:55:40'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 09:55:59'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 09:58:48'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 09:59:31'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:32:02'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:37:46'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:42:03'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:42:12'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:42:33'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 11:42:48'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 12:52:43'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',7,'2014-07-31 12:53:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',10,'2014-07-28 12:31:00'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',10,'2014-07-29 11:16:00'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',10,'2014-07-31 09:44:00'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',10,'2014-08-01 10:56:57'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',10,'2014-08-01 11:07:44'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-28 12:30:25'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-28 12:30:56'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-28 14:03:13'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-28 15:42:40'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-29 11:12:26'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-29 11:25:37'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',11,'2014-07-31 09:43:34'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',11,'2014-08-01 10:47:15'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-25 11:11:05'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-25 11:12:49'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-25 15:18:36'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 10:33:33'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 12:30:48'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 12:31:07'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 12:59:09'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 13:16:58'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 13:39:12'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 13:46:22'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 14:03:52'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 14:25:29'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 15:00:54'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 15:19:04'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 15:45:52'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 15:46:49'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-28 15:48:25'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-29 11:01:54'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-31 09:07:36'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',13,'2014-07-31 09:42:09'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',13,'2014-07-31 14:17:47'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',13,'2014-08-01 10:58:04'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',13,'2014-08-01 15:47:58'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-25 11:11:59'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-25 11:12:57'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-25 15:18:27'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-25 16:05:14'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 11:33:00'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 12:30:31'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 12:30:51'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 12:36:27'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 12:58:59'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:04:17'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:16:13'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:16:45'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:24:04'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:43:26'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:46:26'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 13:49:08'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 14:03:59'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 14:39:09'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:19:07'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:42:36'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:46:11'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:47:21'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:48:02'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-28 15:48:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-29 10:55:47'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-29 11:10:46'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 09:42:49'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 10:10:29'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 10:15:40'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 11:43:22'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 12:58:57'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 13:18:01'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 13:43:30'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',14,'2014-07-31 14:02:57'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-07-31 14:17:44'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-07-31 16:10:13'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:01:09'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:30:03'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:32:17'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:32:41'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:32:54'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:34:22'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:46:28'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',14,'2014-08-01 10:47:21'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',16,'2014-07-31 09:55:55'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',16,'2014-07-31 09:58:51'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',16,'2014-07-31 09:59:26'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',16,'2014-07-31 10:08:49'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',16,'2014-07-31 11:42:09'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-28 15:19:14'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-28 15:33:48'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-28 15:45:44'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-28 15:59:19'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-29 11:11:52'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-31 09:43:25'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-31 13:15:57'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-31 13:23:58'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-31 13:59:30'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',17,'2014-07-31 14:04:43'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',17,'2014-08-01 10:58:54'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',18,'2014-07-29 11:32:30'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',18,'2014-07-31 09:45:08'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',18,'2014-08-01 11:20:37'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',18,'2014-08-01 11:21:31'),('firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY4o',19,'2014-07-25 10:24:06'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',19,'2014-07-29 11:39:12'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',19,'2014-07-31 09:48:11'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',19,'2014-08-01 11:21:00'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',19,'2014-08-01 11:21:29'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',20,'2014-07-29 11:39:24'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',20,'2014-07-29 15:17:47'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',20,'2014-07-31 09:48:16'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',20,'2014-07-31 09:48:41'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',20,'2014-07-31 10:11:43'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',20,'2014-08-01 11:21:35'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',22,'2014-07-29 15:17:40'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',22,'2014-07-29 15:23:28'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',22,'2014-07-31 09:48:52'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',22,'2014-07-31 10:14:31'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',22,'2014-07-31 11:42:20'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',22,'2014-08-01 11:23:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',23,'2014-07-29 15:25:11'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',23,'2014-07-31 09:48:58'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',23,'2014-08-01 11:24:17'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',23,'2014-08-01 11:24:46'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-28 12:30:34'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-29 11:25:45'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-29 15:25:00'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 09:44:28'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 09:59:05'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 11:32:35'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 11:37:51'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 11:42:38'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',25,'2014-07-31 14:09:03'),('firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY4o',26,'2014-07-25 10:12:53'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-25 11:14:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 09:34:29'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:29:47'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:30:42'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:31:26'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:51:03'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:59:04'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 12:59:15'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:04:13'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:06:01'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:16:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:16:54'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:17:35'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:42:20'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:45:40'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:49:05'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 13:49:15'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 14:03:21'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 14:04:08'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 14:25:38'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 14:39:17'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 15:32:35'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 15:42:31'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 15:43:36'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-28 16:15:45'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-29 09:22:27'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-31 09:07:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',26,'2014-07-31 09:40:34'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-07-31 15:33:10'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-08-01 10:29:53'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-08-01 11:24:40'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-08-01 11:27:45'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-08-01 15:51:45'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',26,'2014-08-01 15:59:12'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',28,'2014-07-28 15:59:30'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',28,'2014-07-28 16:16:56'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',28,'2014-07-30 15:55:39'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',28,'2014-07-31 09:44:58'),('fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i',28,'2014-07-31 14:09:09'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 14:17:18'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 15:24:43'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 15:25:50'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 15:26:06'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 15:33:16'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-07-31 16:14:52'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 09:39:29'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 09:54:00'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 10:03:24'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 10:46:19'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 14:28:10'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 15:48:07'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 15:49:25'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 15:59:05'),('iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD',28,'2014-08-01 16:03:16');

/*Table structure for table `tbl_stats_login` */

DROP TABLE IF EXISTS `tbl_stats_login`;

CREATE TABLE `tbl_stats_login` (
  `user_id` int(5) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`,`session_id`,`login_datetime`),
  KEY `NewIndex1` (`session_id`),
  CONSTRAINT `FK_tbl_stats_login` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_stats_login` */

insert  into `tbl_stats_login`(`user_id`,`session_id`,`login_datetime`,`logout_datetime`,`ip_address`) values (7,'firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY41','2014-07-24 10:30:30',NULL,'::1'),(7,'firYhg2uDqRGBUzmNAFsFgbkX5dIj9jC4uzs2il1LaB1VK63jS6YXo4gdu6sVY4o','2014-07-25 10:11:43','2014-07-25 10:27:06','::1'),(7,'fkH9nynIfIVGbO09jeBAvmruHAfg0WpW0EpE0UPKFi4eJ5ziRUDqz9RY6QBA6Y0i','2014-07-25 11:10:51','2014-07-31 14:17:00','::1'),(7,'fuPgXMjI0eLIXabMti8QDKFAjybUxSX56ofq8qrSn7DMbs6ClibQlu6gLWBuzqFG','2014-07-25 10:27:09','2014-07-25 10:39:30','::1'),(7,'HavmJ327Z3LWzMFCLYr5bQ2mV3Lm2eBiPK0Wds8svKBgnUDeROJeNMLOpQtmHsrU','2014-07-25 10:11:10','2014-07-25 10:11:36','::1'),(7,'iB1PyHg2S672MLIT7X5HMPy2YRoZqL7XAdAlgXYNK2YFkpiROxKrQdwbGLM2aJcD','2014-07-31 14:17:07',NULL,'::1');

/*Table structure for table `tbl_user_auth` */

DROP TABLE IF EXISTS `tbl_user_auth`;

CREATE TABLE `tbl_user_auth` (
  `user_id` int(11) NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `Ref831` (`group_id`),
  KEY `Ref2032` (`user_id`),
  CONSTRAINT `FK_tbl_user_auth` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tbl_user_auth_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§ÊÔ·¸Ôì¼Ùéãªé§Ò¹ÃÐºº';

/*Data for the table `tbl_user_auth` */

insert  into `tbl_user_auth`(`user_id`,`group_id`,`update_by`,`update_time`) values (7,1,'Administrator','2014-07-29 11:24:42'),(10,1,'Administrator','2014-07-29 11:24:53'),(2,3,'Administrator','2014-07-23 15:15:49');

/*Table structure for table `tbl_user_group` */

DROP TABLE IF EXISTS `tbl_user_group`;

CREATE TABLE `tbl_user_group` (
  `group_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁ¼Ùéãªé§Ò¹';

/*Data for the table `tbl_user_group` */

insert  into `tbl_user_group`(`group_id`,`group_name`,`update_by`,`update_time`) values (1,'Administrator Groups','Administrator','2014-07-29 11:15:07'),(2,'Viewer Groups','Administrator','2014-07-29 11:15:39'),(3,'Operation Groups','Administrator','2014-07-29 11:15:54');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `username` (`username`),
  KEY `first_name` (`first_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¼Ùéãªé§Ò¹';

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`password`,`first_name`,`last_name`,`email`,`telephone`,`update_by`,`update_time`) values (2,'catadmin','cHdjYXRhZG1pbg==','CAT DW/DM Team','-','piyapong.k@cattelecom.com','-','Administrator','2014-07-29 11:22:54'),(7,'admin','MTIzNDU2','Administrator','Administrator','piyapong.k@cattelecom.com','02-1047334','Administrator','2014-07-29 11:24:42'),(10,'piyapong','OTk5OTk5','นายปิยะพงษ์ แก้วน่าน',NULL,'piyapong.k@cattelecom.com',NULL,'Administrator','2014-07-29 11:24:19');

/*Table structure for table `01_view_stats_by_login` */

DROP TABLE IF EXISTS `01_view_stats_by_login`;

/*!50001 DROP VIEW IF EXISTS `01_view_stats_by_login` */;
/*!50001 DROP TABLE IF EXISTS `01_view_stats_by_login` */;

/*!50001 CREATE TABLE  `01_view_stats_by_login`(
 `login_date` date ,
 `users` varchar(50) ,
 `ip_address` varchar(15) ,
 `count_events` bigint(21) 
)*/;

/*Table structure for table `02_view_stats_by_events` */

DROP TABLE IF EXISTS `02_view_stats_by_events`;

/*!50001 DROP VIEW IF EXISTS `02_view_stats_by_events` */;
/*!50001 DROP TABLE IF EXISTS `02_view_stats_by_events` */;

/*!50001 CREATE TABLE  `02_view_stats_by_events`(
 `event_date` date ,
 `users` varchar(50) ,
 `event_page` varchar(70) ,
 `ip_address` varchar(15) ,
 `count_events` bigint(21) 
)*/;

/*Table structure for table `03_view_stats_by_date` */

DROP TABLE IF EXISTS `03_view_stats_by_date`;

/*!50001 DROP VIEW IF EXISTS `03_view_stats_by_date` */;
/*!50001 DROP TABLE IF EXISTS `03_view_stats_by_date` */;

/*!50001 CREATE TABLE  `03_view_stats_by_date`(
 `years` int(4) ,
 `months` int(2) ,
 `days` int(2) ,
 `count_login` decimal(42,0) 
)*/;

/*View structure for view 01_view_stats_by_login */

/*!50001 DROP TABLE IF EXISTS `01_view_stats_by_login` */;
/*!50001 DROP VIEW IF EXISTS `01_view_stats_by_login` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `01_view_stats_by_login` AS (select cast(`a`.`login_datetime` as date) AS `login_date`,`b`.`first_name` AS `users`,`a`.`ip_address` AS `ip_address`,count(0) AS `count_events` from (`tbl_stats_login` `a` join `tbl_users` `b`) where (`a`.`user_id` = `b`.`user_id`) group by cast(`a`.`login_datetime` as date)) */;

/*View structure for view 02_view_stats_by_events */

/*!50001 DROP TABLE IF EXISTS `02_view_stats_by_events` */;
/*!50001 DROP VIEW IF EXISTS `02_view_stats_by_events` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `02_view_stats_by_events` AS (select cast(`a`.`login_datetime` as date) AS `event_date`,`c`.`first_name` AS `users`,`d`.`menu_name_th` AS `event_page`,`a`.`ip_address` AS `ip_address`,count(0) AS `count_events` from (((`tbl_stats_login` `a` join `tbl_stats_events` `b`) join `tbl_users` `c`) join `tbl_menu` `d`) where ((`a`.`session_id` = `b`.`session_id`) and (`a`.`user_id` = `c`.`user_id`) and (`b`.`menu_id` = `d`.`menu_id`)) group by `a`.`session_id`,`b`.`menu_id`,cast(`a`.`login_datetime` as date)) */;

/*View structure for view 03_view_stats_by_date */

/*!50001 DROP TABLE IF EXISTS `03_view_stats_by_date` */;
/*!50001 DROP VIEW IF EXISTS `03_view_stats_by_date` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `03_view_stats_by_date` AS (select year(`01_view_stats_by_login`.`login_date`) AS `years`,month(`01_view_stats_by_login`.`login_date`) AS `months`,dayofmonth(`01_view_stats_by_login`.`login_date`) AS `days`,sum(`01_view_stats_by_login`.`count_events`) AS `count_login` from `01_view_stats_by_login` group by `years`,`months`,`days` order by `years`,`months`,`days`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
