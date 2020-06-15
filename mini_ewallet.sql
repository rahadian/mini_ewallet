-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `balance_bank`;
CREATE TABLE `balance_bank` (
  `id` int NOT NULL AUTO_INCREMENT,
  `balance` int NOT NULL,
  `balance_achieve` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `enable` enum('True','False') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `balance_bank_history`;
CREATE TABLE `balance_bank_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `balance_bank_id` int NOT NULL,
  `balance_before` int NOT NULL,
  `balance_after` int NOT NULL,
  `activity` varchar(255) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `balance_bank_id` (`balance_bank_id`),
  CONSTRAINT `balance_bank_history_ibfk_1` FOREIGN KEY (`balance_bank_id`) REFERENCES `balance_bank` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_balance`;
CREATE TABLE `user_balance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `balance` int NOT NULL,
  `balance_achieve` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_balance_history`;
CREATE TABLE `user_balance_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_balance_id` int NOT NULL,
  `balance_before` int NOT NULL,
  `balance_after` int NOT NULL,
  `activity` varchar(255) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_balance_id` (`user_balance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-06-15 14:33:32
