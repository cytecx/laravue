#!/bin/bash
cd /var/www/laravue

# 1. Set environment variables
export HOME=/home/ubuntu
export COMPOSER_HOME=/home/ubuntu/.composer

# 2. Update code
git pull

# 3. Install dependencies
composer install --no-dev --optimize-autoloader --no-interaction
npm ci
npm run build

# 4. Laravel housekeeping
php artisan migrate --force
php artisan optimize:clear
