#!/bin/bash

rm -Rf /var/www/html
ln -s /app/www /var/www/html
chown data:data /var/www/html

mysql < install/install.sql
