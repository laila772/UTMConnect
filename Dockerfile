# Use the official PHP image with FPM
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    nano \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node dependencies and build assets (for Laravel Mix or Vite)
RUN npm install && npm run build

# Set correct permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Laravel key generate (ensure .env is configured!)
RUN php artisan key:generate

# Expose the port Laravel will serve on
EXPOSE 8000

# Start the Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
