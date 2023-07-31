FROM php:8.0-apache
RUN apt update && apt upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

CMD [ "php", "-S", "0.0.0.0:8000"]