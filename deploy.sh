#!/bin/bash
cd /var/www/larazillow

# 1. Set environment variables
export HOME=/home/ubuntu
export COMPOSER_HOME=/home/ubuntu/.composer

# 2. Update code
cd /var/www/larazillow
git pull origin main

# 3. Install dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader
npm install
npm run build

# 4. Laravel housekeeping
php artisan migrate --force
php artisan optimize:clear