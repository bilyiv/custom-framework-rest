FROM php:7.2-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/yohai

COPY . .

COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

