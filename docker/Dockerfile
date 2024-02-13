# PHP + Apache
FROM php:8.2-apache

# Install Composer
COPY --from=composer:2.6.5 /usr/bin/composer /usr/local/bin/composer

# Update OS and install common dev tools
RUN apt-get update
RUN apt-get install -y wget zip unzip zlib1g-dev libzip-dev libpng-dev

# Install PHP extensions needed
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql gd zip pcntl exif

# Enable common Apache modules
RUN a2enmod headers expires rewrite

# Instalación de XDEBUG
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \

# Set working directory to web files
WORKDIR /var/www/html
