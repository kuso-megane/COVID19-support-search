FROM php:7.4-apache

# for composer install
RUN apt-get update \ 
  && apt-get install -y libzip-dev 

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# for routing
RUN a2enmod rewrite

# for pdo
RUN docker-php-ext-install pdo_mysql


CMD ["apachectl", "-D", "FOREGROUND"]


EXPOSE 80
