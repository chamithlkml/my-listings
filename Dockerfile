FROM ubuntu:jammy

RUN mkdir -p /var/www/html
WORKDIR /var/www/html
COPY . .

ENV WWWGROUP="www-data"
ENV NODE_VERSION=18
ENV DEBIAN_FRONTEND noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV TZ=UTC

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor libcap2-bin libpng-dev python2 dnsutils

RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php8.2
RUN apt-get install -y php8.2-fpm
RUN apt-get install -y nginx
RUN service php8.2-fpm start
RUN a2enconf php8.2-fpm

RUN apt-get install -y php8.2-gd php8.2-imagick \
    php8.2-curl \
    php8.2-imap php8.2-mysql php8.2-mbstring \
    php8.2-xml php8.2-zip php8.2-bcmath \
    php8.2-intl php8.2-readline \
    php8.2-msgpack php8.2-igbinary php8.2-redis php8.2-swoole \
    php8.2-memcached php8.2-pcov php8.2-xdebug

RUN curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

RUN apt-get update \
    && apt-get install -y apt-file \
    && apt-get update \
    && apt-get install -y vim

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY docker/nginx/sites-enabled /etc/nginx/sites-enabled
COPY docker/fpm /etc/php/8.2/fpm/pool.d

COPY docker/start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container

RUN rm -rf node_modules
RUN rm -f package-lock.json
# COPY package.json package.json
RUN npm install

RUN rm -rf vendor
RUN rm -f composer.lock
COPY composer.json composer.json
RUN composer install

EXPOSE 80 5173

ENTRYPOINT ["start-container"]