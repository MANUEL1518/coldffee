-- ----------------------------------------
-- ---                                  ---
-- --- Database and tables for Coldffee ---
-- ---                                  ---
-- ----------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id_file` varchar(25) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

UNLOCK TABLES;

DROP TABLE IF EXISTS `folders`;
CREATE TABLE `folders` (
  `foldername` varchar(50) DEFAULT NULL,
  `route` varchar(54) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `folders` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `no_verify`;
CREATE TABLE `no_verify` (
  `id_alfanum` varchar(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_ini` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


LOCK TABLES `no_verify` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `recovery`;
CREATE TABLE `recovery` (
  `code` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `recovery` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(10) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT 'med/user_icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
UNLOCK TABLES;

-- ----------------------------------------
-- ---                                  ---
-- ---Remember created database Coldffee---
-- ---               :)                 ---
-- ----------------------------------------
