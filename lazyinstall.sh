#!/usr/bin/env bash

# base source
git clone git@github.com:bouchardm/conge-app-laravel.git
cd conge-app-laravel

# external source
composer install
npm install # sudo chown -R $(whoami) ~/.npm
gulp

# .env file
cp .env.example .env
php artisan key:generate

# lazy database
touch database/database.sqlite
php artisan migrate

# ide-helper
php artisan clear-compiled
php artisan ide-helper:generate

# install checkup
./vendor/bin/phpunit