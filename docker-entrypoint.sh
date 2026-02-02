#!/bin/bash
set -e

# Validate required environment variables
required_vars=("DB_HOST" "DB_USERNAME" "DB_PASSWORD" "DB_NAME")

for var in "${required_vars[@]}"; do
    if [ -z "${!var}" ]; then
        echo "ERROR: Required environment variable $var is not set"
        exit 1
    fi
done

echo "✓ All required environment variables are set"

# Create conn.php from environment variables
cat > /var/www/html/conn.php << PHPCONN
<?php
\$db = mysqli_connect(
    '${DB_HOST}',
    '${DB_USERNAME}',
    '${DB_PASSWORD}',
    '${DB_NAME}'
);

if (!\$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
PHPCONN

# Copy to admin folder
cp /var/www/html/conn.php /var/www/html/admin/conn.php

# Set correct ownership
chown www-data:www-data /var/www/html/conn.php /var/www/html/admin/conn.php
chmod 644 /var/www/html/conn.php /var/www/html/admin/conn.php

echo "✓ Database configuration created"

# Start Apache
echo "✓ Starting Apache..."
exec apache2-foreground
