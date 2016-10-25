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

/*Table structure for table `tbl_sm_questionnaire` */

DROP TABLE IF EXISTS `tbl_sm_questionnaire`;

CREATE TABLE `tbl_sm_questionnaire` (
  `emp_code` varchar(8) NOT NULL COMMENT 'Employee Code',
  `report_id` int(10) NOT NULL COMMENT 'Report ID',
  `score` varchar(10) NOT NULL COMMENT 'Score by User',
  `remark` text COMMENT 'Remark by User',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Update Time',
  PRIMARY KEY (`emp_code`,`report_id`),
  KEY `FK_tbl_sm_evaluation2` (`report_id`),
  CONSTRAINT `FK_tbl_sm_evaluation` FOREIGN KEY (`emp_code`) REFERENCES `tbl_sm_emp` (`emp_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_sm_evaluation2` FOREIGN KEY (`report_id`) REFERENCES `tbl_sm_report` (`report_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sm_questionnaire` */

insert  into `tbl_sm_questionnaire`(`emp_code`,`report_id`,`score`,`remark`,`update_time`) values ('00336101',1,'3','ทดสอบการ Comment.','2016-09-28 17:28:47'),('00336101',2,'3','ทดสอบการ ป้อนข้อมูล\r\n\r\n OKKK','2016-09-28 17:28:47'),('00336101',3,'3','หมายเหตุ HRM-003 ใช้ต่อไป','2016-02-24 11:19:32'),('00336101',4,'1','หมายเตุ เฉยๆๆ\r\n\r\n ตามนั้น','2016-03-02 08:49:21'),('00336101',5,'3','hrm-005...ไม่ใช้แล้วว','2016-02-24 11:19:32'),('00336101',6,'1','เข้ามาส่ง ข้อมูล','2016-02-26 09:23:24'),('00336101',7,'2','ใช้งาน หน่อยนึง','2016-02-26 09:23:24'),('00336101',8,'3','ok nothing','2016-09-28 14:19:18'),('00336101',9,'3','การทดสอบ 4','2016-02-24 11:13:23'),('00336101',10,'1','ขอโทษที  ไม่ค่อยได้ใช้','2016-02-24 11:19:32'),('00336101',11,'2','การทดสอบ TEST No. 111','2016-09-28 17:28:27'),('00336101',12,'5','testttttt\r\nNo. 112','2016-09-28 17:28:27'),('00369521',1,'1','ทดสอบ  test','2016-02-25 15:50:28'),('00369521',2,'2','aaa','2016-02-25 15:50:03'),('00369521',3,'3','eeee','2016-02-25 15:50:03'),('00369521',4,'','','2016-02-25 15:50:03'),('00369521',5,'3','ฟฟฟฟฟ','2016-02-25 15:51:24'),('00369521',6,'','','2016-02-25 15:50:03'),('00369521',7,'4','ทดสอบ...','2016-02-25 15:51:24'),('00369521',8,'1','ทดสอบ','2016-02-25 15:50:15'),('00369521',9,'','','2016-02-25 15:50:15'),('00369521',10,'','','2016-02-25 15:50:15'),('00369521',11,'2','testt','2016-02-25 15:52:06'),('00369521',12,'3','ก็แค่  ทำการทดสอบ','2016-02-25 15:52:06'),('00369521',61,'1','','2016-02-25 15:49:47'),('00369521',62,'1','','2016-02-25 15:49:47'),('00369521',63,'','','2016-02-25 15:49:47'),('00369521',64,'3','','2016-02-25 15:49:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
