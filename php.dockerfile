FROM php:8.3-fpm

RUN mkdir -p /var/www/
WORKDIR /var/www/

COPY . /var/www/

RUN apt-get update
RUN apt-get install -y \
    libzip-dev \
    libcurl3-dev \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev
RUN docker-php-ext-configure zip \
  && docker-php-ext-install zip gd pdo pdo_mysql mysqli curl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-enable gd

RUN usermod -u "1000" -a -G "www-data" www-data

COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer
