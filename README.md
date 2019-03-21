# MC426 - Formulários Internos da DAC

## Requirements

- PHP 7+
- Composer

## Setup

To download the dependencies, run the following command:

```bash
composer install
```

Then, create your database file for working locally:

```bash
touch database/database.sqlite
```

And, finally, copy the `.env.example` file, naming it `.env`:

```bash
cp .env.example .env
```

## Local Server

To start the local server on 127.0.0.1:8000, run the following command:

```bash
php artisan serve
```
