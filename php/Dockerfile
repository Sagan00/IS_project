FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && \
    apt-get install -y libxml2-dev

RUN docker-php-ext-install soap