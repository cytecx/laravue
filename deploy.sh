#!/bin/bash
cd /var/www/larazillow || exit

git -c safe.directory=/var/www/larazillow pull origin main

composer install --no-dev --optimize-autoloader

npm install
npm run build

php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache