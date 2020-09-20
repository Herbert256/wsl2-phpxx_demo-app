DROP DATABASE IF EXISTS `wsl2-phpxx`;
DROP USER     IF EXISTS 'wsl2-phpxx'@'localhost';

CREATE DATABASE `wsl2-phpxx`;
USE `wsl2-phpxx`;

CREATE USER 'wsl2-phpxx'@'localhost' IDENTIFIED BY 'wsl2-phpxx';
GRANT ALL PRIVILEGES ON `wsl2-phpxx`.* TO 'wsl2-phpxx'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE `wsl2-phpxx` (
  `key`    varchar(32),
  `value`  varchar(3256)
);

