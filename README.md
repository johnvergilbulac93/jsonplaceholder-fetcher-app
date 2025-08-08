
## About This Application

JsonPlaceHolder Fetcher Application use Laravel 12; this are the steps to use this in your local machine:

Step 1: Clone this repo in your local machine.
Step 2: Run command composer install.
Step 3: Run command [ php artisan:migrate ] to migrate the migration in your database.
Step 4: For API Authentication:
     - just run command [ php artisan db:seed ] to generate the keys and saved it into your database.
     - in your database look for table name api_keys
     - in your postman just add header [ X-API-KEY ] and add the value of the key inside api_keys table


