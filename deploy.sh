#Run Databese Migrations
php artisan migrate:refresh

#Run Seeds
php artisan db:seed --class=UserSeeder
#php artisan db:seed --class=CountriesSeeder