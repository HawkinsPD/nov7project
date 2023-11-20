FROM phpdockerio/php:8.2-fpm
WORKDIR "/app"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.2-bcmath \ 
        php8.2-http \ 
        php8.2-mcrypt \ 
        php8.2-memcache \ 
        php8.2-memcached \ 
        php8.2-pgsql \ 
        php8.2-redis \ 
        php8.2-xdebug; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

ENV PHP_IDE_CONFIG 'serverName=xdebug-localhost'
RUN echo "xdebug.mode=debug" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request = yes" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=docker.for.mac.localhost" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9001" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/log/xdebug.log" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM" >> /etc/php/8.2/fpm/conf.d/docker-php-ext-xdebug.ini