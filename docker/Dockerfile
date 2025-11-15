# Stage 1: Build environment and Composer dependencies
FROM php:8.3.8-fpm-alpine

# Set LD_PRELOAD for iconv compatibility
ENV LD_PRELOAD=/usr/lib/preloadable_libiconv.so


# Install system dependencies including build tools
RUN apk add --update --no-cache \
    curl \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    libxml2-dev \
    openssl-dev \
    git \
    bash \
    gnu-libiconv \
    # Build tools for PECL extensions
    autoconf \
    build-base \
    pkgconfig \
    linux-headers \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo \
        pdo_mysql \
        mysqli \
        intl \
        mbstring \
        zip \
        pcntl \
        exif \
        opcache \
        bcmath \
        soap \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Copy your custom PHP configuration
COPY ./docker/php.ini /usr/local/etc/php/conf.d/php.ini

CMD ["php-fpm"]
