SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `no_verify` (
  `id_alfanum` varchar(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_ini` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` varchar(10) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `files` (
  `id_filex` varchar(20),
  `id_user` varvchar(10),
  `filename` varchar(255),
  `ext` varchar(10),
  `date_uploaded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
