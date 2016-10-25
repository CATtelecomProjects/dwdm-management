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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contents` */

insert  into `tbl_contents`(`id`,`content_name`,`content_desc`,`update_by`,`update_time`) values (1,'manual','<ul><li><a href=\"downloads/User_Manual_V1.0.pdf\" jqte-setlink=\"\">User Manual Version 1.0</a></li></ul><p></p><p></p>','Administrator','2014-08-21 21:03:07'),(2,'about','<b>โปรแกรมนี้พัฒนาเพื่อใช้งาน Support การทำงานของระบบ Data Warehouse/Data Mining</b><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p></p><ol><li>Knowledge Management<br></li><li><span style=\"color: rgb(0, 0, 0);\">โปรแกรมบันทึกข้อความประกาศใน Portlet ของ Web Portal</span><br></li><li><span style=\"color: rgb(0, 0, 0);\">รายงานสรุปปัญหา/ติดตาม DW/DM</span></li><li><span style=\"color: rgb(0, 0, 0);\">รายการตรวจสอบการพื้นที่ใช้งานระบบ DW/DM</span></li><li><span style=\"color: rgb(0, 0, 0);\">รายงานการใช้งานระบบ DW/DM (รายเดือน)</span></li><li><font color=\"#000000\">Security Matrix</font></li></ol></blockquote><b>&nbsp;<u>ติดต่อ</u>&nbsp;</b><p><b>&nbsp; E-Mail&nbsp;</b>:<a href=\"mailto:dwdmadmin@cattelecom.com\" style=\"margin: 0px 0px 0px 40px; border: none; padding: 0px;\"> dwdmadmin@cattelecom.com</a>&nbsp;</p><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p></p></blockquote><p></p><p>&nbsp;<b>เบอร์โทร</b> : 7334</p>','Administrator','2016-03-03 09:03:16'),(3,'what_new','<img src=\"http://beautifultrouble.org/wp-content/themes/beautifultrouble/img/new.png\" align=\"absmiddle\" width=\"30px\" height=\"30px\"> <span style=\"font-size: 12px;\">ใหม่โปรแกรม \"Security Matrix Dashboard\" สามารถดูสถิติจำนวนผู้ใช้งาน,รายงาน แยกตามโมดูล&nbsp;<a href=\"http://dw-webreport.cattelecom.com/dwdm-management/index.php?setModule=SM&amp;setPage=dwdm_sm_dashboard\" style=\"font-size: 12px;\" jqte-setlink=\"\">ที่นี่</a></span>','นายปิยะพงษ์ แก้วน่าน','2016-09-27 13:49:15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
