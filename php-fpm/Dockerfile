FROM php:7.1.0-fpm

MAINTAINER ZGG

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb-1.2.2
RUN docker-php-ext-install bcmath
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

RUN pecl install swoole
RUN echo "extension=swoole.so" >> /usr/local/etc/php/conf.d/swoole.ini

ENV PHPREDIS_VERSION 3.1.3
RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
    && rm -rf /usr/src/php
    
RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev
RUN docker-php-ext-install iconv mcrypt mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

WORKDIR /var/www/html
RUN mkdir /socket
#COPY ./getsocket.php /socket/
#CMD php /socket/getsocket.php xiasha 3 9371 172.31.13.150

# Add crontab file in the cron directory
#ADD crontab /etc/cron.d/crontab

# Give execution rights on the cron job
#RUN chmod 0644 /etc/cron.d/crontab

# Create the log file to be able to run tail
#RUN touch /var/log/cron.log
#RUN mkdir /socket
#Install Cron
#RUN apt-get update
#RUN apt-get -y install cron


# Run the command on container startup
#CMD cron && tail -f /var/log/cron.log
