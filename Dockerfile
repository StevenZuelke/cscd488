FROM php:7.2-apache

# Install sqlite3 and wget
RUN apt-get update && apt -y install sqlite3 wget

# Install PHPUnit into /usr/local/bin
RUN wget -O /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-9.phar && chmod +x /usr/local/bin/phpunit

# Install Sudo 
RUN apt-get -y install sudo

COPY classes /var/www/classes
COPY includes /var/www/includes
COPY html /var/www/html
COPY install /install
RUN mkdir /var/www/db
RUN /install/install.sh

RUN sudo chown -R www-data /var/www/db
RUN sudo chown www-data /var/www/db/main.db

