mkdir storage
mkdir storage/app
mkdir storage/app/modules
mkdir storage/app/purifier
mkdir storage/fonts
mkdir storage/framework
mkdir storage/framework/cache
mkdir storage/framework/views
mkdir storage/framework/sessions

mkdir bootstrap
mkdir bootstrap/cache

php artisan view:clear
php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan config:cache

composer dump-autoload

