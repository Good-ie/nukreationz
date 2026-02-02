# Stage 1: Base PHP Apache Image
FROM php:8.2-apache AS base

# Install dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    curl \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        mysqli \
        pdo_mysql \
        xml \
        mbstring \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable Apache modules
RUN a2enmod rewrite headers

# Configure Apache for .htaccess support
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Configure PHP for larger uploads
RUN echo "upload_max_filesize = 50M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini

# Stage 2: Production Image
FROM base AS production

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY --chown=www-data:www-data . /var/www/html/

# Remove unnecessary files
RUN rm -f conn.php admin/conn.php \
    && rm -rf .git .github terraform .dockerignore \
    && rm -f start.sh router.php docker-compose.yml

# Create uploads directory
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/uploads

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Health check
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
    CMD curl -f http://localhost/ || exit 1

# Expose port
EXPOSE 80

# Entrypoint
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
