composer install --no-dev
npm install --production
chown -R www-data:www-data storage/
chown -R www-data:www-data bootstrap/cache/
php artisan storage:link
php artisan migrate