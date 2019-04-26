# MC426 - Formulários Internos da DAC

[Live!](http://dac.rmob.is/)

## Arquitetura do Projeto

A arquitetura do projeto utiliza o estilo arquitetural MVC, imposto pelo próprio framework php utilizado: Laravel. 

Esse framework segue a risca o estilo MVC inclusive força a utilização explícita dessas três camadas: Rotas são mapeadas a Controllers que consultam os Models. Esses manipulam/consultam o banco de dados, enviam informação de volta ao Controller que a repassa para as Views. 

O esquema de módulos e funcionamento do framework pode ser visto na imagem a seguir:

![Laravel Modules](https://i.stack.imgur.com/yD0eH.jpg "Laravel Modules")

Os modelos utilizados no projeto podem ser vistos na imagem a seguir:

![Project Architecture](http://i.imgur.com/xw647GM.png "Project Architecture")

## Requisitos

- PHP 7+
  - **Extensões**
  - mbstring
  - sqlite3
  - xml

- Composer

## Setup

Para fazer o download das dependências, execute o comando a seguir:

```bash
composer install
```

Após isso, copie o arquivo `.env.example` e renomeie-o para `.env`:

```bash
cp .env.example .env
```

Finalmente crie o arquivo de banco de dados para trabalhar localmente e execute as migrações:

```bash
touch database/database.sqlite
php artisan migrate
```

## Servidor Local

Para inicializar o servidor local no endereço http://127.0.0.1:8000, execute o seguinte comando:

```bash
php artisan serve
```

## Compilando SCSS (Laravel Mix)
Primeiramente, instale o **Laravel Mix** executando o seguinte comando:

```bash
npm install
```

Para compiar seus arquivos SASS em `resources/sass/` para CSS em `public/css/`, execute os seguintes comandos:

```bash
# Run all Mix tasks...
npm run dev

# Run all Mix tasks and minify output...
npm run production
```

Se você quiser que o Laravel Mix automaticamente recompile seus arquivos SASS, sempre que houver uma mudança, execute o seguinte comando:

```bash
npm run watch
```
