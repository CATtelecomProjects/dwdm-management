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

/*View structure for view view_sm_emp */

/*!50001 DROP TABLE IF EXISTS `view_sm_emp` */;
/*!50001 DROP VIEW IF EXISTS `view_sm_emp` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`catadmin`@`%` SQL SECURITY DEFINER VIEW `view_sm_emp` AS select `a`.`emp_code` AS `emp_code`,`a`.`emp_name` AS `emp_name`,`a`.`emp_pos_desc` AS `emp_pos_desc`,`a`.`emp_pos_short` AS `emp_pos_short`,`a`.`emp_email` AS `emp_email`,`a`.`org_code` AS `org_code`,`a`.`default_auth` AS `default_auth`,`a`.`emp_admin_code` AS `emp_admin_code`,`b`.`org_name` AS `org_name`,`b`.`org_short` AS `org_short`,`a`.`actived` AS `actived` from (`tbl_sm_emp` `a` join `tbl_sm_org` `b` on((`a`.`org_code` = `b`.`org_code`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
