FROM php:8.2-cli

RUN apt-get update && apt-get install -y unzip libpq-dev
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install 

RUN chmod -R 777 /var/www/uploads

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
