FROM php:8.2-apache

COPY . /var/www/html/

# Enable MySQLi (required for CodeIgniter mysqli driver)
RUN apt-get update \
  && apt-get install -y --no-install-recommends libpng-dev libonig-dev libxml2-dev \
  && docker-php-ext-install mysqli \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

EXPOSE 80
