FROM php:7.4-fpm-alpine

RUN cp -r /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN apk add --no-cache \
        zip \
        libzip-dev \
        libpng \
        libpng-dev \
        libjpeg \
        icu \
        icu-dev \
        libxml2 \
        libxml2-dev \
        git \
        openssl \
        openssl-dev 
RUN docker-php-ext-install \
        pdo_mysql \
        mysqli \
        gd \
        intl \
        xml \
        opcache \
	pcntl \
	bcmath \
        zip 
	
ENV PHPREDIS_VERSION 5.3.2

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis
    
RUN curl -sS https://getcomposer.org/installer | php ;mv composer.phar /usr/local/bin/composer;
RUN composer global require laravel/installer

ENV PATH="/root/.composer/vendor/bin:${PATH}"

# RUN apk add --update nodejs
# RUN apk add --update npm
