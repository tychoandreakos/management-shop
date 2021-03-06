#Source 	https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04
# ERROR
# 1. Imagic cannot detect JPG -> https://stackoverflow.com/questions/51421952/call-to-undefined-function-intervention-image-gd-imagecreatefromjpeg-lara

FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system depencies
RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	unzip \
	libonig-dev \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
    	libpng-dev \
	libmagickwand-dev --no-install-recommends \
    	&& pecl install imagick \
	&& docker-php-ext-enable imagick

# Clear Cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP Extension
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

# Get latest Composer
Copy --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
	chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
