#!/bin/bash

cp -r website/public/. /var/www/html
cd /var/www/html/
chown -R www-data:www-data .
chmod -R 777 .
