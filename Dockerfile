FROM php:7.4-apache
VOLUME /var/www/data
RUN apt-get -y update
RUN apt-get -y upgrade
COPY src/ /var/www/html/
COPY data/ /var/www/data/
RUN chown -R www-data:www-data /var/www/data