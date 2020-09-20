#!/bin/bash

sudo service mariadb start
sleep 2
mysql < install/wsl2-phpxx.sql
sudo service mariadb stop

rm -Rf /var/www/html
ln -s /app/www /var/www/html
chown data:data /var/www/html
