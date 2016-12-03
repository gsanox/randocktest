/* SQL to create database, create necessary tables and just one insert for testing purposes */

CREATE DATABASE IF NOT EXISTS `randocktest`;

USE `randocktest`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `api_hash` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
  );

INSERT INTO `users` (`name`, `surname`, `api_hash`) VALUES ( 'Anabel','Alonso','b53b0e71ffe4a0a73896c67b6f12b683aab05994' );