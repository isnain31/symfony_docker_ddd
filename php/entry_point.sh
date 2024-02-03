#!/bin/bash

cd /var/www/symfony_docker
composer install
php bin/console do:mi:mi

php-fpm