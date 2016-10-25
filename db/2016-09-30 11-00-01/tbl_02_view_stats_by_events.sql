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

/*View structure for view 02_view_stats_by_events */

/*!50001 DROP TABLE IF EXISTS `02_view_stats_by_events` */;
/*!50001 DROP VIEW IF EXISTS `02_view_stats_by_events` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `02_view_stats_by_events` AS (select max(`b`.`event_datetime`) AS `event_date`,`c`.`user_desc` AS `users`,`d`.`menu_name_th` AS `event_page`,`a`.`ip_address` AS `ip_address`,count(0) AS `counts` from (((`tbl_stats_login` `a` join `tbl_stats_events` `b`) join `tbl_users` `c`) join `tbl_menu` `d`) where ((`a`.`session_id` = `b`.`session_id`) and (`a`.`user_id` = `c`.`user_id`) and (`b`.`menu_id` = `d`.`menu_id`)) group by `a`.`user_id`,`b`.`menu_id`,date_format(`a`.`login_datetime`,_utf8'%d-%m-%Y') order by max(`b`.`event_datetime`) desc) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
