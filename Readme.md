<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Install Laravel

-   Step 1 : git clone https://github.com/....
-   Step 2 : composer install
-   Step 3 : php artisan key:generate
-   Step 4 : create database with name cinema and setting in .env
-   Step 5 : php artisan migrate:fresh --seed
-   Step 6 : composer dumpautoload
-   Step 7 : php artisan serve

## Command Line

-   create database and model: "php artisan make:model Example -m"
-   create Controller: "php artisan make:controller ExampleController"
-   rollback database and seed: "php artisan migrate:fresh --seed"
-   rollback database: "php artisan migrate:rollback"
-   run database: "php artisan migrate"
-   run seed: "php artisan db:seed"
-   composer require spatie/laravel-permission
-   composer require cloudinary-labs/cloudinary-laravel
-   composer require milon/barcode
-   composer require picqer/php-barcode-generator
-   composer update
-   php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider" --tag="cloudinary-laravel-config"
-   composer dumpautoload

## Documentation

-   https://github.com/doo/scanbot-sdk-example-web/tree/master
-   https://docs.scanbot.io/document-scanner-sdk/web/introduction/
-   https://spatie.be/docs/laravel-permission/v5/introduction
-   https://github.com/milon/barcode
-   https://github.com/picqer/php-barcode-generator
-   https://github.com/cloudinary-devs/cloudinary-laravel#installation

## Config Mail in .ENV

-   Create application password: https://support.google.com/mail/answer/185833?hl=vi to config:
-   MAIL_USERNAME = example@gmail.com
-   MAIL_PASSWORD = application password
-   MAIL_FROM_ADDRESS = example@gmail.com
-   MAIL_NAME = example

## Config Cloudinary in .ENV

-   Create account in https://console.cloudinary.com/ to config:
-   CLOUD_NAME = Cloud Name
-   CLOUDINARY_URL = API Environment variable
-   CLOUDINARY_NOTIFICATION_URL = API Environment variable
