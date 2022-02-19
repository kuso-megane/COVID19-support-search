FROM --platform=linux/x86_64 php:7.4-apache


ENV APACHE_RUN_USER=www-data
ENV APACHE_RUN_GROUP=www-data
ENV APACHE_PID_FILE=/var/run/apache2.pid
ENV APACHE_RUN_DIR=/var/run/apache2
ENV APACHE_LOG_DIR=/var/log/apache2
ENV APACHE_LOCK_DIR=/var/lock/apache2


# for routing
RUN a2enmod rewrite

# for pdo
RUN docker-php-ext-install pdo_mysql


CMD ["apachectl", "-D", "FOREGROUND"]

WORKDIR /var/www/

EXPOSE 80
