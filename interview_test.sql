-- Adminer 5.1.1 MySQL 8.0.43-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(1,	1,	1,	1,	'2025-08-27 09:36:42'),
(2,	1,	3,	1,	'2025-08-27 09:36:42'),
(3,	1,	1,	1,	'2025-08-27 10:22:53'),
(4,	1,	1,	1,	'2025-08-27 10:23:18'),
(5,	1,	3,	1,	'2025-08-27 10:23:18'),
(6,	1,	1,	1,	'2025-08-27 10:23:18'),
(7,	1,	3,	1,	'2025-08-27 10:23:18'),
(8,	1,	1,	1,	'2025-08-27 10:38:52'),
(9,	1,	3,	1,	'2025-08-27 10:38:52'),
(10,	1,	1,	1,	'2025-08-27 10:38:52'),
(11,	1,	1,	1,	'2025-08-27 10:38:52'),
(12,	1,	1,	1,	'2025-08-27 10:38:52'),
(13,	1,	1,	1,	'2025-08-27 10:38:52'),
(14,	1,	1,	1,	'2025-08-27 10:38:52'),
(15,	1,	1,	1,	'2025-08-27 10:38:52'),
(16,	1,	1,	1,	'2025-08-27 10:38:52'),
(17,	1,	1,	1,	'2025-08-27 10:38:52'),
(18,	1,	1,	1,	'2025-08-27 10:38:52'),
(19,	1,	1,	1,	'2025-08-27 10:38:52'),
(20,	1,	3,	1,	'2025-08-27 10:38:59'),
(21,	1,	3,	1,	'2025-08-27 10:38:59'),
(22,	1,	2,	1,	'2025-08-27 10:40:41'),
(23,	1,	3,	1,	'2025-08-27 10:40:41'),
(24,	1,	3,	1,	'2025-08-27 10:40:41'),
(25,	1,	3,	1,	'2025-08-27 10:40:41'),
(26,	1,	3,	1,	'2025-08-27 10:41:27');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1,	'Paracetamol',	50.00),
(2,	'Vitamin C',	80.00),
(3,	'Cough Syrup',	120.00),
(4,	'Pain Relief Gel',	150.00),
(5,	'Antibiotic',	200.00);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_pic`, `created_at`) VALUES
(1,	'Sajid',	'sajid5@gmail.com',	'$2y$10$b6Ki1H9DMTOMv7zlT6RgxOJoJqYDMYFjsVRL59JTO7nw.UmIGznBa',	'uploads/1756287415Screenshot from 2025-08-21 11-49-20.png',	'2025-08-27 09:35:47'),
(2,	'Kamiyab',	'km@gmail.com',	'$2y$10$kxrzHu43fruwHzeAize3muZTcgvTjulCzBuyMlSUS8yYsJVDI2Hs2',	NULL,	'2025-08-27 09:40:41'),
(3,	'aa',	'k@gmail.com',	'$2y$10$Z8LRGtOqjlX7d7UQGHZbqek6VaJAOJzDcPdXfaHDgXfOAveJvY1MC',	NULL,	'2025-08-27 09:41:27'),
(4,	'aaa',	'kq@gmail.com',	'$2y$10$tbmf58oFb96g6IRJTQpN2eG8M4bCm7Mx0GEUj9apHlJtnOcrVAnoy',	NULL,	'2025-08-27 09:44:18');

-- 2025-08-27 11:14:42 UTC
