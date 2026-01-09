FROM php:8.2-fpm

# System deps
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev libxml2-dev \
    libzip-dev \
    default-mysql-client \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions (common for Laravel)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) \
    pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Workdir
WORKDIR /var/www

# (Optional) non-root user for better permission handling
ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} appuser && useradd -m -u ${UID} -g appuser appuser

# Copy source (optional; compose volume sẽ override khi dev)
# COPY . /var/www

# Permissions (Laravel storage & cache)
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
 && chown -R appuser:appuser /var/www

USER appuser
