FROM php:7.4-apache
RUN apt-get -y update
RUN apt-get -y upgrade
RUN apt-get install -y php7.4-sqlite3
COPY src/ /var/www/html/