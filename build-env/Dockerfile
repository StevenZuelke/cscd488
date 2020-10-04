FROM php:7.2-apache

# Install sqlite3 and wget
RUN apt-get update && apt -y install sqlite3 wget

# Install PHPUnit into /usr/local/bin
RUN wget -O /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-9.phar && chmod +x /usr/local/bin/phpunit

