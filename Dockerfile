FROM php:8.1-fpm

# Install PHP and composer dependencies
RUN apt-get update && apt-get install -y git bash nano curl libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev libjpeg62-turbo-dev libfreetype6-dev sqlite3 zip unzip build-essential locales jpegoptim optipng pngquant gifsicle \
    software-properties-common nodejs npm python3-pip mysql\* \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-install pdo_mysql \
    && apk update \
    && usermod -u 1000 www-data \
    && chown -R www-data:www-data /var/www