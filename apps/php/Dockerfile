FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
    libonig-dev
COPY ./config/php.ini /usr/local/etc/php/

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8
