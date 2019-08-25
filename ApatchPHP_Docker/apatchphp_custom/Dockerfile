FROM php:7.2-apache
MAINTAINER y.yoshimoto
# https://hub.docker.com/_/php

# コンテツファイルの設置
RUN docker-php-ext-install pdo_mysql
# COPY contents/* /var/www/html/
COPY php.ini /usr/local/etc/php/
