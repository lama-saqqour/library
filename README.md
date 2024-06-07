<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Техническое задание

1. Реализовать сущности авторы и книги;
2. Реализовать административную часть:
   a. CRUD операции для сущностей: "авторы" и "книги";
   b. вывести список книг с обязательным указанием имени автора в списке (отдельная страница);
   c. вывести список авторов с указанием кол-ва книг (отдельная страница);
3. Реализовать публичную часть сайта с отображение авторов и их книг (простой вывод списка на странице)

Необходимо соблюдать следующие условия:
- Использовать нужно php фреймворк Laravel последней версии.
- Вводимые данные должны валидироваться.
- Должна соблюдаться консистентность данных в БД.
- Результат представить ссылкой на репозиторий.
- Желательно, в репозиторий залить пустой каркас приложения, а затем с внесёнными изменениями, чтобы можно было проследить изменения.

Сущности:
Сущность «Автор» имеет имя, сущность «Книга» имеет имя, описание и связана с сущностью «Автор» отношением «one-to-many» (один автор, множество книг).
Для каждого объекта была выполнена операция CRUD (список по запросу, create, read, update, delete).

Техническая информация:
Сайт разработан с использованием Laravel 11.
Администратор: admin@rccu.ru
Пароль: P@ssw0rd
Страницы администрирования защищены, и доступ к ним может получить только администратор. Из-за изменений в этой версии (11) по сравнению с предыдущими версиями, защита определялась с помощью Gate в AppServiceProvider, а затем запрашивалась в соответствующих методах контроллера (методы CRUD доступны только администраторам).
Чтобы избежать повторения Read views как для администратора, так и для других неавторизованных пользователей, защита с помощью Gate была запрошена в представлении для частей создания, редактирования и удаления.