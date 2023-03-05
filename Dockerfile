FROM php:7.4-apache
RUN apt-get -y update
RUN apt-get -y upgrade
COPY src/ /var/www/html/
COPY data/ /var/www/data/
COPY setup/setup.sh .
CMD ["bash -c './setup.sh&'"]