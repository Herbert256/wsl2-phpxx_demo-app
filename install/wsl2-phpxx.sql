DROP DATABASE IF EXISTS `wsl2-phpxx`;
DROP USER     IF EXISTS 'wsl2-phpxx'@'localhost';

CREATE DATABASE `wsl2-phpxx`;
USE `wsl2-phpxx`;

CREATE USER 'wsl2-phpxx'@'localhost' IDENTIFIED BY 'wsl2-phpxx';
GRANT ALL PRIVILEGES ON `wsl2-phpxx`.* TO 'wsl2-phpxx'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE `staff` (
  `name`   varchar(32),
  `phone`  varchar(32),
  `salary` decimal(8,2),
  `bonus`  decimal(8,2)
);

insert into `staff` values
  ('bob',   '555-3425', 1000, 400),
  ('jim',   '555-4364', 2000, 300),
  ('joe',   '555-3422', 3000, 200),
  ('jerry', '555-4973', 4000, 100);
