#FROM codemix/yii2-base:2.0.8-php7-apache
FROM codemix/yii2-base:2.0.8-php7-fpm
#FROM codemix/yii2-base:2.0.8-hhvm

RUN apt-get update \
    && apt-get -y install \
       libmemcached-dev \
       libmemcached11 \
       --no-install-recommends \
    && rm -r /var/lib/apt/lists/*

RUN git clone --branch php7 https://github.com/php-memcached-dev/php-memcached /usr/src/php/ext/memcached \
  && cd /usr/src/php/ext/memcached \
  && docker-php-ext-configure memcached \
  && docker-php-ext-install memcached

# Copy the working dir to the image's web root
COPY . /var/www/html
