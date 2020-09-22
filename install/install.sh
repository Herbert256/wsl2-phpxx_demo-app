#!/bin/bash

ln -s /app/www /var/www/html

mysql < install/install.sql
