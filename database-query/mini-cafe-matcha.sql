-- --------------------------------------------------------
-- Compatible with XAMPP (No utf8mb4 or collation specified)
-- Database: mini_matcha_cafe
-- --------------------------------------------------------

DROP DATABASE IF EXISTS `mini_matcha_cafe`;
CREATE DATABASE IF NOT EXISTS `mini_matcha_cafe`;

USE `mini_matcha_cafe`;

SET FOREIGN_KEY_CHECKS=0;

-- caffeine_types
CREATE TABLE IF NOT EXISTS `caffeine_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ice_levels
CREATE TABLE IF NOT EXISTS `ice_levels` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- milk_types
CREATE TABLE IF NOT EXISTS `milk_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- sugar_levels
CREATE TABLE IF NOT EXISTS `sugar_levels` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- topping_types
CREATE TABLE IF NOT EXISTS `topping_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

-- products
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT '0',
  `description` TEXT,
  `category` VARCHAR(50) NOT NULL DEFAULT '',
  `size` VARCHAR(50) DEFAULT '',
  `base_price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
);

-- users
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

-- orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `order_method` VARCHAR(255) NOT NULL,
  `total_price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_users` (`user_id`),
  CONSTRAINT `FK_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

-- order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `sugar_level` INT DEFAULT NULL,
  `ice_level` INT DEFAULT NULL,
  `caffeine` INT DEFAULT NULL,
  `milk_type` INT DEFAULT NULL,
  `topping` INT DEFAULT NULL,
  `additional_request` VARCHAR(50) DEFAULT NULL,
  `quantity` INT NOT NULL,
  `item_price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_items_orders` (`order_id`),
  KEY `FK_order_items_products` (`product_id`),
  KEY `FK_order_items_caffeine_types` (`caffeine`),
  KEY `FK_order_items_ice_levels` (`ice_level`),
  KEY `FK_order_items_milk_types` (`milk_type`),
  KEY `FK_order_items_sugar_levels` (`sugar_level`),
  KEY `FK_order_items_topping_types` (`topping`),
  CONSTRAINT `FK_order_items_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `FK_order_items_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_order_items_caffeine_types` FOREIGN KEY (`caffeine`) REFERENCES `caffeine_types` (`id`),
  CONSTRAINT `FK_order_items_ice_levels` FOREIGN KEY (`ice_level`) REFERENCES `ice_levels` (`id`),
  CONSTRAINT `FK_order_items_milk_types` FOREIGN KEY (`milk_type`) REFERENCES `milk_types` (`id`),
  CONSTRAINT `FK_order_items_sugar_levels` FOREIGN KEY (`sugar_level`) REFERENCES `sugar_levels` (`id`),
  CONSTRAINT `FK_order_items_topping_types` FOREIGN KEY (`topping`) REFERENCES `topping_types` (`id`)
);

SET FOREIGN_KEY_CHECKS=1;
