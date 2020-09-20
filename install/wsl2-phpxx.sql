
DROP DATABASE IF EXISTS wsl;
DROP USER     IF EXISTS 'wsl'@'localhost';

CREATE DATABASE wsl;
USE wsl;

CREATE USER 'wsl'@'localhost' IDENTIFIED BY 'wsl';
GRANT ALL PRIVILEGES ON wsl.* TO 'wsl'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE wsl (
  id   varchar(32),
  val  varchar(3256)
);

ALTER TABLE wsl ADD PRIMARY KEY (id);
