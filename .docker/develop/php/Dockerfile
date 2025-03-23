FROM php:8.2-fpm-bullseye

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions \
    pdo_mysql \
    bcmath \
    mbstring \
    zip \
    opcache \
    gd \
    intl \
    redis \
    decimal \
    xdebug

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt install -y nodejs
RUN apt install -y vim
RUN npm install --global yarn

COPY .docker/develop/php/php.ini /usr/local/etc/php/php.ini

COPY . /app

RUN ls -a /app

WORKDIR /app

COPY .docker/develop/php/env /app/env

COPY .docker/develop/php/www.conf.patch /usr/local/etc/php-fpm.d/www.conf.patch
RUN patch /usr/local/etc/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf.patch

RUN chmod -R a+w /app/storage /app/bootstrap/cache

EXPOSE 9000

CMD "php-fpm"