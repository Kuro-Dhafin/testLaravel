Composer install
cp .env.example .env
php artisan key:generate
set DB in .env
php artisan migrate --seed
php artisan serve
login admin: admin@mail.com / admin123