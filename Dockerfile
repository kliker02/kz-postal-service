FROM php:8.0-apache

WORKDIR /var/www/html

RUN a2enmod rewrite && \
    a2dissite 000-default && \
    service apache2 restart