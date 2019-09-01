<?php
/*
! instrolling system
*/
composer create-project --prefer-dist laravel/laravel ecommerce-application
php artisan serve!
/*
    !models
*/
php artisan make:model Models\Admin -m
php artisan make:seed AdminsTableSeeder

// !DatabaseSeeder 
$this->call(AdminsTableSeeder::class);
php artisan make:controller Admin\LoginController