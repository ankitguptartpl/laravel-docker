# Install Ubantu as Base Image
FROM ubuntu:20.04

RUN apt-get update -y

# Install vim and nano terminal file editor
RUN apt-get install vim nano -y

#Setup timezone enviroment for non intracting when install php
ENV TZ=Asia/Kolkata
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#RUN apt-get update -y

# Install PHP Package
#RUN apt-get install -y software-properties-common
#RUN apt-get install -y python-software-properties
#RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php

#RUN apt-get update -y


RUN apt-get update -y

# Install php and It's extensions
RUN apt-get install -y php
RUN apt-get install -y php-xml php-mbstring php-mysqli php-intl php-gd php-mysql php-zip php-soap php-fpm php-curl php-bcmath
#COPY config/apache/php.ini /etc/php//apache2/php.ini
#COPY config/php-cli/php.ini /etc/php//cli/php.ini

# Install Apache 2
#RUN apt-get install apache2 -y

#Update apache config
COPY ./config/apache2.conf /etc/apache2/apache2.conf

# Enable Apache Re-write mod
RUN a2enmod rewrite
RUN service apache2 restart


# Copy htdocs sorce code to web container /var/www/html/ directory
COPY htdocs/ /var/www/html/

# Install Supervisor
#RUN apt-get install supervisor -y
#COPY ../config/laravel-lucid-worker.conf /etc/supervisor/conf.d/
#CMD ["/usr/bin/supervisord", "-n"]


# Install Composer
WORKDIR /etc/composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/bin --filename=composer \
    && php -r "unlink('composer-setup.php');";

#install Git
#RUN apt-get update -y
#RUN apt-get install git-core -y

#RUN apt-get update
WORKDIR /var/www/html
