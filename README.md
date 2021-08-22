# Project setup, linux and mac
```
composer install
composer dump-autoload
php artisan migrate
php artisan db:seed
jwt:secret
```
Create a copy of .env.example named .env
In the .env file, make sure you set the value of APP_KEY to a random, alphanumerical, 32 character string.
Also, fill in the credentials for your database

Clear the cache with the following command:
```
php artisan cache:clear
```

Finally, to spin up a local server, run:

```
php -S localhost:8000 -t public
```
