# Northwind API

A read-only REST API for a small product catalog, built with Laravel.

**Try it:** https://northwind-api-frontend-iota.vercel.app/docs

**Live site:** https://northwind-api-frontend-iota.vercel.app

**Frontend code:** https://github.com/samchon-nani/northwind-api-frontend

**Built with:** Laravel 13, PHP, PostgreSQL (Neon), Docker, PHPUnit, Scramble

> The API runs on free hosting that sleeps when nobody is using it. The first request can take about a minute.

## Endpoints

| Request | What it returns |
|---|---|
| `GET /api/v1/products` | A page of products. Options: `category`, `page`, `per_page` (up to 100) |
| `GET /api/v1/products/{id}` | One product |
| `GET /api/v1/categories` | All categories |
| `GET /api/v1/shippers` | All shippers |

Errors are returned as JSON. Requests are limited to 60 per minute for each visitor.

## Run it on your computer

You need PHP, Composer and a PostgreSQL database.

1. Run `composer install`.
2. Create `.env` with the settings below. Never commit it.
3. Run `php artisan key:generate`.
4. Run `php artisan migrate --seed` to create the tables and sample data.
5. Run `php artisan serve` and open http://127.0.0.1:8000/api/v1/products.

| Name | Value |
|---|---|
| `APP_KEY` | Leave empty. Step 3 fills it in |
| `APP_ENV` | `local` |
| `DB_CONNECTION` | `pgsql` |
| `DB_URL` | Your PostgreSQL connection string |
| `SESSION_DRIVER` | `file` |
| `CACHE_STORE` | `file` |
| `QUEUE_CONNECTION` | `sync` |

## Check the code

    php artisan test --compact
    vendor/bin/pint

The API tests use an in-memory SQLite database, so they do not touch your own data.

## Where things are

| What | Folder or file |
|---|---|
| Routes | `routes/api.php` |
| Controllers | `app/Http/Controllers/Api/V1` |
| JSON shapes | `app/Http/Resources` |
| Request checks | `app/Http/Requests` |
| Tables and sample data | `database/migrations` and `database/seeders` |
| API tests | `tests/Feature/Api/V1` |

## Credits

Inspired by the Northwind sample database. The API and its sample products were written for this project. Built with the help of Claude Code.
