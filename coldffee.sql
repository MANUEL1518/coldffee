DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id_file` varchar(25) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `files` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `folders`;

CREATE TABLE `folders` (
  `foldername` varchar(50) DEFAULT NULL,
  `route` varchar(54) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(10) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
LOCK TABLES `users` WRITE;
UNLOCK TABLES;
=======
CREATE TABLE `files` (
  `id_filex` varchar(20),
  `id_user` varvchar(10),
  `filename` varchar(255),
  `ext` varchar(10),
  `date_uploaded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> 374564a58ddb8793518378f3e4f4c0ac15ec6ba5
