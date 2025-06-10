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

# Copy custom config files from the deploy folder
COPY deploy/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY deploy/nginx.conf /etc/nginx/conf.d/default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Laravel optimizations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose HTTP port
EXPOSE 80

# Start supervisor (which manages PHP-FPM and NGINX)
CMD ["/usr/bin/supervisord"]
