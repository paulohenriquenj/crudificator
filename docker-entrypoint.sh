#!/bin/bash
set -e
echo "Copying Vendor"
cp -R /home/vendor /code/vendor
echo "Starts PHP-FPM"
php-fpm -F -R

