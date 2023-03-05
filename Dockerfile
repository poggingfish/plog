FROM php:7.4-apache
RUN apt-get -y update
RUN apt-get -y upgrade
COPY src/ /var/www/html/
COPY conf/ /var/www/conf/