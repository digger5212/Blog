<p align="center">Laravel Blog Demo</p>

## Download the code

- git clone the code

## Make sure you mysql serve is up.

## Update Database in .env File
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

### Install laravel
- composer install
- php artisan queue:table
- php artisan migrate

## Run Laravel App
php artisan serve

## Test
Now, go to your web browser, type the given URL and view the app output
http://localhost:8000/home
