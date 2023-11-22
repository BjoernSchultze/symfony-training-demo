# Use the official PHP 8 FPM base image
FROM php:8-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    curl \
    libpq-dev \
    libicu-dev \
    librabbitmq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql intl
RUN pecl install amqp && docker-php-ext-enable amqp
COPY ./.docker/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Set the working directory
WORKDIR /var/www/html

# Copy the application code to the container
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies with Composer
RUN composer install --no-interaction --no-progress --no-suggest

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
