# https://hub.docker.com/_/php?tab=description&page=1&ordering=last_updated&name=8.0
FROM php:8.0.8-fpm


# APT-GET installs
RUN apt-get update && \
    export DEBIAN_FRONTEND=noninteractive && \
    apt-get install -y --no-install-recommends \
    apt-utils \
    curl \
    git \
    htop \
    libicu-dev \
    libcurl4-gnutls-dev \
    libpng-dev \
    libssl-dev \
    libxml2-dev \
    memcached \
    openssl \
    supervisor \
    tcpdump \
    telnet \
    unzip \
    vim \
    wget && \
    rm -rf /var/lib/apt/lists/*

# PHP Extensions
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd
RUN docker-php-ext-configure mysqli --with-mysqli=mysqlnd

RUN docker-php-ext-install \
    bcmath \
    gd \
    opcache \
    pcntl \
    pdo_mysql \
    soap

# Extensions by PECL
RUN pecl install apcu && docker-php-ext-enable apcu && \
    pecl install redis && docker-php-ext-enable redis && \
    pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]
