#!/bin/bash

composer install

echo '=== Artisan Start ==='

# php artisan key:generate
php artisan storage:link
php artisan migrate
# php artisan db:seed

echo '=== Artisan End ==='

exec "$@"
