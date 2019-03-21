# MC426 - Formulários Internos da DAC

## Requirements

- PHP 7+
- Composer

## Setup

To download the dependencies, run the following command:

```bash
composer install
```

Then, copy the `.env.example` file, naming it `.env`:

```bash
touch database/database.sqlite
```

And, finally, create your database file for working locally and run the migrations:

```bash
cp .env.example .env
php artisan migrate
```

## Local Server

To start the local server on 127.0.0.1:8000, run the following command:

```bash
php artisan serve
```
