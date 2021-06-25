git clone https://github.com/Yauheni-Nikifarau/myitschool_final
composer install
complete .env file APP_URL DB_DATABASE DB_USERNAME DB_PASSWORD WEATHER_API_KEY ec5ad59a03eee07f1141552f34b66261
make directories tripsWallpapers, hotelsPhotos, ordersReports in /storage/app/public/
php artisan storage:link
php artisan key:generate
if you are a linux user make necessary permissions for project directory
php artisan migrate
php artisan db:seed
php artisan serve
