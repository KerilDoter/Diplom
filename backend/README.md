<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Контроллеры Постов
## Посты
Первая версия:
id
cardName
cardImage
cardDescription
created_at
updated_at

Вторая версия:
id
author_id (связь с автором)
title (заголовок)
description (превью статьи)
content (контент статьи)
category_id (связь с категориями)
attachment_id (связь с вложенными файлами)
status_id (связь со статусом)
!!!view (количество просмотров поста)
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать миграцию
Команды:
Создание модели и миграции: `php artisan make:model Post -m` !!! Уже есть
## Статус постов [status]
id
status
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию
Команды:
Создание модели и миграции: `php artisan make:model Status -m`
## Категории постов [category]
id
category
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию
Команды:
Создание модели и миграции: `php artisan make:model Category -m`

Миграции:

## Вложения [attachments]
id
file (адрес до файла или целиком файл)
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию
# Контроллеры пользователей
## Пользователи
id
surname
name
patronymic (отчество)
кафедра (если преподаватель)
должность (если преподаватель)
phone (телефон)
workPhone (рабочий номер телефона)
email
telegram
vk
login
password
idRule (связь с таблицей роли / студент, преподаватель, модератор)
isAdmin (bool)
about (о себе)
idInteresting (связь с таблицей интересы / наверное скиллы)
group (для студента / группа по типу ПИ0000)
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию

## rules (роли)
id 
name_rule
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию

## интересы
id 
name_interesting
created_at (когда создано)
updated_at (когда обновлено)

Todo: надо создать модель, контроллер, миграцию

# Связи
Пост может принадлежать к какой-то категории
Категория может иметь много постов

## команды
Создание миграции для связи таблиц Post, Status и Category:
### Post
Там где связь с другой таблицей 
`$table -> integet('category_id)')->unsigned();`
### Post и Category
`php artisan make:migration create_post_status_table`
В миграции писать:
в методе up()
`$table->id();`
`$table->integer('category_id')->unsigned();`
`$table->integer('post_id')->unsigned();`
`$table->timestamps();`
Поле таблицы постов ссылается на поле таблицы категорий, а в таблице
категорий ссылается на таблицу постов






