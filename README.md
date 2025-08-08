<!--
## About This Application

JsonPlaceHolder Fetcher Application use Laravel 12; this are the steps to use this in your local machine:

Step 1: Clone this repo in your local machine.
Step 2: Run command composer install.
Step 3: Run command [ php artisan:migrate ] to migrate the migration in your database.
Step 4: For API Authentication:
     - just run command [ php artisan db:seed ] to generate the keys and saved it into your database.
     - in your database look for table name api_keys
     - in your postman just add header [ X-API-KEY ] and add the value of the key inside api_keys table

 -->

# JsonPlaceholder Fetcher Application

A Laravel 12 application that fetches data from the [JsonPlaceholder API](https://jsonplaceholder.typicode.com/) and demonstrates simple API key authentication.

---

## 🚀 Features

-   Fetches and stores JsonPlaceholder resources
-   API key-based authentication using middleware
-   Laravel 12-based structure

---

## 🛠️ Requirements

-   PHP 8.2+
-   Composer
-   MySQL or compatible database
-   Laravel 12

---

## ⚙️ Installation

Follow these steps to run this project on your local machine:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```
