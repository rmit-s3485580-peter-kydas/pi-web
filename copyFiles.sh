#!/bin/bash

cp -r website/public/. /var/www/html
cd /var/www/html/
chown -R www-data:www-data .
chmod -R 777 .

cp /home/pi/Documents/pi-web/rootFiles/php_root .
