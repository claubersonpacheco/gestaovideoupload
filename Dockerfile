# Base image PHP-FPM
FROM php:8.4-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql pcntl mbstring zip gd \
    && docker-php-ext-enable pdo_mysql pcntl mbstring zip gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Instalar dependências PHP
RUN composer install --no-interaction --optimize-autoloader

# Permissões para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expor porta (opcional, CapRover cuida disso)
EXPOSE 9000

# Comando padrão PHP-FPM
CMD ["php-fpm"]
