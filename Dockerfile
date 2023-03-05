FROM php:7.4-apache
RUN apt-get -y update
RUN apt-get -y upgrade
COPY src/ /var/www/html/
COPY data/ /var/www/data/
RUN chgrp www-data /var/www/data
RUN chmod g+rwxs /var/www/data