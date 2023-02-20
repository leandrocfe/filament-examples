# Filament Examples

Examples to illustrate how Filament Admin works.

## Installation

Clone the repo locally
Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

> **Note**  
> If you get an "Invalid datetime format (1292)" error, this is probably related to the timezone setting of your database.  
> Please see https://dba.stackexchange.com/questions/234270/incorrect-datetime-value-mysql

Create a symlink to the storage:

```sh
php artisan storage:link
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```
