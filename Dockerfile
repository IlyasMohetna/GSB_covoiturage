FROM php:8.2-fpm

# ARG user
# ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user
# RUN useradd -G www-data,root -u $uid -d /home/$user $user
# RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
#     mkdir -p /home/$user/.composer /var/www && \
# RUN chown -R www-data:www-data /var/www
ADD . /var/www
# Setting ownership
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
# RUN sudo chmod storage
# RUN chown -R www-data:www-data /var/www/storage
# RUN chmod -R 777 /var/www/storage
# RUN chown -R www-data:www-data
# Switch to non-root user
# USER $user
