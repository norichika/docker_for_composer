FROM php:7.2-fpm-alpine
RUN docker-php-ext-install pdo_mysql mysqli mbstring
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev
RUN apk add --no-cache build-base
RUN apk add --no-cache autoconf
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk update \
 && apk add ssmtp mailx
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ssmtp.conf /etc/ssmtp/ssmtp.conf