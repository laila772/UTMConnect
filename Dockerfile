# Stage 1: Build assets
FROM node:18-alpine as node_modules

WORKDIR /app
COPY package*.json ./
RUN npm install

# Stage 2: PHP with Laravel
FROM php:8.1-fpm

# Install PHP extensions and system tools
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    zip \
    nano \
    nginx \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy app files
COPY . .

# Copy compiled node_modules
COPY --from=node_modules /app/node_modules ./node_modules

# Build assets (optional: only if using Vite or Mix)
RUN npm run build || echo "No frontend build"

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 storage bootstrap/cache

# Copy Nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

# Start Nginx and PHP-FPM using supervisord
CMD service nginx start && php-fpm
