# PHP (Laravel) container
FROM php:8.1-fpm AS php

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    zip \
    curl \
    git \
    nano \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev
RUN php artisan config:cache
RUN php artisan route:cache

# NGINX container
FROM nginx:stable-alpine AS nginx

COPY --from=php /var/www /var/www
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Permissions
RUN adduser -D -g 'www' www && \
    chown -R www:www /var/www

# Entrypoint to run both PHP-FPM and Nginx
COPY --from=php /usr/local/etc/php-fpm.d/ /usr/local/etc/php-fpm.d/
COPY --from=php /usr/local/bin/php /usr/local/bin/php
COPY --from=php /usr/local/sbin/php-fpm /usr/local/sbin/php-fpm

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
