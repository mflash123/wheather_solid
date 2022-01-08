## About

This project like a hobbie.
Laravel SOLID concept.


Dont forget create DB
SQL: create database wheather;

## Status
php artisan get:russia getting wheather only on moscow

* Done GET countries methods+swagger
* Done HTTP tests covers GET countries

## Global issue
Я получаю погоду за 5 дня 1 списком. И я НЕ обновляю погоду.
Если завтра погода изменится на день, который я получил вчера(до этого) - я проигнорирую изменения.
Вопрос - а такое бывает?

## Additions
* Swagger
* Eloquent resource ( https://laravel.com/docs/8.x/eloquent-resources )
* Rest API (OpenAPI) Specifications ( https://google.github.io/styleguide/jsoncstyleguide.xml )
* Unit test - Just http tests are done