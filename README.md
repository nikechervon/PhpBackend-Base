# Тестовые задания для академии Digital Spectr

<br>

- [Структура заданий](https://github.com/nikechervon/digital_spectr_academy#%D1%81%D1%82%D1%80%D1%83%D0%BA%D1%82%D1%83%D1%80%D0%B0-%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B9)
   - [Задание 1](https://github.com/nikechervon/digital_spectr_academy#%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5-1)
   - [Задание 2](https://github.com/nikechervon/digital_spectr_academy#%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5-2)
   - [Задание 3](https://github.com/nikechervon/digital_spectr_academy#%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5-3)
- [Системные требования окружения](https://github.com/nikechervon/digital_spectr_academy#%D1%81%D0%B8%D1%81%D1%82%D0%B5%D0%BC%D0%BD%D1%8B%D0%B5-%D1%82%D1%80%D0%B5%D0%B1%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F-%D0%BE%D0%BA%D1%80%D1%83%D0%B6%D0%B5%D0%BD%D0%B8%D1%8F)
- [Архитектурное решение](https://github.com/nikechervon/digital_spectr_academy#%D0%B0%D1%80%D1%85%D0%B8%D1%82%D0%B5%D0%BA%D1%82%D1%83%D1%80%D0%BD%D0%BE%D0%B5-%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D0%B5)
- [Процесс установки](https://github.com/nikechervon/digital_spectr_academy#%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D1%81%D1%81-%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B8)

<br>

## Структура заданий:

### Задание 1:

Реализовать скрипт на php, который определит является ли год високосным.
На вход скрипту нужно передавать значение, скрипт должен выдавать один из возможных ответов: ДА, НЕТ, ОШИБКА ВО ВХОДНЫХ ДАННЫХ.

### Задание 2:

Написать функцию, которая принимает в качестве аргументов префикс и массив строк и возвращает все строки,
начинающиеся с указанного префикса. Необходимо реализовать функцию наиболее оптимальным образом.

### Задание 3:

В лофте n хипстерам достались m смузи. При этом все хипстеры - люди вежливые,
и поэтому должны выпить одинаковое количество смузи (можно выбросить несколько).
Напишите функцию результатом которой будет количество смузи, которое выпьет каждый хипстер.

<br>

## Системные требования окружения

- [Composer](https://getcomposer.org/)
- [PHP-8](https://www.php.net/releases/8.0/ru.php)

<br>

## Архитектурное решение

Система реализована как 3 независимые SPA-приложения.

В каталоге [backend](./backend) находятся 3 независимых микро-сервиса,
каждый из них представляет собой приложение на PHP 8,
с использованием [библиотеки для роутинга](https://github.com/izniburak/php-router).

В каталоге [frontend](./frontend) по аналогии с [backend](./backend),
находятся 3 директории с фронтенд-частью каждого задания.
Общение между сервисами происходит через AJAX-запросы

<br>

## Процесс установки

<br>

1. Клонируем проект в корневую папку доменов вашего сервера:
   
   ```shell
   $ git clone https://github.com/nikechervon/digital_spectr_academy.git digital-spectr.loc
   ```
<br>

2. Запустите скрипт для установки всех необходимых библиотек:

   ```shell
   $ sh digital-spectr.loc/backend/bash/build.sh
   ```
<br>

3. Запускайте сервер и переходите к стартовой странице:

   ```
   http://digital-spectr.loc/frontend/
   ```
