<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How To Install
Note: I made this project with nginx as web server and Laradock.

URL API :
1. /api/register/user
2. /api/login/user
3. /api/logout/user
3. /api/topup


Without Laradock

1. Clone this repo project
2. enter to the clone directory (mini_ewallet) and run this command ```composer install ```
3. copy the .env.example and rename it to .env, you can use this command ```cp .env.example .env``` 
4. run this command to generate key ```php artisan key:generate```
5. run this command ```sudo chmod -R 777 storage/``` and ```sudo chmod -R 775 bootstrap/``` 
6. finally run the laravel with command ```php artisan serve```
7. DONE

With laradock

1. Clone this repo project to your laradock project directory 
2. Don't forget to configure your nginx for laradock, I don't want to mention it how to configure.
3. enter to the clone directory (mini_ewallet) and run this command ```composer install ```
4. copy the .env.example and rename it to .env, you can use this command ```cp .env.example .env``` 
5. run this command to generate key ```php artisan key:generate```
6. run this command ```chmod -R 777 storage/``` and ```chmod -R 775 bootstrap/```
7. DONE

