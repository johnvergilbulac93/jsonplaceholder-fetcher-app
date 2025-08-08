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
git clone https://github.com/johnvergilbulac93/jsonplaceholder-fetcher-app.git
cd jsonplaceholder-fetcher-app
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed the API Keys

```bash
php artisan db:seed
```

### 🔐 API Authentication

To authenticate API requests:

1. Open your database and look for the `api_keys` table.
2. Copy one of the generated keys.
3. In **Postman** or any API client, add the following header:

X-API-KEY: your-api-key-here
