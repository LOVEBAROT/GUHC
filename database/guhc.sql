/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.11-MariaDB : Database - guhc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`guhc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `guhc`;

/*Table structure for table `available_medicines` */

DROP TABLE IF EXISTS `available_medicines`;

CREATE TABLE `available_medicines` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(1000) NOT NULL,
  `medicine_name` varchar(1000) NOT NULL,
  `Company_name` varchar(1000) NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `quantity_type` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `available_medicines` */

insert  into `available_medicines`(`id`,`date`,`medicine_name`,`Company_name`,`quantity`,`quantity_type`) values (8,'25/04/19','AZITHRO','torrent','500','Strip'),(9,'25/04/19','P.C.M','Rachna','1000','medicines');

/*Table structure for table `medicine_record` */

DROP TABLE IF EXISTS `medicine_record`;

CREATE TABLE `medicine_record` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `caseid` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(1000) NOT NULL,
  `Treatments` varchar(1000) NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `medicine_record` */

insert  into `medicine_record`(`id`,`caseid`,`name`,`date`,`time`,`Treatments`,`quantity`) values (18,'1/19','Love Barot','2025-04-19',' 10:41:42','Anti - Spasmin 1-0-1 2','4');

/*Table structure for table `multiuserlogin` */

DROP TABLE IF EXISTS `multiuserlogin`;

CREATE TABLE `multiuserlogin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `multiuserlogin` */

insert  into `multiuserlogin`(`id`,`username`,`password`,`mobile_number`,`usertype`) values (1,'admin','202cb962ac59075b964b07152d234b70','7984138932','Doctor'),(2,'admin','202cb962ac59075b964b07152d234b70','0','Pharmacist'),(3,'admin','202cb962ac59075b964b07152d234b70  ','0','Lab_Technician'),(4,'admin','202cb962ac59075b964b07152d234b70  ','0','Receptionist'),(5,'admin','202cb962ac59075b964b07152d234b70  ','0','others'),(6,'admin','202cb962ac59075b964b07152d234b70  ','0','paramedical_staff');

/*Table structure for table `p_staff_record` */

DROP TABLE IF EXISTS `p_staff_record`;

CREATE TABLE `p_staff_record` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `caseid` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(1000) NOT NULL,
  `m_data` varchar(1000) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `p_staff_record` */

/*Table structure for table `patient_report` */

DROP TABLE IF EXISTS `patient_report`;

CREATE TABLE `patient_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caseid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `patient_report` */

/*Table structure for table `sform` */

DROP TABLE IF EXISTS `sform`;

CREATE TABLE `sform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caseid` varchar(1000) NOT NULL,
  `cdate` varchar(1000) NOT NULL,
  `photo` text NOT NULL,
  `name` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL,
  `Designation` varchar(1000) NOT NULL,
  `age` varchar(1000) NOT NULL,
  `gender` varchar(1000) NOT NULL,
  `cname` varchar(1000) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `carddate` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `mno` varchar(1000) NOT NULL,
  `weight` varchar(1000) NOT NULL,
  `card` varchar(1000) NOT NULL,
  `date` varchar(1000) DEFAULT NULL,
  `time` varchar(1000) NOT NULL,
  `complaint` varchar(1000) NOT NULL,
  `Symptoms_signs` varchar(1000) NOT NULL,
  `ge` varchar(1000) NOT NULL,
  `investigation` varchar(1000) NOT NULL,
  `cvs` varchar(1000) NOT NULL,
  `Treatments` varchar(1000) NOT NULL,
  `rs` varchar(1000) NOT NULL,
  `p_a` varchar(1000) NOT NULL,
  `cns` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `drlist` varchar(1000) NOT NULL,
  `other_dr` varchar(1000) NOT NULL,
  `rupees` varchar(1000) DEFAULT NULL,
  `casetype` varchar(1000) NOT NULL,
  `other_casetype` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sform` */

/*Table structure for table `srecord` */

DROP TABLE IF EXISTS `srecord`;

CREATE TABLE `srecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caseno` varchar(5000) NOT NULL,
  `sbookno` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(5000) NOT NULL,
  `gender` varchar(5000) NOT NULL,
  `srelation` varchar(1000) NOT NULL,
  `rupee` varchar(5000) NOT NULL,
  `ctype` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `srecord` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
