#!/bin/bash
set -e

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    sleep 2
done

echo "MySQL is ready!"

# Run migrations
echo "Running migrations..."
mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_NAME" < /app/database/migrations.sql

# Run seeds
echo "Running seeds..."
mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_NAME" < /app/database/seeds.sql

echo "Database initialization complete!"
