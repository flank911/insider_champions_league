FROM php:7.4.28-fpm-alpine

ENV XDEBUG_VERSION 3.1.3
RUN apk add --no-cache git
RUN git clone --branch $XDEBUG_VERSION --depth 1 https://github.com/xdebug/xdebug.git /usr/src/php/ext/xdebug \
    && docker-php-ext-configure xdebug --enable-xdebug-dev \
    && docker-php-ext-install xdebug \
    && apk del git

RUN apk add --no-cache unzip

# php mysql pdo
RUN docker-php-ext-install \
    mysqli pdo \
    pdo_mysql \
  && docker-php-ext-enable pdo_mysql

# php-redis
ENV PHPREDIS_VERSION 5.3.4
RUN docker-php-source extract \
  && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
  && tar xfz /tmp/redis.tar.gz \
  && rm -r /tmp/redis.tar.gz \
  && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
  && docker-php-ext-install redis \
  && docker-php-source delete

#php xml
RUN apk add --no-cache libxml2-dev
RUN docker-php-ext-install xml simplexml

#php tidy
RUN apk add --no-cache tidyhtml-dev
RUN docker-php-ext-install tidy

#php zip
RUN apk add --no-cache libzip-dev
RUN docker-php-ext-install zip

#pgsql driver
RUN apk add --no-cache postgresql-dev
RUN docker-php-ext-install pdo_pgsql pgsql

#php mbstring
RUN apk add --no-cache oniguruma-dev
RUN docker-php-ext-install mbstring

#php intl
RUN apk add --no-cache icu-dev
RUN docker-php-ext-install intl

#php curl
RUN apk add --no-cache curl-dev
RUN docker-php-ext-install curl

#php sockets
RUN docker-php-ext-install sockets

#php soap
RUN docker-php-ext-install soap

#php exif
RUN docker-php-ext-install exif

# php gd
RUN apk add --no-cache zlib-dev freetype-dev libpng-dev jpeg-dev libjpeg-turbo-dev libwebp-dev libxpm-dev
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# RUN apk del zlib-dev freetype-dev libpng-dev jpeg-dev libjpeg-turbo-dev libwebp-dev libxpm-dev


RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./conf.d $PHP_INI_DIR/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_ALLOW_XDEBUG=1
ENV COMPOSER_DISABLE_XDEBUG_WARN=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

# Bash
RUN apk add --no-cache bash

# OpenSSH
RUN apk add --no-cache openssh

ARG DOCKER_UID
ARG DOCKER_GID
ARG DOCKER_USER
ARG DOCKER_GROUP
ARG DOCKER_HOME=/home/${DOCKER_USER}

RUN addgroup -g $DOCKER_GID $DOCKER_GROUP
RUN adduser -u $DOCKER_UID -G $DOCKER_USER -h $DOCKER_HOME -s /bin/bash -D -g "" $DOCKER_GROUP
RUN mkdir $DOCKER_HOME/.ssh && echo "ServerAliveInterval 120" >> $DOCKER_HOME/.ssh/config
COPY .bashrc $DOCKER_HOME/.bashrc

RUN curl -SsL https://github.com/boxboat/fixuid/releases/download/v0.4/fixuid-0.4-linux-amd64.tar.gz \
        | tar -C /usr/local/bin -xzf - && \
    chown root:root /usr/local/bin/fixuid && \
    chmod 4755 /usr/local/bin/fixuid && \
    mkdir -p /etc/fixuid && \
    echo "user: $DOCKER_USER" >> /etc/fixuid/config.yml && \
    echo "group: $DOCKER_GROUP" >> /etc/fixuid/config.yml && \
    fixuid

COPY ./entrypoint.sh /usr/local/bin/docker-php-entrypoint
RUN chmod +x /usr/local/bin/docker-php-entrypoint

ADD . /app/storage
RUN chmod 777 -R /app/storage

WORKDIR /app
RUN chown $DOCKER_USER:$DOCKER_GROUP -R $DOCKER_HOME

