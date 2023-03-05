FROM php:8.1-fpm-alpine3.15

# Add docker-php-extension-installer script
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php extensions
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions opcache bcmath pdo pdo_pgsql xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy code to /var/www
COPY . /var/www

# add php.ini
ADD php.ini /usr/local/etc/php/php.ini

# add root to www group
RUN chmod -R ug+w /var/www/storage

# Setup working directory
WORKDIR /var/www

RUN composer install -q -n --no-ansi --no-dev --no-scripts --no-progress --prefer-dist \
  && chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]
