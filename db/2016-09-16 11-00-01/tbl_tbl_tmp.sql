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

/*Table structure for table `tbl_tmp` */

DROP TABLE IF EXISTS `tbl_tmp`;

CREATE TABLE `tbl_tmp` (
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tmp` */

insert  into `tbl_tmp`(`code`) values ('00360261'),('00800213'),('00806000'),('00353511'),('01000175'),('01000234'),('01000098'),('00359997'),('00801005'),('01000341'),('01000368'),('00801199'),('00219105'),('00356709'),('01000463'),('00806330'),('01000309'),('00801416'),('00801636'),('00802318'),('00308375'),('00343026'),('00803388'),('01000216'),('00803896'),('00295572'),('00804507'),('00191715'),('00309235'),('00262518'),('00806068'),('01000372'),('01000355'),('01000400'),('01000327'),('00800838'),('01000419');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
