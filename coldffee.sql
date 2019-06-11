SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `files` (
  `id_user` varchar(10) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `ext` varchar(50) DEFAULT NULL,
  `size` varchar(255) DEFAULT '0B',
  `new_filename` varchar(40) DEFAULT NULL,
  `date_upload` date NOT NULL,
  `route` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `folders` (
  `foldername` varchar(50) DEFAULT NULL,
  `route` varchar(54) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `no_verify` (
  `id_alfanum` varchar(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_ini` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `recovery` (
  `code` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` varchar(10) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT 'med/user_icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;