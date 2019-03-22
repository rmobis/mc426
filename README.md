# MC426 - Formulários Internos da DAC

[Live!](http://dac.rmob.is/)

## Requirements

- PHP 7+
  - **Extensions**
  - mbstring
  - sqlite3
  - xml

- Composer

## Setup

To download the dependencies, run the following command:

```bash
composer install
```

Then, copy the `.env.example` file, naming it `.env`:

```bash
cp .env.example .env
```

And, finally, create your database file for working locally and run the migrations:

```bash
touch database/database.sqlite
php artisan migrate
```

## Local Server

To start the local server on 127.0.0.1:8000, run the following command:

```bash
php artisan serve
```
