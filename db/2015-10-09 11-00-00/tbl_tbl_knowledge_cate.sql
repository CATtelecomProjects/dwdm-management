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

insert  into `tbl_knowledge_cate`(`id`,`name`,`description`,`active`,`menu_order`,`update_by`,`update_time`) values (1,'SAS Applications Issue','หมวดเกี่ยวกับการใช้งาน SAS Data Integration , SAS OLAP Server ,SAS Information Maps ,SAS E-Giude ,SAS MS Add-In','Y',3,'Administrator','2014-07-10 12:56:57'),(2,'General Issue','หมวดทั่วไป เช่น ปัญหาทั่วไปเกี่ยวกับการใช้งานต่างๆในระบบ DW/DM','Y',1,'Administrator','2014-07-29 11:36:01'),(3,'SAS Web Application Issue','หมวดเกี่ยวกับการใช้งาน SAS Web Portal , SAS Web Report Studio        ','Y',2,'Administrator','2014-07-10 12:57:09'),(4,'Server Issue','หมวดเกี่ยวกับ Server เช่น ปัญหาเกี่ยวกับด้าน  Hardware , Software ของ Server       ','Y',5,'Administrator','2014-09-10 13:34:51'),(5,'Authentication Issue','หมวดเกี่ยวกับสิทธิ์การเข้าใช้งาน เช่น ปัญหาการเข้าใช้งานโปรแกรมต่างๆ                 ','Y',4,'Administrator','2014-07-10 13:06:56'),(6,'Other Issue','หมวดอื่นๆ        ','Y',6,'Administrator','2014-07-10 12:57:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
