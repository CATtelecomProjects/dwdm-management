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

/*Table structure for table `tbl_sm_sub_module` */

DROP TABLE IF EXISTS `tbl_sm_sub_module`;

CREATE TABLE `tbl_sm_sub_module` (
  `sub_module_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Sub Module ID',
  `sub_module_name` varchar(100) NOT NULL COMMENT 'Sub Module Name',
  `module_name` varchar(10) NOT NULL COMMENT 'Module Name',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Update Time',
  PRIMARY KEY (`sub_module_id`),
  KEY `FK_tbl_sm_sub_module` (`module_name`),
  CONSTRAINT `FK_tbl_sm_sub_module` FOREIGN KEY (`module_name`) REFERENCES `tbl_sm_module` (`module_name`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sm_sub_module` */

insert  into `tbl_sm_sub_module`(`sub_module_id`,`sub_module_name`,`module_name`,`update_time`) values (1,'กลุ่มการวิเคราะห์ด้าน HRM','HKR','2016-02-08 13:08:01'),(2,'กลุ่มการวิเคราะห์ด้าน HRD','HKR','2016-02-08 13:08:01'),(3,'กลุ่มการวิเคราะห์ด้าน RISK MANAGEMENT','HKR','2016-02-08 13:08:01'),(4,'กลุ่มการวิเคราะห์ข้อมูล Customer','CM','2016-02-08 13:08:01'),(5,'กลุ่มการวิเคราะห์ข้อมูล Subcriber','CM','2016-02-08 13:08:01'),(6,'กลุ่มการวิเคราะห์ข้อมูล Usage','CM','2016-02-08 13:08:01'),(7,'กลุ่มการวิเคราะห์ข้อมูล Sale Efficiency','CM','2016-02-08 13:08:01'),(8,'กลุ่มการวิเคราะห์ข้อมูล Customer Finance','CM','2016-02-08 13:08:01'),(9,'CM my Report','CM','2016-02-08 21:58:56'),(10,'Chrun Report','CM','2016-02-08 13:08:01'),(11,'กลุ่มวิเคราะห์สําหรับกลุ่มโทรศัพท์ระหว่างประเทศ IDD','NUA','2016-02-08 13:08:01'),(12,'กลุ่มวิเคราะห์สําหรับกลุ่มโทรศัพท์ระหว่างประเทศ IDD CDR','NUA','2016-02-08 13:08:01'),(13,'กลุ่มวิเคราะห์สำหรับส่วนงาน WIRELESS my ','NUA','2016-02-08 13:08:01'),(14,'กลุ่มวิเคราะห์สำหรับส่วนงาน WIRELESS CDMA ','NUA','2016-02-08 13:08:01'),(15,'กลุ่มวิเคราะห์สำหรับกลุ่มสื่อสารข้อมูล Data Communication','NUA','2016-02-08 13:08:01'),(16,'กลุ่มวิเคราะห์สำหรับกลุ่มสื่อสัญญาณโทรคมนาคม Transmission ','NUA','2016-02-08 13:08:01'),(17,'กลุ่มวิเคราะห์สำหรับกลุ่มบริหารคุณภาพ ','NUA','2016-02-08 13:08:01'),(18,'กลุ่มวิเคราะห์บริการโทรศัพท์ระหว่างประเทศที่คาดว่าผิดปกติ ','NUA','2016-02-08 13:08:01'),(19,'กลุ่มวิเคราะห์คู่เทียบ','NUA','2016-02-08 13:08:01'),(20,'กลุ่มวิเคราะห์ทางการเงิน','FI','2016-02-17 10:09:46'),(21,'กลุ่มวิเคราะห์งบการเงิน-ประสิทธิภาพการใช้ทรัพย์สิน','FI','2016-02-08 13:08:01'),(22,'กลุ่มวิเคราะห์งบประมาณและแผนธุรกิจ\n','FI','2016-02-08 13:08:01'),(23,'กลุ่มวิเคราะห์บัญชีบริหาร-ผลการดําเนินงาน(รวมและไม่รวมสัมปทาน)','FI','2016-08-30 14:45:08'),(24,'KPI-ยอดขายของหน่วยงาน','FI','2016-02-08 13:08:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
