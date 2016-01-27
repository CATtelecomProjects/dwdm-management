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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_portlet` */

insert  into `tbl_dwdm_portlet`(`id`,`portlet`,`description`,`update_by`,`update_time`) values (1,'CM','<p></p><span style=\"color:rgb(0,0,255);\"><p style=\"color: rgb(0, 0, 255);\"><b style=\"color: rgb(0, 0, 255);\">ข้อมูลในรายงานที่เกี่ยวกับ Interconnect ในเดือน กันยายน - ธันวาคม 2557 ไม่สามารถแสดงข้อมูลได้&nbsp;</b></p><p style=\"color: rgb(0, 0, 255);\"><b style=\"color: rgb(0, 0, 255);\">ระบบต้นทาง Interconnect กำลังทยอยส่งข้อมูล ประกอบด้วยรายงาน 4 รายงาน ดังต่อไปนี้</b></p><p style=\"color: rgb(0, 0, 255);\"><br style=\"color: rgb(0, 0, 255);\"></p><p style=\"color: rgb(0, 0, 255);\">CM-026 Outbound Analysis<br style=\"color: rgb(0, 0, 255);\"></p><p style=\"color: rgb(0, 0, 255);\"></p><p style=\"color: rgb(0, 0, 255);\"></p><table height=\"1\" cellspacing=\"0\" cellpadding=\"0\" summary=\"\" border=\"0\" style=\"color: rgb(0, 0, 255);\"><tbody style=\"color: rgb(0, 0, 255);\"><tr style=\"color: rgb(0, 0, 255);\"><td class=\"treecellstyle\" style=\"color: rgb(0, 0, 255);\">CM-027 Inbound Analysis</td></tr></tbody></table><p style=\"color: rgb(0, 0, 255);\"></p><p style=\"color: rgb(0, 0, 255);\">CM-028 Transit Analysis<br style=\"color: rgb(0, 0, 255);\"></p><p style=\"color: rgb(0, 0, 255);\">CM-030 Wholesale Analysis</p></span><p><br></p><p></p><p></p>','CM Admin','2015-01-21 09:48:18'),(2,'FI','Test FI','','2014-07-10 11:55:16'),(3,'HKR','Test HKR','','2014-07-04 11:30:48'),(4,'NUA','<img src=\"http://bis.cattelecom.com/images/login.png\" align=\"left\"><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Arial, sans-serif; line-height: 14.300000190734863px; font-size: 11px;\">Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</span><p></p><p style=\"color: rgb(0, 0, 0); font-family: Tahoma, Arial; font-size: 12px; margin-left: 30px;\"></p>','Administrator','2014-07-04 11:30:59'),(5,'test','TEST PORTLET','Administrator','2014-09-10 14:24:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
