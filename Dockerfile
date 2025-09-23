FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libzip-dev libonig-dev libpng-dev libpq-dev libxml2-dev \
    && docker-php-ext-install \
        intl \
        opcache \
        pdo \
        pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy source (in compose, we bind-mount over this; copying helps build in CI)
COPY . /var/www/html

# Ensure proper permissions for Symfony var/ and cache
RUN usermod -u 1000 www-data || true \
    && groupmod -g 1000 www-data || true \
    && mkdir -p /var/www/html/var /var/www/html/public \
    && chown -R www-data:www-data /var/www/html/var /var/www/html/public

USER root
# PHP production/opcache settings
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.enable_cli=0'; \
    echo 'opcache.jit=1255'; \
    echo 'opcache.jit_buffer_size=64M'; \
    echo 'opcache.memory_consumption=256'; \
    echo 'opcache.max_accelerated_files=20000'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'realpath_cache_size=4096K'; \
    echo 'realpath_cache_ttl=600'; \
} > /usr/local/etc/php/conf.d/opcache.ini

RUN { \
    echo 'date.timezone=UTC'; \
    echo 'memory_limit=512M'; \
    echo 'upload_max_filesize=20M'; \
    echo 'post_max_size=25M'; \
    echo 'max_execution_time=60'; \
} > /usr/local/etc/php/conf.d/php-prod.ini
# php-fpm will be launched by the base image's default CMD
