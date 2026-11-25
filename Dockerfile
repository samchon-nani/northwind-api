  FROM php:8.6-apache

  RUN apt-get update \
      && apt-get install -y --no-install-recommends libpq-dev unzip \
      && docker-php-ext-install pdo_pgsql \
      && a2enmod rewrite \
      && rm -rf /var/lib/apt/lists/*

  COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
  COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

  ENV PORT=10000
  RUN echo 'Listen ${PORT}' > /etc/apache2/ports.conf

  WORKDIR /var/www/html
  COPY . .

  RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader \
      && chown -R www-data:www-data storage bootstrap/cache

  CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && exec apache2-foreground"]