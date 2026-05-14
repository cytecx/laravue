#!/bin/bash
cd /var/www/larazillow || exit

git pull origin main

composer install --no-dev --optimize-autoloader

npm install
npm run build

php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo chown -R www-data:www-data /var/www/larazillow
sudo chmod -R 775 storage bootstrap/cache