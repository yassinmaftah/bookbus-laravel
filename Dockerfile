# ------------------------------------------------------------------------------
# Stage 1: Build Frontend Assets (Vite, Tailwind CSS, Alpine.js)
# ------------------------------------------------------------------------------
FROM node:20-alpine AS frontend
WORKDIR /app

COPY my-app/package*.json ./
RUN npm ci || npm install

COPY my-app/ ./
RUN npm run build

# ------------------------------------------------------------------------------
# Stage 2: PHP Application Runtime
# ------------------------------------------------------------------------------
FROM php:8.2-cli-alpine

WORKDIR /var/www/html

# Install required system packages and PHP extensions
RUN apk add --no-cache \
    curl \
    git \
    bash \
    netcat-openbsd \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zip \
    unzip \
    mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql gd zip bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY my-app/ /var/www/html/

# Copy compiled frontend assets from frontend stage
COPY --from=frontend /app/public/build /var/www/html/public/build

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Create storage directory structure and fix permissions
RUN mkdir -p /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
