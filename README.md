<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## A25 test task - Laravel API

## Info

API позволяет регистрировать сотрудников, создавать транзацкии, выплачивать все транзакции или определенную транзакцию, использую REST или WEB интерфейс.

## Requirements

- Ubuntu, Windows (WSL)
- PHP 7+ 
- Composer 
- Docker
- Sail

## Install
```
    git clone https://github.com/ayupov-a/a25-test.git
    cd a25-test
    composer require laravel/sail --dev
```
## Launch
```bash
    $ ./vendor/bin/sail up
    $ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
    $ ./vendor/bin/sail npm run dev
```

## Migrations
```bash
    $ sail artisan migrate --seed
```

# Routes

- Создать сотрудника

```bash
    curl --request POST \
      --url api/register \
      --header 'Content-Type: application/json \
      --data '{
        "email":"string|required",
        "password":"string|required"
      }
```

- Залогиниться

```bash
    curl --request POST \
      --url api/login \
      --header 'Content-Type: application/json\
      --data '{
        "email":"string|required",
        "password":"string|required"
    }
```

- Вывести все транзакции

```bash
    curl --request GET \
      --url api/transactions \
      --header 'Content-Type: application/json'
      --header 'Authorization: Bearer $token'
```

- Создать транзакцию

```bash
    curl --request POST \
      --url api/transactions \
      --header 'Authorization: Bearer $token' \
      --header 'Content-Type: application/json' \
      --data {
        "employee_id":"integer|required",
        "hours":"integer|required"
    }
```

- Выплатить все транзакции

```bash
    curl --request PATCH \
      --url api/transactions/all \
      --header 'Authorization: $token' \
      --header 'Content-Type: application/json'
```

- Выплатить транзакцию по `id`

```bash
    curl --request PATCH \
      --url api/transactions/'id' \
      --header 'Authorization: $token' \
      --header 'Content-Type: application/json'
```

# Tests

API покрыто feature тестами 

```bash
    $ sail artisan test
```

