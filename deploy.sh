#!/bin/bash

set -e

git pull origin production
php artisan down
php composer --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan view:cache
php artisan route:cache
php artisan event:cache
php artisan up

