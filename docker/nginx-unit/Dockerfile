FROM php:8.3-cli-alpine3.20 AS build

# Prepare workfir
RUN mkdir -p /var/www/html

WORKDIR /var/www/html

FROM unit:1.32.1-php8.3

# Pullin build artifacts from build stage
COPY --from=build --chown=www-data:www-data /var/www/html /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libmagickwand-dev; \
    pecl install imagick;

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl
RUN docker-php-ext-enable imagick;

RUN apt-get update && apt-get install -y default-mysql-client && rm -rf /var/lib/apt

COPY docker/nginx-unit/config.json /docker-entrypoint.d/config.json
COPY docker/nginx-unit/entrypoint.sh ./docker-entrypoint.d/entrypoint.sh
RUN chmod +x ./docker-entrypoint.d/entrypoint.sh

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 8080
