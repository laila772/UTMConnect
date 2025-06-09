# -----------------------------
# PHP + Composer + Laravel
# -----------------------------
FROM php:8.1-fpm

# Install dependencies
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
    nginx \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy app files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Laravel optimizations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Set file permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expose port for Laravel dev server or Nginx
EXPOSE 8000

# Start Laravel using PHP’s built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
