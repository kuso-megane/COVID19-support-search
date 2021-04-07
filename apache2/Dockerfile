FROM php:7.4-apache


# for routing
RUN a2enmod rewrite

# for pdo
RUN docker-php-ext-install pdo_mysql


CMD ["apachectl", "-D", "FOREGROUND"]

WORKDIR /var/www/

EXPOSE 80
