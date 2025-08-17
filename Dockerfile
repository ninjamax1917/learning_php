FROM php:8.2-fpm

# Можно добавить расширения, если нужно
# RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

