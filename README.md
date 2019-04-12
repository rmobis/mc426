# MC426 - Formulários Internos da DAC

[Live!](http://dac.rmob.is/)

## Project Architecture

![Project Architecture](http://i.imgur.com/xw647GM.png "Project Architecture")

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

## Compiling CSS (Laravel Mix)
First, install Laravel Mix running the following command:

```bash
npm install
```

In order to compile your SASS `resources/sass/` to CSS `public/css/`, use the following commands:

```bash
# Run all Mix tasks...
npm run dev

# Run all Mix tasks and minify output...
npm run production
```

If you want to watch for changes and let Laravel Mix automatically recompile the SASS files, run the following command:


```bash
npm run watch
```
