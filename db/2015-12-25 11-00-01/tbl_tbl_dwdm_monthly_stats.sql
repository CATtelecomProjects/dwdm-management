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

/*Table structure for table `tbl_dwdm_monthly_stats` */

DROP TABLE IF EXISTS `tbl_dwdm_monthly_stats`;

CREATE TABLE `tbl_dwdm_monthly_stats` (
  `ID` int(11) NOT NULL auto_increment,
  `YEARS` year(4) NOT NULL,
  `MONTHS` tinyint(4) NOT NULL,
  `CODE` varchar(20) NOT NULL,
  `NAME` varchar(125) default NULL,
  `POSITION_NAME` varchar(30) default NULL,
  `WEB_STATS` int(5) default NULL,
  `TOOL_STATS` int(5) default NULL,
  `TOTALS` int(5) default NULL,
  `TYPES` char(1) default NULL,
  `LEVELS` tinyint(2) default NULL,
  PRIMARY KEY  (`ID`,`YEARS`,`MONTHS`,`CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_dwdm_monthly_stats` */

insert  into `tbl_dwdm_monthly_stats`(`ID`,`YEARS`,`MONTHS`,`CODE`,`NAME`,`POSITION_NAME`,`WEB_STATS`,`TOOL_STATS`,`TOTALS`,`TYPES`,`LEVELS`) values (1,2015,10,'00000007','หน่วยงานสายงานโครงข่าย','ข',136,62,198,'O',2),(2,2015,10,'50020103','กลุ่มปฏิบัติการบริการ','กข',119,53,172,'O',3),(3,2015,10,'50020113','ฝ่ายชุมสายโทรศัพท์','ทข.',119,53,172,'O',4),(4,2015,10,'00184094','นาย ชารี แก้วชัย','ชฝ.9',59,21,80,'E',5),(5,2015,10,'00301165','นาย พิภพ สุภาผล','วศก.8',2,1,3,'E',6),(6,2015,10,'00315591','นาย กฤษณ์ นวลรัตนตระกูล','วศก.8',21,6,27,'E',6),(7,2015,10,'00210353','นาย สันติภาพ ไข่ทองดี','วศก.8',2,2,4,'E',6),(8,2015,10,'00310680','นาย วิโรจน์ ปานเพชร','ผส.8',21,13,34,'E',6),(9,2015,10,'00208129','นาย ธีระ วรรธนะพงษ์','นทค.6',2,1,3,'E',6),(10,2015,10,'00270665','นาย ดำรงกุล ศรีบุญเรือง','วศก.8',4,2,6,'E',6),(11,2015,10,'00185718','น.ส. อติวรรณ กังวานภูมิ','พกค.7',1,1,2,'E',6),(12,2015,10,'00185912','น.ส. สุณี เลิศวงศ์ไพฑูรย์','พกค.6',2,2,4,'E',6),(13,2015,10,'00295051','น.ส. ศุภกานต์ ใช้คงเนตร','พกค.6',3,3,6,'E',6),(14,2015,10,'00325015','น.ส. วนิษา รุ่งสุข','นทค.6',2,1,3,'E',6),(15,2015,10,'50033529','กลุ่มสำนักงานบริการ 2','สข 2',17,9,26,'O',3),(16,2015,10,'00000069','สำนักงานบริการลูกค้า กสท ตะวันออกเฉียงเหนือ','สข.(อน)',4,1,5,'O',4),(17,2015,10,'00189468','นาย ดำรง แสงโฮง','ชอ.9',4,1,5,'E',5),(18,2015,10,'00000070','สำนักงานบริการลูกค้า กสท เขตกลาง','สข.(ก)',13,8,21,'O',4),(19,2015,10,'00181916','นาย พินิจ คงสมบูรณ์','ผส.8',4,3,7,'E',6),(20,2015,10,'01000015','น.ส. ณัฐพร จิตโส','นพณ.5',8,4,12,'E',6),(21,2015,10,'00200596','นาย วิรัช สอนดี','ผสค.8',1,1,2,'E',6),(22,2015,10,'00000010','หน่วยงานสายงานสื่อสารไร้สาย','ร',18,5,23,'O',2),(23,2015,10,'50020120','กลุ่มบริการลูกค้ารายย่อย','ยร',18,5,23,'O',3),(24,2015,10,'00000058','ฝ่ายขายและตลาดสื่อสารไร้สาย','ตร.',18,5,23,'O',4),(25,2015,10,'00305695','นาย ประวิทย์ ระวิงทอง','ฝ.10',3,1,4,'E',5),(26,2015,10,'00358587','นาง มุกดา พิมพ์ประสิทธิ์','นบช.6',12,3,15,'E',6),(27,2015,10,'00358723','น.ส. กุลธิดา มหากนก','นพณ.6',1,0,1,'E',6),(28,2015,10,'00358435','น.ส. ธนาภรณ์ แสวงทอง','นพณ.7',2,1,3,'E',6),(29,2015,10,'00000011','หน่วยงานสายงานการตลาดและการขาย','ต',37,16,53,'O',2),(30,2015,10,'00000065','ฝ่ายพัฒนาธุรกิจการตลาดลูกค้ารายย่อย','ยต.',18,7,25,'O',3),(31,2015,10,'00186131','นาย ธานินท์ หยวกขาว','ฝ.10',1,1,2,'E',4),(32,2015,10,'00314806','นาย กลชัย ภิญโญกุล','ชฝ.9',10,2,12,'E',4),(33,2015,10,'00032971','น.ส. สุวิมล ผาโคตร','ผส.8',6,3,9,'E',5),(34,2015,10,'00230715','นาง จวงจันทร์ ปฐมปรีชากุล','ผส.8',1,1,2,'E',5),(35,2015,10,'50020098','กลุ่มพัฒนาผลิตภัณฑ์','ผต',16,8,24,'O',3),(36,2015,10,'00000046','ฝ่ายพัฒนาผลิตภัณฑ์โทรศัพท์','ทต.',4,2,6,'O',4),(37,2015,10,'00249984','นาย สมเกียรติ ช้อนพุดซา','วศก.8',3,1,4,'E',6),(38,2015,10,'00310350','นาย วัชรพงศ์ วัฒนสมบัติ','วศก.8',1,1,2,'E',6),(39,2015,10,'50020108','ฝ่ายพัฒนาผลิตภัณฑ์บรอดแบนด์','บต.',2,2,4,'O',4),(40,2015,10,'00226127','น.ส. อภิรดี ฉัตรวลีพร','พบง.7',2,2,4,'E',6),(41,2015,10,'50020110','ฝ่ายพัฒนาผลิตภัณฑ์สื่อสารข้อมูล','มต.',6,3,9,'O',4),(42,2015,10,'00341866','นาง ธนวรรณ พันธุ์ดี','พธก.6',6,3,9,'E',6),(43,2015,10,'50020141','ฝ่ายเทคโนโลยีศูนย์ข้อมูล','ศต.',4,1,5,'O',4),(44,2015,10,'01000048','น.ส. ปิยธิดา นาขุนทด','วศก.5',4,1,5,'E',6),(45,2015,10,'50020119','กลุ่มบริการลูกค้าขายส่งและเอกชน','ขต',3,1,4,'O',3),(46,2015,10,'00000061','นาย สมเกียรติ กุลธรรมโยธิน','ชจญ.11',1,1,2,'E',4),(47,2015,10,'00238966','ฝ่ายขายลูกค้าเอกชน','อต.',2,0,2,'O',4),(48,2015,10,'00210162','นาย สมเกียรติ ไชยจำ','ชฝ.9',2,0,2,'E',5),(49,2015,10,'00000014','หน่วยงานสายงานการเงิน','ง',23,14,37,'O',2),(50,2015,10,'00000029','กลุ่มบัญชี','บง',17,12,29,'O',3),(51,2015,10,'00000084','ฝ่ายบัญชีการเงิน','ชง.',3,1,4,'O',4),(52,2015,10,'00337281','น.ส. สุวรรณา ชูอินทร์','ผส.8',3,1,4,'E',6),(53,2015,10,'00000085','ฝ่ายบัญชีบริหาร','บง.',11,8,19,'O',4),(54,2015,10,'00236560','น.ส. วรรณา อินทรปัญญา','ผส.8',1,1,2,'E',6),(55,2015,10,'00239127','น.ส. ศรีนารถ แซ่ก๊วย','ผส.8',1,1,2,'E',6),(56,2015,10,'00264956','น.ส. เตือนใจ พ่วงปาน','นบช.7',1,1,2,'E',6),(57,2015,10,'00368519','น.ส. อรวรรณ ไตรรัตนานาถ','นบช.5',7,4,11,'E',6),(58,2015,10,'00322393','น.ส. ระเบียบ ผาสุขฐาน','ผส.8',1,1,2,'E',6),(59,2015,10,'00000086','ฝ่ายบัญชีลูกหนี้เจ้าหนี้','ลง.',3,3,6,'O',4),(60,2015,10,'00257646','น.ส. นริสา รัตนรักษ์','ผส.8',1,1,2,'E',6),(61,2015,10,'00366223','น.ส. กิตติยาภรณ์ ลิ้มประเสริฐ','นบช.6',2,2,4,'E',6),(62,2015,10,'00000088','ฝ่ายบริหารการเงิน','กง.',6,2,8,'O',3),(63,2015,10,'00258218','น.ส. มาลี ตันติลิขิตกุล','ผส.8',5,1,6,'E',5),(64,2015,10,'00369945','น.ส. สุภาวดี ไหมทอง','นบช.5',1,1,2,'E',5),(65,2015,10,'00000015','หน่วยงานสายงานทรัพยากรบุคคล','บ',17,5,22,'O',2),(66,2015,10,'50020106','กลุ่มทรัพยากรบุคคล','บบ',17,5,22,'O',3),(67,2015,10,'00000090','ฝ่ายกลยุทธ์ทรัพยากรบุคคล','กบ.',12,3,15,'O',4),(68,2015,10,'00296681','นาง ยุพินภรณ์ ศักดิ์กิตติมาลัย','ผส.8',6,2,8,'E',6),(69,2015,10,'00280147','น.ส. ศิริมา เจริญพักตร์','ผส.8',2,1,3,'E',6),(70,2015,10,'00358639','น.ส. สุวัฒนา เปลี่ยนเดชา','วทก.7',4,0,4,'E',6),(71,2015,10,'00000092','ฝ่ายปฏิบัติการทรัพยากรบุคคล','ปบ.',5,2,7,'O',4),(72,2015,10,'00219082','นาย ธีระชัย ประยูรผลผดุง','พบค.7',1,0,1,'E',6),(73,2015,10,'00333586','นาง รุ่งนภา บุญเหลือ','ผส.8',3,1,4,'E',6),(74,2015,10,'01000326','นาย สุทธิวัฒน์ ดาราศรีศักดิ์','พปค.4',1,1,2,'E',6),(75,2015,10,'00000016','หน่วยงานสายงานเทคโนโลยีสารสนเทศ','ท',107,47,154,'O',2),(76,2015,10,'50020100','กลุ่มเทคโนโลยีสารสนเทศ','ทท',107,47,154,'O',3),(77,2015,10,'00000097','ฝ่ายเทคโนโลยีสารสนเทศเพื่อสนับสนุนธุรกิจ','ธท.',107,47,154,'O',4),(78,2015,10,'00348856','นาย อภินันท์ ศรแก้วดารา','พปค.8',1,0,1,'E',6),(79,2015,10,'00331135','นาย ธรรมรัฐ วัชรานันทกุล','พปค.8',46,12,58,'E',6),(80,2015,10,'00336101','น.ส. พรรณี ชมสมุท','พปค.8',18,8,26,'E',6),(81,2015,10,'00348364','น.ส. วรรณนภา อ่ำพิจิตร','ผส.8',1,1,2,'E',6),(82,2015,10,'00354293','นาย ปิยะพงษ์ แก้วน่าน','พปค.7',18,14,32,'E',6),(83,2015,10,'00354633','นาง ธนาทิพย์ แม้นสมุทร','นคค.7',6,3,9,'E',6),(84,2015,10,'00364445','น.ส. ภัทริกา แก้วใจ','วศก.6',10,4,14,'E',6),(85,2015,10,'00370251','นาย ณัฐวัฒน์ แสงสีทอง','นคค.6',7,5,12,'E',6),(86,2015,9,'00000006','หน่วยงานสายงานกลยุทธ์องค์กร','ก',5,1,6,'O',2),(87,2015,9,'00206192','นาย กิตติพงษ์ เมฆวิจิตรแสง','รจญ.13',1,1,2,'E',3),(88,2015,9,'00000036','ฝ่ายวางแผนกลยุทธ์องค์กร','ผก.',3,0,3,'O',4),(89,2015,9,'00340773','นาย พลาคม ตราชู','ชฝ.9',3,0,3,'E',3),(90,2015,9,'50020101','กลุ่มกลยุทธ์องค์กร','กก',1,1,2,'O',3),(91,2015,9,'00000037','ฝ่ายพัฒนาและประเมินผลองค์กร','พก.',1,1,2,'O',4),(92,2015,9,'00308812','นาย ชูชีพ ภักดี','วศก.8',1,1,2,'E',6),(93,2015,9,'00000007','หน่วยงานสายงานโครงข่าย','ข',131,68,199,'O',2),(94,2015,9,'00179656','นาย สุรพล สงวนศิลป์','รจญ.13',1,1,2,'E',3),(95,2015,9,'50020103','กลุ่มปฏิบัติการบริการ','กข',92,50,142,'O',3),(96,2015,9,'00179643','นาย สุทธิพร ยุวจิตติ','ชจญ.11',1,0,1,'E',4),(97,2015,9,'50020113','ฝ่ายชุมสายโทรศัพท์','ทข.',90,50,140,'O',4),(98,2015,9,'00184094','นาย ชารี แก้วชัย','ชฝ.9',23,12,35,'E',5),(99,2015,9,'00301165','นาย พิภพ สุภาผล','วศก.8',2,1,3,'E',6),(100,2015,9,'00315591','นาย กฤษณ์ นวลรัตนตระกูล','วศก.8',19,11,30,'E',6),(101,2015,9,'00210353','นาย สันติภาพ ไข่ทองดี','วศก.8',13,6,19,'E',6),(102,2015,9,'00310680','นาย วิโรจน์ ปานเพชร','ผส.8',12,6,18,'E',6),(103,2015,9,'00314819','นาย วัฒนชัย บุญช่วย','วศก.8',2,1,3,'E',6),(104,2015,9,'00341824','นาย ชุมพล ภูศรีฤทธิ์','นทค.6',3,3,6,'E',6),(105,2015,9,'00208129','นาย ธีระ วรรธนะพงษ์','นทค.6',2,2,4,'E',6),(106,2015,9,'00301149','นาย พีระเดช จันทร์ตรี','วศก.8',1,1,2,'E',6),(107,2015,9,'00325015','น.ส. วนิษา รุ่งสุข','นทค.6',12,6,18,'E',6),(108,2015,9,'00186115','นาย จำเริญ โชชัยชาญ','ผส.8',1,1,2,'E',6),(109,2015,9,'50020114','ฝ่ายสื่อสารข้อมูล','มข.',1,0,1,'O',4),(110,2015,9,'00216386','นาย วสันต์ เสนาะกรรณ์','ฝ.10',1,0,1,'E',5),(111,2015,9,'50020121','กลุ่มสำนักงานบริการ 1','สข 1',5,4,9,'O',3),(112,2015,9,'00000068','สำนักงานบริการลูกค้า กสท เขตเหนือ','สข.(น)',1,1,2,'O',4),(113,2015,9,'00260824','นาง ปราณี พิละกันทา','ผส.8',1,1,2,'E',6),(114,2015,9,'00000072','สำนักงานบริการลูกค้า กสท เขตตะวันตก','สข.(ตต)',2,2,4,'O',4),(115,2015,9,'00249214','นาย ปริญญา จันทร์ชนะ','ผสค.8',1,1,2,'E',6),(116,2015,9,'00170778','นาย ทวีทรัพย์ เอี่ยมอาษา','ผสค.8',1,1,2,'E',6),(117,2015,9,'00000073','สำนักงานบริการลูกค้า กสท เขตใต้','สข.(ต)',2,1,3,'O',4),(118,2015,9,'00283908','นาย อดิศร ขาวสังข์','ชอ.9',1,0,1,'E',5),(119,2015,9,'00179753','นาย ชัยยา แพรกสงฆ์','ผสค.8',1,1,2,'E',6),(120,2015,9,'50033529','กลุ่มสำนักงานบริการ 2','สข 2',34,14,48,'O',3),(121,2015,9,'00000069','สำนักงานบริการลูกค้า กสท ตะวันออกเฉียงเหนือ','สข.(อน)',14,3,17,'O',4),(122,2015,9,'00189468','นาย ดำรง แสงโฮง','ชอ.9',8,1,9,'E',5),(123,2015,9,'00240349','น.ส. มนชยา หิรัณยธร','ผส.8',1,0,1,'E',6),(124,2015,9,'00233819','นาย ถาวร ช่วยศรี','ผสค.8',2,0,2,'E',6),(125,2015,9,'00249379','นาย อนุชา กองตระกูลดี','ผสค.8',1,1,2,'E',6),(126,2015,9,'00247164','นาย ประมวล สาระโว','ผสค.8',2,1,3,'E',6),(127,2015,9,'00000070','สำนักงานบริการลูกค้า กสท เขตกลาง','สข.(ก)',14,8,22,'O',4),(128,2015,9,'00181916','นาย พินิจ คงสมบูรณ์','ผส.8',5,3,8,'E',6),(129,2015,9,'01000015','น.ส. ณัฐพร จิตโส','นพณ.5',1,0,1,'E',6),(130,2015,9,'00200596','นาย วิรัช สอนดี','ผสค.8',6,3,9,'E',6),(131,2015,9,'00233576','นาย สมบูรณ์ จะวะนะ','ผสค.8',1,1,2,'E',6),(132,2015,9,'00210560','นาย ณรงค์ แก่นด้วง','ผสค.8',1,1,2,'E',6),(133,2015,9,'00000071','สำนักงานบริการลูกค้า กสท เขตตะวันออก','สข.(อ)',6,3,9,'O',4),(134,2015,9,'00213237','นาย จักรินทร์ หินอ่อน','ผส.8',1,1,2,'E',6),(135,2015,9,'00309769','นาย ธีระชัย ทองสัมฤทธิ์','นพณ.6',3,1,4,'E',6),(136,2015,9,'00201281','นาย ชาตรี ผ่องสะอาด','ผสค.8',1,1,2,'E',6),(137,2015,9,'00258917','นาย พจน์ พจนพาณิชย์กุล','ผสค.8',1,0,1,'E',6),(138,2015,9,'00000010','หน่วยงานสายงานสื่อสารไร้สาย','ร',18,7,25,'O',2),(139,2015,9,'50020120','กลุ่มบริการลูกค้ารายย่อย','ยร',18,7,25,'O',3),(140,2015,9,'00000058','ฝ่ายขายและตลาดสื่อสารไร้สาย','ตร.',18,7,25,'O',4),(141,2015,9,'00358587','นาง มุกดา พิมพ์ประสิทธิ์','นบช.6',17,6,23,'E',6),(142,2015,9,'00254762','น.ส. วรรณา กิติโรจน์พันธ์','ผส.8',1,1,2,'E',6),(143,2015,9,'00000011','หน่วยงานสายงานการตลาดและการขาย','ต',46,26,72,'O',2),(144,2015,9,'00000027','กลุ่มบริการลูกค้าภาครัฐ','รต',1,1,2,'O',3),(145,2015,9,'50020070','ฝ่ายพัฒนาธุรกิจการตลาดลูกค้าภาครัฐ','พต.',1,1,2,'O',4),(146,2015,9,'00342946','นาย นพรัตน์ รัตโนภาส','ผส.8',1,1,2,'E',6),(147,2015,9,'00000065','ฝ่ายพัฒนาธุรกิจการตลาดลูกค้ารายย่อย','ยต.',2,2,4,'O',3),(148,2015,9,'00032971','น.ส. สุวิมล ผาโคตร','ผส.8',1,1,2,'E',5),(149,2015,9,'00185365','นาง พีระพรรณ เพิ่มธัญกิจกุล','ผส.8',1,1,2,'E',5),(150,2015,9,'00000066','ฝ่ายจัดเก็บหนี้ส่วนกลาง','จต.',7,4,11,'O',3),(151,2015,9,'00274496','นาง สุภัทรา วัลลิกุล','พงบ.6',7,4,11,'E',5),(152,2015,9,'50020098','กลุ่มพัฒนาผลิตภัณฑ์','ผต',32,16,48,'O',3),(153,2015,9,'00000046','ฝ่ายพัฒนาผลิตภัณฑ์โทรศัพท์','ทต.',18,8,26,'O',4),(154,2015,9,'00264406','นาย สมพงษ์ อัศวบุญมี','ฝ.10',4,3,7,'E',5),(155,2015,9,'00354303','น.ส. ศยามน เจริญภักตร์','ผส.8',1,1,2,'E',6),(156,2015,9,'00301136','นาย จักรวัฒน์ ทองปราโมทย์','ผส.8',1,1,2,'E',6),(157,2015,9,'00248561','นาย โกวิทย์ บุญศรี','ผส.8',7,1,8,'E',6),(158,2015,9,'00249984','นาย สมเกียรติ ช้อนพุดซา','วศก.8',4,1,5,'E',6),(159,2015,9,'00218533','นาย วิเชียร มานนท์','ผส.8',1,1,2,'E',6),(160,2015,9,'50020108','ฝ่ายพัฒนาผลิตภัณฑ์บรอดแบนด์','บต.',2,2,4,'O',4),(161,2015,9,'00226127','น.ส. อภิรดี ฉัตรวลีพร','พบง.7',2,2,4,'E',6),(162,2015,9,'50020110','ฝ่ายพัฒนาผลิตภัณฑ์สื่อสารข้อมูล','มต.',6,3,9,'O',4),(163,2015,9,'00356233','นาย วัชระ โชคชัยทวีทรัพย์','วศก.6',2,1,3,'E',6),(164,2015,9,'00356505','นาง วรรณภา ศรีสง่างามกุล','ผส.8',2,0,2,'E',6),(165,2015,9,'00334116','นาง วชิรา คันธอุลิส','ผส.8',1,1,2,'E',6),(166,2015,9,'00185433','น.ส. พัชรา แตงนาค','ผส.8',1,1,2,'E',6),(167,2015,9,'50020111','ฝ่ายพัฒนาผลิตภัณฑ์ธุรกิจอิเล็กทรอนิกส์','นต.',2,2,4,'O',4),(168,2015,9,'00198734','นาย ธนกร พิริยพรปกรณ์','ผส.8',1,1,2,'E',6),(169,2015,9,'00332558','นาย วสันต์ วงค์ปันดีด','ผส.8',1,1,2,'E',6),(170,2015,9,'50020112','ฝ่ายพัฒนาผลิตภัณฑ์ความปลอดภัยเทคโนโลยีสารสนเทศ','ผต.',2,1,3,'O',4),(171,2015,9,'00356291','น.ส. ไอลดา เพ็งมีศรี','นบง.7',2,1,3,'E',6),(172,2015,9,'50020141','ฝ่ายเทคโนโลยีศูนย์ข้อมูล','ศต.',2,0,2,'O',4),(173,2015,9,'01000048','น.ส. ปิยธิดา นาขุนทด','วศก.5',2,0,2,'E',6),(174,2015,9,'50020119','กลุ่มบริการลูกค้าขายส่งและเอกชน','ขต',4,3,7,'O',3),(175,2015,9,'00000061','ฝ่ายขายลูกค้าเอกชน','อต.',1,1,2,'O',4),(176,2015,9,'00225607','น.ส. ผ่องพรรณ สินสุขอภิรมย์','ผส.8',1,1,2,'E',6),(177,2015,9,'50020073','ฝ่ายพัฒนาธุรกิจการตลาดลูกค้าภาคเอกชน','ชต.',1,0,1,'O',4),(178,2015,9,'00338727','นาย ธนกฤต นาหนองตูม','ผส.8',1,0,1,'E',6),(179,2015,9,'50028900','ฝ่ายขายผู้ประกอบการ','กต.',2,2,4,'O',4),(180,2015,9,'00342357','นาย วรุตม์ วิวัฒนวงศา','ชฝ.9',1,1,2,'E',5),(181,2015,9,'00290661','น.ส. อัมพิกา ศรีพัลลพ','ผส.8',1,1,2,'E',6),(182,2015,9,'00000014','หน่วยงานสายงานการเงิน','ง',35,14,49,'O',2),(183,2015,9,'00000029','กลุ่มบัญชี','บง',33,13,46,'O',3),(184,2015,9,'00000084','ฝ่ายบัญชีการเงิน','ชง.',11,4,15,'O',4),(185,2015,9,'00337281','น.ส. สุวรรณา ชูอินทร์','ผส.8',6,2,8,'E',6),(186,2015,9,'00310596','นาง วิชชุดา ด้วงฟู','ผส.7',5,2,7,'E',6),(187,2015,9,'00000085','ฝ่ายบัญชีบริหาร','บง.',14,4,18,'O',4),(188,2015,9,'00264956','น.ส. เตือนใจ พ่วงปาน','นบช.7',2,2,4,'E',6),(189,2015,9,'00368519','น.ส. อรวรรณ ไตรรัตนานาถ','นบช.5',10,1,11,'E',6),(190,2015,9,'00322393','น.ส. ระเบียบ ผาสุขฐาน','ผส.8',2,1,3,'E',6),(191,2015,9,'00000086','ฝ่ายบัญชีลูกหนี้เจ้าหนี้','ลง.',8,5,13,'O',4),(192,2015,9,'00257646','น.ส. นริสา รัตนรักษ์','ผส.8',1,1,2,'E',6),(193,2015,9,'00366223','น.ส. กิตติยาภรณ์ ลิ้มประเสริฐ','นบช.6',7,4,11,'E',6),(194,2015,9,'00000088','ฝ่ายบริหารการเงิน','กง.',2,1,3,'O',3),(195,2015,9,'00369945','น.ส. สุภาวดี ไหมทอง','นบช.5',2,1,3,'E',5),(196,2015,9,'00000015','หน่วยงานสายงานทรัพยากรบุคคล','บ',8,3,11,'O',2),(197,2015,9,'50020106','กลุ่มทรัพยากรบุคคล','บบ',8,3,11,'O',3),(198,2015,9,'00000090','ฝ่ายกลยุทธ์ทรัพยากรบุคคล','กบ.',7,3,10,'O',4),(199,2015,9,'00296681','นาง ยุพินภรณ์ ศักดิ์กิตติมาลัย','ผส.8',2,1,3,'E',6),(200,2015,9,'00358639','น.ส. สุวัฒนา เปลี่ยนเดชา','วทก.7',5,2,7,'E',6),(201,2015,9,'00000092','ฝ่ายปฏิบัติการทรัพยากรบุคคล','ปบ.',1,0,1,'O',4),(202,2015,9,'00219082','นาย ธีระชัย ประยูรผลผดุง','พบค.7',1,0,1,'E',6),(203,2015,9,'00000016','หน่วยงานสายงานเทคโนโลยีสารสนเทศ','ท',94,42,136,'O',2),(204,2015,9,'50020100','กลุ่มเทคโนโลยีสารสนเทศ','ทท',94,42,136,'O',3),(205,2015,9,'00000097','ฝ่ายเทคโนโลยีสารสนเทศเพื่อสนับสนุนธุรกิจ','ธท.',94,42,136,'O',4),(206,2015,9,'00206134','น.ส. มธุรส จุลินทร','ชฝ.9',6,2,8,'E',5),(207,2015,9,'00270034','นาย สุรพล หอมทวนลม','พปค.8',1,0,1,'E',6),(208,2015,9,'00331135','นาย ธรรมรัฐ วัชรานันทกุล','พปค.8',21,9,30,'E',6),(209,2015,9,'00336101','น.ส. พรรณี ชมสมุท','พปค.8',15,7,22,'E',6),(210,2015,9,'00348364','น.ส. วรรณนภา อ่ำพิจิตร','ผส.8',4,4,8,'E',6),(211,2015,9,'00354293','นาย ปิยะพงษ์ แก้วน่าน','พปค.7',10,4,14,'E',6),(212,2015,9,'00354633','นาง ธนาทิพย์ แม้นสมุทร','นคค.7',4,2,6,'E',6),(213,2015,9,'00364445','น.ส. ภัทริกา แก้วใจ','วศก.6',11,4,15,'E',6),(214,2015,9,'00369521','นาย พิสิฐ คูวิจิตรจารุ','นคค.6',2,0,2,'E',6),(215,2015,9,'00370251','นาย ณัฐวัฒน์ แสงสีทอง','นคค.6',20,10,30,'E',6),(216,2015,11,'00000006','หน่วยงานสายงานกลยุทธ์องค์กร','ก',7,4,11,'O',2),(217,2015,11,'50020101','กลุ่มกลยุทธ์องค์กร','กก',7,4,11,'O',3),(218,2015,11,'00000031','ฝ่ายบริหารความเสี่ยงและควบคุมภายใน','สก.',2,1,3,'O',4),(219,2015,11,'00180289','นาง จุฑาธิป ฉิมกุล','ผส.8',2,1,3,'E',6),(220,2015,11,'00000037','ฝ่ายพัฒนาและประเมินผลองค์กร','พก.',5,3,8,'O',4),(221,2015,11,'00308812','นาย ชูชีพ ภักดี','วศก.8',5,3,8,'E',6),(222,2015,11,'00000007','หน่วยงานสายงานโครงข่าย','ข',134,52,186,'O',2),(223,2015,11,'50020103','กลุ่มปฏิบัติการบริการ','กข',124,48,172,'O',3),(224,2015,11,'50020113','ฝ่ายชุมสายโทรศัพท์','ทข.',124,48,172,'O',4),(225,2015,11,'00184094','นาย ชารี แก้วชัย','ชฝ.9',89,24,113,'E',5),(226,2015,11,'00315591','นาย กฤษณ์ นวลรัตนตระกูล','วศก.8',20,13,33,'E',6),(227,2015,11,'00310680','นาย วิโรจน์ ปานเพชร','ผส.8',4,3,7,'E',6),(228,2015,11,'00341824','นาย ชุมพล ภูศรีฤทธิ์','นทค.6',3,2,5,'E',6),(229,2015,11,'00208129','นาย ธีระ วรรธนะพงษ์','นทค.6',1,1,2,'E',6),(230,2015,11,'00325015','น.ส. วนิษา รุ่งสุข','นทค.6',7,5,12,'E',6),(231,2015,11,'50020121','กลุ่มสำนักงานบริการ 1','สข 1',3,0,3,'O',3),(232,2015,11,'00000068','สำนักงานบริการลูกค้า กสท เขตเหนือ','สข.(น)',3,0,3,'O',4),(233,2015,11,'00317308','นาย ธนากร ทองใบ','ชอ.9',3,0,3,'E',5),(234,2015,11,'50033529','กลุ่มสำนักงานบริการ 2','สข 2',7,4,11,'O',3),(235,2015,11,'00000069','สำนักงานบริการลูกค้า กสท ตะวันออกเฉียงเหนือ','สข.(อน)',1,1,2,'O',4),(236,2015,11,'00261373','นาย ประภาพล สิงห์ใจเพ็ชร์','ผสค.8',1,1,2,'E',6),(237,2015,11,'00000070','สำนักงานบริการลูกค้า กสท เขตกลาง','สข.(ก)',6,3,9,'O',4),(238,2015,11,'00181916','นาย พินิจ คงสมบูรณ์','ผส.8',2,2,4,'E',6),(239,2015,11,'01000015','น.ส. ณัฐพร จิตโส','นพณ.5',4,1,5,'E',6),(240,2015,11,'00000010','หน่วยงานสายงานสื่อสารไร้สาย','ร',27,10,37,'O',2),(241,2015,11,'00000026','กลุ่มปฏิบัติการสื่อสารไร้สาย','ปร',1,1,2,'O',3),(242,2015,11,'00000057','ฝ่ายปฏิบัติการและบำรุงรักษาสื่อสารไร้สาย','ปร.',1,1,2,'O',4),(243,2015,11,'00213143','นาย สุทธิ สุนทรพงษ์','ผส.8',1,1,2,'E',6),(244,2015,11,'50020120','กลุ่มบริการลูกค้ารายย่อย','ยร',26,9,35,'O',3),(245,2015,11,'00000058','ฝ่ายขายและตลาดสื่อสารไร้สาย','ตร.',26,9,35,'O',4),(246,2015,11,'00263847','น.ส. จรรยา วุฒยาภรณ์','ผส.8',5,0,5,'E',6),(247,2015,11,'00358587','นาง มุกดา พิมพ์ประสิทธิ์','นบช.6',13,6,19,'E',6),(248,2015,11,'00358723','น.ส. กุลธิดา มหากนก','นพณ.6',6,2,8,'E',6),(249,2015,11,'00358435','น.ส. ธนาภรณ์ แสวงทอง','นพณ.7',1,0,1,'E',6),(250,2015,11,'00226554','นาง เกรียงสมร สิทธิยานนท์','พกค.7',1,1,2,'E',6),(251,2015,11,'00000011','หน่วยงานสายงานการตลาดและการขาย','ต',27,18,45,'O',2),(252,2015,11,'00000065','ฝ่ายพัฒนาธุรกิจการตลาดลูกค้ารายย่อย','ยต.',16,10,26,'O',3),(253,2015,11,'00186131','นาย ธานินท์ หยวกขาว','ฝ.10',1,1,2,'E',4),(254,2015,11,'00307143','นาย อุเทน ตรีเพชรรัตน์','ผส.8',1,1,2,'E',5),(255,2015,11,'00908445','น.ส. ฐิติมา กุสุมา ณ อยุธยา','นบง.5',2,0,2,'E',5),(256,2015,11,'00230391','นาง ศิริพร ขวัญทอง','พพณ.7',3,2,5,'E',5),(257,2015,11,'00255062','นาง ธัญพร สัจจะผลกุล','พปค.8',5,2,7,'E',5),(258,2015,11,'00337469','นาง พรรณี พรหมวิเศษ','นคค.8',2,2,4,'E',5),(259,2015,11,'00342098','น.ส. ภคพร บรรจงจัด','นพณ.6',1,1,2,'E',5),(260,2015,11,'00185365','นาง พีระพรรณ เพิ่มธัญกิจกุล','ผส.8',1,1,2,'E',5),(261,2015,11,'00000066','ฝ่ายจัดเก็บหนี้ส่วนกลาง','จต.',1,1,2,'O',3),(262,2015,11,'00274496','นาง สุภัทรา วัลลิกุล','พงบ.6',1,1,2,'E',5),(263,2015,11,'50020098','กลุ่มพัฒนาผลิตภัณฑ์','ผต',9,6,15,'O',3),(264,2015,11,'00000046','ฝ่ายพัฒนาผลิตภัณฑ์โทรศัพท์','ทต.',3,3,6,'O',4),(265,2015,11,'00908160','นาย พงศ์พันธุ์ เต็งสมเพชร','นบง.5',2,2,4,'E',6),(266,2015,11,'00248561','นาย โกวิทย์ บุญศรี','ผส.8',1,1,2,'E',6),(267,2015,11,'50020108','ฝ่ายพัฒนาผลิตภัณฑ์บรอดแบนด์','บต.',2,1,3,'O',4),(268,2015,11,'00341374','นาย สัญญา แซ่จิว','ผส.8',1,0,1,'E',6),(269,2015,11,'00226127','น.ส. อภิรดี ฉัตรวลีพร','พบง.7',1,1,2,'E',6),(270,2015,11,'50020110','ฝ่ายพัฒนาผลิตภัณฑ์สื่อสารข้อมูล','มต.',3,1,4,'O',4),(271,2015,11,'00334116','นาง วชิรา คันธอุลิส','ผส.8',1,0,1,'E',6),(272,2015,11,'00341866','นาง ธนวรรณ พันธุ์ดี','พธก.6',2,1,3,'E',6),(273,2015,11,'50020112','ฝ่ายพัฒนาผลิตภัณฑ์ความปลอดภัยเทคโนโลยีสารสนเทศ','ผต.',1,1,2,'O',4),(274,2015,11,'00342823','น.ส. อนุตรา นิราพาธ','ชฝ.9',1,1,2,'E',5),(275,2015,11,'50020119','กลุ่มบริการลูกค้าขายส่งและเอกชน','ขต',1,1,2,'O',3),(276,2015,11,'50028900','ฝ่ายขายผู้ประกอบการ','กต.',1,1,2,'O',4),(277,2015,11,'00180412','น.ส. รจนา เศรษฐกุล','ชฝ.9',1,1,2,'E',5),(278,2015,11,'00000014','หน่วยงานสายงานการเงิน','ง',34,12,46,'O',2),(279,2015,11,'00000029','กลุ่มบัญชี','บง',32,11,43,'O',3),(280,2015,11,'00000084','ฝ่ายบัญชีการเงิน','ชง.',3,1,4,'O',4),(281,2015,11,'00337281','น.ส. สุวรรณา ชูอินทร์','ผส.8',3,1,4,'E',6),(282,2015,11,'00000085','ฝ่ายบัญชีบริหาร','บง.',22,6,28,'O',4),(283,2015,11,'00236560','น.ส. วรรณา อินทรปัญญา','ผส.8',4,1,5,'E',6),(284,2015,11,'00264956','น.ส. เตือนใจ พ่วงปาน','นบช.7',5,2,7,'E',6),(285,2015,11,'00368519','น.ส. อรวรรณ ไตรรัตนานาถ','นบช.5',6,1,7,'E',6),(286,2015,11,'00368069','น.ส. นภาพร แซ่ลิ่ม','นบช.5',7,2,9,'E',6),(287,2015,11,'00000086','ฝ่ายบัญชีลูกหนี้เจ้าหนี้','ลง.',7,4,11,'O',4),(288,2015,11,'00366223','น.ส. กิตติยาภรณ์ ลิ้มประเสริฐ','นบช.6',7,4,11,'E',6),(289,2015,11,'00000088','ฝ่ายบริหารการเงิน','กง.',2,1,3,'O',3),(290,2015,11,'00369945','น.ส. สุภาวดี ไหมทอง','นบช.5',2,1,3,'E',5),(291,2015,11,'00000015','หน่วยงานสายงานทรัพยากรบุคคล','บ',27,12,39,'O',2),(292,2015,11,'50020106','กลุ่มทรัพยากรบุคคล','บบ',27,12,39,'O',3),(293,2015,11,'00000090','ฝ่ายกลยุทธ์ทรัพยากรบุคคล','กบ.',17,7,24,'O',4),(294,2015,11,'00333803','นาย อิทธิพงษ์ วงศ์แสนสุข','ฝ.10',2,0,2,'E',5),(295,2015,11,'00296681','นาง ยุพินภรณ์ ศักดิ์กิตติมาลัย','ผส.8',7,3,10,'E',6),(296,2015,11,'00280147','น.ส. ศิริมา เจริญพักตร์','ผส.8',8,4,12,'E',6),(297,2015,11,'00000092','ฝ่ายปฏิบัติการทรัพยากรบุคคล','ปบ.',10,5,15,'O',4),(298,2015,11,'00219082','นาย ธีระชัย ประยูรผลผดุง','พบค.7',1,0,1,'E',6),(299,2015,11,'00294049','นาง พัชรินทร์ นพสุวรรณ','บคก.6',3,1,4,'E',6),(300,2015,11,'01000326','นาย สุทธิวัฒน์ ดาราศรีศักดิ์','พปค.4',6,4,10,'E',6),(301,2015,11,'00000016','หน่วยงานสายงานเทคโนโลยีสารสนเทศ','ท',72,45,117,'O',2),(302,2015,11,'50020100','กลุ่มเทคโนโลยีสารสนเทศ','ทท',72,45,117,'O',3),(303,2015,11,'00000097','ฝ่ายเทคโนโลยีสารสนเทศเพื่อสนับสนุนธุรกิจ','ธท.',72,45,117,'O',4),(304,2015,11,'00206134','น.ส. มธุรส จุลินทร','ชฝ.9',5,2,7,'E',5),(305,2015,11,'00270034','นาย สุรพล หอมทวนลม','พปค.8',2,1,3,'E',6),(306,2015,11,'00331135','นาย ธรรมรัฐ วัชรานันทกุล','พปค.8',23,9,32,'E',6),(307,2015,11,'00336101','น.ส. พรรณี ชมสมุท','พปค.8',13,7,20,'E',6),(308,2015,11,'00348364','น.ส. วรรณนภา อ่ำพิจิตร','ผส.8',3,2,5,'E',6),(309,2015,11,'00354293','นาย ปิยะพงษ์ แก้วน่าน','พปค.7',13,16,29,'E',6),(310,2015,11,'00354633','นาง ธนาทิพย์ แม้นสมุทร','นคค.7',7,3,10,'E',6),(311,2015,11,'00364445','น.ส. ภัทริกา แก้วใจ','วศก.6',1,0,1,'E',6),(312,2015,11,'00370251','นาย ณัฐวัฒน์ แสงสีทอง','นคค.6',5,5,10,'E',6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
