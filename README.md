# Movies CMS
    A free and open source Saas Platform to manager online movies
## Requirement's
    - Composer
    - PHP ^ 8.0.2
    - MySql ^5 or similar database
    - RedisCLI
    - Docker (Only if use Sail)
    - Permission folder
    - Supervisor
    - Crontab

## Before install
    Open .env file and make the correctly modifications
    Open package.json file and change if necessary the "Script: { dev: vite --host localhost}" to your host

## How to install
    The project have a default laravel installation!
    but if you need

    1) composer install
    2) npm run build
    3) php artisan artisan:storage-link
    4) php artisan key:generator
    5) php artisan websockets:serve
    6) php artisan serve
    7) php npm run dev (Just in DEV mode)

## Authors
    Gustavo Martim
    gustavo@spdev.com.br | https://www.linkedin.com/in/gustavo-martim-545b941b8/
