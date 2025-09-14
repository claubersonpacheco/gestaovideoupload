FROM php:8.4-fpm

# Instala dependências
RUN apt-get update && apt-get install -y \
    zip unzip git curl

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN composer install
