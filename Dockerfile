# ---- Build & Run in One Image for Railway ----
FROM php:8.4-cli

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js (for building Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www

# Copy files
COPY . .

# Set permissions folder penting
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Install Laravel backend dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend (Vite)
RUN npm install && npm run build

# Expose port
EXPOSE 8080

# Railway-ready CMD
# 1. Jangan cache config di build, biarkan runtime
# 2. APP_DEBUG=true untuk menampilkan error
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
