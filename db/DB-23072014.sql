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

insert  into `tbl_configs`(`website_name`,`website_theme`,`website_language`,`update_by`,`update_time`) values ('DW/DM  Back-Office Management','1','th','Administrator','2014-07-23 15:12:15');

/*Table structure for table `tbl_contents` */

DROP TABLE IF EXISTS `tbl_contents`;

CREATE TABLE `tbl_contents` (
  `id` int(11) NOT NULL auto_increment,
  `content_name` varchar(50) NOT NULL,
  `content_desc` longtext NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `NewIndex1` (`content_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contents` */

insert  into `tbl_contents`(`id`,`content_name`,`content_desc`,`update_by`,`update_time`) values (1,'manual','<p></p><p></p><ul><li><a href=\"http://www.google.co.th\">User Manual 1</a></li><li><a href=\"http://www.google.co.th\">User Manual 2</a></li><li><a href=\"http://www.google.co.th\">User Manual 3</a></li></ul><p></p><p></p>','Administrator','2014-07-23 10:49:44'),(2,'about','<p style=\"margin-bottom: 10px; color: rgb(68, 68, 68); font-family: arial, sans-serif; font-size: 13px; line-height: 20.020000457763672px;\">We’re committed to protecting your privacy, improving your security, and building simple tools to give you choice and control.</p><p class=\"step-icon\" style=\"padding: 0px 0px 0px 80px; margin-top: 20px; color: rgb(68, 68, 68); font-family: arial, sans-serif; font-size: 13px; line-height: 20.020000457763672px; background-image: url(https://www.google.co.th/policies/images/two-step.png); background-position: 0% 5px; background-repeat: no-repeat;\"><h4 style=\"font-size: 13px; font-family: \'open sans\', arial, sans-serif; margin-top: 1.236em; margin-bottom: 0.618em;\">2-Step Verification</h4><p style=\"margin-bottom: 10px;\">Protect your Google Account with something you know (your password) and something you have (your phone).&nbsp;<a href=\"https://www.google.com/support/accounts/bin/static.py?page=guide.cs&amp;guide=1056283&amp;topic=1056284&amp;hl=en\" style=\"color: rgb(119, 89, 174); text-decoration: none;\">Find out how to set up 2-step verification.</a></p></p><p class=\"account-icon\" style=\"padding: 0px 0px 0px 80px; margin-top: 20px; color: rgb(68, 68, 68); font-family: arial, sans-serif; font-size: 13px; line-height: 20.020000457763672px; background-image: url(https://www.google.co.th/policies/images/google-account-setting.png); background-position: 0% 5px; background-repeat: no-repeat;\"><h4 style=\"font-size: 13px; font-family: \'open sans\', arial, sans-serif; margin-top: 1.236em; margin-bottom: 0.618em;\">Google Account Settings</h4><p style=\"margin-bottom: 10px;\">See the services and information associated with your Google Account, and change your security and privacy settings.&nbsp;<a href=\"https://accounts.google.com/\" style=\"color: rgb(119, 89, 174); text-decoration: none;\">Visit Google Account settings</a>.</p></p><p class=\"incognito-icon\" style=\"padding: 0px 0px 0px 80px; margin-top: 20px; color: rgb(68, 68, 68); font-family: arial, sans-serif; font-size: 13px; line-height: 20.020000457763672px; background-image: url(https://www.google.co.th/policies/images/incognito.png); background-position: 0% 5px; background-repeat: no-repeat;\"><h4 style=\"font-size: 13px; font-family: \'open sans\', arial, sans-serif; margin-top: 1.236em; margin-bottom: 0.618em;\">Incognito Mode</h4><p style=\"margin-bottom: 10px;\">Learn how to browse incognito in Google Chrome, so pages you open and files you download aren’t recorded in Chrome’s browsing or download history.&nbsp;<a href=\"https://support.google.com/chrome/bin/answer.py?hl=en&amp;answer=95464\" style=\"color: rgb(119, 89, 174); text-decoration: none;\">Find out how to access incognito mode</a>.</p></p><p></p>','Administrator','2014-07-23 11:12:05');

/*Table structure for table `tbl_dwdm_portlet` */

DROP TABLE IF EXISTS `tbl_dwdm_portlet`;

CREATE TABLE `tbl_dwdm_portlet` (
  `id` int(5) NOT NULL auto_increment,
  `portlet` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `NewIndex1` (`portlet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_portlet` */

insert  into `tbl_dwdm_portlet`(`id`,`portlet`,`description`,`update_by`,`update_time`) values (1,'CM','<b>Test CM</b><p></p>','CM Admin','2014-07-10 13:06:30'),(2,'FI','Test FI','','2014-07-10 11:55:16'),(3,'HKR','Test HKR','','2014-07-04 11:30:48'),(4,'NUA','<img src=\"http://bis.cattelecom.com/images/login.png\" align=\"left\"><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Arial, sans-serif; line-height: 14.300000190734863px; font-size: 11px;\">Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</span><p></p><p style=\"color: rgb(0, 0, 0); font-family: Tahoma, Arial; font-size: 12px; margin-left: 30px;\"></p>','Administrator','2014-07-04 11:30:59');

/*Table structure for table `tbl_icons` */

DROP TABLE IF EXISTS `tbl_icons`;

CREATE TABLE `tbl_icons` (
  `icon_id` tinyint(4) NOT NULL auto_increment,
  `icon_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§äÍ¤Í¹';

/*Data for the table `tbl_icons` */

insert  into `tbl_icons`(`icon_id`,`icon_name`) values (1,'icon-home.png'),(2,'icon-config.png'),(3,'icon-keyin.gif'),(4,'icon-profile.gif'),(5,'icon-report.png'),(6,'icon-logout.png'),(7,'icon-manual.png'),(8,'icon-company.png'),(9,'icon-db.png'),(10,'icon-menu.gif'),(11,'icon-permission.png'),(12,'icon-aboutus.gif'),(13,'icon-form.png'),(14,'icon-department.png'),(15,'icon-approved.gif'),(16,'icon-group.png'),(17,'icon-process.gif'),(18,'icon-user.png'),(19,'icons-calendar.gif'),(20,'icon-printer.png'),(21,'icon-view.png'),(22,'icon-download.gif'),(23,'icon-upload.gif'),(24,'icon-courses.png'),(25,'icon-map.png'),(26,'icon-comments.png'),(27,'icon-speaker.png');

/*Table structure for table `tbl_knowledge` */

DROP TABLE IF EXISTS `tbl_knowledge`;

CREATE TABLE `tbl_knowledge` (
  `id` int(11) NOT NULL auto_increment,
  `cate_id` int(5) NOT NULL,
  `issue_title` varchar(500) NOT NULL,
  `issue_desc` longtext NOT NULL,
  `publish` varchar(1) NOT NULL default 'Y',
  `views` int(5) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `update_by` varchar(80) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `issue_title` (`issue_title`(255)),
  KEY `cate_id` (`cate_id`),
  CONSTRAINT `FK_tbl_knowledge` FOREIGN KEY (`cate_id`) REFERENCES `tbl_knowledge_cate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge` */

insert  into `tbl_knowledge`(`id`,`cate_id`,`issue_title`,`issue_desc`,`publish`,`views`,`update_time`,`update_by`) values (5,1,'เข้าระบบไม่ได้','เปลี่ยนรหัสผ่านที่ระบบ EIM\r\nhttp://eim.cattelecom.com','Y',0,'2014-07-16 14:21:02','Administrator'),(6,3,'เปิด Report แล้วเปิด Popup ไม่ได้','ให้เปิด Availability View','Y',0,'2014-07-16 14:21:02','Administrator'),(8,2,'เปิดใช้งานผ่าน IE ไม่ได้','ใช้ IE 10 ขึ้นไป','Y',0,'2014-07-17 14:21:50','Administrator'),(9,1,'Installation Note 44788: The error \"System.Xml.XmlException: Root element is missing\" might occur when Microsoft Office is invoked','<h2 style=\"font-size: 1.2em; margin-top: 1em; margin-bottom: 0.5em; color: rgb(75, 75, 75); font-family: Arial, Helvetica, Verdana, sans-serif; line-height: 16.899999618530273px;\">Installation Note <i>44788: </i>The error \"System.Xml.XmlException: Root element is missing\" might occur when Microsoft Office is invoked</h2><table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\"font-size: small; line-height: 1.25em; font-family: Arial, Helvetica, Verdana, sans-serif; padding: 5px 0px;\"><tbody style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><tr style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"Details\" src=\"http://support.sas.com/images/samples/details_sel.gif\" id=\"tabnav_details\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"About\" src=\"http://support.sas.com/images/samples/about.gif\" id=\"tabnav_about\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td><a href=\"http://support.sas.com/kb/44/788.html#\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit; text-decoration: none; color: rgb(0, 102, 204);\"><img border=\"0\" alt=\"Rate It\" src=\"http://support.sas.com/images/samples/rateit.gif\" id=\"tabnav_rateit\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></a></td><td width=\"100%\" height=\"3\" valign=\"bottom\"><img width=\"100%\" alt=\"\" height=\"3\" src=\"http://support.sas.com/images/samples/gray1.gif\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></td></tr></tbody></table><p id=\"tab_details\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: small; line-height: 16.899999618530273px; padding: 10px 0px 0px 30px;\">The following error message might be displayed when you invoke Microsoft Office with SAS Add-In for Microsoft Office installed.<p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><img src=\"http://support.sas.com/kb/44/addl/fusion_44788_1_rootelement1.jpg\" alt=\"image label\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\">Clicking the <b>Details</b> button shows additional information, as shown below.</p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><img src=\"http://support.sas.com/kb/44/addl/fusion_44788_3_rootelement3.jpg\" alt=\"image label\" style=\"margin-right: 0px; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"></p><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\">The error might occur because of a corrupt AMOOptions.xml file. In that case, renaming the AMOOptions.xml file should correct the problem.</p><ol><li style=\"line-height: 20px;\">Close Microsoft Office.</li><li style=\"line-height: 20px;\">Browse to the following location depending on your operating system and rename the AMOOptions.xml file to AMOOptions_old.xml.<ul style=\"margin: 0px 0px 20px; padding: 0px 0px 0px 25px;\"><li>Windows XP path to AMOOptions.xml: <br><span style=\"font-family: monospace;\"><b>C:\\Documents and Settings\\<userid>\\Application Data\\SAS\\Add-InForMicrosoftOffice\\4.3</b></span></li><li>Windows 7 path to AMOOptions.xml: <br><span style=\"font-family: monospace;\"><b>C:\\Users\\<userid>\\AppData\\Roaming\\SAS\\Add-InForMicrosoftOffice\\4.3</b></span></li></ul></li></ol><p style=\"margin-bottom: 0px; padding: 5px 0px; border: 0px; font-size: 13px; line-height: 1.25em; font-family: inherit;\"><b>Note:</b> The paths shown above use the default Windows profile path for the respective operating system. Your Windows profile path might be different. If your profile path is other than the default, open <b>My Computer</b> and enter <b>%appdata%</b> in the address bar to determine what your Windows profile path is. <br><br></p><h4 style=\"margin-top: 1em; margin-bottom: 0px; padding: 0px 0px 1px; border: 0px; font-size: 1em; line-height: 1.25em; font-family: inherit; color: rgb(0, 0, 0);\">Operating System and Release Information</h4><table cellpadding=\"5\" border=\"1\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; padding: 5px 0px;\"><tbody style=\"font-size: 13px; line-height: 1.25em; font-family: inherit;\"><tr class=\"product_header\" style=\"font-weight: bold; font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center; background-color: rgb(204, 204, 204);\"><td rowspan=\"2\">Product Family</td><td rowspan=\"2\">Product</td><td rowspan=\"2\">System</td><td colspan=\"2\" style=\"background-color: rgb(236, 236, 236);\">Product Release</td><td colspan=\"2\" style=\"background-color: rgb(236, 236, 236);\">SAS Release</td></tr><tr class=\"product_header\" style=\"font-weight: bold; font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center; background-color: rgb(204, 204, 204);\"><td>Reported</td><td>Fixed*</td><td>Reported</td><td>Fixed*</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td valign=\"top\" rowspan=\"9\">SAS System</td><td valign=\"top\" rowspan=\"9\">SAS Add-in for Microsoft Office</td><td>Microsoft® Windows® for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Datacenter Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Enterprise Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 Standard Edition</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2003 for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows Server 2008 for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Microsoft Windows XP Professional</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Windows Vista</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr><tr class=\"product_row\" style=\"font-size: 13px; line-height: 1.25em; font-family: inherit; text-align: center;\"><td>Windows Vista for x64</td><td>4.305</td><td>6.1</td><td>9.2 TS2M0</td><td>9.3 TS1M2</td></tr></tbody></table><span class=\"status\" style=\"color: rgb(0, 0, 0); font-weight: bold;\"><b>*</b></span><span class=\"newstext\" style=\"font-size: 10px; line-height: normal; color: rgb(0, 0, 0); margin-top: 0px; padding-top: 0px;\"> For software releases that are not yet generally available, the Fixed Release is the software release in which the problem is planned to be fixed.</span></p>','Y',0,'2014-07-16 14:23:41','Administrator');

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

insert  into `tbl_knowledge_cate`(`id`,`name`,`description`,`active`,`menu_order`,`update_by`,`update_time`) values (1,'SAS Applications Issue','หมวดเกี่ยวกับการใช้งาน SAS Data Integration , SAS OLAP Server ,SAS Information Maps ,SAS E-Giude ,SAS MS Add-In','Y',3,'Administrator','2014-07-10 12:56:57'),(2,'General Issue','หมวดทั่วไป เช่น ปัญหาทั่วไปเกี่ยวกับการใช้งานต่างๆในระบบ DW/DM        ','Y',1,'Administrator','2014-07-23 11:25:26'),(3,'SAS Web Application Issue','หมวดเกี่ยวกับการใช้งาน SAS Web Portal , SAS Web Report Studio        ','Y',2,'Administrator','2014-07-10 12:57:09'),(4,'Server Issue','หมวดเกี่ยวกับ Server เช่น ปัญหาเกี่ยวกับด้าน  Hardware , Software        ','Y',5,'Administrator','2014-07-10 12:57:27'),(5,'Authentication Issue','หมวดเกี่ยวกับสิทธิ์การเข้าใช้งาน เช่น ปัญหาการเข้าใช้งานโปรแกรมต่างๆ                 ','Y',4,'Administrator','2014-07-10 13:06:56'),(6,'Other Issue','หมวดอื่นๆ        ','Y',6,'Administrator','2014-07-10 12:57:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_knowledge_files` */

insert  into `tbl_knowledge_files`(`file_id`,`kn_id`,`file_name`,`update_by`,`update_time`) values (46,8,'2-20140716-IMG_20140709_095409.jpg','Administrator','2014-07-16 13:56:47'),(47,8,'2-20140716-S__7077942.jpg','Administrator','2014-07-16 13:56:52'),(48,8,'2-20140716-information.jpg','Administrator','2014-07-16 13:58:53'),(49,9,'1-20140716-ORG.csv','Administrator','2014-07-16 14:20:52'),(50,9,'1-20140716-EMP.csv','Administrator','2014-07-16 14:20:55'),(51,9,'1-20140716-2014-06-11 122036.JPG','Administrator','2014-07-16 14:21:02');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` tinyint(4) NOT NULL auto_increment,
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§àÁ¹Ù';

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_name_th`,`menu_name_en`,`menu_file`,`menu_param`,`menu_order`,`mgroup_id`,`icon_id`,`update_by`,`update_time`) values (1,'จัดการเว็บไซต์','Website Management','config',NULL,1,1,2,'Administrator','2014-07-10 11:14:46'),(3,'เปลี่ยนรหัสผ่าน','Change Password','profile',NULL,1,3,4,'Administrator','2014-07-10 11:13:53'),(7,'เกี่ยวกับโปรแกรม','About Programs','contents','&name=about',1,8,12,'Administrator','2014-07-23 10:21:22'),(10,'ผู้ใช้งานระบบ','User Management','users',NULL,6,1,18,'Administrator','2014-07-10 11:13:54'),(11,'กลุ่มผู้ใช้งาน','User Group Management','user_group',NULL,5,1,16,'Administrator','2014-07-10 11:13:54'),(13,'กลุ่มเมนูระบบ','Menu Group Management','menu_group',NULL,2,1,10,'Administrator','2014-07-10 11:13:55'),(14,'เมนูระบบ','Menu Management','menu',NULL,3,1,10,'Administrator','2014-07-10 11:13:55'),(16,'คู่มือการใช้งาน','User Manual','contents','&name=manual',2,8,7,'Administrator','2014-07-23 10:41:43'),(17,'สิทธิ์เมนูใช้งาน','Menu Authorization','menu_auth',NULL,4,1,11,'Administrator','2014-07-10 11:13:56'),(18,'จัดการหมวดหมู่','Knowledge Category','knowledge',NULL,1,9,10,'Administrator','2014-07-10 11:13:56'),(19,'สิทธิ์กลุ่มองค์ความรู้','Knowledge Authorization','knowledge_auth',NULL,2,9,11,'Administrator','2014-07-10 11:13:56'),(20,'บันทึก/แก้ไข องค์ความรู้','Manage Knowledge','manage_knowledge',NULL,3,9,3,'Administrator','2014-07-10 11:13:57'),(22,'แสดงรายการองค์ความรู้','Knowledge Viewer','knowledge_view',NULL,5,9,9,'Administrator','2014-07-16 12:35:30'),(23,'จัดการประกาศหน้า Portal','DWDM Portal Splash','dwdm_portlet',NULL,1,10,13,'Administrator','2014-07-10 11:13:58'),(25,'จัดการเนื้อหาเว็บไซต์','Content Management','web_contents',NULL,7,1,13,'Administrator','2014-07-23 10:33:47'),(26,'จัดการโมดูล','modules','modules',NULL,8,1,10,'Administrator','2014-07-23 11:16:48');

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

insert  into `tbl_menu_auth`(`group_id`,`menu_id`,`update_by`,`update_time`) values (1,1,'Administrator','2014-07-23 11:17:00'),(1,3,'Administrator','2014-07-23 11:17:00'),(1,7,'Administrator','2014-07-23 11:17:00'),(1,10,'Administrator','2014-07-23 11:17:00'),(1,11,'Administrator','2014-07-23 11:17:00'),(1,13,'Administrator','2014-07-23 11:17:00'),(1,14,'Administrator','2014-07-23 11:17:00'),(1,16,'Administrator','2014-07-23 11:17:00'),(1,17,'Administrator','2014-07-23 11:17:00'),(1,18,'Administrator','2014-07-23 11:17:00'),(1,19,'Administrator','2014-07-23 11:17:00'),(1,20,'Administrator','2014-07-23 11:17:00'),(1,22,'Administrator','2014-07-23 11:17:00'),(1,23,'Administrator','2014-07-23 11:17:00'),(1,25,'Administrator','2014-07-23 11:17:00'),(1,26,'Administrator','2014-07-23 11:17:00'),(2,7,'Adminstrator','2014-07-08 10:21:20'),(2,16,'Adminstrator','2014-07-08 10:21:20'),(2,22,'Adminstrator','2014-07-08 10:21:21'),(3,7,'Administrator','2014-07-16 14:35:47'),(3,16,'Administrator','2014-07-16 14:35:47'),(3,20,'Administrator','2014-07-16 14:35:47'),(3,22,'Administrator','2014-07-16 14:35:47'),(3,23,'Administrator','2014-07-16 14:35:47');

/*Table structure for table `tbl_menu_group` */

DROP TABLE IF EXISTS `tbl_menu_group`;

CREATE TABLE `tbl_menu_group` (
  `mgroup_id` tinyint(4) NOT NULL auto_increment,
  `menu_group_th` varchar(50) NOT NULL,
  `menu_group_en` varchar(50) default NULL,
  `modules_id` int(5) NOT NULL,
  `menu_order` tinyint(4) default NULL,
  `icon_id` tinyint(4) default '3',
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`mgroup_id`),
  KEY `Ref44106` (`icon_id`),
  KEY `FK_tbl_menu_group_module` (`modules_id`),
  CONSTRAINT `FK_tbl_menu_group_module` FOREIGN KEY (`modules_id`) REFERENCES `tbl_modules` (`id`),
  CONSTRAINT `FK_tbl_menu_group` FOREIGN KEY (`icon_id`) REFERENCES `tbl_icons` (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='µÒÃÒ§¡ÅØèÁàÁ¹Ù';

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`mgroup_id`,`menu_group_th`,`menu_group_en`,`modules_id`,`menu_order`,`icon_id`,`update_by`,`update_time`) values (1,'ผู้ดูแลระบบ','Administrator',1,1,2,'Administrator','2014-07-23 15:05:03'),(3,'ข้อมูลส่วนตัว','Profiles',2,2,4,'Administrator','2014-07-23 11:30:13'),(8,'คู่มือการใช้งาน','User Manual',3,7,7,'Administrator','2014-07-23 11:30:14'),(9,'บริหารจัดองค์ความรู้','Knowledge Management',4,3,9,'Administrator','2014-07-23 11:30:14'),(10,'DW/DM','DW/DM',5,4,13,'Administrator','2014-07-23 11:30:15');

/*Table structure for table `tbl_modules` */

DROP TABLE IF EXISTS `tbl_modules`;

CREATE TABLE `tbl_modules` (
  `id` int(5) NOT NULL auto_increment,
  `module_name` varchar(50) NOT NULL,
  `module_desc` varchar(100) default NULL,
  `update_by` varchar(50) NOT NULL,
  `update_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `NewIndex1` (`module_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_modules` */

insert  into `tbl_modules`(`id`,`module_name`,`module_desc`,`update_by`,`update_time`) values (1,'Admin','Module : Admin','Administrator','2014-07-23 13:52:41'),(2,'Master','Module : Master','Administrator','2014-07-23 13:52:32'),(3,'Contents','Module : Contents','Administrator','2014-07-23 13:52:20'),(4,'Knowledges','Module : Knowledges','Administrator','2014-07-23 13:52:04'),(5,'DWDM','Module : DW/DM','Administrator','2014-07-23 13:50:07');

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

insert  into `tbl_user_auth`(`user_id`,`group_id`,`update_by`,`update_time`) values (7,1,'Administrator','2014-07-17 14:39:15'),(10,1,'Administrator','2014-07-16 12:41:33'),(2,3,'Administrator','2014-07-23 15:15:49');

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

insert  into `tbl_users`(`user_id`,`username`,`password`,`first_name`,`last_name`,`email`,`telephone`,`update_by`,`update_time`) values (2,'catadmin','cHdjYXRhZG1pbg==','CAT DW/DM Team','-','piyapong.k@cattelecom.com','-','Administrator','2014-07-23 15:15:49'),(7,'admin','MTIzNDU2','Administrator','Administrator','piyapong.k@cattelecom.com','02-9999999','Adminstrator','2014-07-08 11:17:59'),(10,'piyapong','OTk5OTk5','นายปิยะพงษ์ แก้วน่าน',NULL,NULL,NULL,'Administrator','2014-07-16 12:41:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
