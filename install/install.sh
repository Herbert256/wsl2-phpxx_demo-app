#!/bin/bash

sudo service mariadb start
sleep 2

mysql < install/wsl2-phpxx.sql

sudo service mariadb stop
