FROM php:7.4-apache

# Install PHP extensions and dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html