# Host: localhost  (Version 5.5.5-10.4.14-MariaDB)
# Date: 2021-07-10 15:59:59
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cupang"
#

DROP TABLE IF EXISTS `cupang`;
CREATE TABLE `cupang` (
  `id_cupang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cupang` text NOT NULL,
  `harga_cupang` text NOT NULL,
  `gambar_cupang` text NOT NULL,
  PRIMARY KEY (`id_cupang`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "cupang"
#

INSERT INTO `cupang` VALUES (42,'Cupang Halfmoon','100000','Halfmoon.jpg'),(43,'Cupang Belgi Bangkok','110000','Belgi Bangkok.jpg'),(44,'Cupang Big Ear','120000','Big Ear.jpg'),(45,'Cupang Crown Tail','130000','Crown Tail.jpg'),(46,'Cupang Emas','140000','Emas.jpg'),(47,'Cupang Fancy','150000','Fancy.jpg'),(48,'Cupang Giant','160000','Giant.jpg'),(49,'Cupang Halfsun','160000','Halfsun.jpg'),(50,'Cupang HMPK','170000','HMPK.jpg'),(51,'Cupang Over Halfmoon','180000','Over Halfmoon.jpg'),(52,'Cupang Paradise','190000','Paradise.jpg'),(53,'Cupang Plakat','290000','Plakat.jpg'),(54,'Cupang Sarawak','250000','Sarawak.jpg'),(56,'udin','udin','8XTpY2F.jpg');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (45,'Wendi','wewen','547ba58dbfd1a1cdbc0c391baff4160b91f741b4','user'),(46,'Bharata','bharatawira','661d796484b61838da90c243ead8c69c390fa2b3','admin'),(48,'Naufal Ridho','naufalridho','b4c0f6171a847df8fff53a53158db1b240ceae9b','admin'),(49,'Wedi','wedyrefry','5d0401cde2215851706abaf2dad2b710f4ebed1f','user'),(50,'Bani','babanini','00b94308fc9bd130076f4c0d242575b41a5e3d51','user'),(51,'Wendy','Wendy','14da0840cc4575a152d0235f9ea26967209d1595','admin');

#
# Structure for table "penjualan"
#

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_cupang` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `notelp_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(100) NOT NULL,
  `harga_penjualan` varchar(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE,
  KEY `id_cupang` (`id_cupang`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_cupang`) REFERENCES `cupang` (`id_cupang`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "penjualan"
#

INSERT INTO `penjualan` VALUES (51,45,53,'wewe','08876','1asdsada','12222222','true','2021-07-04'),(52,45,46,'udin','0895931236789','jl.ceger raya','1500000','true','2021-07-05'),(53,45,52,'udin','085437589','jlsdjko','200000','true','2021-07-05'),(57,45,54,'Bharata','08954378','jl.ciledug','500000','true','2021-07-08'),(58,45,54,'Bharata','08999999999','Jl. Ciledug Raya No.14 Rt.14/12 Tanggerang','300000','true','2021-07-08');
