# Use PHP with FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev libjpeg-dev libfreetype6-dev \
  git \
  curl \
  zip \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd \
  && docker-php-ext-install pdo pdo_mysql \ 
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Xdebug
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug

# Copy your custom ini file
COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Set the working directory
WORKDIR /var/www/html

# Add Git safe directory configuration
RUN git config --global --add safe.directory /var/www/html

# Copy application code into the container
COPY . .

# Install PHP dependencies
RUN composer install

# Expose PHP-FPM port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
