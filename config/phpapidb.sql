/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - phpapidb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpapidb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `phpapidb`;

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `ktp` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nama` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tmplahir` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`nim`,`ktp`,`nama`,`email`,`tmplahir`,`tgllahir`,`alamat`,`created`) values 
(1,519999991,'7819402578194025','Ilsa Palastri','ilsa@gmail.com','Padang','1999-06-12','Kulon Progo','2022-06-14 10:36:32'),
(2,519999992,'2651948326519483','Kenari Thamrin','kenari@gmail.com','Bukittinggi','1998-01-03','Sleman','2022-06-14 10:36:32'),
(3,519999993,'9601743596017435','Kadir Tarihoran','kadir@gmail.com','Jakarta','1999-05-02','Jl. Kaliurang No. 2','2022-06-14 10:36:32'),
(4,519999994,'5341867953418679','Ibrahim Megantara','ibrahim@gmail.com','Jambi','1998-02-23','Sleman','2022-06-14 10:36:32'),
(5,519999995,'4290738542907385','Enteng Januar','jan@gmail.com','Ternate','1997-11-14','Godean','2022-06-14 10:36:32'),
(6,519999996,'9016273590162735','Lidya Pertiwi','lidya@gmail.com','Semarang','1998-12-25','Bantul','2022-06-14 10:36:32'),
(7,519999997,'3217609832176098','Capa Mangunsong','capa@gmail.com','Bandung','1998-09-30','Sinduadi','2022-06-14 10:36:32'),
(8,519999998,'8370245983702459','Upik Mandala','upiek@gmail.com','Cirebon','1999-07-28','Mraen','2022-06-14 10:36:32');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
