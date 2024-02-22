FROM php:8-fpm-alpine

RUN apk add --no-cache mysql-client

RUN docker-php-ext-install pdo pdo_mysql

CMD ["php", "-S", "0.0.0.0:8900", "-t", "/var/www/html"]