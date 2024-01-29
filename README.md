Enviorment Setups
PHP 8.2.0
Composer 1 or 2
Git

Installation
-Clone the Project from Git

Run Composer
"composer install"

Env Setup
Copy .env.example and rename it to .env
"cp .env.example .env"

Change following settings in .env :
DB_DATABASE=student_information_system
DB_USERNAME=root
DB_PASSWORD=

Installing Laravel Breeze
"composer require laravel/breeze --dev"
""php artisan breeze:install blade"
"npm run dev"

Database Migration
Run Migration
"php artisan migrate"
